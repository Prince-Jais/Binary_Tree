<!DOCTYPE html>
<html>
<head>
    <title>Binary Tree Viewer</title>
    <style>
        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
        }

        li {
            margin-left: 20px;
            padding: 5px;
            border: 1px solid;
            background-color: azure;
            border-radius: 5px;
        }

        h1 {
            font-size: 24px;
            margin-bottom: 20px;
        }

        .tree {
            margin-left: 20px;
        }
    </style>
</head>
<body>

<?php
require("conn.php");

// Function to fetch and display tree nodes recursively
function displayTree($conn, $parent_id = 0) {
    // Fetch nodes with the given parent_id
    $sql = "SELECT * FROM tree WHERE p_id = $parent_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<ul class='tree'>";
        while ($row = $result->fetch_assoc()) {
            echo "<li>";
            echo $row["id"].":";
            echo $row["Name"];
            displayTree($conn, $row["id"]);
            echo "</li>";
        }
        echo "</ul>";
    }
}

echo "<h1>Binary Tree</h1>";
echo "<div>";
displayTree($conn); // Start displaying the tree from the root (parent_id = 0)
echo "</div>";

// Close the database connection
$conn->close();
?>

<a href="add_data.php">ADD DATA</a>

</body>
</html>