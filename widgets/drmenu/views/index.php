<?
use yii\helpers\Url;
use yii\bootstrap\Nav;


?>
    <?= Nav::widget(
		[
			'encodeLabels' => false,
			'options' => ['class' => 'sidebar-menu'],
			'items' => [
				'<li class="header">Меню</li>',
				                  
			],
		]
	);
	?>
	
	<?= $expanded_menu ?>

<?
function expanded_menu($items, $cur_url, $class = 'sidebar'){
	
	$count=count($items);	
	$i=0;
	$line='<ul class="'.$class.'-menu">';
	foreach($items as $item){			
		$icon_class=$item['icon_class'];	
		
		if(isset($item['url']) && '/'.$cur_url==$item['url']){
			$active='active';
		}else{
			$active='';
		}	
		
		if(isset($item['url']) && $item['url']!=''){				
			$url=$item['url'];		
			$url=Url::toRoute($url); 

			$line=$line.'<li class="'.$active.'">
							<a href="'.$url.'"><span class="fa '.$icon_class.'"></span>'.$item['label'].'</a>
						</li>';
			
		}else{			
			$line=$line.'<li class="treeview '.$active.'">
							<a href="#">
							<i class="fa '.$icon_class.'"></i> <span>'.$item['label'].'</span>
							<i class="fa fa-angle-left pull-right"></i>
						</a>';
			$line=$line.expanded_menu($item['items'],$cur_url, 'treeview');
			
		}	
	
		$line=$line.'</li>';
		$i++;
		if($i==$count)
			$line=$line.'</ul>';
	}
	return $line;		
}
?>







