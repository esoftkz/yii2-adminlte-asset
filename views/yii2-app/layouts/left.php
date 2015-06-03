<?php
use yii\bootstrap\Nav;
use esoftkz\adminlte\widgets\drmenu\Drmenu;

$items = [
	['label' => 'Пользователи', 'url' => '/cms/user', 'icon_class' => 'fa-users'],
	['label' => 'Локализация', 'icon_class' => 'fa-globe', 'items' => [
			['label' => 'Языки', 'url' => '/cms/language', 'icon_class' => 'fa-flag'],
			['label' => 'Переводы', 'url' => '/cms/translation', 'icon_class' => 'fa-bookmark'],
		]
	],
	['label' => 'СМС', 'icon_class' => 'fa-share', 'items' => [
			['label' => 'Страницы', 'url' => '/cms/post', 'icon_class' => 'fa-circle-o'],
			['label' => 'SEO', 'url' => '/cms/meta', 'icon_class' => 'fa-circle-o'],
		]
	],	
]; 

?>
<aside class="main-sidebar">

    <section class="sidebar">

        
		
		<?= Drmenu::widget(['items' => $items]) ?>
		

        
		

    </section>

</aside>
