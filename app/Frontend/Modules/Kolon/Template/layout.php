<!DOCTYPE html>
<html>
  <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="/css/main.css">
        <link rel="stylesheet" type="text/css" href="/css/content-stylesheet.css">
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
          <li> <a href="/admin/become-instructor/"> Become an Instructor </a> </li>
          <li> <a href="/admin/logout/"> Log out </a> </li>
          <?php } else  { ?>
          <li> <a href="/admin/"> Sign In </a> </li>
          <li> <a href="/admin/register/"> Sign Up </a> </li>
          <?php } ?>
       </ul>
       <?= isset($header) ? $header : ''?>
      </header>

      <div id="wrapper">
      
      <nav>

     <ul id="menu">

<li> <a href="/web"> Web development </a> </li>
<li> <a href="/web"> Programming </a> </li>
<li> <a href="/web"> Design </a> </li>
<li> <a href="/web"> Database </a> </li>
<li> <a href="/web"> Web development </a> </li>
<li> <a href="/web"> Web development </a> </li>
<li> <a href="/web"> Web development </a> </li>
<li> <a href="/web"> Web development </a> </li>
<li> <a href="/web"> Web development </a> </li>
<li> <a href="/web"> Web development </a> </li>


</ul>

     </nav>

      <main>

       <div id="google_add">

     </div>

       
       <ul>
       <li class="_courses"> 

       <a href="#" class="_courses_links">
       <img src="/images/html_prod.jpg"/>
       <p> Begin Creating your website with HTML5 and CSS3 </p>
       <p> Ibrahima Sory Sow </p>
       <p> Instructor </p>
       </a>
       </li>

       <li class="_courses"> 

       <a href="#" class="_courses_links">
       <img src="/images/php_prod.jpg"/>
       <p> SALUT LES ZEROS </p>

       </a>
       </li>

       <li class="_courses">

        <a href="#" class="_courses_links">
       <img src="/images/javascript_prod.jpg"/>
       <p> SALUT LES ZEROS </p>

       </a>
       </li>

       <li class="_courses">

        <a href="#" class="_courses_links">
       <img src="/images/java_prod.jpg"/>
       <p> SALUT LES ZEROS </p>

       </a>
       </li>
       </ul>


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
        </ul>
      </footer>
    </div>
  </body>
</html>