<?php 
include("conexion.php");

$c_name = $_POST["com_name"];
$c_address = $_POST["com_address"];
$c_postal_address = $_POST["com_postal_address"];
$c_phone = $_POST["com_phone"];
$c_url = $_POST["com_url"];
$c_photo = $_FILES["com_foto"];

if(isset($_POST["btncompany"]))
{
    if(empty($c_name) && empty($c_address) && empty($c_postal_address) && empty($c_phone) && empty($c_url) && empty($_FILES['com_foto']['name'])) {
        echo "<script>alert('Need to input some data'); window.location='../company.php?id=1'</script>";
        exit();
    }
    
    $sql = "UPDATE company SET ";

    if(!empty($_FILES['com_foto']) && $_FILES['com_foto']['error'] === UPLOAD_ERR_OK) 
    {
        $max_file_size = 1024 * 102;
        if ($_FILES['com_foto']['size'] > $max_file_size) 
        {
            echo "<script> alert('Image file size reach the maximum try again.'); window.location='../company.php?id=$user_id'</script>";
        } 
        else 
        {
        $imagen = file_get_contents($_FILES['com_foto']['tmp_name']);
        $imagen_escapada = mysqli_real_escape_string($conn, $imagen);
        $sql .= "company_logo='$imagen_escapada', ";
        }
    }
    if(!empty($c_name)) {
        $sql .= " company_name='$c_name', ";
    }
    if(!empty($c_address)) {
        $sql .= " company_address='$c_address', ";
    }
    if(!empty($c_postal_address)) {
        $sql .= " company_postal_address='$c_postal_address', ";
    }
    if(!empty($c_phone)) {
        $sql .= " company_phone='$c_phone', ";
    }
    if(!empty($c_url)) {
        $sql .= " company_url='$c_url', ";
    }
    
    $sql = rtrim($sql, ", ");
    $id = "1";
    $sql .= "WHERE company_id = $id"; 
    if(mysqli_query($conn,$sql))
    {
        echo "<script> alert('Data updated'); window.location='../company.php?id=1'</script>";
    }
    
    
}

?>
