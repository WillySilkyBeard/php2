<?php

class ArticleController extends MainController
{
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

		$htmlGen = new HTMLGenerator($article);
		$htmlGen
		->wrapEachInP()
		->addTo(HTMLGenerator::getImg('./img/avatar.jpg'), 'p', 1, 1)
		->wrapAllInBox('wrapper');
		$article = $htmlGen->beautyText;

/*echo "<pre>";
var_dump($article);
echo "</pre>";
die();*/

		echo $this->render('view/article.php', [
			'article' => $article
		]);
	}
}