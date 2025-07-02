<?php
include 'admin/class/crud.php';
$mysqli = new crud();
session_start();

header('Content-Type: application/json');

// Fetch active books
$result = $mysqli->common_select("books");

if (!$result['error']) {
    echo json_encode($result['data']);
} else {
    echo json_encode([]);
}
?>