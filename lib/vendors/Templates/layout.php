<!DOCTYPE html>
<html>
  <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="/css/main.css">

    <title>
      <?= isset($title) ? $title : 'Mon super site' ?>

    </title>

  </head>

  <body>
    <div id="wrap">
      <header>
       <h1 id="logo"> <a href="/" > <img src="/../images/logo.jpg"> </a> </h1>
       <h4 id="library"> <a href="library"> LIBRARY <span class="_arrow"> < </span></a> </h4>
       <form method="GET" action="search.php" role="search" data-search="courses" id="search">
       <label for="search"></label> <input type="search" name="search" placeholder="search for courses"/>
       <input type="submit" value="Sea"/>
       </form>

       <ul id="connexion">

       <?php if ($user->isAuthenticated()) { ?>
          <li> <a href="instructor"> Become an Instructor </a> </li>
          <li> <a href="/admin/logout.php"> Log out </a> </li>
          <?php } else  { ?>
          <li> <a href="/admin/"> Sign In </a> </li>
          <li> <a href="admin/register"> Sign Up </a> </li>
          <?php } ?>
       </ul>
       <?= isset($header) ? $header : ''?>
      </header>

      <div id="wrapper">

      <nav>

     <?= isset($menu) ? $menu : ' ' ?>

     </nav>

      <main>

       <?= isset($content ? $content : ' ') ?>

        </main>

      </div>

      <footer>
        <ul>
            <li> <a href=""> @Copyright </a> </li>
            <li> <a href=""> @Copyright </a> </li>
            <li> <a href=""> @Copyright </a> </li>
            <li> <a href=""> @Copyright </a> </li>
            <li> <a href=""> @Copyright </a> </li>
            <li> <a href=""> @Copyright </a> </li>
            <li> <a href=""> @Copyright </a> </li>
        </ul>
      </footer>
    </div>
    <script src="/js/stylesheet.js"></script>
  </body>
</html>
