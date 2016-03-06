<?php

require_once 'app/start.php';
require_once 'app/global.php';

if (empty($_GET['slug']))
{
	$page = false;
}
else
{
	$slug = clear_data($_GET['slug']);

	$sql = 'SELECT * FROM pages
			WHERE slug = :slug
			LIMIT 1';

	$page = $db->prepare($sql);
	$page->execute(['slug' => $slug]);
	$page = $page->fetch(PDO::FETCH_ASSOC);

	$meta_title = $page['meta_title'];
	$meta_description = $page['meta_description'];
}

require VIEW_ROOT . '/content/page-show.php';