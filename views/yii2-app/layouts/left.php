<?php
use esoftkz\adminlte\widgets\drmenu\Drmenu;
if(Yii::$app->user->can('admin'))
	$items = Yii::$app->params['menu_items']['admin'];
else
	$items = Yii::$app->params['menu_items']['moder'];
?>
<aside class="main-sidebar">

    <section class="sidebar">
		<?= Drmenu::widget(['items' =>$items]) ?>
    </section>

</aside>

