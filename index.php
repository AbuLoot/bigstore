<?php

require_once 'app/start.php';
require_once 'app/global.php';

// Get hot products
$sql = 'SELECT *
		FROM products
		WHERE status = 2
		LIMIT 12';

$hot_products = $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
$hot_products_chunk = array_chunk($hot_products, 4);

// Get new products
$sql = 'SELECT *
		FROM products
		WHERE status <> 0
		ORDER BY id DESC
		LIMIT 12';

$new_products = $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
$new_products_chunk = array_chunk($new_products, 4);

require VIEW_ROOT . '/content/main.php';