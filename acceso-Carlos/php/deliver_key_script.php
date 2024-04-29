<?php 
include("conexion.php");
$user_id = $conn->real_escape_string($_GET['id']);
$sql = "SELECT user_id FROM llaves WHERE user_id = $user_id";
$resultado = $conn->query($sql);
if ($resultado->num_rows > 0) 
{   
    $query = "UPDATE llaves SET user_id = NULL WHERE user_id = $user_id";
    $conn-> query($query);
    if($user_id == 1)
    {   //admin
        echo"<script> alert('Key delivered to storage'); window.location='../admin.php?id=1'</script>";
    }
    else
    {   //user
        echo"<script> alert('Key delivered to storage'); window.location='../userview.php?id=$user_id'</script>";
    }
} else 
{
    if($user_id == 1)
    {   //admin
        echo"<script> alert('You dont have any key to deliver to the storage'); window.location='../admin.php?id=1'</script>";
    }
    else
    {   //user
        echo"<script> alert('You dont have any key to deliver to the storage'); window.location='../userview.php?id=$user_id'</script>";
    }
    
}




?>