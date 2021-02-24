<?php 
    use yii\helpers\Url;
    use kv4nt\owlcarousel\OwlCarouselWidget;
 ?>

<!-- slider picture -->
<?php 
OwlCarouselWidget::begin([
    'container' => 'div',
    'containerOptions' => [
        'id' => 'container-id',
        'class' => 'container-class'
    ],
    'pluginOptions'    => [
        'autoplay'          => true,
        'autoplayTimeout'   => 6000,
        'items'             => 1,
        'loop'              => true,
        'itemsDesktop'      => [1199, 3],
        'itemsDesktopSmall' => [979, 3],
        'smartSpeed'        => 1200        
    ]
]);
?>
.
<div class="item-class"><img src="<?= Yii::getAlias('@web') ?>/img/image-contents/silde1.png" alt="Image 1"></div>
<div class="item-class"><img src="<?= Yii::getAlias('@web') ?>/img/image-contents/silde2.png" alt="Image 2"></div>
<div class="item-class"><img src="<?= Yii::getAlias('@web') ?>/img/image-contents/silde3.png" alt="Image 3"></div>
<div class="item-class"><img src="<?= Yii::getAlias('@web') ?>/img/image-contents/silde4.jpg" alt="Image 4"></div>
<?php OwlCarouselWidget::end(); ?>