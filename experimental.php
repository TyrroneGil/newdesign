<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagination Example</title>
    <style>
        .pagination {
            display: inline-block;
        }

        .pagination a {
            padding: 8px 16px;
            text-decoration: none;
            color: black;
            background-color: #f1f1f1;
            border: 1px solid #ddd;
        }

        .pagination a.active {
            background-color: #4CAF50;
            color: white;
            border: 1px solid #4CAF50;
        }

        .pagination a:hover:not(.active) {
            background-color: #ddd;
        }
    </style>
</head>
<body>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "yesthewebsite";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$limit = 3; // Number of items per page

$page = isset($_GET['page']) ? $_GET['page'] : 1;
$start = ($page - 1) * $limit;

$sql = "SELECT * FROM user_post LIMIT $start, $limit";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Display data
    echo "<ul>";
    while ($row = $result->fetch_assoc()) {
        echo "<li>" . $row["art_image"] . "</li>";
        // Add more columns as needed
    }
    echo "</ul>";

    // Pagination
    $sql = "SELECT COUNT(id) as total FROM user_post";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $total_pages = ceil($row["total"] / $limit);

    echo '<div class="pagination">';
    for ($i = 1; $i <= $total_pages; $i++) {
        $active = ($i == $page) ? "class='active'" : "";
        echo "<a $active href='?page=$i'>$i</a>";
    }
    echo '</div>';
} else {
    echo "0 results";
}

$conn->close();
?>

</body>
</html>