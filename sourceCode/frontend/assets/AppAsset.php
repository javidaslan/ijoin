<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    
    public $css = [
        'static/css/bootstrap.min.css',
        'static/css/style.css',
        'static/css/montserrat.css',
        'static/css/lato.css'
    ];
    
    public $js = [
        
        'static/js/jquery-1.12.1.min.js',
        'static/js/bootstrap.min.js',
        'static/js/main.js',
        'static/js/map.js'

        
    ];
    
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
