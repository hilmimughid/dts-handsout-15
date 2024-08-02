<?php
require 'connect_and_create_table.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filter Products</title>

    <!-- Bootstrap CSS-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container">
        <h3 class="text-center mb-4">Filter Products</h3>
        <div class="d-flex justify-content-between">
            <form action="filter_products.php" method="post" class="d-flex">
                <input type="number" min="0" name="min_price" class="form-control me-2" placeholder="Filter Harga Minimum">
                <button type="submit" class="btn btn-outline-primary"><i class="bi bi-search"></i></button>
            </form>
        </div>
        <table class="table table-bordered text-center">
            <tr>
                <th>Name</th>
                <th>Price</th>
            </tr>

            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['min_price'])) {
                $min_price = $_POST['min_price'];

                if (is_numeric($min_price) && $min_price >= 0) {
                    $sql = "SELECT * FROM products WHERE price > :min_price";
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute(['min_price' => $min_price]);

                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($row['name']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['price']) . "</td>";
                        echo "</tr>";
                    }

                    echo "</table>";
                } else {
                    echo '<div class="alert alert-danger">Masukkan harga minimum untuk menampilkan data</div> <br>';
                }
            } else {
                echo '<div class="alert alert-danger">Masukkan harga minimum untuk menampilkan data</div> <br>';
            }
            ?>
    </div>
</body>

</html>