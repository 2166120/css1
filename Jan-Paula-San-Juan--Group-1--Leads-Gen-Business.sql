USE lead_gen_business;
/**1. What query would you run to get the total revenue for March of 2012?**/
SELECT MONTHNAME(charged_datetime) AS month, SUM(amount) AS revenue FROM billing
WHERE MONTH(charged_datetime) = 3 AND YEAR(charged_datetime) = 2012 GROUP BY MONTH(charged_datetime);
/**2. What query would you run to get total revenue collected from the client with an id of 2?**/
SELECT client_id, SUM(amount) AS total_revenue FROM billing WHERE client_id = 2 GROUP BY client_id;
/**3. What query would you run to get all the sites that client=10 owns?**/
SELECT domain_name AS website, client_id FROM sites WHERE client_id = 10;
/**4. What query would you run to get total # of sites created per month per year for the client with an id of 1? What about for client=20?**/
SELECT client_id, COUNT(domain_name) AS number_of_websites, MONTHNAME(created_datetime) AS month_created, YEAR(created_datetime) AS year_created FROM sites
WHERE client_id = 1 GROUP BY MONTH(created_datetime);
SELECT client_id, COUNT(domain_name) AS number_of_websites, MONTHNAME(created_datetime) AS month_created, YEAR(created_datetime) AS year_created FROM sites
WHERE client_id = 20 GROUP BY MONTH(created_datetime);
/**5. What query would you run to get the total # of leads generated for each of the sites between January 1, 2011 to February 15, 2011?**/
SELECT domain_name AS website, COUNT(leads_id) AS number_of_leads, DATE_FORMAT(registered_datetime, "%M %d, %Y") AS date_generated FROM leads INNER JOIN sites
WHERE leads.site_id = sites.site_id AND YEAR(registered_datetime) = 2011 AND DAYOFYEAR(registered_datetime) BETWEEN "001" AND "046" GROUP BY leads.site_id;
/**6. What query would you run to get a list of client names and the total # of leads we've generated for each of our clients between January 1, 2011 to
December 31, 2011?**/
SELECT CONCAT(clients.first_name, " ", clients.last_name) AS client_name, COUNT(leads_id) AS number_of_leads FROM leads INNER JOIN sites INNER JOIN clients
WHERE YEAR(leads.registered_datetime) = 2011 AND leads.site_id = sites.site_id AND sites.client_id = clients.client_id GROUP BY client_name;
/**7. What query would you run to get a list of client names and the total # of leads we've generated for each client each month between months 1 - 6 of Year 2011?**/
SELECT CONCAT(clients.first_name, " ", clients.last_name) AS client_name, COUNT(leads_id) AS number_of_leads, MONTHNAME(registered_datetime) AS month_generated
FROM leads INNER JOIN sites INNER JOIN clients WHERE leads.site_id = sites.site_id AND sites.client_id = clients.client_id AND YEAR(registered_datetime) = 2011 AND
MONTH(registered_datetime) BETWEEN "01" AND "06" GROUP BY CONCAT(leads.first_name, " ", leads.last_name) ORDER BY MONTH(registered_datetime) ASC;
/**8. What query would you run to get a list of client names and the total # of leads we've generated for each of our clients' sites between January 1, 2011 to
December 31, 2011? Order this query by client id.
Come up with a second query that shows all the clients, the site name(s), and the total number of leads generated from each site for all time.**/
SELECT CONCAT(clients.first_name, " ", clients.last_name) AS client_name, domain_name AS website, COUNT(leads_id) AS number_of_leads,
DATE_FORMAT(registered_datetime, "%M %d, %Y") AS date_generated FROM leads INNER JOIN sites INNER JOIN clients WHERE YEAR(registered_datetime) = 2011 AND
leads.site_id = sites.site_id AND sites.client_id = clients.client_id GROUP BY domain_name ORDER BY clients.client_id ASC;
SELECT CONCAT(clients.first_name, " ", clients.last_name) AS client_name, domain_name AS website, COUNT(leads_id) AS number_of_leads
FROM leads INNER JOIN sites INNER JOIN clients WHERE leads.site_id = sites.site_id AND sites.client_id = clients.client_id
GROUP BY domain_name ORDER BY clients.client_id ASC;
/**9. Write a single query that retrieves total revenue collected from each client for each month of the year. Order it by client id.**/
SELECT CONCAT(clients.first_name, " ", clients.last_name) AS client_name, SUM(amount) AS Total_Revenue, MONTHNAME(charged_datetime) AS month_charge,
YEAR(charged_datetime) AS year_charge FROM clients INNER JOIN billing WHERE billing.client_id = clients.client_id
GROUP BY DATE(charged_datetime) ORDER BY billing.client_id;
/**10. Write a single query that retrieves all the sites that each client owns. Group the results so that each row shows a new client.
It will become clearer when you add a new field called 'sites' that has all the sites that the client owns. (HINT: use GROUP_CONCAT)**/
SELECT CONCAT(clients.first_name, " ", clients.last_name) AS client_name, GROUP_CONCAT(domain_name SEPARATOR " / ") AS sites FROM clients INNER JOIN sites
WHERE clients.client_id = sites.client_id GROUP BY sites.client_id;