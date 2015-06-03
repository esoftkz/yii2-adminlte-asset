<?
use yii\helpers\Url;

?>

<div class="list-group">
	<?foreach($items as $item){
		
		$array=array();
		$array[]=$item['url'];		
		if(isset($item['params']['id'])){
			$array['id']=$item['params']['id'];
		}else
			$array=array();
		$url=Url::toRoute($array);	
		
		if(isset($item['url']) && '/'.$cur_url==$item['url']){
			$active='active';
		}else{
			$active='';
		}		 
		
		
		?>
		<a href="<?= $url?>" class="list-group-item <?= $active?>">
			<?= $item['label']?>
		</a>	
	<?}?>
</div>