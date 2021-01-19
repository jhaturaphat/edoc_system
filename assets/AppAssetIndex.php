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
        'css/index/site.css',
        'css/index/doctor.css',
        'css/index/footer.css',
        'css/index/mobile.css',
        'css/index/slider.css',
        'css/index/style.css'
    ];
    public $js = [
        'js/lib/FontAwesome.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        //'yii\bootstrap\BootstrapAsset', //ไม่ใช้ Bootstrap comment ไว้
    ];
}