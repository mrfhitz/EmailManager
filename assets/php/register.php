<?php

require_once 'database.php';
require_once '../class/Mailit.php';

$data = parse_ini_file("../../config.ini", true);

	$db = new DataBase(
		$data['mysql']['hostname'], // localhost
		$data['mysql']['database'], // DB name
		$data['mysql']['username'], // username from DB
		$data['mysql']['password']); // password from DB

	$username = $_GET['username'];
	$email = $_GET['email'];
	$password = $_GET['password'];

	$db->insertUniq('accounts', array(
			'username' => $username,
		    'email' => $email,
		    'password' => $password
		    ));

	$mail = new Mailit("website@example.com");

	$msg = "Thanks for joining, hope you'll enjoy";
	$mail->sendMail($email, "New account confirmation", $msg);
