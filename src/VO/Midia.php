<?php
require_once 'Conteudo.php';

abstract class Midia extends Conteudo {
    private $link;
    
    // getter
    public function getLink() {
		return $this->link;
	}
	
    // setter
	public function setLink($link) {
		$this->link = $link;
	}
}
  
?>
