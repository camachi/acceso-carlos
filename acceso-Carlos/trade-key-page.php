<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Key Usage</title>
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>
</head>
<body >
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
            <?php 
            if ($user_id == 1) {
              
              echo '<li><a href="admin.php?id=1">Admin</a></li>';
          } else {
             
              echo '<li><a href="userview.php?id='.$user_id.'">Home page</a></li>';
          }
            
            
            ?>
            <li><a href="index.php">Log out</a></li>
            </ul>
          </div>
        </div>

     </div>

    </div>

    <div class="titulo">
      <div class="titulo-name">
        <h2>Trade Keys</h2>
      </div>
    </div>
    <div class="seach-box">
        <form>
          <div class="search-box">
          <input type="text" id="searchBar"  placeholder="Search...">
          <input type="hidden" id="usuarioID" value="<?php echo"$user_id";?>">
          <button class="search-button" onclick="searchUsers('trade_query_keys.php')" type="button">Search</button>
          </div>
        </form>
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

    <div id="searchResultado" class="keys-content">
    <?php 
    $sql = "SELECT * FROM llaves WHERE user_id IS NOT NULL";
   
    $resultado = $conn->query($sql);
    while ($fila = $resultado->fetch_assoc())
    { $query = "SELECT * FROM users";
      $result = $conn->query($query);
      while ($row = $result->fetch_assoc())
      {
       if( $row["id"] == $fila["user_id"])
       {
          $nombre = $row["full_name"];
       }
      }
        if($nombre !== $fila["name"])
        {
          if($fila["user_id"]!=$user_id)
          {
        echo '<div class="keys-box">';
        echo '<div class="top-key-logo">';
        echo '<svg width="30px" height="30px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#ffffff"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M14.2084 11.0932C14.9388 11.0932 15.531 10.5035 15.531 9.77597C15.531 9.04848 14.9388 8.45874 14.2084 8.45874C13.4779 8.45874 12.8857 9.04848 12.8857 9.77597C12.8857 10.5035 13.4779 11.0932 14.2084 11.0932Z" fill="#ffae00"></path> <path fill-rule="evenodd" clip-rule="evenodd" d="M3.46447 3.46447C2 4.92893 2 7.28595 2 12C2 16.714 2 19.0711 3.46447 20.5355C4.92893 22 7.28595 22 12 22C16.714 22 19.0711 22 20.5355 20.5355C22 19.0711 22 16.714 22 12C22 7.28595 22 4.92893 20.5355 3.46447C19.0711 2 16.714 2 12 2C7.28595 2 4.92893 2 3.46447 3.46447ZM14.2084 13.5521C16.3025 13.5521 18 11.8615 18 9.77606C18 7.6906 16.3025 6 14.2084 6C12.1144 6 10.4169 7.6906 10.4169 9.77606C10.4169 10.742 10.8578 11.4446 10.8578 11.4446L6.27264 16.011C6.0669 16.2159 5.77886 16.7486 6.27264 17.2404L6.8017 17.7673C7.00743 17.9429 7.52471 18.1888 7.94796 17.7673L8.56519 17.1526C9.18242 17.7673 9.88782 17.416 10.1523 17.0647C10.5932 16.45 10.0642 15.8353 10.0642 15.8353L10.2405 15.6597C11.087 16.5027 11.8277 16.011 12.0922 15.6597C12.5331 15.045 12.0922 14.4303 12.0922 14.4303C12.0403 14.3269 11.9731 14.2539 11.9153 14.1912C11.777 14.041 11.693 13.9498 12.004 13.64L12.5331 13.113C12.9564 13.4643 13.8264 13.5521 14.2084 13.5521Z" fill="#ffae00"></path> </g></svg>';
        echo '<h4>'.$fila["name"].' Hold by <span style="color: green;">'.$nombre.'</span></h4>';
        echo '</div>';
        echo '<div class="area">';
        echo '<form action="php/trade_keys_script.php?id='.$user_id.'" method="POST">';
        echo '<input type="hidden" name="valor" value="'.$fila["user_id"].'">';
        echo '<a class="button-fix" href="php/get-keys-script.php?id= '. $user_id . '"><button class="boton-key">Trade key</button></a>';
        echo '</form>';
        echo '</div>';
        echo '</div>';
          }
          else
          {
            //para que no salga el user en el trade
          }
        
        }
       
    }
    
    ?>

    </div>

    
    

    

   

    
</body>
</html>
