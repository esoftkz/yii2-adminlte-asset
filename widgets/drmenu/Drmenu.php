<?php
namespace esoftkz\adminlte\widgets\drmenu;


use Yii;
use yii\base\Widget;
use yii\helpers\Html;
use yii\helpers\Url;

class Drmenu extends Widget{
	
	public $items;
	
	public function init()
	{		
		parent::init();			
	}
	
	public function run(){			
		$expanded_menu = $this->getNavBar($this->items, Yii::$app->getRequest()->getPathInfo());
		return $this->render('index', [
           'expanded_menu' => $expanded_menu		  
        ]);		
		
	}

	protected static function getNavBar($items, $cur_url, $class = 'sidebar')
	{
		$count=count($items);	
		$i=0;
		$line='<ul class="'.$class.'-menu">';
		foreach($items as $item){			
			$icon_class=$item['icon_class'];	
			
			if(isset($item['url']) && $item['url']!=''){	
				$active = self::checkSelected($item['url'], $cur_url);	
			
				$url=$item['url'];		
				$url=Url::toRoute($url); 

				
				$counter = '';
				if(isset($item['counter'])){					
					if($item['counter'] == 'faq'){
						$amount = \common\models\Faq::find()->where('status = 2')->count();
						if($amount > 0)
							$counter = '<i class="counter">('.$amount.')</i>';
					}	
					if($item['counter'] == 'request' && Yii::$app->user->identity){
						$amount = \common\models\ObjectsRequest::find()->joinWith('object')->where('isNew = 1')->andWhere('user_id = ' . Yii::$app->user->identity->id)->count();
						if($amount > 0)
							$counter = '<i class="counter">('.$amount.')</i>';
					}
				}
				
				$line=$line.'<li class="'.$active.'">
								<a href="'.$url.'"><span class="fa '.$icon_class.'"></span>'.$item['label'].$counter.'</a>
							</li>';
				
			}else{	
				$active = self::checkSelected($item['items'], $cur_url);				
				$line=$line.'<li class="treeview '.$active.'">
								<a href="#">
								<i class="fa '.$icon_class.'"></i> <span>'.$item['label'].'</span>
								<i class="fa fa-angle-left pull-right"></i>
							</a>';
				$line=$line.self::getNavBar($item['items'], $cur_url, 'treeview');			
			}			
			$line=$line.'</li>';
			$i++;
			if($i==$count)
				$line=$line.'</ul>';
		}
		return $line;	
	}	
	
	
	protected static function checkSelected($data, $cur_url)
	{		
		$active='';		
		if(!is_array ($data) ){				
			if(isset($data) && '/'.$cur_url==$data){
				$active='active';
			}
		}else{
			foreach($data as $item){						
				if(isset($item['url']) && '/'.$cur_url==$item['url']){
					$active='active';
				}	
			}
		}
		return $active;	
	}
		
}
?>