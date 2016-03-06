<?php require VIEW_ROOT . '/admin/templates/header.php'; ?>

      <p class="text-right"><a class="btn btn-success" href="<?= BASE_URL ?>/admin/pages/add.php">Add page</a></p>

      <?php if (empty($pages)) : ?>
        <p>No pages at the moment</p>
      <?php else : ?>
        <table class="table">
          <thead>
            <tr>
              <th>Title</th>
              <th>Slug</th>
              <th colspan="2">Functions</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($pages as $page) : ?>
              <tr>
                <td><a href="#"><?= $page['title'] ?></a></td>
                <td><?= $page['slug'] ?></td>
                <td><a href="<?= BASE_URL ?>/admin/pages/edit.php?id=<?= $page['id'] ?>">Edit</a></td>
                <td><a href="<?= BASE_URL ?>/admin/pages/delete.php?id=<?= $page['id'] ?>">Delete</a></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      <?php endif; ?>

<?php require VIEW_ROOT . '/admin/templates/footer.php'; ?>