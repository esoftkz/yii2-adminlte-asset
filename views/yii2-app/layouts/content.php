<?php
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use esoftkz\adminlte\widgets\Alert;
?>

<div class="content-wrapper">
    <section class="content-header">
		<div class="content-top">
			<?=
			Breadcrumbs::widget(
				[
					'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
				]
			) ?>
			<?if(isset($this->params['add-button'])){
				if(isset($this->params['add-button-url'])){
					if(isset($this->params['other'])){
						$url = $this->params['add-button-url'];
					}else{
						$url = [$this->params['add-button-url']];
					}
				}else
					$url = ['create'];
				?>
				<?= Html::a('<i class="fa fa-plus"></i>' . $this->params['add-button'], $url, ['class' => 'btn btn-plus pull-right']) ?>
			<?}?>
				
			
		</div>
    </section>

    <section class="content">
        <?= Alert::widget() ?>
        <?= $content ?>
    </section>
</div>

<footer class="main-footer">
    <div class="pull-right hidden-xs">
        <b>Версия</b> 1.2
    </div>
    <strong>Copyright &copy; 2014-2019.</strong> 
</footer>