<?php 
require_once "vendor/autoload.php";



// Set the event dispatcher used by Eloquent models... (optional)
// use Illuminate\Events\Dispatcher;
// use Illuminate\Container\Container;


// instantiate
$loader = new Aura\Autoload\Loader;

// append to the SPL autoloader stack; use register(true) to prepend instead
$loader->register();

$loader->addPrefix('Fishli', 'fishli/src');
// $loader->addPrefix('Fishli', 'D:/Disk-code/wamp/www/study_in_php/composer_about/fishli/src');


use Illuminate\Database\Capsule\Manager;

use Fishli\Model\Wp_users;



$capsule = new Manager;

$capsule->addConnection([
    'driver'    => 'mysql',
    'host'      => 'localhost',
    'database'  => 'exuser',
    'username'  => 'root',
    'password'  => '135565',
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
]);

// $capsule->setEventDispatcher(new Dispatcher(new Container));

// Make this Capsule instance available globally via static methods... (optional)
// $capsule->setAsGlobal();

// Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher())
$capsule->bootEloquent();

// $users = Capsule::table('wp_users')->where('user_login', '=', 'vglove')->get();
// $all = Capsule::all();

// var_dump($all);

// var_dump($users);

// class Wp_users extends Illuminate\Database\Eloquent\Model {

// }

// $users = Wp_users::where('user_login', '=', 'vglove')->get();
$all = Wp_users::all();
foreach ($all as $key => $value) {
	# code...
	echo $value['user_login'].'-';
}
// dd($all);
// dd($users);
// var_dump($users);
