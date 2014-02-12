<?php
if (!defined('PHP_VERSION_ID') || PHP_VERSION_ID < 50300)
	die('PHP ActiveRecord requires PHP 5.3 or higher');

define('PHP_ACTIVERECORD_VERSION_ID','1.0');

if (!defined('PHP_ACTIVERECORD_AUTOLOAD_PREPEND'))
	define('PHP_ACTIVERECORD_AUTOLOAD_PREPEND',true);

require __DIR__.'/activerecored/Singleton.php';
require __DIR__.'/activerecored/Config.php';
require __DIR__.'/activerecored/Utils.php';
require __DIR__.'/activerecored/DateTime.php';
require __DIR__.'/activerecored/Model.php';
require __DIR__.'/activerecored/Table.php';
require __DIR__.'/activerecored/ConnectionManager.php';
require __DIR__.'/activerecored/Connection.php';
require __DIR__.'/activerecored/Serialization.php';
require __DIR__.'/activerecored/SQLBuilder.php';
require __DIR__.'/activerecored/Reflections.php';
require __DIR__.'/activerecored/Inflector.php';
require __DIR__.'/activerecored/CallBack.php';
require __DIR__.'/activerecored/Exceptions.php';
require __DIR__.'/activerecored/Cache.php';

if (!defined('PHP_ACTIVERECORD_AUTOLOAD_DISABLE'))
	spl_autoload_register('activerecord_autoload',false,PHP_ACTIVERECORD_AUTOLOAD_PREPEND);

function activerecord_autoload($class_name)
{
	$path = ActiveRecord\Config::instance()->get_model_directory();
	$root = realpath(isset($path) ? $path : '.');

	if (($namespaces = ActiveRecord\get_namespaces($class_name)))
	{
		$class_name = array_pop($namespaces);
		$directories = array();

		foreach ($namespaces as $directory)
			$directories[] = $directory;

		$root .= DIRECTORY_SEPARATOR . implode($directories, DIRECTORY_SEPARATOR);
	}

	$file = "$root/$class_name.php";

	if (file_exists($file))
		require_once $file;
}
?>
