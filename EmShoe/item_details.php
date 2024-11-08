<?php
require_once 'includes/functions/functions.php';
$id = $_GET['id'];
$product = getProductById($id);
?>
<!DOCTYPE html>
<html>
<head>
    <title><?php echo $product['name']; ?></title>
    <link rel="stylesheet" href="layout/css/style.css">
</head>
<body>
    <header>
        <h1>EM' Quality Shoes</h1>
        <!-- Navigation -->
    </header>
    <main>
        <section class="product-details">
            <h2><?php echo $product['name']; ?></h2>
            <img src="<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>">
            <p><?php echo $product['description']; ?></p>
            <p>Price: <?php echo $product['price']; ?></p>
            <p>Stock: <?php echo $product['stock']; ?></p>
            <!-- Add "Add to Cart" button if you have a shopping cart system -->
            <!-- Add a section for user reviews/comments if applicable -->
        </section>
    </main>
    <footer>
        <!-- Footer content -->
    </footer>
</body>
</html>