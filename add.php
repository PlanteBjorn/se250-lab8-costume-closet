<?php
// database connection
$conn = mysqli_connect("localhost", "root", "", "campuscc");

// retriever
$item = $_POST["item"];
$borrower = $_POST["borrower"];
$due_date = $_POST["due_date"];

// sql prep
$stmt = mysqli_prepare($conn, "INSERT INTO loans (item, borrower, due_date, returned) VALUES (?, ?, ?, 0)");
mysqli_stmt_bind_param($stmt, "sss", $item, $borrower, $due_date);
mysqli_stmt_execute($stmt);
header("Location: list.php"); 
exit;
?>