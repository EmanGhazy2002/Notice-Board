<?php require "../include/header.php"; ?>
<?php  global $conn;?>
<?php require "../config.php";?>

<style>
    table {
        border-collapse: collapse;
        width: 80%;
        margin: 20px auto;
    }

    th, td {
        border: 1px solid black;
        padding: 10px;
        text-align: left;
    }

    h1 {
        font-size: 36px;
        color: darkslategray;
        text-align: center;
    }

    p {
        font-style: italic;
        font-weight: bold;
        text-align: center;
    }
</style>
<h1>My Notice</h1>
<?php

if (!$conn) {
    die("Connection failed ");
}
$sql = "SELECT username, subject, description FROM massage";

$stmt = $conn->query($sql);

if ($stmt->rowCount() > 0) {
    echo "<table>";
    echo "<tr>";
    echo "<th>Name</th>";
    echo "<th>Subject</th>";
    echo "<th>Description</th>";
    echo "</tr>";
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        echo "<tr>";
        echo "<td>" . $row["username"] . "</td>";
        echo "<td>" . $row["subject"] . "</td>";
        echo "<td>" . $row["description"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "<p>0 results</p>";
}
// close the connection
$conn = null;
?>
