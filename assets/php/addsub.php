<?php

require_once 'database.php';
require_once '../class/Mailit.php';

$data = parse_ini_file("../../config.ini", true);

	$db = new DataBase(
		$data['mysql']['hostname'], // localhost
		$data['mysql']['database'], // DB name
		$data['mysql']['username'], // username from DB
		$data['mysql']['password']); // password from DB

	$email = $_GET['email'];

	$db->insertUniq('subscribers', array(
		    'email' => $email 
		    ));

	$mail = new Mailit("newsletter@example.com");

	$msg = "Thanks for subscribing, hope you'll enjoy our newsletter";
	$mail->sendMail($email, "Subscribe", $msg);




	
	