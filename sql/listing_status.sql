-- File: listing_status.sql
-- Author: Jared Howie
-- Date: October 19th 2018
-- Description: SQL file to create listing status property/value table

DROP TABLE IF EXISTS listing_status;

CREATE TABLE listing_status(
value CHAR(1) PRIMARY KEY,
property VARCHAR(30) NOT NULL
);

ALTER TABLE listing_status OWNER TO group07_admin;

INSERT INTO listing_status(value, property) VALUES ('o', 'Open');

INSERT INTO listing_status(value, property) VALUES ('c', 'Closed');

INSERT INTO listing_status(value, property) VALUES ('s', 'Sold');

INSERT INTO listing_status(value, property) VALUES ('h', 'Hidden');