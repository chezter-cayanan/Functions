<?php
declare(strict_types=1);

require "products.php";

$productCount = count($bottles);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Water Bottle Store</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="store">

    <header>
        <h1><?php echo $store; ?></h1>
        <p>Stay Hydrated, Stay Healthy!</p>
    </header>

    <div class="content">
        <h2>Products:</h2>
        <?php foreach ($bottles as $name => $price) { ?>
            <p>
                <?php echo htmlspecialchars($name); ?>:
                ₱<?php echo number_format($price, 2); ?>
                <?php
                if ($stock[$name] == 0) {
                    echo "- Sold Out";
                } elseif ($stock[$name] <= 10) {
                    echo "- Low Stock";
                } else {
                    echo "- Available";
                }
                ?>
            </p>
        <?php } ?>
        <h2>Special Offer</h2>

        <p>
            Plastic + Sports Water Bottle:
            ₱<?php echo number_format($total, 2); ?>
        </p>
        <p>
            Discount (10%):
            ₱<?php echo number_format($discount, 2); ?>
        </p>
        <p>
            Final Price:
            ₱<?php echo number_format($finalPrice, 2); ?>
        </p>

        <h2>Store Information</h2>
        <p>Total Products: <?php echo $productCount; ?></p>

        <h2>Discount Reminder</h2>

        <?php
        for ($i = 1; $i <= 3; $i++) {
            echo "<p>Buy water bottles and save 10%!</p>";
        }
        ?>
        <a href="stock.php" class="stock-link">
            View Stock Control
        </a>

    </div>

    <?php include "footer.php"; ?>

</div>

</body>
</html>
