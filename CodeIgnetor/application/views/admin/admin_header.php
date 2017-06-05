<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Articles List</title>
    <?= link_tag('assets/css/bootstrap.min.css');?>
    <?= link_tag('assets/css/style.css');?>
  </head>
  <body>

    <nav class="navbar navbar-default">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Admin Panel</a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav navbar-right">
            <li><?= anchor('login/logout', 'Logout') ?></li>
          </ul>
        </div>
      </div>
    </nav>
