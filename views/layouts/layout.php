
<?php 
#http://dixonsatit.github.io/2015/06/20/create-theme-yii2.html
use app\widgets\Alert;
use app\assets\AppAssetIndex;
use yii\bootstrap4\Breadcrumbs;
use yii\helpers\Html;

AppAssetIndex::register($this);

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
<meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="/web/img/icon-system/logo.ico"> 
    <link href="<?= Yii::getAlias('@web') ?>/img/icon/logo.png" rel="apple-touch-icon"> 
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
  
<?= $this->render('_navbar.php') ?>          
    
<?= $content ?>

<?= $this->render('_footer.php') ?>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

