<?php
session_start();
error_reporting(0);
require 'database/connect.php';
require 'functions/general.php';
require 'functions/users.php';
require 'functions/images.php';
require 'functions/comments.php';
require 'functions/ratings_functions.php';
require 'functions/recipes.php';
require 'functions/homepage.php';

$current_file = explode('/',$_SERVER['SCRIPT_NAME']);
$current_file = end($current_file);


if( logged_in() === true ) {
	$session_user_id = $_SESSION['user_id'];
	
	$user_data = user_data($session_user_id , 'user_id', 'username', 'password', 'first_name', 'last_name', 
	'email', 'password_recover','type', 'allow_email', 'profile','gender','age');
	
//	print_r($user_data);
	
	$user_settings = user_settings($session_user_id, 'allow_first_name', 'allow_last_name', 'allow_email_profile', 'allow_gender', 'allow_age'); 
	
	//print_r($user_settings);
	
	if(user_active($user_data['username']) === false) {
		session_destroy();
		header('Location: index.php');
		exit();
	
	}
	
	if($current_file !== 'changepassword.php' && $current_file !== 'logout.php' && $user_data['password_recover'] == 1 ){
		header('Location: changepassword.php?force');
		exit();
	}
	
	
}

$errors = array();

$comment_errors = array(); 
?>