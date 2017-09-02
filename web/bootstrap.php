<?php
const DEFAULT_APP = 'Frontend';

// Si l'application n'est pas valide, on va charger l'application par défaut qui se chargera de générer une erreur 404
if (!isset($_GET['app']) || !file_exists(__DIR__.'/../app/'.$_GET['app'])) $_GET['app'] = DEFAULT_APP;

// On commence par inclure la classe nous permettant d'enregistrer nos autoload
require __DIR__.'/../lib/Kolon/SplClassLoader.php';

/*require __DIR__.'/../vendor/twig/twig/lib/Twig/Autoloader.php';

Twig_Autoloader::register();

$loader = new Twig_Loader_Filesystem(array('/../app\Frontend\Templates', 
	        '/../app\Frontend\Modules\News\Views',
	        '/../app\Frontend\Modules\Kolon\Views',
	        '/../app\Backend\Templates',
	        '/../app\Backend\Modules\Connexion\Views',
	        '/../app\Backend\Modules\News\Views'));

$twig = new Twig_Environment($loader); */

// On va ensuite enregistrer les autoloads correspondant à chaque vendor (OCFram, App, Model, etc.)
$OCFramLoader = new SplClassLoader('Kolon', __DIR__.'/../lib');
$OCFramLoader->register();

$appLoader = new SplClassLoader('app', __DIR__.'/..');
$appLoader->register();

$modelLoader = new SplClassLoader('Model', __DIR__.'/../lib/vendors');
$modelLoader->register();

$entityLoader = new SplClassLoader('Entity', __DIR__.'/../lib/vendors');
$entityLoader->register();

$formBuilderLoader = new SplClassLoader('FormBuilder', __DIR__.'/../lib/vendors');
$formBuilderLoader->register();

$twig = new SplClassLoader('vendor',__DIR__.'/..');
$twig->register();
// Il ne nous suffit plus qu'à déduire le nom de la classe et à l'instancier
$appClass = 'app\\'.$_GET['app'].'\\'.$_GET['app'].'Application';

$app = new $appClass;
$app->run();