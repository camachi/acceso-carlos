<?php
include("conexion.php");
//user var
$user_usuario = $_POST["usuario"];
$user_pass = $_POST["pass"];
//register var
$reg_usuario = $_POST["reg_username"];
$reg_email = $_POST["reg_email"];
$reg_password = $_POST["reg_password"];
$reg_rpassword = $_POST["reg_rpassword"];
$reg_full_name = $_POST["reg_full_name"];
$reg_phone_number = $_POST["reg_phone_number"];
$reg_image = $_FILES["reg_image"];
$reg_address = $_POST["reg_address"];
$reg_postal_address = $_POST["reg_postal_address"];
$reg_sex = $_POST["reg_sex"];
$reg_date = $_POST["reg_date"];
//login
if(isset($_POST["btnsubmit"]))
{
    $query = mysqli_query($conn,"SELECT * FROM users WHERE username = '$user_usuario' AND password = '$user_pass' ");
    $nr = mysqli_num_rows($query);

    if($nr == 1)
    {   $usuario = mysqli_fetch_assoc($query);
        $user_id = $usuario['id'];
        if($user_id == 1)
        {
        echo"<script> alert('Welcome'); window.location='../admin.php?id=1' </script>";
        }
        else
        {
        echo"<script> alert('Welcome'); window.location='../userview.php?id=$user_id' </script>";
        }
       
    }

    else
    {
        echo"<script> alert('User dont exist'); window.location='../index.php'</script>";
    }
}

if(isset($_POST["btnreg"]))
{   if($reg_password !== $reg_rpassword)
    {
        echo"<script> alert('Password dont match'); window.location='../register.php'</script>";
    }
    
    $check_query = "SELECT * FROM users WHERE username='$reg_usuario' OR email='$reg_email'";
    $result = $conn->query($check_query);
    if ($result->num_rows > 0) {
        echo"<script> alert('Account already exist'); window.location='../register.php'</script>";
    } else 
    {   if(!empty($_FILES['reg_image']) && $_FILES['reg_image']['error'] === UPLOAD_ERR_OK) 
        {
            $max_file_size = 1024 * 102;
            if ($_FILES['reg_image']['size'] > $max_file_size) 
            {
                echo"<script> alert('Image file size reach the maximum try again.'); window.location='../register.php'</script>";
            }
        else
        {
        $imagen = file_get_contents($_FILES['reg_image']['tmp_name']);
        $imagen_escapada = mysqli_real_escape_string($conn, $imagen);
        }


        }
        $sqlreg = "INSERT INTO users(username,email,password,full_name,phone_number,profile_picture,address,postal_address,sex,date) values ('$reg_usuario','$reg_email','$reg_password','$reg_full_name','$reg_phone_number','$imagen_escapada','$reg_address','$reg_postal_address','$reg_sex','$reg_date')";
            
        
        }
        
        
        if(mysqli_query($conn,$sqlreg))
        {
            echo"<script> alert('User register'); window.location='../index.php'</script>";
        }
        else
        {
            echo "Error:" .mysqli_error($conn);
        }
    }
   
   







?>