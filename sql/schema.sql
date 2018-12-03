-- Create a main database for tables
DROP DATABASE IF EXISTS Jobs;
CREATE DATABASE Jobs;        
USE Jobs;

-- Create tables
CREATE TABLE Users (
    id INT PRIMARY KEY AUTO_INCREMENT NOT NULL, 
    firstname VARCHAR(32), 
    lastname VARCHAR(32), 
    password VARCHAR (64),
    email VARCHAR (64),
    telephone VARCHAR(15), -- phone numbers can have up to 15 digits
    date_joined DATE 
);
 
    
CREATE TABLE Jobs (
    id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    job_title VARCHAR(32) DEFAULT NULL,
    job_description VARCHAR(32) DEFAULT NULL,
    category VARCHAR(32) DEFAULT NULL,
    company_name VARCHAR(32) DEFAULT NULL,
    company_location DATE DEFAULT NULL
);

CREATE TABLE Applied (
    id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    job_id INT DEFAULT NULL,
    user_id INT DEFAULT NULL,
    date_applied DATE 
);

-- insert an admin user
INSERT INTO Users (email, password) VALUES ('admin@hireme.com', MD5('password123'));