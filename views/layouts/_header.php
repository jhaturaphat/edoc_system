<?php
    use yii\helpers\Url;
?>
<section id="one">      
    <nav>
        <div class="header">
            <div class="bar-menu">
                <i id="bar-menu" class="fas fa-bars"></i>
            </div>
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
            <div class="nav-menu" id="nav-menu"> 
                <ul>                    
                    <li class=""><a href="<?= Url::toRoute('/news-document')?>">ข่าวประชาสัมพันธ์</a>
                        <ul class="dropdown-menu">
                            <li><a href="">ข่าวทั่วไป</a></li>
                            <li><a href="">สมัครงาน</a></li>
                            <li><a href="">จัดซื้อจัดจ้าง</a></li>
                            <li><a href="">กิจกรรมเฉลิมพระเกียรติ</a></li>
                        </ul>
                    </li>
                    <li class=""><a href="">บริการผู้ป่วย</a>
                        <ul class="dropdown-menu">
                            <li><a href="<?= Url::toRoute('/doctor')?>">ค้นหาแพทย์</a></li>
                            <li><a href="">ตารางออกตรวจ</a></li>
                            <li><a href="">ห้องพิเศษ</a></li>
                            <li><a href="">สิทธิผู้ป่วย</a></li>
                        </ul>
                    </li>
                    <li class=""><a href="">บริการของเรา</a>
                        <ul class="dropdown-menu">
                            <li><a href="">บริการทั่วไป</a></li>
                            <li><a href="">บริการพิเศษ</a></li>
                            <li><a href="">ธนาคารเลือด</a></li>
                            <li><a href="">แพทย์ไทย</a></li>
                            <li><a href="">สมทบทุน</a></li>
                        </ul>    
                    </li>  
                    <li class=""><a href="">เกี่ยวกับ รพ.</a>
                        <ul class="dropdown-menu">
                            <li><a href="">ประวัติโรงบาล</a></li>
                            <li><a href="">วิสัยทัศน์พันธกิจ</a></li>
                            <li><a href="">นโยบายและแผน</a></li>
                            <li><a href="">โครงสร้างองกร</a></li>
                            <li><a href="">เอกสารงานคุณภาพ</a></li>
                            <li><a href="">บุคลากร</a></li>
                        </ul>
                    </li>                                        
                </ul>
                <ul>
                    <li class="right-login">
                    
                    <?php if(Yii::$app->user->isGuest) {?>
                        <a href="<?= Url::toRoute('user/security/login')?>">Login</a>
                    <?php } else { ?>
                        <a href="<?= Url::toRoute('user/security/logout')?>">Logout(<?= Yii::$app->user->identity->username ?>)</a>
                    <?php } ?>
                    </li>
                </ul>
            </div>
            
        </div>
    </nav> 
    </section>  

<?php
	$this->registerJs("jQuery('.animate, .nav-menu, .search, .right-login').animateCss('fadeInRight')");
?>