<?php 
include 'db.php';
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Vendor Login Page</title>
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <meta name="format-detection" content="telephone=no">
    <meta name="description" content="Page description">
    <!--Twitter Card data-->
    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="@publisher_handle">
    <meta name="twitter:title" content="Page Title">
    <meta name="twitter:description" content="Page description less than 200 characters">
    <meta name="twitter:creator" content="@author_handle">
    <meta name="twitter:image" content="http://www.example.com/image.jpg">
    <!--Open Graph data-->
    <meta property="og:title" content="Title Here">
    <meta property="og:type" content="article">
    <meta property="og:url" content="http://www.example.com/">
    <meta property="og:image" content="http://example.com/image.jpg">
    <meta property="og:description" content="Description Here">
    <meta property="og:site_name" content="Site Name, i.e. Moz">
    <meta property="fb:admins" content="Facebook numeric ID">
    <link rel="apple-touch-icon" sizes="180x180" href="imgage/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="imgage/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="imgage/favicon-16x16.png">
    <link rel="manifest" href="imgage/site.webmanifest">
    <link rel="mask-icon" href="imgage/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <link href="https://fonts.googleapis.com/css?family=Karla:400,700&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" media="all" href="app.css">
  </head>
  <body>
    <div class="page page_login">
      <form class="form" action>
        <div class="form__container">
          <div class="logo"><img class="logo__pic" src="imgage/logo.svg" width="45"></div>
          <div class="fieldset">
            <div class="field"><input class="input" type="email" placeholder="E-mail address" required></div>
            <div class="field"><input class="input" type="password" placeholder="Password" required></div>
          </div><button class="btn">Sign in</button>
          <div class="text">Can’t remember your password? <a href="#">Recover it</a>.</div>
        </div>
        <div class="form__footer">Don't Have an Account? <a href="Vendorindex.php">Create it</a>.</div>
      </form>
    </div>
  </body>
</html>
