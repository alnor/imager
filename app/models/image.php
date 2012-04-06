<?php
class Image extends AppModel {
	
	private $img = array();
	
	function getImage($index){
		$this->getImagesFromDir();
		
		$result=array('index'=>$this->img[$index], 'id'=>$index);
		
		return $result;
	}
	
	function getImagesFromDir(){
		$dir = scandir("img");
		$this->img = array_slice($dir, 2);		
	}
	
	/*
	 * Метод увеличивает индекс
	 */
	
	function nextIndex($index){
		
		$this->getImagesFromDir();
		
		$ret = $index+1;

		if ($ret==count($this->img)):
			return $this->getImage(0);
		endif;
		
		return $this->getImage($ret);
	}
	
	/*
	 * Метод уменьшает индекс
	 */
	
	function prevIndex($index){
		
		$this->getImagesFromDir();
		
		$ret = $index-1;
		
		if ($ret<0):
			return $this->getImage(count($this->img)-1);
		endif;
		
		return $this->getImage($ret);
	}	
}
?>