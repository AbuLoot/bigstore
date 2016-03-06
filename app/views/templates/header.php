<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BigStore <?php if (isset($meta_title)) echo $meta_title; ?></title>
    <meta name="author" content="issayev.adilet@gmail.com">
    <meta name="description" content="<?php if (isset($meta_description)) echo $meta_description; ?>">

    <link href="bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="bower_components/bootstrap/dist/css/bootstrap-theme.min.css" rel="stylesheet">
    <link href="bower_components/bootstrap/dist/css/styles.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body><br>

    <!-- Menu pages -->
    <nav>
      <div class="container">
        <?php if (empty($global_pages)) : ?>
          <p>Sorry, no pages at the moment.</p>
        <?php else: ?>
          <ul class="list-inline pull-left">
            <li><a href="<?= BASE_URL ?>">Main</a></li>
            <?php foreach ($global_pages as $global_page) : ?>
              <li><a href="<?= BASE_URL ?>/page.php?slug=<?= $global_page['slug'] ?>"><?= $global_page['title'] ?></a></li>
            <?php endforeach; ?>
          </ul>
        <?php endif; ?>
        <p class="pull-right hidden-xs">
          <span>+7 (123) 456-7890</span>,
          <span>+7 (123) 456-7890</span>
        </p>
      </div>
    </nav>

    <!-- Content -->
    <div class="container">

      <header class="row">
        <div class="col-md-9">
          <div class="clearfix"></div>
          <h1 class="logo"><a href="<?= BASE_URL ?>">BigStore</a></h1>
        </div>
        <div class="col-md-3"><br>
          <form action="<?= BASE_URL ?>/search.php" method="get">
            <div class="input-group">
              <input type="text" class="form-control" name="keywords" placeholder="Search">
              <span class="input-group-btn">
                <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
              </span>
            </div>
          </form>
        </div>
      </header>

      <!-- Catalog -->
      <nav class="navbar navbar-default">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-catalog">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"><span class="glyphicon glyphicon-globe"></span></a>
          </div>

          <div class="collapse navbar-collapse" id="navbar-catalog">
            <ul class="nav navbar-nav">
              <?php foreach ($global_section as $global_item) : ?>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?= $global_item['title'] ?> <span class="caret"></span></a>
                  <?php $global_categories = get_categories($db, $global_item['id']); ?>
                  <ul class="dropdown-menu">
                    <?php foreach ($global_categories as $global_category) : ?>
                      <li><a href="<?= BASE_URL ?>/category.php?slug=<?= $global_category['slug'] ?>"><?= $global_category['title'] ?></a></li>
                    <?php endforeach; ?>
                  </ul>
                </li>
              <?php endforeach; ?>
            </ul>
          </div>
        </div>
      </nav>
