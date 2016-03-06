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

	$sql = 'UPDATE categories
			SET sort_id = :sort_id,
				section_id = :section_id,
				title = :title,
				slug = :slug,
				meta_title = :meta_title,
				meta_description = :meta_description,
				content = :content
			WHERE id = :id';

	$updateCategory = $db->prepare($sql);
	$updateCategory->execute([
		'id' => (int) $_POST['id'],
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

if (!isset($_GET['id']))
{
	header('Location: ' . BASE_URL . '/admin/categories/index.php');
	die();
}

$sql = 'SELECT id, sort_id, section_id, slug, title, meta_title, meta_description, content
		FROM categories
		WHERE id = :id';

$category = $db->prepare($sql);
$category->execute(['id' => (int) $_GET['id']]);
$category = $category->fetch(PDO::FETCH_ASSOC);

$sql = 'SELECT id, title
		FROM section';

$section = $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);

require VIEW_ROOT . '/admin/categories/edit.php';