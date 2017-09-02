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
        <?= isset($header) ? $header : '<h1> <a href="/"> Mon super Site </a> </h1> <p> Comment ça, il n\'y a presque rien ?</p> ' ?>
      </header>
      
      <nav>
      <?= isset($menu) ? $menu : 
        '<ul>
          <li><a href="/">Accueil</a></li>
          <?php if ($user->isAuthenticated()) { ?>
          <li><a href="/admin/">Admin</a></li>
          <li><a href="/admin/news-insert.html">Ajouter une news</a></li>
          <?php } ' ?>
        </ul>
      </nav>
      ?>
      <div id="content-wrap">

      <main>
      
        <section id="main">
          <?php if ($user->hasFlash()) echo '<p style="text-align: center;">', $user->getFlash(), '</p>'; ?>
          
          <?= $content ?>
        </section>

        </main>

        ?>

      </div>
    
      <footer></footer>
    </div>
  </body>
</html>