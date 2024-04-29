<?php
include("conexion.php");

if(isset($_GET['term'])) {
    
    $term = $_GET['term'];
    $sql = "SELECT * FROM users WHERE username LIKE '%$term%' OR id LIKE '%$term%' OR full_name LIKE '%$term%'";
    $result = $conn->query($sql);
    echo "<table>";
    echo "<tr><th>User ID</th><th>Name</th><th>Logs</th></tr>";
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
           
            echo "<tr>";
            echo "<td>" . $row["id"]. "</td>";
            echo "<td>" . $row["username"]. "</td>";
            echo '<td><a href="profile-logs.php?id='. $row["id"].'"><button class="edit-button">Logs</button></a></td>';
            echo "</tr>";
        }
      
    } else {
        echo "<tr><td colspan='3'>No users found.</td></tr>";
    }
    echo "<table>";
    
    $conn->close();
}
?>