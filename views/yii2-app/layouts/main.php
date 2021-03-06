<?php
use yii\helpers\Html;

/* @var $this \yii\web\View */
/* @var $content string */
if (Yii::$app->controller->action->id === 'login') {
    echo $this->render(
        'main-login',
        ['content' => $content]
    );
} else {

    if (class_exists('backend\assets\AppAsset')) {
        backend\assets\AppAsset::register($this);
    } else {
        app\assets\AppAsset::register($this);
    }

    esoftkz\adminlte\web\AdminModAsset::register($this);

    $directoryAsset = Yii::$app->assetManager->getPublishedUrl('@bower/admin-lte/dist');
    ?>
    <?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>"/>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="icon" type="image/png" sizes="192x192" href="/favicons/android-icon-192x192.png">
		<link rel="icon" type="image/png" sizes="32x32" href="/favicons/icon/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="96x96" href="/favicons/icon/favicon-96x96.png">
		<link rel="icon" type="image/png" sizes="16x16" href="/favicons/icon/favicon-16x16.png">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
		<?php	 
		$js =
		   '$(document).on("pjax:send", function() {				
				$("#loading").css("top", (($(window).height() - 64) / 2) + $(window).scrollTop() + "px");
				$("#loading").css("left", (($(window).width() - 31) / 2) + "px");
				$("#loading").show();
				
			});
			$(document).on("pjax:end", function() {				
				$("#loading").hide();				
			});
			';
		$this->registerJs($js, $this::POS_READY);
		?>
	<!--[if lt IE 9]>
	<script src="/js/html5shiv.js" type="text/javascript"></script>
	<script src="/js/respond.min.js" type="text/javascript"></script>
	<![endif]-->
    </head>
    <body class="skin-blue">
    <?php $this->beginBody() ?>
	<div id="loading"></div>
    <div class="wrapper">


        <?= $this->render(
            'header.php',
            ['directoryAsset' => $directoryAsset]
        ) ?>

        <div class="wrapper row-offcanvas row-offcanvas-left">

            <?= $this->render(
                'left.php',
                ['directoryAsset' => $directoryAsset]
            )
            ?>

            <?= $this->render(
                'content.php',
                ['content' => $content, 'directoryAsset' => $directoryAsset]
            ) ?>

        </div>
    </div>

    <?php $this->endBody() ?>
    </body>
    </html>
    <?php $this->endPage() ?>
<?php } ?>
