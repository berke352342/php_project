<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once 'classes/Product.php';
include "templates/header.php";

// start the product session
$product = new Product();


// get all the products
try {
    $products = $product->getAll();
} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}
?>

<main>
    <h1>Shop</h1>
      <div class="products">
     <?php foreach($products as $p): ?> <!-- it will show all products in shop page -->
        <div class="product-card">
            <a href="product.php?id=<?= $p['id'] ?>">
                <img src="images/<?= $p['image'] ?>" alt="<?= $p['name'] ?>">
                <h2><?= $p['name'] ?></h2>
                <p>$<?= $p['price'] ?></p>
            </a>
      </div>
    <?php endforeach; ?>
</div>

</main>

<?php include "templates/footer.php"; ?>