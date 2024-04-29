<?php
include("conexion.php");

if(isset($_GET['term'])) {
    
    $term = $_GET['term'];
    $sql = "SELECT * FROM llaves WHERE name LIKE '%$term%' OR key_id LIKE '%$term%'";
    
    $result = $conn->query($sql);
    echo "<table>";
    echo "<tr><th>Key ID</th><th>Name</th><th>Logs</th></tr>";
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
           
            echo "<tr>";
            echo "<td>" . $row["key_id"]. "</td>";
            echo "<td>" . $row["name"]. "</td>";
            echo '<td><a href="keys-logs-info.php?id='. $row["key_id"].'"><button class="edit-button">Logs</button></a></td>';
            echo "</tr>";
        }
      
    } else {
        echo "<tr><td colspan='3'>No users found.</td></tr>";
    }
    echo "<table>";
    
    $conn->close();
}
?>