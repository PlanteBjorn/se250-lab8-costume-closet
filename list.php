<?php
$conn = mysqli_connect("localhost", "root", "", "campuscc");
if (!$conn) { die("Connection failed: " . mysqli_connect_error()); }
$sql = "SELECT id, item, borrower, due_date, returned FROM loans ORDER BY item";
$result = mysqli_query($conn, $sql);
?>

<h1>Campus Costume Closet</h1>
<a href="form.html">Add New Loan</a>
<h2>All Loans</h2>

<?php
if (mysqli_num_rows($result) == 0) {
    echo "No loans yet.";
} else {
?>

<table border="1" cellpadding="10">
    <tr>
        <th>ID</th>
        <th>Item</th>
        <th>Borrower</th>
        <th>Due Date</th>
        <th>Status</th>
        <th>Actions</th>
    </tr>

    <?php
    while ($row = mysqli_fetch_assoc($result)) {
    ?>
    
    <tr>
        <td><?php echo $row["id"]; ?></td>
        <td><?php echo htmlspecialchars($row["item"]); ?></td>
        <td><?php echo htmlspecialchars($row["borrower"]); ?></td>
        <td><?php echo $row["due_date"]; ?></td>

        <td>
            <?php
            if ($row["returned"] == 1) {
                echo "Returned"; 
            } else {
                echo "Not Returned";
            }
            ?>
        </td>

        <td> 
            <?php
            if ($row["returned"] == 0) {
            ?>
                <a href="mark_returned.php?id=<?php echo $row["id"]; ?>">
                    Mark Returned
                </a>
            <?php
            }
            ?>

            <!--deletion confirmation-->
            <a href="delete.php?id=<?php echo $row["id"]; ?>"
                onclick="return confirm('confirm deletion?')">
                    delete
            </a>
        </td>
    </tr>

    <?php
    }
    ?>

</table>

<?php
}
?>

