<!-- Zara's Code-->
<!--  This is an error handling page. $code value sent from another script -->
<html>
<head>
    <link href='main.css' rel='stylesheet' type='text/css'>
</head>
<body>
<h3>Error</h3>

<?php

//when this script is executed, be sure to look at the URL

$message ="";

if (!empty($_GET['message'])) $message=$_GET['message'];

echo $message."<br><br>";

?>
<a href="cust_index.php">Try again</a>

</body></html>