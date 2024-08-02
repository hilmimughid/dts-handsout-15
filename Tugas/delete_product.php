<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Products</title>

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

        $sql = 'DELETE FROM products WHERE id = :id';
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['id' => $id]);

        echo '<div class="alert alert-success">Data berhasil dihapus</div>';
    }
    ?>

    <div class="container">
        <h1 class="text-center">Form Delete Products</h1>
        <form action="delete_product.php" method="post">
            <label for="id" class="form-label">ID</label>
            <input type="text" class="form-control" name="id">

            <button type="submit" class="btn btn-primary mt-3">Submit</button>
        </form>
    </div>
</body>

</html>