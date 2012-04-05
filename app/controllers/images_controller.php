<?php

/*
 * Контроллер Images
 * 
 */

class ImagesController extends AppController{
	
	var $uses = array('Image');
	var $img=array();
	
	/*
	 * Конструктор сканирует директорию и записывает содержимое в массив
	 */
	
	function __construct(){
		$dir = scandir("img");
		$this->img = array_slice($dir, 2);		
		parent::__construct();
	}
	
	/*
	 * Индексная страница устанавливает по умолчанию 1 картинку из массива
	 */
	
	function index(){			
		$this->set(array('image'=>$this->img[0], "id"=>0));
	}	
	
	/*
	 * Метод nextImage() вызывается посредством ajax
	 * Увеличивает индекс на 1 и возвращает в отображение следующую картинку из массива
	 * Если индекс больше кол-ва элементов в массиве, то возвращается 1-ая
	 */
	
	function nextImage(){
		$this->layout="ajax";
		
		if ($this->data):
			$index = $this->nextIndex($this->data["index"]);
			$this->set(array('image'=>$this->img[$index], "id"=>$index));
			$this->render("index");
		endif;	
	}
	
	/*
	 * Метод prevImage() вызывается посредством ajax
	 * Уменьшает индекс на 1 и возвращает в отображение предыдущую картинку из массива
	 * Если индекс меньше 0, то возвращается последняя
	 */
	
	function prevImage(){
		$this->layout="ajax";
		
		if ($this->data):
			$index = $this->prevIndex($this->data["index"]);
			$this->set(array('image'=>$this->img[$index], "id"=>$index));
			$this->render("index");
		endif;	
	}	
	
	/*
	 * Метод увеличивает индекс
	 */
	
	private function nextIndex($index){
		$ret = $index+1;
		
		if ($ret==count($this->img)):
			return 0;
		endif;
		
		return $ret;
	}
	
	/*
	 * Метод уменьшает индекс
	 */
	
	private function prevIndex($index){
		$ret = $index-1;
		
		if ($ret<0):
			return count($this->img)-1;
		endif;
		
		return $ret;
	}	
}

?>