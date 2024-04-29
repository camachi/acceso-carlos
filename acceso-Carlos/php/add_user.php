<?php 
include("conexion.php");

$add_usuario = $_POST["add_username"];
$add_email = $_POST["add_email"];
$add_password = $_POST["add_password"];
$add_rpassword = $_POST["add_rpassword"];
$add_full_name = $_POST["add_fullname"];
$add_phone_number = $_POST["add_phone"];
$add_address = $_POST["add_address"];
$add_postal_address = $_POST["add_postal_address"];
$add_sex = $_POST["add_sex"];
$add_date = $_POST["add_date"];
$add_comment = $_POST["add_comments"];

$check_query = "SELECT * FROM users WHERE username='$add_usuario' OR email='$add_email'";
$result = $conn->query($check_query);
if ($result->num_rows > 0) 
{
    echo"<script> alert('Account already exist'); window.location='../add.php?id=1'</script>";
    $conn->close();
}
if(!empty($_FILES['add_image']) && $_FILES['add_image']['error'] === UPLOAD_ERR_OK)  
{
    
    $max_file_size = 1024 * 102;
    if ($_FILES['add_image']['size'] > $max_file_size) 
    {
        echo"<script> alert('Image file size reach the maximum try again.'); window.location='../add.php?=1'</script>";
    }
    else
        {
        $imagen = file_get_contents($_FILES['add_image']['tmp_name']);
        $imagen_escapada = mysqli_real_escape_string($conn, $imagen);
        }

        $sqlreg = "INSERT INTO users(username, email, password, full_name, phone_number, profile_picture, address, postal_address, sex, date, comment) 
                   VALUES ('$add_usuario', '$add_email', '$add_password', '$add_full_name', '$add_phone_number', '$imagen_escapada', '$add_address', '$add_postal_address', '$add_sex', '$add_date', '$add_comment')";
        
        if(mysqli_query($conn, $sqlreg)) 
        {
            echo "<script> alert('User added'); window.location='../add.php?id=1'</script>";
        } 
        else 
        {
            echo "Error:" . mysqli_error($conn);
        }
} 
 
?>
