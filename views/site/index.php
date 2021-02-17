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
<!-- Conten ทั่วไป -->
<section id="two">
    <div class="conten-service">
        <div class="service-box">
            <img src="<?= Yii::getAlias('@web') ?>/img/service/กัญชา.png" alt="">           
            <p>
                การใช้กัญชาทางการแพทย์ เพื่อเพิ่มโอกาส
                ในการรักษาโรคให้กับประชาชนที่เจ็บป่วยทรมาน
                จากกลุ่มโรคร้ายแรง เรื้อรังและไม่ตอบสนอง
                ต่อการรักษาทั้งแพทย์แผนปัจจุบันหรือแพทย์แผนไทย..
                <a href="<?= Yii::getAlias('@web') ?>/uploads/knowledge/คู่มือการใช้กัญชาทางการแพทย์.pdf">อ่านต่อ>></a>
            </p>                
                
        </div>
        <div class="service-box">
            <img src="<?= Yii::getAlias('@web') ?>/img/service/แผนไทย.png" alt="">
            <p>
                บริการตรวจรักษาโรคทั่วไป โรครื้อรังด้วยศาสตร์
                การแพทย์แผนไทย และการแพทย์ทางเลือก โดยเน้น
                การปรุงยา และผลิตภัณฑ์จากสมุนไพรในการฟื้นฟู
                 ป้องกัน รักษาร่างกาย จากอาการโรคต่างๆ..
                 <a href="<?= Yii::getAlias('@web') ?>/uploads/knowledge/แผนยุทธศาสตร์กรมการแพทย์แผนไทย-2560-2564.pdf">อ่านต่อ>></a>
        </div>
        <div class="service-box">
            <img src="<?= Yii::getAlias('@web') ?>/img/service/ไตเทียม.png" alt="">
            <p>
                บริการอย่างครบวงจรเกี่ยวกับไตเทียม เพื่อให้การดูแล
                สำหรับผู้ป่วยโรคไตวายทั้งแบบเรื้อรังและเฉียบพลัน 
                ที่ต้องได้รับการฟอกเลือดด้วยเครื่องไตเทียม 
                ภายใต้สภาพแวดล้อมที่สะดวกสบาย สะอาด..
                <a href="<?= Yii::getAlias('@web') ?>/uploads/knowledge/ไตเทียม.pdf">อ่านต่อ>></a>
            </p>
        </div>
        <div class="service-box">
            <img src="<?= Yii::getAlias('@web') ?>/img/service/กัญชา.png" alt="">
            <p>
                การใช้กัญชาทางการแพทย์ เพื่อเพิ่มโอกาส
                ในการรักษาโรคให้กับประชาชนที่เจ็บป่วยทรมาน
                จากกลุ่มโรคร้ายแรง เรื้อรังและไม่ตอบสนอง
                ต่อการรักษาทั้งแพทย์แผนปัจจุบันหรือแพทย์แผนไทย..
                <a href="">อ่านต่อ>></a>
            </p>
        </div>
        <div class="service-box">
            <img src="<?= Yii::getAlias('@web') ?>/img/service/แผนไทย.png" alt="">
            <p>
                บริการตรวจรักษาโรคทั่วไป โรครื้อรังด้วยศาสตร์
                การแพทย์แผนไทย และการแพทย์ทางเลือก โดยเน้น
                การปรุงยา และผลิตภัณฑ์จากสมุนไพรในการฟื้นฟู
                 ป้องกัน รักษาร่างกาย จากอาการโรคต่างๆ..
                 <a href="">อ่านต่อ>></a>
                </p>
        </div>
        <div class="service-box">
            <img src="<?= Yii::getAlias('@web') ?>/img/service/ไตเทียม.png" alt="">
            <p>
                บริการอย่างครบวงจรเกี่ยวกับไตเทียม เพื่อให้การดูแล
                สำหรับผู้ป่วยโรคไตวายทั้งแบบเรื้อรังและเฉียบพลัน 
                ที่ต้องได้รับการฟอกเลือดด้วยเครื่องไตเทียม 
                ภายใต้สภาพแวดล้อมที่สะดวกสบาย สะอาด..
                <a href="">อ่านต่อ>></a>
            </p>
        </div>
    </div>
    
</section>

