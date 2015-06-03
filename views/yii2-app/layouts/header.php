<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;

/* @var $this \yii\web\View */
/* @var $content string */
?>

<header class="main-header">

    <?= Html::a(Yii::$app->name, Yii::$app->homeUrl, ['class' => 'logo']) ?>

    <nav class="navbar navbar-static-top" role="navigation">

        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">

            <ul class="nav navbar-nav">

                <!-- Messages: style can be found in dropdown.less-->
                
				<?if (!Yii::$app->user->isGuest){?>
					<li class="dropdown user user-menu">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						 
							<span class="hidden-xs"><?= Yii::$app->user->identity->username ?></span>
						</a>
						<ul class="dropdown-menu">
							<!-- User image -->
							<li class="user-header">
								

								<p>
									<?= Yii::$app->user->identity->username ?>
									<small><?= Yii::$app->user->identity->email ?></small>
								</p>
							</li>
							
							<!-- Menu Footer-->
							<li class="user-footer">
								
								<div class="pull-right">
									<?= Html::a(
										'Выйти',
										['/cms/user/logout'],
										['data-method' => 'post', 'class' => 'btn btn-default btn-flat']
									) ?>
								</div>
							</li>
						</ul>
					</li>
				<?}?>
                <!-- User Account: style can be found in dropdown.less -->

            </ul>
        </div>
    </nav>
</header>
