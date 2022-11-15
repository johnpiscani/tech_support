<!-- Nicky's Code -->
<?php
require('../model/database.php'); ?>
<?php include '../view/header.php'; ?>
<main>
    <?php
    /*
     * this script creates forms within a table.
     * Each database table record will have its own form with a delete button.
     */
    echo "<!DOCTYPE html><html><head><link href='../css/main.css' rel='stylesheet' type='text/css'</head><body>";

    // Turn off default error reporting
    //error_reporting(0);

    // allow MySQLi error reporting and Exception handling
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

    try {
        // Connect to MySQL, select database
        $con = mysqli_connect("webdev.bentley.edu", "jpiscani", "3343", "jpiscani");

        /*
         * first time through the script no data is in $_POST so the form displays.
         * When the delete button is clicked, there is data.
         * use it to delete a record in the table.
         */
        if (! empty($_POST['firstName'])) {
            $firstName = $_POST['firstName'];
            $query = "DELETE FROM technicians WHERE firstName='$firstName';";
            $result = mysqli_query($con, $query);
        } // end if

        // Perform SQL query
        $query = "SELECT * FROM technicians;";
        $result = mysqli_query($con, $query);

        //start echoing web page
        echo "<html><body>";
        echo "<h1>Technician List</h1>";
        echo "<table id='data'><tr id='data'>";

        // process result set.
        // first let's set table column headers.
        // each table field has field name, data type and length properties.
        // we only need the name
        $finfo = mysqli_fetch_fields($result);
        foreach ($finfo as $val) {
            echo "<th id='data'> $val->name</th>";
        }
        echo "</tr>";

        // table column header done, now loop over result set.
        // Create a form for each record in result set.
        // Print field values for each record
        while ($line = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

            echo "<tr id='data'>";
            echo "<form method='POST' action='technician.php'>";
            // inner loop. Print each field value for a result set record
            foreach ($line as $key => $value) {
                echo "<td id='data'><input type='text' value='" . $value . "' name='" . $key . "'/></td>";
            }

            // put delete button on form
            echo "<td id='data'><input type='submit' value='delete' name='foo'/></td></tr>";
            echo "</form>";
        } // end while

        echo "</table></body></html>";
    }
    catch (Exception $e) {
        echo "Error: " . $e->getMessage() . "<br>Line" . $e->getLine();
    } finally {
        // close connection
        mysqli_close($con);
    }

    ?>

    <br>
    <a href="add_technician.php">Add Technician</a></li>
</main>
<?php include '../view/footer.php'; ?>