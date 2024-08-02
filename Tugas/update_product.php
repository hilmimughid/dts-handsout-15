<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Products</title>

    <!-- Bootstrap CSS-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <?php
    require 'connect_and_create_table.php';
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = $_POST['id'];
        $price = $_POST['price'];

        $sql = "UPDATE products SET price = :price WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['price' => $price, 'id' => $id]);

        echo '<div class="alert alert-success">Data berhasil diupdate</div>';
    }
    ?>

    <div class="container">
        <h1 class="text-center">Form Update Products</h1>
        <form action="update_product.php" method="post">
            <label for="id" class="form-label">ID</label>
            <input type="text" class="form-control" name="id">

            <label for="price" class="form-label">Price</label>
            <input type="text" class="form-control" name="price">

            <button type="submit" class="btn btn-primary mt-3">Submit</button>
        </form>
    </div>
</body>

</html>