<?php
require_once 'includes/functions/functions.php';
$categories = getCategories();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Shoe Categories</title>
    <link rel="stylesheet" href="layout/css/style.css">
</head>
<body>
    <header>
        <h1>EM' Quality Shoes</h1>
        <!-- Navigation -->
    </header>
    <main>
        <section class="categories">
            <h2>Shoe Categories</h2>
            <div class="category-grid">
                <?php foreach ($categories as $category): ?>
                    <div class="category-item">
                        <h3><?php echo $category['name']; ?></h3>
                        <p><?php echo $category['description']; ?></p>
                        <a href="items_by_category.php?id=<?php echo $category['id']; ?>">View Shoes</a>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>
    </main>
    <footer>
        <!-- Footer content -->
    </footer>
</body>
</html>