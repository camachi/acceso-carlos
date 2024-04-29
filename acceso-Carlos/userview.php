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
            <li><a href="userview.php?id=<?php echo $user_id; ?>">Home page</a></li>
            <li><a href="index.php">Log out</a></li>
            </ul>
          </div>
        </div>

     </div>

    </div>

    <div class="titulo">
      <div class="titulo-name">
        <h2>Available keys</h2>
        
      </div>
    </div>
    
    <div class="keys-content">

      

      

      <div class="keys-box">
        <div class="top-key-logo">
        <svg width="30px" height="30px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#ffffff"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M14.2084 11.0932C14.9388 11.0932 15.531 10.5035 15.531 9.77597C15.531 9.04848 14.9388 8.45874 14.2084 8.45874C13.4779 8.45874 12.8857 9.04848 12.8857 9.77597C12.8857 10.5035 13.4779 11.0932 14.2084 11.0932Z" fill="#ffae00"></path> <path fill-rule="evenodd" clip-rule="evenodd" d="M3.46447 3.46447C2 4.92893 2 7.28595 2 12C2 16.714 2 19.0711 3.46447 20.5355C4.92893 22 7.28595 22 12 22C16.714 22 19.0711 22 20.5355 20.5355C22 19.0711 22 16.714 22 12C22 7.28595 22 4.92893 20.5355 3.46447C19.0711 2 16.714 2 12 2C7.28595 2 4.92893 2 3.46447 3.46447ZM14.2084 13.5521C16.3025 13.5521 18 11.8615 18 9.77606C18 7.6906 16.3025 6 14.2084 6C12.1144 6 10.4169 7.6906 10.4169 9.77606C10.4169 10.742 10.8578 11.4446 10.8578 11.4446L6.27264 16.011C6.0669 16.2159 5.77886 16.7486 6.27264 17.2404L6.8017 17.7673C7.00743 17.9429 7.52471 18.1888 7.94796 17.7673L8.56519 17.1526C9.18242 17.7673 9.88782 17.416 10.1523 17.0647C10.5932 16.45 10.0642 15.8353 10.0642 15.8353L10.2405 15.6597C11.087 16.5027 11.8277 16.011 12.0922 15.6597C12.5331 15.045 12.0922 14.4303 12.0922 14.4303C12.0403 14.3269 11.9731 14.2539 11.9153 14.1912C11.777 14.041 11.693 13.9498 12.004 13.64L12.5331 13.113C12.9564 13.4643 13.8264 13.5521 14.2084 13.5521Z" fill="#ffae00"></path> </g></svg>
        <h4>Get Keys</h4>
        </div>
        <div class="area">
          <?php 
          echo '<a class="button-fix" href="get-keys-page.php?id='. $user_id . '"><button class="boton-key">See all</button></a>';
          ?>
        </div>
      </div>

    </div>

    <div class="titulo">
      <div class="titulo-name">
        <h2>Deliver to Storage</h2>
      </div>
    </div>

    <div class="devolver-storage-box">
      <table>
        <tr>
          <th>Curret Key you holding</th>
        </tr>
        <tr>
          <?php 
          include("php/conexion.php");
          
          $query = "SELECT * FROM llaves WHERE user_id = $user_id";
          $resultado = $conn->query($query);
          if ($resultado->num_rows > 0)
          {
            $fila = $resultado->fetch_assoc();
            $name = $fila['name'];
            echo '<td>'.$name.'</td>';
          }
          else
          {
            echo "<td>Not holding a key</td>";
          }
          ?>
        
         
        </tr>
      </table>
      
    </div>

    <div class="devolver-storage-box">
      <div class="devolver-card">
        <div class="top-key-logo">
          <svg width="35px" height="25px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="#ffffff" stroke="#ffffff"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path fill="none" stroke="#ffffff" stroke-width="2" d="M2,5.07692308 C2,5.07692308 3.66666667,2 12,2 C20.3333333,2 22,5.07692308 22,5.07692308 L22,18.9230769 C22,18.9230769 20.3333333,22 12,22 C3.66666667,22 2,18.9230769 2,18.9230769 L2,5.07692308 Z M2,13 C2,13 5.33333333,16 12,16 C18.6666667,16 22,13 22,13 M2,7 C2,7 5.33333333,10 12,10 C18.6666667,10 22,7 22,7"></path> </g></svg>
          <h4>Storage</h4> 
        </div>
      <div class="area">
        <a class="button-fix" href="php/deliver_key_script.php?id=<?php echo "$user_id"; ?>"><button class="boton-key">Deliver</button></a>
      </div>
    </div>

    </div>

    <div class="titulo">
      <div class="titulo-name">
        <h2>Give Key</h2>
      </div>
    </div>

    

    <div class="keys-content">
      
      
      <div class="keys-box">
        <div class="top-key-logo">
          <svg width="30px" height="25px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g clip-path="url(#clip0_429_11110)"> <path d="M11 8L7 4M7 4L3 8M7 4L7 20" stroke="#ffffff" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M13 16L17 20M17 20L21 16M17 20L17 4" stroke="#ffffff" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"></path> </g> <defs> <clipPath id="clip0_429_11110"> <rect width="24" height="24" fill="white"></rect> </clipPath> </defs> </g></svg>
        <h4>Trade Keys</h4>
        </div>
        <div class="area">
        <?php 
          echo '<a class="button-fix" href="trade-key-page.php?id='. $user_id . '"><button class="boton-key">See all</button></a>';
          ?>
        </div>
      </div>
    </div>

    
</body>
</html>
