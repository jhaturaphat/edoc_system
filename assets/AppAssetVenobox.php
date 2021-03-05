<?php


namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAssetVenobox extends AssetBundle
{
    public $sourcePath  = '@vendor/nicolafranchini/venobox';
    
    public $css = [
        'venobox/venobox.min.css',
    ];
    public $js = [
        'venobox/venobox.min.js',
    ];    
}