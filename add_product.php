<!-- Nicky's Code -->
<?php require('../model/database.php'); ?>
<?php include '../view/header.php';
echo "<!DOCTYPE html><html><head><link href='../css/main.css' rel='stylesheet' type='text/css'</head><body>";
?>

<main>
    <h2>Add Product</h2>
    <table>
        <form action="add_product.php" method="post">
            <tr>
                <td>Code:</td>
                <td><input type="text" name="productCode" id="productCode"></td>
            </tr>
            <tr>
                <td>Name:</td>
                <td><input type="text" name="name" id="name"></td>
            </tr>
            <tr>
                <td>Version:</td>
                <td><input type="text" name="version" id="version"></td>
            </tr>
            <tr>
                <td>Release Date:</td>
                <td><input type="text" name="releaseDate" id="releaseDate"></td>
                <td>Use 'yyyy-mm-dd' format</td>
            </tr>
            <tr>
                <td></td>
                <td><button type="submit" name="btnAddProduct" onclick="return validateForm()">Add Product</button></td>
            </tr>
        </form>

    </table>

    <br />
    <a href="index.php">View Products List</a>

    <script>

        function validateForm() {

            var flag = true;
            var code = document.getElementById('productCode');
            var pro_name = document.getElementById('name');
            var version = document.getElementById('version');
            var release_date = document.getElementById('releaseDate');

            if (code.value == "" || pro_name.value == "" || version.value == "" || release_date.value == "") {
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
    $code = $_POST['productCode'];
    $name = $_POST['name'];
    $version = $_POST['version'];
    $release_date = $_POST['releaseDate'];

    $addQuery = "INSERT INTO products (productCode, name, version, releaseDate) VALUES ('$code', '$name', '$version', '$release_date')";
    $runAdd = mysqli_query($con, $addQuery);

    if ($runAdd) {
        header('Location: index.php');
    }
}
?>
<?php include '../view/footer.php'; ?>
