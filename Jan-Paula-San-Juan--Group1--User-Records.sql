USE hackerhero_practice;
/**1. What's the query for creating this new database table with the fields above?**/
CREATE TABLE users (
  id INT NOT NULL AUTO_INCREMENT,
  first_name VARCHAR(255),
  last_name VARCHAR(255),
  email VARCHAR(255),
  encrypted_password VARCHAR(255),
  created_at DATETIME,
  updated_at DATETIME,
  PRIMARY KEY (id));
/**2. What's the query for inserting new records into this table?  Write queries for inserting three fake users into the table (one query for each insert).**/
INSERT INTO users (first_name, last_name, email, encrypted_password, created_at) VALUES ('fake1', 'user1', 'fakeuser1@email.com', 'password1', now());
INSERT INTO users (first_name, last_name, email, encrypted_password, created_at) VALUES ('fake2', 'user2', 'fakeuser2@email.com', 'password2', now());
INSERT INTO users (first_name, last_name, email, encrypted_password, created_at) VALUES ('fake3', 'user3', 'fakeuser3@email.com', 'password3', now());
/**3. What's the query for updating one of the user records?  For example, if you wanted to update the user record for id = 1, with some fake data, what would the query be?**/
UPDATE users SET first_name = 'first_name1', last_name = 'last_name1', email = "name1@email.com", encrypted_password = 'new_password1', updated_at = now() WHERE id = 1;
/**4. What query would you run for updating all of the user records with the last_name of 'Choi'?**/
UPDATE users SET first_name = 'Michael', email = 'mchoi@village88.com', encrypted_password = 'mchoi_password', updated_at = now() WHERE last_name = 'Choi';
/**5. What query would you run for updating all the user records where ID is 3, 5, 7, 12, or 19?**/
UPDATE users SET first_name = 'new_first_name', last_name = 'new_last_name', email = 'new_email@email.com', encrypted_password = 'new_password', updated_at = now() WHERE id IN (3, 5, 7, 12, 19);
/**6. What's the query for deleting a user record where id = 1?**/
DELETE FROM users WHERE id = 1;
/**7. What's the query for deleting the entire users records in the users table?**/
DELETE FROM users;
/**8. What's the query for dropping the entire users table?  What's the difference between dropping the table and deleting all records?**/
/**Answer: Dropping the table is just removing the appearance of the table in MySQL Workbench while deleting all the records truly removes the existence of those records from where those records are specified to be placed.**/
DROP TABLE users;
/**9. What's the query for altering the email field to have it be 'email_address' instead?**/
ALTER TABLE users CHANGE COLUMN email email_address VARCHAR(255);
/**10. What's the query for altering the id so that it's a BIGINT instead?**/
ALTER TABLE users CHANGE COLUMN id id BIGINT NOT NULL AUTO_INCREMENT;
/**11. What's the query for adding a new field to the users table called is_active where it's a Boolean (meaning it's either a 0 or a 1).  Imagine you wanted the default value of this to be 0 when a new record is created and you won't allow this field to ever be NULL.  With this in mind, now come up with a query.**/
ALTER TABLE users ADD COLUMN is_active TINYINT NOT NULL AFTER updated_at;