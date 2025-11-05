<?php
include "templates/header.php";
require_once "classes/Product.php";

if(!isset($_GET['id'])) {
    echo "Product havent found!"; // if product id didnt find it will show this message
    exit;
}


$productObj = new Product();
$product = $productObj->get($_GET['id']);
if(!$product) {
    echo "Product havent found!";
    exit;

}
?>

<main>
    <h1><?= $product['name'] ?></h1>
    <img src="images/<?= $product['image'] ?>" alt="<?= $product['name'] ?>">
    <p><?= $product['description'] ?></p>
    <p>Price: $<?= $product['price'] ?></p>
</main>

<?php include "templates/footer.php"; ?>