<?php
use esoftkz\adminlte\widgets\drmenu\Drmenu;

?>
<aside class="main-sidebar">

    <section class="sidebar">
		<?= Drmenu::widget(['items' => Yii::$app->params['menu_items']]) ?>
    </section>

</aside>

