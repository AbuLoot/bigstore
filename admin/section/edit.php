<?php

require '../../app/start.php';

if (!empty($_POST))
{
	$notifications = validate($_POST, [
		'id' => 'required',
		'title' => 'length-min:3|length-max:30'
	]);

	if (count($notifications) > 0)
	{
		$_SESSION['notifications'] = $notifications;

		header('Location: ' . $_SERVER['HTTP_REFERER']);
		die();
	}

	$sql = 'UPDATE section
			SET sort_id = :sort_id,
				title = :title,
				slug = :slug
			WHERE id = :id';

	$updateSection = $db->prepare($sql);
	$updateSection->execute([
		'id' => (int) $_POST['id'],
		'sort_id' => (int) $_POST['sort_id'],
		'title' => $_POST['title'],
		'slug' => (!empty($_POST['slug'])) ? strtolower($_POST['slug']) : strtolower(latinize($_POST['title'])),
	]);

	header('Location: ' . BASE_URL . '/admin/section/index.php');
}

if (!isset($_GET['id']))
{
	header('Location: ' . BASE_URL . '/admin/section/index.php');
	die();
}

$sql = 'SELECT id, sort_id, slug, title
		FROM section
		WHERE id = :id';

$section = $db->prepare($sql);
$section->execute(['id' => (int) $_GET['id']]);
$section = $section->fetch(PDO::FETCH_ASSOC);

require VIEW_ROOT . '/admin/section/edit.php';