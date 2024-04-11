<?php
if (empty($whereami)) {
    $whereami = "";
}
session_start();
session_destroy();
header("Location: " . $whereami . "/index.php");

?>