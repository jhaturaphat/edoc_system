<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap4\Breadcrumbs;
use yii\bootstrap4\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
use app\models\User;

AppAsset::register($this);

$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
$this->registerMetaTag(['name' => 'description', 'content' => $this->params['meta_description'] ?? '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => $this->params['meta_keywords'] ?? '']);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'href' => '@web/favicon.ico']);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>

<header id="header">
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => ['class' => 'navbar-expand-md navbar-dark bg-dark fixed-top']
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav'],
        'items' => [
            ['label' => 'คลังหนังสือ', 'url' => ['/edoc-view']],
            // ['label' => 'เกี่ยวกับเรา', 'url' => ['/site/about']],
            // ['label' => 'ติดต่อเรา', 'url' => ['/site/contact']],
            ['label' => 'สถานะการอ่าน', 'url' => ['/backend/edoc-sent'],'visible'=>User::IsAdmin()],
            ['label' => 'จัดการเอกสาร', 'url' => ['/backend/edoc-main'],'visible'=>User::IsAdmin()],
            ['label' => 'ลงทะเบียน', 'url' => ['/user/registration/register'], 'visible'=>Yii::$app->user->isGuest],
            ['label' => 'โปรไฟล์', 'url' => ['/user/settings/profile'], 'visible'=>!Yii::$app->user->isGuest],
            
            Yii::$app->user->isGuest
                ? ['label' => 'ล็อกอิน', 'url' => ['/edoc-view']] 
                : '<li class="nav-item">'
                    . Html::beginForm(['/user/security/logout'])
                    . Html::submitButton(
                        'ออก (' . Yii::$app->user->identity->username .'และ'.Yii::$app->user->identity->dep_id. ')',
                        ['class' => 'nav-link btn btn-link logout']
                    )
                    . Html::endForm()                    
                    . '</li>'
        ]
    ]);
    NavBar::end();
    ?>
</header>

<main id="main" class="flex-shrink-0" role="main">
    <div class="container">
        <br>
        <br>
        <?php if (!empty($this->params['breadcrumbs'])): ?>
            <?= Breadcrumbs::widget(['links' => $this->params['breadcrumbs']]) ?>
        <?php endif ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</main>

<footer id="footer" class="mt-auto py-3 bg-light">
    <div class="container">
        <div class="row text-muted">
            <div class="col-md-6 text-center text-md-start m-auto">&copy;โรงพยาบาลสมเด็จพระยุพราชเดชอุดม <?= date('Y') ?></div>            
        </div>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
