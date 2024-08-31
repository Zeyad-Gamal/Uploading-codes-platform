<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Upload codes</title>
    
</head>
 
<body>


    <div class="pag-up">
    <h1>Uploading codes</h1>

    <div class="sign-in">
        <div class="form">
            <form method="POST" action="" enctype="multipart/form-data">
                <input name="idfield" type="text" required>
                <input name="passwordfield" type="password"  required>
                <input name="" type="submit" value="login">
            </form>
        </div>
    </div>
</div>




 
</body>
</html>








<?php

error_reporting(0);
$servername = "sql204.infinityfree.com";
$username = "if0_35334018";
$password = "G40nAs3nc390JC3";
$dbname = "uploadcodes";


// Create a connection to the database
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check if the connection was successful
if ($conn === false) {
  die("Connection failed: " . mysqli_connect_error());
}

// Get the id and password from the form
$id = $_POST["idfield"];
$password = $_POST["passwordfield"];

// Check if the id and password are valid
$sql = "SELECT * FROM users WHERE u_id='$id' AND u_password='$password'";
$result = mysqli_query($conn, $sql);

// If the user exists, log them in
if (mysqli_num_rows($result) > 0) {
  // Get the user data
  $row = mysqli_fetch_assoc($result);

  // Set the session variables
  $idg = $row["u_id"];
  $passwordg = $row["u_password"];

  // Redirect the user to the home page

  header("Location: blocks.php");
  ob_end_flush();




  
} 
else{
    ?>
   
    <?php
}


//else {
//   // The user does not exist, so show an error message
//   echo "The username or password is incorrect.";
// }

// Close the connection to the database
mysqli_close($conn);

?>
