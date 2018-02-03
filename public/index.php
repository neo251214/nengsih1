<?php 
	use src\setting;
	use src\route;
	use src\event;

	require '../vendor/autoload.php';
	require '../autoload.php';
	
	$app = new \Slim\App();

	(new route())->register($app);
	
	$app->run();
 ?>