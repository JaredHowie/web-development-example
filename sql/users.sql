/*
Jared Howie
users.sql
27 September 2018
WEBD3201
*/ 

DROP TABLE IF EXISTS users CASCADE;

CREATE TABLE users(
	user_id VARCHAR(50) PRIMARY KEY NOT NULL,
	password VARCHAR(32) NOT NULL, 
	user_type VARCHAR(2) NOT NULL, 
	email_address VARCHAR(256) NOT NULL, 
	enrol_date date NOT NULL,
	last_access date NOT NULL
);

ALTER TABLE users OWNER TO group07_admin;

INSERT INTO users(user_id, password, user_type, email_address, enrol_date, last_access) VALUES(
	'jdoe',
	md5('testpass'),
	's',
	'jdoe@durhamcollege.ca',
	'2018-9-27',
	'2018-9-30');
INSERT INTO users(user_id, password, user_type, email_address, enrol_date, last_access) VALUES(
	'howiej',
	md5('abc'),
	'a',
	'howiej@durhamcollege.ca',
	'2018-9-27',
	'2018-9-30');
INSERT INTO users(user_id, password, user_type, email_address, enrol_date, last_access) VALUES(
	'andrust',
	md5('test'),
	'a',
	'andrust@durhamcollege.ca',
	'2018-9-27',
	'2018-9-30');
INSERT INTO users(user_id, password, user_type, email_address, enrol_date, last_access) VALUES(
	'burtm',
	md5('abc123'),
	'c',
	'burtm@durhamcollege.ca',
	'2018-9-27',
	'2018-9-30');
SELECT * FROM users;