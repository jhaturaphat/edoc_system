<section>
        <div class="slider-doctor">            
            <img src="<?= Yii::getAlias('@web') ?>/img/image-contents/slide-หมอ.png" width="100%"> 
        </div>
        <div class="content">
            <img src="<?= Yii::getAlias('@web') ?>/img/icon/ducph.png" alt="">
            กรุณาเลือกสาขาวิชาที่เชี่ยวชาญเพื่อแสดงรายชื่อแพทย์ตามสาขาวิชาที่เชี่ยวชาญนั้นๆ หรือในกรณีที่ท่านทราบชื่อแพทย์<br>
            ท่านสามารถเลือกแพทย์ได้จากรายชื่อด้านล่าง
        </div>
        <form action="">          
            <div class="form-g">
                <div class="form-ctl">
                    <label for="special">ค้นหาสาขาที่เชี่ยวชาญ</label>
                    <div class="input-g">
                        <input type="text" placeholder="">
                        <i class="fas fa-search"></i>
                    </div>                    
                </div>
                <div class="form-ctl">
                    <label for="special">ค้นหารายชื่อแพทย์</label>
                    <div class="input-g">
                        <input type="text" placeholder="">
                        <i class="fas fa-search"></i>
                    </div>  
                </div>
            </div>       
            <div class="s-filter">
                <label for="">ค้นหาแบบระบุเงื่อนไข</label>
                <div class="s-filter-item">   
                    <ul>
                        <li>วันทำงาน</li>
                        <li><input type="checkbox" name="" id="mon"><label for="mon">จันทร์</label></li>
                        <li><input type="checkbox" name="" id="tue"><label for="tue">อังคาร</label></li>
                        <li><input type="checkbox" name="" id="wed"><label for="wed">พุธ</label></li>
                        <li><input type="checkbox" name="" id="thu"><label for="thu">พฤหัสบดี</label></li>
                        <li><input type="checkbox" name="" id="fri"><label for="fri">ศุกร์</label></li>
                        <li><input type="checkbox" name="" id="sat"><label for="sat">เสาร์</label></li>
                        <li><input type="checkbox" name="" id="sun"><label for="sun">อาทิตย์</label></li>
                    </ul>
                    <ul>
                        <li>เวลาตรวจ</li>
                        <li><input type="checkbox" name="" id="all"><label for="all">ทุกเวลา</label></li>
                        <li><input type="checkbox" name="" id="morning"><label for="morning">ช่วงเช้า</label></li>
                        <li><input type="checkbox" name="" id="afternoon"><label for="afternoon">ช่วงบ่าย</label></li>     
                        <button>ค้นหา</button>                             
                    </ul>    
                </div>
            </div>   
        </form>
        <div class="doctor">
            <div class="card-x"> 
                <img src="<?= Yii::getAlias('@web') ?>/images/doctor/หมอทิพวัลย์.jpg" alt="">               
                <div class="profile">
                    <a href="#">ดูโปรไฟล์</a>
                </div>
            </div>
            <div class="card-x">
                <img src="<?= Yii::getAlias('@web') ?>/images/doctor/หมอกัลยาณี.jpg" alt="">
                <div class="profile">
                    <a href="#">ดูโปรไฟล์</a>
                </div>
            </div>
            <div class="card-x">
                <img src="<?= Yii::getAlias('@web') ?>/images/doctor/หมอครองแก้ว.jpg" alt="">
                <div class="profile">
                    <a href="#">ดูโปรไฟล์</a>
                </div>
            </div>
            <div class="card-x">
                <img src="<?= Yii::getAlias('@web') ?>/images/doctor/หมอดารณี.jpg" alt="">
                <div class="profile">
                    <a href="#">ดูโปรไฟล์</a>
                </div>
            </div>
            <div class="card-x">
                <img src="<?= Yii::getAlias('@web') ?>/images/doctor/หมอพนัสบดี.jpg" alt="">
                <div class="profile">
                    <a href="#">ดูโปรไฟล์</a>
                </div>
            </div>
            <div class="card-x">
                <img src="<?= Yii::getAlias('@web') ?>/images/doctor/หมอสุวิทย์.jpg" alt="">
                <div class="profile">
                    <a href="#">ดูโปรไฟล์</a>
                </div>
            </div>
            <div class="card-x">
                <img src="<?= Yii::getAlias('@web') ?>/images/doctor/หมออดิศักดิ์.jpg" alt="">
                <div class="profile">
                    <a href="#">ดูโปรไฟล์</a>
                </div>
            </div>
            <div class="card-x">
                <img src="<?= Yii::getAlias('@web') ?>/images/doctor/หมอธิติมา.jpg" alt="">
                <div class="profile">
                    <a href="#">ดูโปรไฟล์</a>
                </div>
            </div>
        </div>
    </section>