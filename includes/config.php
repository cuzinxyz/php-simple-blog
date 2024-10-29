<?php
ob_start();
session_start();

//database credentials
define('DBHOST', 'localhost');
define('DBUSER', 'root');
define('DBPASS', '');
define('DBNAME', 'php_simple_blog');

//set timezone
date_default_timezone_set('Asia/Ho_Chi_Minh');

//load classes as needed
spl_autoload_register(function ($class) {

   $class = strtolower($class);

   //if call from within assets adjust the path
   $classpath = 'classes/class.' . $class . '.php';
   if (file_exists($classpath)) {
      require_once $classpath;
   }

   //if call from within admin adjust the path
   $classpath = '../classes/class.' . $class . '.php';
   if (file_exists($classpath)) {
      require_once $classpath;
   }

   //if call from within admin adjust the path
   $classpath = '../../classes/class.' . $class . '.php';
   if (file_exists($classpath)) {
      require_once $classpath;
   }
});

try {
   $db = new PDO("mysql:host=" . DBHOST . ";port=3306;dbname=" . DBNAME, DBUSER, DBPASS);
   $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
   echo "There is no connection to the database.";
   File::createFile('debug.log', $e->getMessage());
   die();
   return;
}

$user = new User($db ?? null);
