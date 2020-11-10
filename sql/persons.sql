/*
Jared Howie
persons.sql
16 October 2018
WEBD3201
*/ 

DROP TABLE IF EXISTS persons CASCADE;

CREATE TABLE persons(
	user_id VARCHAR(20) REFERENCES users (user_id),
	salutation VARCHAR(10) , 
	first_name VARCHAR(128) , 
	last_name VARCHAR(128),
	street_address VARCHAR(128),
	city VARCHAR(64) , 
	provence VARCHAR(2) ,
	postal_code VARCHAR(6) ,
	primary_phone_number VARCHAR(15) ,
	preferred_contact_method VARCHAR(1)
);

ALTER TABLE persons OWNER TO group07_admin;

