<?php
    use yii\helpers\Url;
    use yii\bootstrap\Nav;
    use yii\bootstrap\NavBar;
?>
<div class="header">    
    <div class="banner"> 
        <div class="animate">
            <a href="<?= Url::home()?>">
                <img src="<?= Yii::getAlias('@web') ?>/img/icon/logo.png">
            </a>
            <div class="link-logo">                    
                <a href="<?= Url::home()?>">detudom crown prince hospital</a> 
                <a href="<?= Url::home()?>">โรงพยาบาลสมเด็จพระยุพราชเดชอุดม</a>
            </div>
        </div>                
        <div class="search">
            <div class="input-search">
                <input type="text">
                <i class="fas fa-search"></i>
            </div>                    
            <ul>
                <li><a href="#"><img src="<?= Yii::getAlias('@web') ?>/img/icon/icon-th.png" alt=""></a></li>
                <li><a href="#"><img src="<?= Yii::getAlias('@web') ?>/img/icon/icon-en.png" alt=""></a></li>
            </ul>
        </div>   
    </div>              
</div>
<!--  -->
<?php
    NavBar::begin([        
        'brandUrl' => Yii::$app->homeUrl,
        'renderInnerContainer' => false,
        'options' => [
            'class' => 'row navbar-default',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-left'],
        'items' => [
            ['label' => 'ข่าวประชาสัมพันธ์', 'items' => [
                ['label' => 'ข่าวทั่วไป', 'url' => '#'],                 
                ['label' => 'สมัครงาน', 'url' => '#'],
            ]],
            ['label' => 'บริการผู้ป่วย', 'url' => ['/']],
            ['label' => 'บริการของเรา', 'url' => ['/']],
            ['label' => 'เกี่ยวกับ รพ.', 'url' => ['/']],            
        ],
    ]);

    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [            
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