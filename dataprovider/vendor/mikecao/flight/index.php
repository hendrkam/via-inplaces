<?php
//require 'flight/Flight.php';
require 'vendor/autoload.php';

function hello(){
    echo 'hello world!';
}

Flight::route('/user/[0-9]+', function(){
    // This will match /user/1234
});

Flight::route('/', 'hello');
Flight::route('/categories', 'hello');
	/*
	Flight::route('/', function(){
		echo 'hello world...!';
	});

	Flight::route('/categories/', function(){
		echo 'categories!';
	});

	Flight::route('/categories/@id:[0-9]', function($id){
		echo "hello, ($id)!";
	});
	*/

Flight::start();
?>
