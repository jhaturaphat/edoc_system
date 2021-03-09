<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAssetIndex extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/index/style.css',
        'css/index/banner.css',
        'css/index/navbar.css',
        'css/index/site.css',
        'css/index/doctor.css',
        'css/index/footer.css',
        'css/index/mobile.css'      
        
    ];
    public $js = [
        'js/script.js',
        'js/lib/FontAwesome.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap4\BootstrapAsset', //ไม่ใช้ Bootstrap comment ไว้
        'simialbi\yii2\animatecss\AnimateCssPluginAsset', 
        'rmrevin\yii\fontawesome\CdnProAssetBundle'
    ];
}
