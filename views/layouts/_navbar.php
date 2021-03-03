<?php
    use yii\helpers\Url;
    use yii\helpers\Html;
    use yii\bootstrap4\Nav;
    use yii\bootstrap4\NavBar;
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
            'class' => 'row navbar navbar-expand-lg navbar-light bg-light sticky-top ',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-left h5'],
        'items' => [
            ['label' => 'ข่าวประชาสัมพันธ์', 'items' => [
                ['label' => 'ข่าวทั่วไป', 'url' => ['/news-document']],                 
                ['label' => 'สมัครงาน', 'url' => ['/news-document']],
                ['label' => 'จัดซื้อจัดจ้าง', 'url' => ['/news-document']],
                ['label' => 'กิจกรรมเฉลิมพระเกียรติ', 'url' => '#'],
            ]],
            ['label' => 'บริการผู้ป่วย', 'items' => [
                ['label' => 'ค้นหาแพทย์', 'url' => ['/doctor']],        
                ['label' => 'ตารางออกตรวจ', 'url' => '#'],        
                ['label' => 'ห้องพิเศษ', 'url' => '#'],        
                ['label' => 'สิทธิผู้ป่วย', 'url' => '#'],        
            ]],
            ['label' => 'บริการของเรา', 'items' => [
                ['label' => 'บริการทั่วไป', 'url' => '#'],
                ['label' => 'บริการพิเศษ', 'url' => '#'],
                ['label' => 'ธนาคารเลือด', 'url' => '#'],
                ['label' => 'แพทย์ไทย', 'url' => '#'],
                ['label' => 'สมทบทุน', 'url' => '#'],
            ]],
            ['label' => 'เกี่ยวกับ รพ.', 'items' => [
                ['label' => 'ประวัติโรงบาล', 'url' => '#'],
                ['label' => 'วิสัยทัศน์พันธกิจ', 'url' => '#'],
                ['label' => 'นโยบายและแผน', 'url' => '#'],
                ['label' => 'โครงสร้างองกร', 'url' => '#'],
                ['label' => 'เอกสารงานคุณภาพ', 'url' => '#'],
                ['label' => 'บุคลากร', 'url' => '#'],
            ]],            
        ],
    ]);

    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-left h5'],
        'items' => [            
            Yii::$app->user->isGuest ? (
                ['label' => 'Login', 'url' => ['/user/security/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/user/security/logout'], 'post')
                . Html::submitButton(
                    'ออก (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-success logout']
                )
                . Html::endForm()
                . '</li>'
            )
        ],
    ]);
    NavBar::end();

    $this->registerJs("
    jQuery('.animate').animateCss('bounceInUp');
    jQuery('.navbar-nav, .search').animateCss('fadeInRight');    
    ");
    ?>
