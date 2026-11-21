<?php

$store = "Water Bottle Store";

$bottles = [
    "Plastic Water Bottle" => 20,
    "Glass Water Bottle" => 50,
    "Sports Water Bottle" => 100,
    "Softdrinks" => 150,
    "Energy Drink" => 200,
    "Chocolate Drink" => 80
];

$stock = [
    "Plastic Water Bottle" => 15,
    "Glass Water Bottle" => 8,
    "Sports Water Bottle" => 0,
    "Softdrinks" => 12,
    "Energy Drink" => 6,
    "Chocolate Drink" => 20
];

$total = $bottles["Plastic Water Bottle"] +
         $bottles["Sports Water Bottle"];

$discount = $total * 0.10;
$finalPrice = $total - $discount;
