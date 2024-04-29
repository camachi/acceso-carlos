<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Key Usage</title>
    <link rel="stylesheet" href="style.css">
    <style>
.logs-box 
{
    align-items: center;
    text-align: center;
    justify-content: center;
    width: 60%;
    border-radius: 4px;
    margin-top: 3px;
    background-color: #d8d8d8;
    padding: 20px; 
}
    </style>
</head>
<body>
    <div class="top-page">
        <div class="logo-top-page">
        <?php 
                    include("php/conexion.php");
                    $sql = "SELECT company_logo, company_name FROM company";

                    $resultado = $conn->query($sql);

                    if($resultado->num_rows > 0)
                    {
                      $fila = mysqli_fetch_assoc($resultado);
                      $imagen_binaria = $fila['company_logo'];
                      mysqli_free_result($resultado);
                      echo '<img src="data:image/jpeg;base64,' . base64_encode($imagen_binaria) . '" alt="Imagen de perfil" height="70px" width="70px" >'; 
                      echo '<h2 class= "company-name">' . $fila["company_name"] . '</h2>';
                    }
                    else
                    {
                      echo "No data";
                    }
                    
                     $conn->close(); 
                    ?>
        </div>
        <div class="bugger">
          <div class="dropdown">
            <button class="dropdown-toggle">Menú</button>
            <ul class="dropdown-menu">
            <?php include("php/conexion.php");
             $user_id = $conn->real_escape_string($_GET['id']);
            ?>
            <li><a href="admin.php?id=<?php echo 1; ?>">Admin</a></li>
            <li><a href="edit.php?id=<?php echo 1; ?>">Edit</a></li>
            <li><a href="logs.php?id=<?php echo 1; ?>">Logs</a></li>
            <li><a href="company.php?id=<?php echo 1; ?>">Company</a></li>
            <li><a href="add.php?id=<?php echo 1; ?>">Add</a></li>
            <li><a href="add-key.php?id=<?php echo 1; ?>">Add key</a></li>
            <li><a href="index.php">Log out</a></li>
            </ul>
          </div>
        </div>
        
     

    </div>

    <div class="titulo">
      <div class="titulo-name">
        <h2>Logs</h2>
      </div>
    </div>
    
    <div class="logs-box-options">
      <a href="#"><button class="logs-button">Option</button></a>
      <a href="#"><button class="logs-button">Option</button></a>
      <a href="#"><button class="logs-button">Option</button></a>
      <a href="#"><button class="logs-button">Option</button></a>
      <a href="#"><button class="logs-button">Option</button></a>
    </div>
    <div class="person-info-logs">
        <table>
            <tr>
              <th>User ID</th>
              <th>Name</th>
              <th>Email</th>
            </tr>

            <?php 
            include("php/conexion.php");
            $user_id = $conn->real_escape_string($_GET['id']);      
            $sql = "SELECT * FROM users WHERE id = $user_id ";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
                echo "<tr>";
                echo "<td>" . $row["id"]. "</td>";
                echo "<td>" . $row["username"]. "</td>";
                echo "<td>" . $row["email"]. "</td>";
                echo "</tr>";
            
            $conn->close();
            ?>

        </table>
    </div>
   <div class="logs-info-box">

    
    
    <div class="logs-box">
    <?php 
                    include("php/conexion.php");
                    $sql = "SELECT company_logo, company_name FROM company";

                    $resultado = $conn->query($sql);

                    if($resultado->num_rows > 0)
                    {
                      $fila = mysqli_fetch_assoc($resultado);
                      $imagen_binaria = $fila['company_logo'];
                      mysqli_free_result($resultado);
                      echo '<img src="data:image/jpeg;base64,' . base64_encode($imagen_binaria) . '" alt="Imagen de perfil" height="70px" width="70px" >'; 
                      echo '<h2  class= "company-name">' . $fila["company_name"] . '</h2>';
                    }
                    else
                    {
                      echo "No data";
                    }
                    
                     $conn->close(); 
                    ?>
                    </br>
                    </br>
        <p>LOGS HERE REPORTS HERE</p>
        <p>Los botones de arriba son las diferentes opciones de logs que el admin puede hacer request</p>
        
    </div>

   </div>


    

   

    

    
    
</body>
</html>