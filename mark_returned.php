<?php
$conn = mysqli_connect("localhost", "root", "", "campuscc");
if (!$conn) { die("Connection failed: " . mysqli_connect_error()); }

// id retriever
$id = (int) $_GET["id"];

// update loan
$stmt = mysqli_prepare($conn, "UPDATE loans SET returned = 1 WHERE id = ?");
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
header("Location: list.php"); 
exit;
?>
