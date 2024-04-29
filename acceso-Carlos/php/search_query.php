<?php
include("conexion.php");

if(isset($_GET['term'])) {
    $term = $_GET['term'];
    $sql = "SELECT * FROM users WHERE username LIKE '%$term%' OR id LIKE '%$term%' OR full_name LIKE '%$term%'";
    $result = $conn->query($sql);
    
    echo "<table>";
    echo "<tr>
        <th>User ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>";

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) { 
            echo "<tr>";
            echo "<td>" . $row["id"]. "</td>";
            echo "<td>" . $row["username"]. "</td>";
            echo "<td>" . $row["email"]. "</td>";
            echo '<td><a href="profile-edit.php?id='. $row["id"].'"><button class="edit-button">Edit</button></a></td>';
            echo '<td>';
            if($row['id'] == 1) {
                echo '<button class="delete-button" style="background-color: grey; color: white;" disabled>Cant Delete</button>';
            } else {
                echo '<form method="post" action="php/profile_deleat.php" onsubmit="return confirm(\'Are you sure you want to delete '.$row['username'].'?\')">';
                echo '<input type="hidden" name="id_user" value="'.$row["id"].'">';
                echo '<button type="submit" class="delete-button" name="btndel">Delete</button>';
                echo '</form>';
            }
            echo '</td>';
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='5'>No users found.</td></tr>";
    }
    
    echo "</table>";
    
    $conn->close();
}
?>
