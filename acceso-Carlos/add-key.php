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
        <svg width="153px" height="153px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path fill-rule="evenodd" clip-rule="evenodd" d="M9.29289 1.29289C9.48043 1.10536 9.73478 1 10 1H18C19.6569 1 21 2.34315 21 4V9C21 9.55228 20.5523 10 20 10C19.4477 10 19 9.55228 19 9V4C19 3.44772 18.5523 3 18 3H11V8C11 8.55228 10.5523 9 10 9H5V20C5 20.5523 5.44772 21 6 21H9C9.55228 21 10 21.4477 10 22C10 22.5523 9.55228 23 9 23H6C4.34315 23 3 21.6569 3 20V8C3 7.73478 3.10536 7.48043 3.29289 7.29289L9.29289 1.29289ZM6.41421 7H9V4.41421L6.41421 7ZM17.8003 14.3564C18.0771 13.8813 17.9184 13.2717 17.4449 12.992L14.8873 11.4811C14.1351 11.0367 13.1815 11.132 12.5321 11.7165L10.9322 13.1564C10.2432 13.7765 10.0706 14.7887 10.515 15.6021L12.034 18.3817C12.304 18.8758 12.9285 19.0497 13.4149 18.7662L14.4966 18.136C14.9249 17.8864 15.4715 17.9883 15.7811 18.3755L16.7004 19.5254L16.8845 19.3816C17.0936 19.2183 17.359 19.1448 17.6223 19.1772C17.8856 19.2097 18.1252 19.3454 18.2884 19.5545L19.4397 21.03C19.9282 21.656 20.9163 21.4903 21.174 20.7393L21.2714 20.4553L17.3143 16.7279C16.9757 16.4089 16.9018 15.8985 17.136 15.4966L17.8003 14.3564ZM18.4622 11.2701C19.8826 12.1092 20.3589 13.9378 19.5283 15.3633L19.2641 15.8169L23.1123 19.4418C23.3982 19.7111 23.4999 20.1228 23.3725 20.4943L23.0657 21.3884C22.2927 23.6415 19.3284 24.1383 17.863 22.2604L17.3271 21.5736L17.1522 21.7102C16.7204 22.0473 16.0978 21.9744 15.7557 21.5465L14.7578 20.2985L14.4218 20.4943C12.9624 21.3446 11.0889 20.823 10.2789 19.3408L8.75998 16.5611C7.87103 14.9344 8.2163 12.91 9.59422 11.6698L11.1942 10.2299C12.493 9.06095 14.4002 8.87035 15.9046 9.75912L18.4622 11.2701ZM13.5 16C14.3284 16 15 15.3284 15 14.5C15 13.6716 14.3284 13 13.5 13C12.6716 13 12 13.6716 12 14.5C12 15.3284 12.6716 16 13.5 16Z" fill="#ff4d00"></path> </g></svg>
        </div>
    <div class="separacion-reg">
       <h2 style="color: white;">Add key</h2> 
    </div>
    <form action="php/add_key_script.php" method="POST" enctype="multipart/form-data">
    <div class="separacion-reg">
        <input type="text" placeholder="Name of key" name="add_key"> 
    </div>

    <div class="button-space">
        <button  type="submit" class="log-in-button" name="btnaddkey">Submit</button>
    </div>
    </form>
      </div>
    </div>

      
    

    
    </div>
</body>
</html>