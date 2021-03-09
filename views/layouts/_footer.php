<!-- footer -->
<?php
    use yii\helpers\Url;
?>
<footer>
    <div class="ft-title">
        <div class="phone-number">
            <ul>
                <li><img src="<?= Yii::getAlias('@web') ?>/img/icon/phone.png" alt=""></li>
                <li>
                    <label for="">Call Center</label>
                    <label for="">045-3611334</label>
                </li>
            </ul>
        </div>
        <div class="info">
            <ul>
                <li>ติดตามข่าวสารโรงพยาบาลสมเด็จพระยุพราชเดชอุดม</li>
                <li>
                    <img src="<?= Yii::getAlias('@web') ?>/img/icon/facebook-icon.png" alt="">
                    <img src="<?= Yii::getAlias('@web') ?>/img/icon/youtube-icon.png" alt="">
                </li>
            </ul>            
        </div>
    </div>
    <!-- menu list -->
    <div class="ft-menu-item">
        <ul>
            ข่าวประชาสัมพันธ์
            <li><a href="#">ข่าวทั่วไป</a></li>
            <li><a href="#">สมัครงาน</a></li>
            <li><a href="#">จัดซื้อจัดจ้าง</a></li>
            <li><a href="#">กิจกรรมเฉลิมพระเกียรติ</a></li>
        </ul>
        <ul>
            บริการผู้ป่วย
            <li><a href="<?= Url::toRoute('/doctor')?>">ค้นหาแพทย์</a></li>
            <li><a href="#">ตารางออกตรวจ</a></li>
            <li><a href="#">ห้องพิเศษ</a></li>
            <li><a href="#">สิทธิผู้ป่วย</a></li>
        </ul>
        <ul>
            บริการของเรา
            <li><a href="#">บริการทั่วไป</a></li>
            <li><a href="#">บริการพิเศษ</a></li>
            <li><a href="#">ธนาคารเลือด</a></li>
            <li><a href="#">แพทย์ไทย</a></li>
            <li><a href="#">สมทบทุน</a></li>
        </ul>
        <ul>
            เกี่ยวกับ รพ.
            <li><a href="#">ประวัติโรงบาล</a></li>
            <li><a href="#">วิสัยทัศน์พันธกิจ</a></li>
            <li><a href="#">นโยบายและแผน</a></li>
            <li><a href="#">โครงสร้างองกร</a></li> 
            <li><a href="#">เอกสารงานคุณภาพ</a></li>
            <li><a href="#">บุคลากร</a></li>
        </ul>
    </div>
</footer>
<div class="ft-bottom">
    โรงพยาบาลสมเด็จพระยุพราชเดชอุดม<br>
    299 หมู่ 19ต.เมืองเดช อ.เดชอุดม จ.อุบลราชธานี 34160 <br>
    โทรศัพท์ : 045-362028, 045-361993, 045-361971 <br>
    โทรสาร : 0-4536-2099
</div>