<?php 
    use yii\helpers\Url;
 ?>

<!-- slider picture -->
<div class="slider">
        <figure>
            <img src="<?= Yii::getAlias('@web') ?>/img/image-contents/silde1.png" alt="">
            <img src="<?= Yii::getAlias('@web') ?>/img/image-contents/silde1.png" alt="">
            <img src="<?= Yii::getAlias('@web') ?>/img/image-contents/silde1.png" alt="">
            <img src="<?= Yii::getAlias('@web') ?>/img/image-contents/silde1.png" alt="">
        </figure>
</div>
<div class="menu-buttom">
    <div class="ducph">
        <ul>
            <li><img src="<?= Yii::getAlias('@web') ?>/img/icon/ducph.png" alt=""></li>
            <li>
                <img src="<?= Yii::getAlias('@web') ?>/img/icon/facebook-icon1.png" alt="">
                <img src="<?= Yii::getAlias('@web') ?>/img/icon/youtube-icon1.png" alt="">
            </li>
        </ul>
    </div>
    <div class="menu-item">
        <ul>
            <li><a href="<?= Url::toRoute('/doctor')?>"><img src="<?= Yii::getAlias('@web') ?>/img/icon/doctor.png" alt=""><label for="">ค้นหาแพทย์</label></a></li>
            <li><a href="#"><img src="<?= Yii::getAlias('@web') ?>/img/icon/dental.png" alt=""><label for="">ทันตกรรม</label></a></li>
            <li><a href="#"><img src="<?= Yii::getAlias('@web') ?>/img/icon/calendar.png" alt=""><label for="">ค้นหาบัตรนัด</label></a></li>
            <li><a href="#"><img src="<?= Yii::getAlias('@web') ?>/img/icon/other.png" alt=""><label for="">หน่วยงานที่เกี่ยวข้อง</label></a></li>
            <li><a href="#"><img src="<?= Yii::getAlias('@web') ?>/img/icon/intranet.png" alt=""><label for="">ระบบ Intranet</label></a></li>
            <li><a href="#"><img src="<?= Yii::getAlias('@web') ?>/img/icon/contact.png" alt=""><label for="">ติดต่อเรา</label></a></li>
            
        </ul>
    </div>
</div>