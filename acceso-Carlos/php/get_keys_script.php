<?php 
include("conexion.php");
$get_key= $_POST["valor"];
$user_id = $conn->real_escape_string($_GET['id']);
$sql = "SELECT user_id FROM llaves WHERE user_id = $user_id";
$resultado = $conn->query($sql);
if ($resultado->num_rows > 0)
{
    echo"<script> alert('You can get a key while holding a key!'); window.location='../get-keys-page.php?id=$user_id'</script>";
}
else
{
    $query = "UPDATE llaves SET user_id = $user_id WHERE key_id = '$get_key'";
    if ($conn->query($query) === TRUE)
    {   
        $sqli = "SELECT name FROM llaves WHERE user_id = $user_id";
        $result = $conn->query($sqli);
        $row = $result->fetch_assoc();
        $key_name = $row['name'];
        echo"<script> alert('You are holding $key_name'); window.location='../get-keys-page.php?id=$user_id'</script>";
    }
}


?>