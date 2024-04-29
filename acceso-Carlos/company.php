<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Key Usage</title>
    <link rel="stylesheet" href="style.css">
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

    </div>
    
    <div class="titulo">
      <div class="titulo-name">
        <h2>Company Information</h2>
      </div>
    </div>
    
    <div class="edit-profiles-container">
      <div class="company-container">

        <div class="profile-photo-card">
          <div class="photo-layout">
          <?php 
                    include("php/conexion.php");
                    $sql = "SELECT company_logo FROM company";

                    $resultado = mysqli_query($conn, $sql);

                    if($resultado->num_rows > 0)
                    {
                      $fila = mysqli_fetch_assoc($resultado);
                      $imagen_binaria = $fila['company_logo'];
                      mysqli_free_result($resultado);
                      echo '<img src="data:image/jpeg;base64,' . base64_encode($imagen_binaria) . '" alt="Imagen de perfil" height="120px" width="120px" >'; 
                    }
                    
                    
                     $conn->close(); 
                    ?>
            

        </div>
        </div>
        <form action="php/get_company.php" method="POST" enctype="multipart/form-data">
          <div class="separacion-reg">
            <input style="display: none;" id="foto" type="file"  name="com_foto">
            <label for="foto" class="file-foto">
                <svg width="20px" height="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M8 11C9.10457 11 10 10.1046 10 9C10 7.89543 9.10457 7 8 7C6.89543 7 6 7.89543 6 9C6 10.1046 6.89543 11 8 11Z" stroke="#ffffff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M6.56055 21C12.1305 8.89998 16.7605 6.77998 22.0005 14.63" stroke="#ffffff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M18 3H6C3.79086 3 2 4.79086 2 7V17C2 19.2091 3.79086 21 6 21H18C20.2091 21 22 19.2091 22 17V7C22 4.79086 20.2091 3 18 3Z" stroke="#ffffff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg> Upload Photo
            </label>
          </div>
          <div class="person-info-box">
                   <div class="text-person">
                    <?php 
                    include("php/conexion.php");
                    $sql = "SELECT company_name FROM company";

                    $resultado = $conn->query($sql);

                    if($resultado->num_rows > 0)
                    {
                      $fila = $resultado->fetch_assoc();
                      echo "<h6>Company name: " . $fila["company_name"] . "</h6>";
                    }
                    else
                    {
                      echo "No data";
                    }

                     $conn->close(); 
                    ?>

                    
                   </div>
          </div>
                <div class="separacion-reg">
                  <input type="text" placeholder="Company Name" name="com_name"> 
                </div>

          <div class="person-info-box">
                <div class="text-person">
                <?php 
                    include("php/conexion.php");
                    $sql = "SELECT company_address FROM company";

                    $resultado = $conn->query($sql);

                    if($resultado->num_rows > 0)
                    {
                      $fila = $resultado->fetch_assoc();
                      echo "<h6>Address: " . $fila["company_address"] . "</h6>";
                    }
                    else
                    {
                      echo "No data";
                    }
                    
                     $conn->close(); 
                    ?>
                </div>
          </div>
             <div class="separacion-reg">
               <input type="text" placeholder="Address" name="com_address"> 
          </div>

          <div class="person-info-box">
            <div class="text-person">
            <?php 
                    include("php/conexion.php");
                    $sql = "SELECT company_postal_address FROM company";

                    $resultado = $conn->query($sql);

                    if($resultado->num_rows > 0)
                    {
                      $fila = $resultado->fetch_assoc();
                      echo "<h6>Postal address: " . $fila["company_postal_address"] . "</h6>";
                    }
                    else
                    {
                      echo "No data";
                    }
                    
                     $conn->close(); 
                    ?>
            </div>
          </div>
         <div class="separacion-reg">
           <input type="text" placeholder="Postal adress" name="com_postal_address"> 
          </div>

          <div class="person-info-box">
            <div class="text-person">
            <?php 
                    include("php/conexion.php");
                    $sql = "SELECT company_phone FROM company";

                    $resultado = $conn->query($sql);

                    if($resultado->num_rows > 0)
                    {
                      $fila = $resultado->fetch_assoc();
                      echo "<h6>Company phone: " . $fila["company_phone"] . "</h6>";
                    }
                    else
                    {
                      echo "No data";
                    }
                    
                     $conn->close(); 
                    ?>
            </div>
      </div>
         <div class="separacion-reg">
           <input type="text" placeholder="Phone" name="com_phone"> 
      </div>

      <div class="person-info-box">
            <div class="text-person">
            <?php 
                    include("php/conexion.php");
                    $sql = "SELECT company_url FROM company";

                    $resultado = $conn->query($sql);

                    if($resultado->num_rows > 0)
                    {
                      $fila = $resultado->fetch_assoc();
                      echo "<h6>Url: " . $fila["company_url"] . "</h6>";
                    }
                    else
                    {
                      echo "No data";
                    }
                    
                     $conn->close(); 
                    ?>
            </div>
      </div>
      <div class="separacion-reg">
           <input type="text" placeholder="Url..." name="com_url"> 
      </div>

      <div class="button-space">
        <button  type="submit" class="log-in-button" name="btncompany">Submit</button>
    </div>

      </div>
    </div>

      
    

    
    </div>
</body>
</html>