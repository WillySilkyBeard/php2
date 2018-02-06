<?php

abstract class MainController 
{
	protected $get;
	protected $post;

	public function __construct(array $get, array $post) {
		$this->get = $get;
		$this->post = $post;
	}

	protected function render($filename, $values = array()) {
		extract($values); // разбирает массив на переменные с названием их как ключи массива
		ob_start();
		include("$filename");
		return ob_get_clean();
	}
}