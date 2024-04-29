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
                    <li><a href="index.php">Go back</a></li>
                  </ul>
                </div>
              </div>
    </div>
    <div class="content-box2">
        <div class="log-in-box2">
            <div class="info-div2">
            <form action="php/login_registrar.php" method="POST" enctype="multipart/form-data">
        <div class="area">
            <div class="reg-top">
                <h2>Register.</h2>  <svg fill="white" height="30px" width="30px" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 310 310" xml:space="preserve" stroke="#ff5900"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M300.606,159.727l-45.333-45.333c-5.857-5.858-15.355-5.858-21.213,0L225,123.454V15c0-8.284-6.716-15-15-15H20 C11.716,0,5,6.716,5,15v240.002c0,8.284,6.716,15,15,15h85V295c0,8.284,6.716,15,15,15h45.333c3.979,0,7.794-1.581,10.607-4.394 l124.667-124.667C306.465,175.081,306.465,165.585,300.606,159.727z M35,30h160v123.454l-85.606,85.605 c-0.302,0.301-0.581,0.619-0.854,0.942H35V30z M159.12,280H135v-24.121l109.667-109.666l24.12,24.12L159.12,280z"></path> </g></svg>
            </div>
        </div>
            
            <div class="separacion-reg">
                <input type="username" placeholder="Enter Username" name="reg_username" required> 
                <input type="email" placeholder="Email" name="reg_email" required>
            </div>

            <div class="separacion-reg">
                <input type="password" placeholder="Enter Password" name="reg_password" required>
                <input type="password" placeholder="Repeat your password" name="reg_rpassword" required>
            </div>
            <div class="separacion-reg">
                <input type="text" placeholder="Full name" name="reg_full_name" required>  
                <input type="text" placeholder="Phone Number" name="reg_phone_number" required>
            </div>
            <div class="separacion-reg">
                <input style="display: none;" id="foto" type="file" accept="image/*" name="reg_image"  required>
                <label for="foto" class="file-foto">
                    <svg width="20px" height="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M8 11C9.10457 11 10 10.1046 10 9C10 7.89543 9.10457 7 8 7C6.89543 7 6 7.89543 6 9C6 10.1046 6.89543 11 8 11Z" stroke="#ffffff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M6.56055 21C12.1305 8.89998 16.7605 6.77998 22.0005 14.63" stroke="#ffffff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M18 3H6C3.79086 3 2 4.79086 2 7V17C2 19.2091 3.79086 21 6 21H18C20.2091 21 22 19.2091 22 17V7C22 4.79086 20.2091 3 18 3Z" stroke="#ffffff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg> Upload Photo
                </label>
            </div>
            <div class="separacion-reg">
                <input type="text" placeholder="Address" name="reg_address" required>
                <input type="text" placeholder="Postal address" name="reg_postal_address"  required>
            </div>
            <div class="separacion-reg">
                <div class="text-person">
                    <h6 style="color: rgb(255, 255, 255);" >Male:</h6><input type="radio" name="reg_sex" value="male">
                </div>
                <div class="text-person">
                    <h6 style="color: rgb(255, 255, 255);" >Female:</h6><input type="radio"  name="reg_sex" value="female">
                </div>
            </div>
            <div class="separacion-reg">
                <input type="text" placeholder="Date" name="reg_date" required>
            </div>
            <button  type="submit" class="log-in-button" name="btnreg">Register</button>
            </form>
        </br>
        </div>
        </div>
        
    </div>

</body>
</html>