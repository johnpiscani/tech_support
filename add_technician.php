<!-- Nicky's Code-->
<?php include '../view/header.php';
echo "<!DOCTYPE html><html><head><link href='../css/main.css' rel='stylesheet' type='text/css'</head><body>";
?>

<main>
    <h2>Add Technician</h2>
    <table>
        <form action="add_technician.php" method="post">
            <tr>
                <td>First Name:</td>
                <td><input type="text" name="firstName" id="firstName"></td>
            </tr>
            <tr>
                <td>Last Name:</td>
                <td><input type="text" name="lastName" id="lastName"></td>
            </tr>
            <tr>
                <td>Email:</td>
                <td><input type="text" name="email" id="email"></td>
            </tr>
            <tr>
                <td>Phone:</td>
                <td><input type="text" name="phone" id="phone"></td>
            </tr>
            <tr>
                <td>Password:</td>
                <td><input type="text" name="password" id="password"></td>
            </tr>
            <tr>
                <td></td>
                <td><button type="submit" name="btnAddProduct" onclick="return validateForm()">Add Technician</button></td>
            </tr>
        </form>

    </table>

    <br />
    <a href="technician.php">View Technician List</a>


    <script>

        function validateForm() {

            var flag = true;
            var fname = document.getElementById('firstName');
            var lname = document.getElementById('lastName');
            var email = document.getElementById('email');
            var phone = document.getElementById('phone');
            var password = document.getElementById('password');

            if (fname.value == "" || lname.value == "" || email.value == "" || phone.value == "" || password.value == "") {
                alert('Please enter all the fields !');
                flag = false;
            }

            return flag;


        }
    </script>
</main>

<?php
$con = mysqli_connect("webdev.bentley.edu", "jpiscani", "3343", "jpiscani");
if(isset($_POST['btnAddProduct'])) {
    $fname = $_POST['firstName'];
    $lname = $_POST['lastName'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];

    $addQuery = "INSERT INTO technicians (firstName, lastName, email, phone, password) VALUES ('$fname', '$lname', '$email', '$phone','$password')";
    $runAdd = mysqli_query($con, $addQuery);

    if ($runAdd) {
        header('Location: technician.php');
    }
}
?>
<?php include '../view/footer.php'; ?>
