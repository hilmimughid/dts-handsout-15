<?php
require 'connect_and_create_table.php';

$sql = "SELECT * FROM products";
$stmt = $pdo->query($sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Read Products</title>

    <!-- Bootstrap CSS-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container">
        <h3 class="text-center mb-4">Read Products</h3>
        <table class="table table-bordered text-center">
            <tr>
                <th>Name</th>
                <th>Price</th>
            </tr>

            <?php
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row['name']) . "</td>";
                echo "<td>" . htmlspecialchars($row['price']) . "</td>";
                echo "</tr>";
            }

            echo "</table>";
            ?>
    </div>
</body>

</html>