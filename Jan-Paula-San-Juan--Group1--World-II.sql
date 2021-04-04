USE world;
/**1.How many countries in each continent, have life expectancy greater than 70?**/
SELECT continent, COUNT(country.Name), lifeexpectancy FROM country WHERE LifeExpectancy > 70 GROUP BY Continent;
/**2.How many countries in each continent have life expectancy between 60 and 70?**/
SELECT continent, COUNT(country.Name), lifeexpectancy FROM country WHERE LifeExpectancy BETWEEN 60 AND 70 GROUP BY Continent;
/**3.How many countries have life expectancy greater than 75?**/
SELECT country.Name AS country, lifeexpectancy FROM country WHERE LifeExpectancy > 75;
/**4.How many countries have life expectancy less than 40?**/
SELECT country.Name AS country, lifeexpectancy, COUNT(country.Name) FROM country WHERE LifeExpectancy < 40;
/**5.How many people live in the top 10 countries with the most population?**/
SELECT country.Name AS country, country.Population AS populations FROM country ORDER BY country.Population DESC LIMIT 10;
/**6.According to the world database, how many people are there in the world?**/
SELECT SUM(country.Population) AS total_population FROM country;
/**7.Show results for continents where it shows the continent name and the total population. Only show results where the total_population for the continent is more than 500,00,000.
If the continent doesn't have 500,000,000 people, do NOT show the result.**/
SELECT continent, SUM(country.Population) AS total_population FROM country GROUP BY Continent HAVING SUM(country.Population) > 500000000;
/**8.Show results of all continents that has average life expectancy for the continent to be less than 71. Show each of these continent name, how many countries there are in each of the
continent, total population for the continent, as well as the life expectancy of this continent.  For example, as Europe and North America both have continent life expectancy greater
than 71, these continents shouldn't show up in your sql results.**/
SELECT continent, COUNT(country.Name) AS country, SUM(country.Population) AS total_population, AVG(LifeExpectancy) AS life_expectancy FROM country GROUP BY Continent HAVING AVG(LifeExpectancy) < 71;
/**For the average life expectancy, for simplicity, just assume that you can use the AVG aggregate function.  To compute the true average life expectancy, we would need to do something
slightly more advanced, but for now, just assume that you can use the AVG function for now.

Now that you've used the group by a bit, let's now have you use this together with other records that were joined from multiple tables.

Now, write a SQL query to obtain answers to the following questions:**/

/**1.How many cities are there for each of the country?  Show the total city count for each country where you display the full country name.**/
SELECT country.Name AS country, COUNT(city.Name) AS number_of_cities FROM country INNER JOIN city WHERE country.Code = city.CountryCode GROUP BY country.Name;
/**2.For each language, find out how many countries speak each language.**/
SELECT country.Name AS country, language, COUNT(country.Name) AS number_of_countries FROM country INNER JOIN countrylanguage WHERE country.Code = countrylanguage.CountryCode GROUP BY Language;
/**3.For each language, find out how many countries use that language as the official language.**/
SELECT language, COUNT(country.Name) AS total_countries, isofficial FROM country INNER JOIN countrylanguage WHERE country.Code = countrylanguage.CountryCode AND isofficial = 'T' GROUP BY Language;
/**4.For each continent, find out how many cities there are (according to this database) and the average population of the cities for each continent.
For example, for continent A, have it state the number of cities for that continent, and the average city population for that continent.**/
SELECT continent, COUNT(city.Name) AS total_cities, AVG(city.Population) AS average_cities_population FROM city INNER JOIN country WHERE country.Code = city.CountryCode GROUP BY Continent;
/**5.(Advanced) Find out how many people in the world speak each language.  Make sure the total sum of. this number is comparable to the total population in the world.**/
SELECT language, SUM(country.Population) AS total_population FROM countrylanguage INNER JOIN country WHERE country.Code = countrylanguage.CountryCode GROUP BY Language;