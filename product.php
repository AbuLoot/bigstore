<?php

require_once 'app/start.php';
require_once 'app/global.php';

if (empty($_GET['category_id']) OR empty($_GET['id']))
{
	$category = false;
	$product = false;
}
else
{
	$category_id = clear_data($_GET['category_id']);

	$sql = 'SELECT * FROM categories
			WHERE id = :id';

	$category = $db->prepare($sql);
	$category->execute(['id' => $category_id]);
	$category = $category->fetch(PDO::FETCH_ASSOC);

	// Get products of category
	$product_id = clear_data($_GET['id']);

	$sql = 'SELECT * FROM products
			WHERE id = :id';

	$product = $db->prepare($sql);
	$product->execute(['id' => $product_id]);
	$product = $product->fetch(PDO::FETCH_ASSOC);

	$meta_title = $category['meta_title'];
	$meta_description = $category['meta_description'];
}

require VIEW_ROOT . '/content/product-show.php';