<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'row navbar-inverse',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-right'],
        'items' => [
            //['label' => 'About', 'url' => ['/site/about'], 'visible' => !Yii::$app->user->isGuest],
            ['label' => 'จัดหมวดหมู่', 'items' => [
                ['label' => 'ข่าวประชาสัมพันธ์', 'url' => ['/backend/news-type']],
                ['label' => 'xxxx'],
                ['label' => 'xxxx'],
                ['label' => 'xxxx'],
            ], 'visible' => !Yii::$app->user->isGuest],
            ['label' => 'จัดการเว็ปไชต์', 'items' => [
                ['label' => 'แพทย์', 'url' => ['/backend/doctor']],
                ['label' => 'ข่าวประชาสัมพันธ์', 'url' => ['/backend/news-document']],                
                ['label' => 'กิจกรรมเฉลิมพระเกียรติ', 'url' => ['/backend/king-event']],                
            ], 'visible' => !Yii::$app->user->isGuest],            
            ['label' => 'Administrator', 'items' => [
                ['label' => 'จัดการผู้ใช้งาน', 'url' => ['/user/admin/index']],
                ['label' => 'จัดการสิทธิ์', 'url' => ['/admin']],
            ], 'visible' => !Yii::$app->user->isGuest],            
            Yii::$app->user->isGuest ? (
                ['label' => 'Login', 'url' => ['/user/security/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/user/security/logout'], 'post')
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>'
            )
        ],
    ]);
    NavBar::end();
    ?>


    <div class="container"> 
    
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>   
    </div>
</div>
<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
