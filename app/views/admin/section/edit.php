<?php require VIEW_ROOT . '/admin/templates/header.php'; ?>

      <h2>Edit section</h2>

      <form action="<?= BASE_URL ?>/admin/section/edit.php" method="POST">
        <input type="hidden" name="id" value="<?= $section['id'] ?>">
        <div class="form-group">
          <label for="sort_id">Sort id</label>
          <input type="text" class="form-control" name="sort_id" id="sort_id" value="<?= $section['sort_id'] ?>">
        </div>
        <div class="form-group">
          <label for="title">Title</label>
          <input type="text" class="form-control" name="title" id="title" value="<?= $section['title'] ?>">
        </div>
        <div class="form-group">
          <label for="slug">Slug</label>
          <input type="text" class="form-control" name="slug" id="slug" value="<?= $section['slug'] ?>">
        </div>
        <button type="submit" class="btn btn-primary">Edit</button>
      </form>

<?php require VIEW_ROOT . '/admin/templates/footer.php'; ?>