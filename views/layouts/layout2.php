
<?php 
#http://dixonsatit.github.io/2015/06/20/create-theme-yii2.html
use app\widgets\Alert;
use app\assets\AppAssetIndex;
use yii\widgets\Breadcrumbs;
use yii\helpers\Html;
use yii\widgets\Pjax;

AppAssetIndex::register($this);
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
  
<?= $this->render('_header.php') ?>    
<?= $this->render('_slider.php') ?>         

<?php Pjax::begin() ?>

<?= $content ?>

<?php Pjax::end() ?>

<?= $this->render('_footer.php') ?>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

