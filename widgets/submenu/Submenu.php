<?php
namespace esoftkz\adminlte\widgets\submenu;

use Yii;
use yii\base\Widget;


class Submenu extends Widget{
	
	public $items;
	
	public function init(){
		parent::init();		
	}
	
	public function run(){		
		$this->registerPlugin();		
		return $this->render('index', [
			'items' => $this->items,		
			'cur_url'=>Yii::$app->getRequest()->getPathInfo()
        ]);		
	}
	
	protected function registerPlugin()
	{
		$view = $this->getView();
		SubmenuAsset::register($view);	
	}	
}
?>