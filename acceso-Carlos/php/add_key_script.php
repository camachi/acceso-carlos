<?php
include("conexion.php");

$add_key = $_POST["add_key"];

if(isset($_POST["btnaddkey"]))
{   
    if(empty($add_key)) {
        echo "<script>alert('Need to input some data'); window.location='../add-key.php?id=1'</script>";
        exit();
    }
    $query = "SELECT * FROM llaves WHERE name = '$add_key'";
    $result = mysqli_query($conn, $query);
    if(mysqli_num_rows($result) > 0)
    {
        echo "<script> alert('Theres a key already with that name try again!'); window.location='../add-key.php?id=1'</script>";
    }
    else
    {
        $sql = "INSERT INTO llaves (name) VALUE ('$add_key')";
        if(mysqli_query($conn, $sql)) 
        {
            echo "<script> alert('Key added!'); window.location='../add-key.php?id=1'</script>";
        }
       
    }
} 
    


$conn->close();
?>