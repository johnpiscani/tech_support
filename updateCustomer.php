<!-- John's Code-->

<?php
echo "<!DOCTYPE html><html><head><link href='../css/main.css' rel='stylesheet' type='text/css'</head><body>";
include ('../view/header.php');
include('../model/database.php');
if (isset($_GET['firstName'])) {
    include('../model/database.php');
    $con = mysqli_connect("webdev.bentley.edu", "jpiscani", "3343", "jpiscani");
    $stmt = $con->prepare("SELECT * FROM customers WHERE customerID=?");
    $stmt->bind_param("d", $custID);
    $custID = $_GET['customerID'];
    $stmt->execute();
    $result = mysqli_stmt_get_result($stmt);
    while ($row = mysqli_fetch_array($result)){
        //original values in variables to compare with the $_GET
        $id = $row['customerID'];
        $firstName = $row['firstName'];
        $lastName = $row['lastName'];
        $address = $row['address'];
        $city = $row['city'];
        $state = $row['state'];
        $postalCode = $row['postalCode'];
        $countryCode = $row['countryCode'];
        $phone = $row['phone'];
        $email = $row['email'];
        $password = $row['password'];
    }
    if ($firstName != $_GET['firstName']){
        $query = "UPDATE customers SET firstName='" . $_GET['firstName'] . "' WHERE customerID=" . $_GET['customerID'];
        $result = mysqli_query($con, $query);
    } elseif ($lastName != $_GET['lastName']){
        $query = "UPDATE customers SET lastName='" . $_GET['lastName'] . "' WHERE customerID=" . $_GET['customerID'];
        $result = mysqli_query($con, $query) or die('Unsuccessful');
    } elseif ($address != $_GET['address']) {
        $query = "UPDATE customers SET address='" . $_GET['address'] . "' WHERE customerID=" . $_GET['customerID'];
        $result = mysqli_query($con, $query) or die('Unsuccessful');
    } elseif ($city != $_GET['city']) {
        $query = "UPDATE customers SET city='" . $_GET['city'] . "' WHERE customerID=" . $_GET['customerID'];
        $result = mysqli_query($con, $query) or die('Unsuccessful');
    } elseif ($state != $_GET['state']) {
        $query = "UPDATE customers SET state='" . $_GET['state'] . "' WHERE customerID=" . $_GET['customerID'];
        $result = mysqli_query($con, $query) or die('Unsuccessful');
    } elseif ($postalCode != $_GET['postalCode']) {
        $query = "UPDATE customers SET postalCode='" . $_GET['postalCode'] . "' WHERE customerID=" . $_GET['customerID'];
        $result = mysqli_query($con, $query) or die('Unsuccessful');
    } elseif ($countryCode != $_GET['countryCode']) {
        $query = "UPDATE customers SET countryCode='" . $_GET['countryCode'] . "' WHERE customerID=" . $_GET['customerID'];
        $result = mysqli_query($con, $query) or die('Unsuccessful');
    } elseif ($phone != $_GET['phone']) {
        $query = "UPDATE customers SET email='" . $_GET['email'] . "' WHERE customerID=" . $_GET['customerID'];
        $result = mysqli_query($con, $query) or die('Unsuccessful');
    } elseif ($password != $_GET['password']) {
        $query = "UPDATE customers SET password='" . $_GET['password'] . "' WHERE customerID=" . $_GET['customerID'];
        $result = mysqli_query($con, $query) or die('Unsuccessful');
    }
    $fn =  $_GET['firstName'];
    $ln = $_GET["lastName"];
    $a = $_GET['address'];
    $c = $_GET['city'];
    $s = $_GET['state'];
    $pc = $_GET['postalCode'];
    $cc = $_GET['countryCode'];
    $ph = $_GET['phone'];
    $e = $_GET['email'];
    $pa = $_GET['password'];
    $id = $_GET['customerID'];
} elseif (isset($_POST['changeIF'])) {
    $fn =  $_POST['changeFN'];
    $ln = $_POST["changeLN"];
    $a = $_POST['changeA'];
    $c =$_POST['changeC'];
    $s = $_POST['changeS'];
    $pc = $_POST['changePC'];
    $cc = $_POST['changeCC'];
    $ph = $_POST['changePh'];
    $e = $_POST['changeE'];
    $pa = $_POST['changePa'];
    $id = $_POST['changeIF'];
}
echo "<form action='updateCustomer.php' method='GET'>";
echo "<table>";
echo "<tr><td>First Name:</td><td><input type='text' name='firstName' value='" . $fn . "'></td></tr>";
echo "<tr><td>Last Name:</td><td><input type='text' name='lastName' value='" . $ln . "'></td></tr>";
echo "<tr><td>Address:</td><td><input type='text' name='address' value='" . $a . "'></td></tr>";
echo "<tr><td>City:</td><td><input type='text' name='city' value='" . $c . "'></td></tr>";
echo "<tr><td>State:</td><td><input type='text' name='state' value='" . $s . "'></td></tr>";
echo "<tr><td>Postal Code:</td><td><input type='text' name='postalCode' value='" . $pc . "'></td></tr>";
echo "<tr><td>Country Code:</td><td>" . $cc . "</td><td><select name='countryCode' value='" . $cc ."'>";
//access database for <option> values
include("countryPullDown.php");
echo "</select></td></tr>";
echo "<tr><td>Phone:</td><td><input type='text' name='phone' value='" . $ph . "'></td></tr>";
echo "<tr><td>Email:</td><td><input type='text' name='email' value='" . $e . "'></td></tr>";
echo "<tr><td>Password:</td><td><input type='text' name='password' value='" . $pa . "'></td></tr>";
echo "<input type='hidden' value='" . $id . "' name='customerID'>";
echo "<tr><td></td><td><input type='submit' value='Update'></td></tr></table>";
if (isset($_GET['firstName'])){
    echo "<p>Update Successful!</p>";
}
echo "<a href='SelectCustomers.php'>Return to Select Customers</a>";

