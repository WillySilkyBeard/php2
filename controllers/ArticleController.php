<?php

class ArticleController 
{
	public function indexAction() {
		$mArticle = new ArticleModel();
		$article = $mArticle->getAll();
		var_dump($article);
		die();
	}
	public function articleAction() {
		
	}
}
}