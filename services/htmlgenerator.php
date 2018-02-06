<?php 


class HTMLGenerator 
{

	const END_LINE = "\n";

	public $beautyText;
	private $text;

	public function __construct($text) 
	{
		$this->text = $text;
	}

	public function wrapEachInP() {
		$arr = $this->explodeText($this->text);
		$t = '';
		foreach ($arr as $p) {
			$t .= "<p>$p</p>";
		}
		$this->beautyText = $t;

		return $this;
	}

	public function addTo($html, $tag, $number = null, $where = 0) {
		$tags = $this->findByTag($tag, $number);
		
		$this->beautyText = str_replace($tags[$where], $html.$tags[$where], $this->beautyText);

		return $this;
	}

	public function findByTag($tag, $pos = null)
	{
		preg_match_all("#<$tag*>(.*?)</$tag>#", $this->beautyText, $match);

		if (isset($pos) && $pos > 0) {
			$match[0] = $match[0][$pos - 1];
			$match[1] = $match[1][$pos - 1];
		}

		return $match;
	}

	public function wrapAllInBox($class = '') {
		$class = $class === '' ? '' : "class='$class'";
		$this->beautyText = "<div $class>{$this->beautyText}</div>";
		return $this;
	}

	public function addTextToTop($text) {
		$this->beautyText = $text . $this->beautyText;
		return $this;
	}

	public static function getTitle($text, $level = '1') {
		
		return "<h$level>$text</h$level>";
	}
	public static function getImg($path) {
		
		return "<img src=".$path.">";
	}
	private function explodeText($text) {
		$_text = explode("\n", $text);
		$res = [];
		foreach ($_text as $p) {
			if($p != '') {
				$res[] = $p;
			}
		}
		return $res;
	}
}