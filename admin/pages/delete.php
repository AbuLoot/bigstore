<?php

require '../../app/start.php';

if (isset($_GET['id']))
{
	$sql = 'DELETE FROM pages
			WHERE id = :id';

	$deletePage = $db->prepare($sql);
	$deletePage->execute(['id' => (int) $_GET['id']]);
}

header('Location: ' . BASE_URL . '/admin/pages/index.php');
