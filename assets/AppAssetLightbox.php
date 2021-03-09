<?php


namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAssetLightbox extends AssetBundle
{
    public $baseUrl = '@web';
    
    public $css = [
        'css/lightbox.min.css',
        'css/lightbox-style.css',
    ];
    public $js = [
        'js/lib/lightbox-plus-jquery.min.js',
        'js/lib/popper.min.js',
    ];    
}