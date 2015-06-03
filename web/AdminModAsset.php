<?php
namespace esoftkz\adminlte\web;

use yii\web\AssetBundle;

/**
 * AdminLte AssetBundle
 * @since 0.1
 */
class AdminModAsset extends AssetBundle
{
	
	public $depends = [
        'esoftkz\adminlte\web\AdminLteAsset'
    ];
	
    public $js = [        
		
    ];
	
	public $css = [
       'css/mod.css'	
    ];


    public $sourcePath = '@esoftkz/adminlte/web/';
    
}
