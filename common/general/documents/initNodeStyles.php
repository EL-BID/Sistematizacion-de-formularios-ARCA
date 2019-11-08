<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace common\general\documents;

/**
 * Description of InitNodeStyles
 *
 * @author asus1
 */
class initNodeStyles implements \IInitNode {
    
        
	function initNode($tagName, $attributes) {
            
            
		if(($tagName == 'p' || $tagName == 'h1'  || $tagName == 'table' ) && isset($attributes['class']) && $attributes['class'] == 'center') {
                            $p = new \PCompositeNode();
                            $p->addPNodeStyle(new \AlignNode(\AlignNode::TYPE_CENTER) );
                            $r->addTextStyle(new \BoldStyleNode());
			    $r->addTextStyle(new \FontSizeStyleNode(16));
			    $r = new \RCompositeNode();
			    $p->addNode($r); 
			    return $p;
		}
                if(($tagName == 'p' || $tagName == 'h1'  || $tagName == 'table' || $tagName == 'div' ) && isset($attributes['class']) && $attributes['class'] == 'parrafo') {
                            $p = new \PCompositeNode();
                             $p->addPNodeStyle(new \AlignNode(\AlignNode::TYPE_BOTH) );
			    $r = new \RCompositeNode();
			    $p->addNode($r); 
			    return $p;
		}
                if(($tagName == 'p' || $tagName == 'h1'  || $tagName == 'table'  || $tagName == 'div' ) && isset($attributes['class']) && $attributes['class'] == 'centerb') {
                            $p = new \PCompositeNode();
                             $p->addPNodeStyle(new \AlignNode(\AlignNode::TYPE_CENTER) );
			    $r = new \RCompositeNode();
			    $p->addNode($r); 
			    $r->addTextStyle(new \BoldStyleNode());
			    return $p;
		}
               if($tagName == 'div' && isset($attributes['class']) && $attributes['class'] == 'titulo') {
                            $p = new \PCompositeNode();
			    $r = new \RCompositeNode();
			    $p->addNode($r); 
			    $r->addTextStyle(new \BoldStyleNode());
			    $r->addTextStyle(new \FontSizeStyleNode(16));  
			    return $p;
		}
                if(isset($attributes['style'])) {
 			$style = $this->parseStyle($attributes['style']);
			$fontSize = isset($style['font-size']) ? intval($style['font-size']) : 12; 	
			$p = new \PCompositeNode();
			$r = new \RCompositeNode();
			$p->addNode($r);  
			$r->addTextStyle(new \FontSizeStyleNode(   $fontSize ));  
			return $p;
		}
		return NULL;
	}
        
        private function parseStyle($strCss) {
		$styles = [];
		$pairs = explode(';', $strCss);	
		foreach($pairs as $pair) {
			if(strpos($pair, ':') !== false) {
				list($name, $value) = explode(':', $pair);
				$styles[trim($name)] = trim($value);
			}
		}	
		return $styles;
        }
}
