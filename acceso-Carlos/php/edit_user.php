<?php 
include("conexion.php");

$e_username = $_POST["edit_username"];
$e_email = $_POST["edit_email"];
$e_password = $_POST["edit_password"];
$e_rpassword = $_POST["edit_rpassword"];
$e_fullname = $_POST["edit_fullname"];
$e_phone = $_POST["edit_phone"];
$e_address = $_POST["edit_address"];
$e_postal_address = $_POST["edit_postal_address"];
$e_date = $_POST["edit_date"];
$e_sex= $_POST["edit_sex"];
$e_comment = $_POST["edit_comments"];
$e_image = $_FILES["edit_photo"];
$user_id = $_POST["user_id"];

if(isset($_POST["btnedit"]))
{   
    if(empty($e_username) && empty($e_address) && empty($e_postal_address) && empty($e_phone) && empty($e_password) && empty($_FILES['edit_foto']['name']) && empty($e_fullname) && empty($e_date) && empty($e_sex) && empty($e_comment) && empty($e_email) ) {
        echo "<script>alert('Need to input some data'); window.location='../profile-edit.php?id=$user_id'</script>";
        exit();
    }
    $sql = "UPDATE users SET ";
    if(!empty($e_username)) {
        $check_query = "SELECT * FROM users WHERE username='$e_username'";
        $result = $conn->query($check_query);
        if ($result->num_rows > 0) {
            echo"<script> alert('Username exist'); window.location='../profile-edit.php?id=$user_id'</script>";
        } else 
        {
            $sql .= "username='$e_username', ";
        }
    }
    if(!empty($e_email)) {
        $check_query = "SELECT * FROM users WHERE email='$e_email'";
        $result = $conn->query($check_query);
        if ($result->num_rows > 0) {
            echo"<script> alert('Email exist'); window.location='../profile-edit.php?id=$user_id'</script>";
        } else 
        {
            $sql .= "email='$e_email', ";
        }
       
    }
    if(!empty($e_password)) {
        if($e_password !== $e_rpassword)
    {
        echo"<script> alert('Password dont match'); window.location='../profile-edit.php?id=$user_id'</script>";
    }
        $sql .= "password ='$e_password', ";
    }
    if(!empty($e_fullname)) {
        $sql .= "full_name='$e_fullname', ";
    }
    if(!empty($e_phone)) {
        $sql .= "phone_number='$e_phone', ";
    }
    if(!empty($_FILES['edit_photo']) && $_FILES['edit_photo']['error'] === UPLOAD_ERR_OK) 
    {   $max_file_size = 1024 * 102;
        if ($_FILES['edit_photo']['size'] > $max_file_size) {
        
            echo"<script> alert('Image file size reach the maximum try again.'); window.location='../profile-edit.php?id=$user_id'</script>";
           
        }
        else
        {
        $imagen = file_get_contents($_FILES['edit_photo']['tmp_name']);
        $imagen_escapada = mysqli_real_escape_string($conn, $imagen);
        $sql .= "profile_picture='$imagen_escapada', ";
        }
        
    } 
    if(!empty($e_address)) {
        $sql .= "address='$e_address', ";
    }
    if(!empty($e_postal_address)) {
        $sql .= "postal_address='$e_postal_address', ";
    }
    if(!empty($e_sex)) {
        $sql .= "sex='$e_sex', ";
    }
    if(!empty($e_date)) {
        $sql .= "date='$e_date', ";
    }
    if(!empty($e_comment)) {
        $sql .= "comment='$e_comment', ";
    }
    $sql = rtrim($sql, ", ");
    $sql .= "WHERE id = $user_id"; 

    if(mysqli_query($conn,$sql))
        {
            echo "<script>alert('Data updated'); window.location='../profile-edit.php?id=$user_id'</script>";
        }
        else
        {
            echo "Error:" .mysqli_error($conn);
        }
}







?>