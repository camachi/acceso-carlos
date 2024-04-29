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
    </div>
    <div class="content-box">
        <div class="log-in-box">
            <div class="info-div">
            <form action="php/login_registrar.php" method="POST">
            <h2>Sign in.</h2>
            <p class="crear-cuenta"> or <a href="register.php" class="efecto-a">Create an account</a></p>
            </br>
            </br>
            <input type="username" placeholder="Enter Username" name="usuario" required>
            </br>
            </br>
            </br> 
            <input type="password" placeholder="Enter Password" name="pass" required>
            </br>
            </br>
           <button type="submit" class="log-in-button"  name="btnsubmit">Sign in</button>
            </form>
            
            </div>
            <img id="fotito" src="images/undraw_secure_login_pdn4 (2).svg" alt="log-in-image" height="500px" width="500px">
        </div>
        
    </div>
</body>
</html>