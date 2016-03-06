<?php require VIEW_ROOT . '/admin/templates/header.php'; ?>

      <h2>Edit Product</h2>

      <?php require VIEW_ROOT . '/templates/alerts.php'; ?>

      <form action="<?= BASE_URL ?>/admin/products/edit.php" method="POST" enctype='multipart/form-data'>
        <input type="hidden" class="form-control" name="id" value="<?= $product['id'] ?>">
        <div class="form-group">
          <label for="title">Title</label>
          <input type="text" class="form-control" name="title" id="title" value="<?= $product['title'] ?>">
        </div>
        <div class="form-group">
          <label for="slug">Slug</label>
          <input type="text" class="form-control" name="slug" id="slug" value="<?= $product['slug'] ?>">
        </div>
        <div class="form-group">
          <label for="categories">Categories</label>
          <select class="form-control" name="category_id" id="categories">
            <?php foreach ($section as $item) : ?>
              <optgroup label="<?= $item['title'] ?>">
                <?php $categories = get_categories($db, $item['id']); ?>
                <?php foreach ($categories as $category) : ?>
                  <?php if ($category['id'] == $product['category_id']) : ?>
                    <option value="<?= $category['id'] ?>" selected><?= $category['title'] ?></option>
                  <?php else : ?>
                    <option value="<?= $category['id'] ?>"><?= $category['title'] ?></option>
                  <?php endif; ?>
                <?php endforeach; ?>
              </optgroup>
            <?php endforeach; ?>
          </select>
        </div>
        <div class="form-group">
          <label>Images</label>
          <div class="row">
            <?php $images = unserialize($product['images']); ?>
            <?php for ($i = 0; $i < count($images); $i++) : ?>
              <div class="col-md-4">
                <img class="img-responsive" src="<?= BASE_URL . '/uploads/' . $product['path'] . '/' . $images[$i]['image'] ?>"><br>
              </div>
            <?php endfor; ?>
          </div>
        </div>
        <div class="form-group">
          <label for="company">Company</label>
          <input type="text" class="form-control" name="company" id="company" value="<?= $product['company'] ?>">
        </div>
        <div class="form-group">
          <label for="price">Price</label>
          <input type="number" class="form-control" name="price" id="price" value="<?= $product['price'] ?>">
        </div>
        <div class="form-group">
          <label for="count">Count</label>
          <input type="number" class="form-control" name="count" id="count" value="<?= $product['count'] ?>">
        </div>
        <div class="form-group">
          <label for="sort_id">Number</label>
          <input type="number" class="form-control" name="sort_id" id="sort_id" value="<?= $product['sort_id'] ?>">
        </div>
        <div class="form-group">
          <label for="description">Description</label>
          <textarea class="form-control" name="description" id="description" rows="10"><?= $product['description'] ?></textarea>
        </div>
        <div class="form-group">
          <label for="characteristic">Characteristic</label>
          <textarea class="form-control" name="characteristic" id="characteristic" rows="10"><?= $product['characteristic'] ?></textarea>
        </div>
        <div class="form-group">
          <label for="status">Status</label>
          <input type="number" class="form-control" name="status" id="status" value="<?= $product['status'] ?>">
        </div>
        <button type="submit" class="btn btn-primary">Edit</button>
      </form>

<?php require VIEW_ROOT . '/admin/templates/footer.php'; ?>
