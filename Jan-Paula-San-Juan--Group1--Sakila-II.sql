USE Sakila;
/**1. Get all the list of customers.**/
SELECT * FROM customer;
/**2. Get all the list of customers as well as their address.**/
SELECT CONCAT(first_name, ' ', last_name) AS customer_name, address FROM customer INNER JOIN address;
/**3. Get all the list of customers as well as their address and the city name.**/
SELECT CONCAT(first_name, ' ', last_name) AS customer_name, address, city FROM customer INNER JOIN address INNER JOIN city;
/**4. Get all the list of customers as well as their address, city name, and the country.**/
SELECT CONCAT(first_name, ' ', last_name) AS customer_name, address, city, country FROM customer INNER JOIN address INNER JOIN city INNER JOIN country;
/**5. Get all the list of customers who live in Bolivia.**/
SELECT CONCAT(first_name, ' ', last_name) AS customer_name, address, city, country FROM customer INNER JOIN address INNER JOIN city INNER JOIN country WHERE country = 'Bolivia';
/**6. Get all the list of customers who live in Bolivia, Germany and Greece.**/
SELECT CONCAT(first_name, ' ', last_name) AS customer_name, address, city, country FROM customer INNER JOIN address INNER JOIN city INNER JOIN country WHERE country IN ('Bolivia', 'Germany', 'Greece');
/**7. Get all the list of customers who live in the city of Baku.**/
SELECT CONCAT(first_name, ' ', last_name) AS customer_name, address, city, country FROM customer INNER JOIN address INNER JOIN city INNER JOIN country WHERE city = 'Baku';
/**8. Get all the list of customers who live in the city of Baku, Beira, and Bergamo.**/
SELECT CONCAT(first_name, ' ', last_name) AS customer_name, address, city, country FROM customer INNER JOIN address INNER JOIN city INNER JOIN country WHERE city IN ('Baku', 'Beira', 'Bergamo');
/**9. Get all the list of customers who live in a country where the country name's length is less than 5. Show the customer with the longest full name first. (Hint:  Look into how you can concatenate a string in SQL).**/
SELECT CONCAT(first_name, ' ', last_name) AS customer_name, country, CHAR_LENGTH(country) AS country_name_length FROM customer INNER JOIN country WHERE CHAR_LENGTH(country) = 5 ORDER BY CHAR_LENGTH(customer_name) DESC;
/**10. Get all the list of customers who live in a city name whose length is more than 10. Order the result so that the customers who live in the same country are shown together.**/
SELECT CONCAT(first_name, ' ', last_name) AS customer_name, country, city, CHAR_LENGTH(city) AS city_name_length FROM customer INNER JOIN city INNER JOIN country WHERE CHAR_LENGTH(city) > 10 ORDER BY country;
/**11. Get all the list of customers who live in a city where the city name includes the word 'ba'. For example Arratuba or Baiyin should show up in your result.**/
SELECT CONCAT(first_name, ' ', last_name) AS customer_name, city FROM customer INNER JOIN city WHERE city LIKE '%ba%';
/**12. Get all the list of customers where the city name includes a space. Order the result so that customers who live in the longest city are shown first.**/
SELECT CONCAT(first_name, ' ', last_name) AS customer_name, city, CHAR_LENGTH(city) AS city_name_length FROM customer INNER JOIN city WHERE city LIKE '% %' ORDER BY CHAR_LENGTH(city) DESC;
/**13. Get all the customers where the country name is longer than the city name.**/
SELECT CONCAT(first_name, ' ', last_name) AS customer_name, city, country, CHAR_LENGTH(city) AS city_name_length, CHAR_LENGTH(country) AS country_name_length FROM customer INNER JOIN city INNER JOIN country WHERE CHAR_LENGTH(country) > CHAR_LENGTH(city);