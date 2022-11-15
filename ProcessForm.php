<!-- Zara's Code-->
<?php
//This file process the inputs from the cust_index.php
echo "<!DOCTYPE html><html><head><link href='../css/main.css' rel='stylesheet' type='text/css'</head><body>";


// get values sent from browser and test that both are filled in.
// If not, redirect to error.php
if (! empty($_POST['email']) and ! empty($_POST['password'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];

    // Turn off default error reporting
    //  error_reporting(0);

    // allow MySQLi error reporting and Exception handling
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

    try {
        // Connect to MySQL, select database
        $con = mysqli_connect("webdev.bentley.edu", "jpiscani", "3343", "jpiscani");

        // test name for HTML characters to avoid HTML Injection
        require ("cust_index.php");
        $name = test_input($email);
        $password = test_input($password);

        // Perform SQL query
        $query = "SELECT * FROM customers WHERE email='$name' And password='$password'";
        $result = mysqli_query($con, $query);
        $line = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $fname = $line['firstName'];
        $lname = $line['lastName'];

        $full_name = $fname. " ". $lname;
        $rows = mysqli_num_rows($result);


        // Queries to Retrive Product Data
        $product = "SELECT * FROM products ";
        $result_product = mysqli_query($con, $product);

        // if userid not in login table, redirect to error page and try again
        if ($rows < 1)
            header("Location: error.php?message='user/password not found'");

        //get table header names from SQL field names
        $finfo = mysqli_fetch_fields($result);

        $optionData = '<option id = "product">-- Select a Species -- </option>';

        while ($prod = mysqli_fetch_array($result_product, MYSQLI_ASSOC)) {


            $optionData .= "<option>" . $prod['name'] ."</option>" ;
        }

        // create web page with table and styles
        echo "<html>
            <head>
            <link href='main.css' rel='stylesheet' type='text/css'>
            </head>
            <body>
            <form action='Insert.php' method='post'>
            <h3 style='text-align:center;'>Select Product</h3><br><br>
            <table>
            <tr>
				<td>Customer Name</td>
				<td><input type='text' name='output' value='$full_name'readonly </></td>
				
			</tr>
            <tr> 
            <td class='vt'>Product: </td>
            <td>  
            <select name='prod' class='textfields' id='species'>
                <?php echo $optionData;?>
            </select>
            
      </td></tr>
           
       </tr>";
        //echo "<tr>";

        // get table column names from result set
        //<input type="text" name="firstname">

        echo "<tr><td colspan='2'><input type='submit' value='Register Product'></td></tr></table>
        </form>";


        echo "</body></html>";
    } catch (Exception $e) {
        $message = $e->getMessage();
        $code = $e->getCode();
        header("Location: customerError.php?code=$code&message=$message");
    }
    finally{
        // close connection
        mysqli_close($con);
    }
} // both fields not filled in, redirect to index.php
else
    header("Location: error.php?message='form fields not filled in'");


function test_input($data){
    $original = $data;

    /*convert 5 predefined characters into HTML values.
     They are > (&gt;), < (%lt;), " (&quot;), ' (&#039;), & (&amp;)   */
    $data = htmlspecialchars($data);

    //check for possible html injection
    if ($data === $original) return $data;
    else exit("Attempted HTML injection:    $data");
}

?>