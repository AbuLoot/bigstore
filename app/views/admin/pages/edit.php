<?php require VIEW_ROOT . '/admin/templates/header.php'; ?>

      <h2>Edit Page</h2>

      <?php require VIEW_ROOT . '/templates/alerts.php'; ?>

      <form action="<?= BASE_URL ?>/admin/pages/edit.php" method="POST">
        <input type="hidden" name="id" value="<?= $page['id'] ?>">
        <div class="form-group">
          <label for="title">Title</label>
          <input type="text" class="form-control" name="title" id="title" value="<?= $page['title'] ?>">
        </div>
        <div class="form-group">
          <label for="slug">Slug</label>
          <input type="text" class="form-control" name="slug" id="slug" value="<?= $page['slug'] ?>">
        </div>
        <div class="form-group">
          <label for="meta_title">Meta title</label>
          <input type="text" class="form-control" name="meta_title" id="meta_title" value="<?= $page['meta_title'] ?>">
        </div>
        <div class="form-group">
          <label for="meta_description">Meta description</label>
          <input type="text" class="form-control" name="meta_description" id="meta_description" value="<?= $page['meta_description'] ?>">
        </div>
        <div class="form-group">
          <label for="content">Content</label>
          <textarea class="form-control" name="content" id="content" rows="10"><?= $page['content'] ?></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Edit</button>
      </form>

<?php require VIEW_ROOT . '/admin/templates/footer.php'; ?>