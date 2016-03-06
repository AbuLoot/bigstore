<?php

require '../../app/start.php';

if (!empty($_POST))
{
	$notifications = validate($_POST, [
		'title' => 'length-min:3|length-max:30'
	]);

	if (count($notifications) > 0)
	{
		$_SESSION['notifications'] = $notifications;

		header('Location: ' . $_SERVER['HTTP_REFERER']);
		die();
	}

	$sql = 'INSERT INTO section (sort_id, title, slug)
			VALUES (:sort_id, :title, :slug)';

	$insertSection = $db->prepare($sql);
	$insertSection->execute([
		'sort_id' => (int) $_POST['sort_id'],
		'title' => $_POST['title'],
		'slug' => (!empty($_POST['slug'])) ? strtolower($_POST['slug']) : strtolower(latinize($_POST['title']))
	]);

	header('Location: ' . BASE_URL . '/admin/section/index.php');
}

require VIEW_ROOT . '/admin/section/add.php';