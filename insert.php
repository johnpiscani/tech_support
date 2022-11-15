<!-- Zara's Code-->
<?php
include ('../view/header.php');
echo "<!DOCTYPE html><html><head><link href='../css/main.css' rel='stylesheet' type='text/css'</head><body>";
// This code inserts and updates the registrations table given the inputs in the ProcessForm.php file
$con = mysqli_connect("webdev.bentley.edu", "jpiscani", "3343", "jpiscani");
$name = $_POST['output'];
$full_name = explode(" ", $name); // parsing to get the full name in an array format
$fname = $full_name[0];
$lname = $full_name[1];
$product = $_POST['prod'];

$customer = "SELECT * FROM customers WHERE firstName='$fname' And lastName='$lname'";
$result =  mysqli_query($con, $customer);
$arr_2 = $result->fetch_array(MYSQLI_ASSOC);
$id = (int)$arr_2['customerID']; //convert the customerID to int to add it to registrations table



$prod_info = "SELECT * FROM products WHERE products.name ='$product'";
$prod_query = mysqli_query($con, $prod_info);
$arr_1 = $prod_query->fetch_array(MYSQLI_ASSOC);
$code = $arr_1['productCode'];


echo "<!DOCTYPE html>
<html>
<head>
	<link href='main.css' rel='stylesheet' type='text/css'>
</head>";

$sql = "INSERT INTO registrations (customerID, productCode, registrationDate)
VALUES ('$id', '$code', now())";
if(mysqli_query($con, $sql)){
    echo "Product ". $code. " was registered successfully";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
}
echo "<br><a href='../index.php'>Home</a>";








mysqli_close($con);
include ('../view/footer.php');
?>