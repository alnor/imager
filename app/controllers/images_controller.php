<?php

/*
 * Контроллер Images
 */

class ImagesController extends AppController{
	
	var $uses = array('Image');
	
	/*
	 * Индексная страница устанавливает по умолчанию 1 картинку из массива
	 */
	
	function index(){	
		$ret = $this->Image->getImage(0);				
		$this->set(array('image'=>$ret['index'], "id"=>$ret['id']));
	}	
	
	/*
	 * Метод nextImage() вызывается посредством ajax
	 * Увеличивает индекс на 1 и возвращает в отображение следующую картинку из массива
	 * Если индекс больше кол-ва элементов в массиве, то возвращается 1-ая
	 */
	
	function nextImage(){
		$this->layout="ajax";
		
		if ($this->data):
			$ret = $this->Image->nextIndex($this->data["index"]);
			$this->set(array('image'=>$ret['index'], "id"=>$ret['id']));
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
			$ret = $this->Image->prevIndex($this->data["index"]);
			$this->set(array('image'=>$ret['index'], "id"=>$ret['id']));
			$this->render("index");
		endif;	
	}	

}

?>