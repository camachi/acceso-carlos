<?php 
include("conexion.php");
$get_key= $_POST["valor"];
$id = $conn->real_escape_string($_GET['id']);

$query = "SELECT key_id, user_id FROM llaves WHERE user_id = '$get_key'";
$result = $conn->query($query);
$query_user = "SELECT key_id FROM llaves WHERE user_id = '$id'";
$result_user = $conn->query($query_user);
if ($result_user->num_rows > 0)
{   
    $row = $result->fetch_assoc();
    $llave_antes = $row["key_id"];
    $fila = $result_user->fetch_assoc();
    $llavesita_antes = $fila["key_id"];
    $update_query = "UPDATE llaves SET user_id = '$id' WHERE key_id = '$llave_antes'";
    $conn->query($update_query);
    $sql = "UPDATE llaves SET user_id = '$get_key' WHERE key_id = '$llavesita_antes'";
    $conn->query($sql);
    echo"<script> alert('Trade successfully!!'); window.location='../trade-key-page.php?id=$id'</script>";
}
else
{
    echo"<script> alert('You cant trade if you are not holding a key!'); window.location='../trade-key-page.php?id=$id'</script>";
}
?>