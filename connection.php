<?php
$host = "cosc360.ok.ubc.ca";
$database = "db_47686143";
$user = "47686143";
$password = "47686143";
$conn = new mysqli($host, $user, $password, $database);
$error = $conn->connect_error;
