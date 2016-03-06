<?php require VIEW_ROOT . '/admin/templates/header.php'; ?>

      <p class="text-right"><a class="btn btn-success" href="<?= BASE_URL ?>/admin/products/add.php">Add product</a></p>

      <?php if (empty($products)) : ?>
        <p>No products at the moment</p>
      <?php else: ?>
        <table class="table">
          <thead>
            <tr>
              <th>Title</th>
              <th>Slug</th>
              <th>Category</th>
              <th colspan="2">Functions</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($products as $product) : ?>
              <tr>
                <td><a href="#"><?= $product['title'] ?></a></td>
                <td><?= $product['slug'] ?></td>
                <td><?= $product['category_title'] ?></td>
                <td><a href="<?= BASE_URL ?>/admin/products/edit.php?id=<?= $product['id'] ?>">Edit</a></td>
                <td><a href="<?= BASE_URL ?>/admin/products/delete.php?id=<?= $product['id'] ?>">Delete</a></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      <?php endif; ?>

<?php require VIEW_ROOT . '/admin/templates/footer.php'; ?>
