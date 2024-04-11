<?php
if (empty($whereami)) {
    $whereami = "";
}
include "./conexion/config.php";

if (isset($_REQUEST["term"])) {
    // Ejecucion del query
    $sql = "SELECT * FROM negocios WHERE nombre LIKE ?";

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("s", $param_term);

        $param_term = '%' . $_REQUEST["term"] . '%';

        if ($stmt->execute()) {
            $result = $stmt->get_result();

            if ($result->num_rows == 1) {
                while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                    // "Muestra unicamente el nombre de la empresa"
                    echo "<li><a href='" . $whereami . "./verSpot.php?id=" . $row['id'] . "' style='text-decoration: none; color: inherit;'>" . $row["Nombre"] . "</a></li>";
                }
            } else {
                echo "<p>No matches found</p>";
            }
        } else {
            echo "ERROR: Could not able to execute";
        }
    }

    // Close statement
    $stmt->close();
}

$conn->close();
?>