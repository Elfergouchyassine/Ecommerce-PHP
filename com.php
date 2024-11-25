<?php
session_start();
$products = json_decode(
    file_get_contents("./products.json")
    )    
;


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DDEV</title>
    <link rel="stylesheet" href="https://bootswatch.com/5/darkly/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>
    <div class="container pt-4">
        <h1>Products</h1>
        <table class="table table-stripped table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>TITLE</th>
                    <th>QTE</th>
                    <th>PRICE</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($products as  $product) : ?>
                    <tr id="<?= 'produit_' . $product->id ?>">
                        <td><?= $product->id ?></td>
                        <td><?= $product->title ?></td>
                        <td><input type="number" class="form-control text-end" value="1"></td>
                        <td><?= $product->price ?></td>
                        <td><button class="btn btn-primary"
                        onclick="add(<?= $product->id ?>)"
                        ><i class="bi bi-basket"></i> </button></td>
                    </tr>
                <?php endforeach?>
            </tbody>
        </table>
        <pre>
            <?php print_r($_SESSION) ?>
            <!-- <?php print_r($products) ?> -->
        </pre>
    </div>

    <script>
        function add(id) {
            const qte = document.querySelector('#produit_' + id + ' input').value
            // location.href = `/addToCart.php?id=${id}&qte=${qte}` 
            fetch(`/addToCart.php?id=${id}&qte=${qte}`)
            .then(r => r.text())
            .then(console.log) 
        }
    </script>
</body>
</html>