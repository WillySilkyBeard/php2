<?php

class ArticleController 
{
	protected $get;
	public function __construct($get) {
		$this->get = $get;
	}

	public function indexAction() {
		$mArticle = new ArticleModel();
		$articles = $mArticle->getAll();

		echo $this->render('view/index.php', [
			'articles' => $articles
		]);
	}
	public function articleAction() {
		$mArticle = new ArticleModel();

		$id = $this->get['id'];

		$article = $mArticle->getById($id);

		echo $this->render('view/article.php', [
			'article' => $article
		]);
	}
	protected function render($filename, $values = array()) {
		extract($values);
		ob_start();
		include("$filename");
		return ob_get_clean();
	}
}