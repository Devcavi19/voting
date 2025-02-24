<?php
try {
    $conn = new mysqli('localhost', 'root', 'admin123', 'vote');
    if ($conn->connect_error) {
        throw new Exception("Connection failed: " . $conn->connect_error);
    }
} catch (Exception $e) {
    die("Error: " . $e->getMessage());
}
?>