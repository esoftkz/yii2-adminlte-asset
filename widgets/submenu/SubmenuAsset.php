<?php
namespace esoftkz\adminlte\widgets\submenu;

use yii\web\AssetBundle;

class SubmenuAsset extends AssetBundle
{

	public $sourcePath = '@esoftkz/adminlte/widgets/submenu';
	
	public $js = [	
	];
	
	public $css = [
        'css/base.css',
    ];

	public $depends = [
        'yii\web\YiiAsset',
		'yii\web\JqueryAsset'
	];
} 