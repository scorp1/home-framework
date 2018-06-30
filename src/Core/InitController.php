<?php

namespace Otus\Core;

class InitController
{
	private $router;

	public function __construct()
	{
		$this->router = $router;
	}

	public function initial($router)
	{
		if(isset($router)){
			$array=explode('=',$router);
			$this->router = $array[0];
			switch ($this->router) {
				case 'genres': 
					
					break;
				
				default:
					# code...
					break;
			}
		}else{
			"Hello";
		}
	}
}