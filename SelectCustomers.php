<!-- John's Code-->
<?php
echo "<!DOCTYPE html><html><head><link href='../css/main.css' rel='stylesheet' type='text/css'</head><body>";
include ('../view/header.php');
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
echo "<h1>Customer Search</h1>";
echo "<form action='SelectCustomers.php' method='post'>";
echo "<tr><td>Last Name: </td><td><input type='text' name='name'><input type='submit' value='Search'></td></tr></table></form>";
try{
    if (isset($_POST['name'])) {
        $con = mysqli_connect("webdev.bentley.edu", "jpiscani", "3343", "jpiscani");

        $name = $_POST['name'];
        $query = "SELECT * FROM customers WHERE lastName='" . $name . "'";
        $result = mysqli_query($con, $query);

        echo "<h1>Results</h1>";
        echo "<table><tr><th>First Name</th><th>Last Name</th><th>Email Address</th><th>City</th></tr>";
        $result -> fetch_assoc();
        foreach ($result as $row) {
            echo "<tr>";
            echo "<form method='POST' action='updateCustomer.php'>";
            echo "<td><input type='text' value='" . $row['firstName'] . "' name='changeFN'></td>";
            echo "<td><input type='text' value='" . $row['lastName'] . "' name='changeLN'></td>";
            echo "<td><input type='text' value='" . $row['email'] . "' name='changeE'></td>";
            echo "<td><input type='text' value='" . $row['city'] . "' name='changeC'></td>";
            echo "<input type='hidden' value='" . $row['address'] . "' name='changeA'>";
            echo "<input type='hidden' value='" . $row['state'] . "' name='changeS'>";
            echo "<input type='hidden' value='" . $row['postalCode'] . "' name='changePC'>";
            echo "<input type='hidden' value='" . $row['countryCode'] . "' name='changeCC'>";
            echo "<input type='hidden' value='" . $row['phone'] . "' name='changePh'>";
            echo "<input type='hidden' value='" . $row['password'] . "' name='changePa'>";
            echo "<input type='hidden' value='" . $row['customerID'] . "' name='changeIF'>";
            echo "<td><input type='submit' value='Select'></td>";
            echo "</tr></form>";
        }
        // loop through data and only return name, email, city, and select button
        echo "</table>";
    }
}catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "<br>Line" . $e->getLine();
}

