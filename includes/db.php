<?php

function db_connect()
{
	$conn = pg_connect("host=localhost dbname=group07_db user=group07_admin password=ThanosCar");
	return $conn;
}

function get_random_element($array)
{
	return $array[mt_rand()%sizeof($array)];
}

function is_user_id($id)
{
	$conn = db_connect();
	return pg_num_rows(pg_execute($conn,"user_id_check",array($id)))?true:false;
}


$conn = db_connect();
$user_insert = pg_prepare($conn,"user_insert","INSERT INTO users (user_id, password, email_address, user_type, enrol_date, last_access) VALUES ($1, $2, $3, $4, $5, $6)");
$user_id_check = pg_prepare($conn,"user_id_check","SELECT * FROM users WHERE user_id = $1");
$person_insert = pg_prepare($conn,"person_insert","INSERT INTO persons (user_id, salutation, first_name, last_name, street_address, city, provence, postal_code, primary_phone_number, preferred_contact_method) VALUES ($1, $2, $3, $4, $5, $6, $7, $8, $9, $10)");
?>