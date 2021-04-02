USE world;
/**1. Get all the list of countries that are in the continent of Europe.**/
SELECT DISTINCT * FROM country where Continent = 'Europe';
/**2. Get all the list of countries that are in the continent of North America and Africa.**/
SELECT DISTINCT * FROM country where Continent IN ('North America', 'Africa');
/**3. Get all the list of cities that are part of a country with population greater than 100 millions.**/
SELECT DISTINCT country.Code AS country_code, country.Name AS country_name, continent, country.Population AS country_population, city.Name AS city FROM country INNER JOIN city WHERE country.Population > 100000000;
/**4. Get all the list of countries (display the full country name) who speak 'Spanish' as their language.**/
SELECT DISTINCT country.Name AS country, countrylanguage.language FROM country INNER JOIN countrylanguage WHERE countrylanguage.Language = 'Spanish';
/**5. Get all the list of countries (display the full country name) who speak 'Spanish' as their official language.**/
SELECT DISTINCT country.Name AS country, countrylanguage.language, countrylanguage.isofficial FROM country INNER JOIN countrylanguage WHERE countrylanguage.Language = 'Spanish' AND countrylanguage.IsOfficial = 1;
/**6. Get all the list of countries (display the full country name) who speak either 'Spanish' or 'English' as their official language.**/
SELECT DISTINCT country.Name AS country, countrylanguage.Language FROM country INNER JOIN countrylanguage WHERE countrylanguage.Language IN ('Spanish', 'English') AND countrylanguage.IsOfficial = 1;
/**7. Get all the list of countries (display the full country name) where 'Arabic' is spoken by more than 30% of the population but where it's not the country's official language.**/
SELECT DISTINCT country.Name AS country, countrylanguage.language, countrylanguage.percentage, countrylanguage.isofficial FROM country INNER JOIN countrylanguage WHERE countrylanguage.Language = 'Arabic' AND countrylanguage.Percentage > 30 AND countrylanguage.IsOfficial = 'F';
/**8.  Get all the list of countries (display the full country name) where 'French' is the official language but where less than 50% of the population in that country actually speaks that language.**/
SELECT DISTINCT country.Name AS country, countrylanguage.language, countrylanguage.isofficial, countrylanguage.percentage FROM country INNER JOIN countrylanguage WHERE countrylanguage.Language = 'French' AND countrylanguage.Percentage < 50 AND countrylanguage.IsOfficial = 'T';
/**9. Get all the list of countries (display the full country name and the full language name) and their official language.  Order the result so that those with the same official language are shown together.**/
SELECT DISTINCT country.Name AS country, countrylanguage.language, countrylanguage.isofficial FROM country INNER JOIN countrylanguage WHERE countrylanguage.IsOfficial = 'T';
/**10. Get the top 100 cities with the most population.  Display the city's full country name also as well as their official language.**/
SELECT DISTINCT city.Name AS city_name, country.Name AS country_name, countrylanguage.language, isofficial, city.population FROM city INNER JOIN country INNER JOIN countrylanguage WHERE IsOfficial = 'T' ORDER BY city.Population DESC LIMIT 100;
/**11. Get the top 100 cities with the most population where the life_expectancy for the country is less than 40.**/
SELECT DISTINCT city.Name AS city_name, country.Name AS country_name, lifeexpectancy, city.population FROM city INNER JOIN country INNER JOIN country INNER JOIN countrylanguage WHERE LifeExpectancy < 40 LIMIT 100;
/**12. Get the top 100 countries who speak English and where life expectancy is highest.  Show the country with the highest life expectancy first.**/
SELECT DISTINCT country.Name AS country_name, city.Name AS city_name, lifeexpectancy FROM country INNER JOIN city INNER JOIN countrylanguage WHERE countrylanguage.Language = 'English' ORDER BY LifeExpectancy DESC LIMIT 100;