<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Kasirku App</title>

    <!-- Bootstrap core CSS -->
    <?= link_tag($href='assets/css/bootstrap.min.css', $rel = 'stylesheet', $type='text/css') ?>


    <!-- Add custom CSS here -->
    <?= (isset($admin_css)) ? link_tag($href=base_url($admin_css), $rel = 'stylesheet', $type='text/css') : '' ?>
    <?= link_tag($href='assets/font-awesome/css/font-awesome.min.css', $rel = 'stylesheet', $type='text/css') ?>
  </head>

  <body>

    <div id="wrapper">