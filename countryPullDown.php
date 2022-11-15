<!-- Zara's Code-->
echo "<!DOCTYPE html><html><head><link href='../css/main.css' rel='stylesheet' type='text/css'</head><body>";
<?php

//This allows for the drop down feature for countries in the form.php file

//Connect to MySQL, select database and load bands table records into
//html selection object options
$con = mysqli_connect('webdev.bentley.edu', 'jpiscani', '3343', 'jpiscani');

// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$query = "SELECT * FROM countries ;";

$result = mysqli_query($con, $query) or die('Query failed: ' . mysqli_errno($con));

$rows = mysqli_num_rows($result);   //how many records in result set
// if empty bands table, error, redirect to error.php
while ($line = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    echo "<option value=" . $line ['countryCode'] . ">" . $line['countryName'] . "</option>";
}
mysqli_close($con);

