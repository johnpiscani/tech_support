<?php include '../view/header.php';
echo "<!DOCTYPE html><html><head><link href='../css/main.css' rel='stylesheet' type='text/css'</head><body>";
?>
<main>
<nav>
    <h1>Database Error</h1>
    <p>There was an error connecting to the database.</p>
   
    <p>Error message: <?php echo $error_message; ?></p>
    </nav>
</main>
<?php include '../view/footer.php'; ?>