<?php 
include("conexion.php");

if (isset($_POST["btndel"])) 
{
    $user_id = mysqli_real_escape_string($conn, $_POST['id_user']);
    if($user_id == 1)
    {
        echo "<script> alert('Cant eliminate admin'); window.location='../edit.php?id=1'</script>";
        exit();
    }
    $sql_check = "SELECT * FROM users WHERE id = '$user_id'";
    $result_check = $conn->query($sql_check);

    if ($result_check->num_rows == 0) 
    {
        echo "User with ID $user_id does not exist.";
        exit(); 
    }

    $sql = "DELETE FROM users WHERE id = '$user_id'";
    $stmt = $conn->prepare($sql);
     if ($stmt->execute())
    {
        echo "<script> alert('User eliminated!'); window.location='../edit.php?id=1'</script>";
    }
    else 
    {
        echo "Error al eliminar el usuario: " . $stmt->error;
    }

    
}

$conn->close();
?>