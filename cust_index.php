<!-- Zara's Code-->
<?php
include ('../view/header.php');
//This is the form to login a customer so that they can add their products. Password is sesame btw!
echo '
<!DOCTYPE html>
<html>
<head>
	<link href="../css/main.css" rel="stylesheet" type="text/css">
</head>
<body>
<h1>Product Update Form</h1>
<form action="ProcessForm.php" method="post" >
<table>
<tr><td>Email:</td><td> <input type="text" name="email" class="solid"></td></tr><br>
<tr><td>Password:</td><td> <input type="password" name="password" class="solid"></td></tr><br>
<tr><td colspan="2"><input type="submit" value="Submit"></td></tr>
</table>
</form>
<br/>

</body>
</html>
';

?>