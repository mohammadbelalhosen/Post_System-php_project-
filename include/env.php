<?php

// database file

// $hostname = 'sql101.ezyro.com';
// $username = 'ezyro_33018697';
// $password = '1wfh02qti80r';
// $database = 'ezyro_33018697_article_sys';

// for xamp
$hostname = 'localhost';
$username = 'root';
$password = '';
$database = 'article_sys';


//connect to database
$conn = mysqli_connect($hostname,$username,$password,$database);