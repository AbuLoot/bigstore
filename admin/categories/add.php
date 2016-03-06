<?php

require '../../app/start.php';

if (!empty($_POST))
{
	$notifications = validate($_POST, [
		'title' => 'length-min:3|length-max:30',
		'section_id' => 'required'
	]);

	if (count($notifications) > 0)
	{
		$_SESSION['notifications'] = $notifications;

		header('Location: ' . $_SERVER['HTTP_REFERER']);
		die();
	}

	$sql = 'INSERT INTO categories (sort_id, section_id, title, slug, meta_title, meta_description, content)
			VALUES (:sort_id, :section_id, :title, :slug, :meta_title, :meta_description, :content)';

	$insertCategory = $db->prepare($sql);
	$insertCategory->execute([
		'sort_id' => (int) $_POST['sort_id'],
		'section_id' => (int) $_POST['section_id'],
		'title' => $_POST['title'],
		'slug' => (!empty($_POST['slug'])) ? strtolower($_POST['slug']) : strtolower(latinize($_POST['title'])),
		'meta_title' => $_POST['meta_title'],
		'meta_description' => $_POST['meta_description'],
		'content' => $_POST['content']
	]);

	header('Location: ' . BASE_URL . '/admin/categories/index.php');
}

$sql = 'SELECT id, title
		FROM section';

$section = $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);

require VIEW_ROOT . '/admin/categories/add.php';