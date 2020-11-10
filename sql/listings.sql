/*
Jared Howie
listings.sql
19 October 2018
WEBD3201
*/ 

drop sequence if exists listing_id_seq;

create sequence listing_id_seq;
select setval('listing_id_seq', 10000);

DROP TABLE IF EXISTS listings CASCADE;

CREATE TABLE listings(
	listing_id INTEGER PRIMARY KEY NOT NULL default nextval('listing_id_seq'),
	user_id VARCHAR(50)  REFERENCES users (user_id),
	status VARCHAR(1) NOT NULL, 
	price NUMERIC NOT NULL, 
	headline VARCHAR(100) NOT NULL, 
	description VARCHAR(1000) NOT NULL,
	postal_code VARCHAR(6) NOT NULL,
	images SMALLINT NOT NULL,
	city INTEGER NOT NULL,
	property_options INTEGER NOT NULL,
	bedrooms INTEGER NOT NULL,
	bathrooms INTEGER NOT NULL
);