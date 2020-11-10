<?php
require '../includes/constants.php';
require '../includes/names.php';
require '../includes/db.php';
require '../includes/functions.php';

$conn = db_connect();

define("MIN_AREA_CODE",200);
define("MAX_AREA_CODE",999);
define("POSTAL_CODE_LENGTH",6);
define("PHONE_NUMBER_LENGTH",7);
$user_types = array('c','c','c','c','c','c','c','c','c','c','a','a','a','a','a','a','a','a','a','s');
$email_servers = array("hotmail.com","gmail.com","dcmail.ca","yahoo.com","outlook.com");
$provence_codes = array("ON","ON","ON","ON","ON","ON","ON","ON","ON","ON","ON","ON","ON","ON","ON","ON","ON","ON","ON","ON","ON","ON","ON","ON",
						"QC","QC","QC","QC","QC","QC","QC","QC","QC","QC","QC","QC","QC","QC","QC","QC","QC","QC",
						"BC","BC","BC","BC","BC","BC","BC","BC","BC","BC","BC",
						"AB","AB","AB","AB","AB","AB","AB","AB","AB","AB",
						"MB","MB","MB","MB","MB",
						"SK","SK","SK","SK",
						"NS","NS","NS",
						"NB","NB","NB",
						"NL","NL",
						"PE","NT","YT","NU");
$postal_code_ontario = array('K','L','M','N','P');
$postal_code_quebec = array('G','H','J');
$cities = array("Oshawa","Whitby","Ajax","Pickering","Clarington","Uxbridge","Scugog","Bomanville","Brock","Port Perry","Courtice");
$address_endings = array(" St"," Ave"," Ct"," Cres."," Place");
$directions = array(" N"," S"," E"," W"," ");
$female_salutation = array("Miss","Mrs.","Ms.");
$male_salutation = array("Mr.","Master");
$postal_code_letters = array('A','B','C','E','G','H','J','L','M','N','P','R','S','T','V','W','X','Y','Z');
$preffered_contact_methods = array('e','p','l');

for ($i = 1; $i <= 1000; $i++)
{
$user_type = get_random_element($user_types);
$email_server = get_random_element($email_servers);
$provence = get_random_element($provence_codes);
$city = get_random_element($cities);
$preferred_contact_method = get_random_element($preffered_contact_methods);
if($i%2==0)
{
	$first_name = strtolower( get_random_element($male_names));
	$salutation = get_random_element($male_salutation);
}
else
{
	$first_name = strtolower(get_random_element($female_names));
	$salutation = get_random_element($female_salutation);
}


$last_name = strtolower(get_random_element($last_names));
$address = mt_rand(1,999) . " " . $last_name . get_random_element($address_endings) . get_random_element($directions);
ucwords($first_name);
ucwords($last_name);
$email_address = $first_name . $last_name . "@" . $email_server;
$user_id = $last_name . substr($first_name,0,1);

if(!is_user_id($user_id))
{
	
	$password = md5("a");
	$enrol_date = 2008 +mt_rand()%10  . "-" .(mt_rand()%12 +1) . "-" . (mt_rand()% 28 + 1);
	$last_access = 2008 +mt_rand()%10  . "-" .(mt_rand()%9 +1) . "-" . (mt_rand()% 28 + 1);

	pg_execute($conn,"user_insert",array($user_id ,$password, $email_address, $user_type, $enrol_date, $last_access));

	$phone_number = mt_rand(MIN_AREA_CODE,MAX_AREA_CODE);
	for($j = 0; $j < PHONE_NUMBER_LENGTH; $j++)
	{
		$phone_number .= mt_rand(0,9);
	}
	
	if($provence == "ON")
	{
		$postal_code = get_random_element($postal_code_ontario);
	}
	else if($provence == "QC")
	{
		$postal_code = get_random_element($postal_code_quebec);
	}
	else if($provence == "BC")
	{
		$postal_code = "V";
	}
	else if($provence == "AB")
	{
		$postal_code = "T";
	}
	else if($provence == "MB")
	{
		$postal_code = "R";
	}
	else if($provence == "SK")
	{
		$postal_code = "S";
	}
	else if($provence == "NL")
	{
		$postal_code = "A";
	}
	else if($provence == "NS")
	{
		$postal_code = "B";
	}
	else if($provence == "PE")
	{
		$postal_code = "C";
	}
	else if($provence == "NB")
	{
		$postal_code = "E";
	}
	else if($provence == "YT")
	{
		$postal_code = "Y";
	}
	else
	{
		$postal_code = "X";
	}
	for($j = 1; $j < POSTAL_CODE_LENGTH; $j++)
	{
		if($j%2 == 0)
		{
			$postal_code .= get_random_element($postal_code_letters);
		}
		else
		{
			$postal_code .= mt_rand(0,9);
			
		}
	}
	pg_execute($conn,"person_insert",array($user_id ,$salutation,$first_name, $last_name, $address, $city, $provence, $postal_code, $phone_number, $preferred_contact_method));
}

}
echo $phone_number;
?>