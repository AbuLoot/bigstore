<?php

require '../../app/start.php';

$sql = 'SELECT products.id, products.title, products.slug, products.status, categories.title as category_title
		FROM products
		LEFT JOIN categories ON categories.id = products.category_id';

$products = $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);

require VIEW_ROOT . '/admin/products/index.php';