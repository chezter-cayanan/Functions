<?php
declare(strict_types=1);

require "products.php";

$tax_rate = 20;

function get_reorder_message(int $stock): string {
    return $stock < 10 ? "Yes" : "No";
}

function get_total_value(float $price, int $quantity): float {
    return $price * $quantity;
}

function get_tax_due(
    float $price,
    int $quantity,
    int $tax_rate = 0
): float {
    return ($price * $quantity) * ($tax_rate / 100);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Water Bottle Store - Stock Control</title>
    <link rel="stylesheet" href="style.css?v=53">
</head>
<body>

<div class="store">

    <header>
        <h1><?php echo $store; ?></h1>
        <p>Stay Hydrated, Stay Healthy!</p>
    </header>

    <div class="content">

        <h2>Stock Control</h2>

        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>PRODUCT</th>
                        <th>STOCK</th>
                        <th>RE-ORDER</th>
                        <th>TOTAL VALUE</th>
                        <th>TAX DUE</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($bottles as $name => $price) { ?>
                        <tr>
                            <td><?php echo htmlspecialchars($name); ?></td>

                            <td><?php echo $stock[$name]; ?></td>

                            <td>
                                <?php echo get_reorder_message($stock[$name]); ?>
                            </td>

                            <td>
                                ₱<?php echo number_format(
                                    get_total_value(
                                        (float) $price,
                                        $stock[$name]
                                    ), 2
                                ); ?>
                            </td>

                            <td>
                                ₱<?php echo number_format(
                                    get_tax_due(
                                        (float) $price,
                                        $stock[$name],
                                        $tax_rate
                                    ), 2
                                ); ?>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

        <a href="index.php" class="stock-link">
            Back to Products
        </a>

    </div>

    <?php include "footer.php"; ?>

</div>

</body>
</html>
