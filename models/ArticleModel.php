<?php

class ArticleModel
{
	public function getAll() {
		return scandir('data');
	}
	public function articleAction() {
		
	}
}
}