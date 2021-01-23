<?php
use kartik\typeahead\TypeaheadBasic;
use kartik\typeahead\Typeahead;
use yii\web\JsExpression;

use app\models\Branch;
use app\models\WorkDate;
use app\models\TimePeriod;


Yii::$app->params['bsDependencyEnabled'] = false; // do not load bootstrap assets for a specific asset bundle
?>
<section>
        <div class="slider-doctor">            
            <img src="<?= Yii::getAlias('@web') ?>/img/image-contents/slide-หมอ.png" width="100%"> 
        </div>
        <div class="content">
            <img src="<?= Yii::getAlias('@web') ?>/img/icon/ducph.png" alt="">
            กรุณาเลือกสาขาวิชาที่เชี่ยวชาญเพื่อแสดงรายชื่อแพทย์ตามสาขาวิชาที่เชี่ยวชาญนั้นๆ หรือในกรณีที่ท่านทราบชื่อแพทย์<br>
            ท่านสามารถเลือกแพทย์ได้จากรายชื่อด้านล่าง
        </div>
        <form action="" id="form-search">          
            <div class="form-g">
                <div class="form-ctl">
                    <label for="special">ค้นหาสาขาที่เชี่ยวชาญ</label>
                    <div class="input-g">
                        <!-- <input type="text" placeholder=""> -->
                        <?php
                            echo TypeaheadBasic::widget([
                                'model' => $branch, 
                                'attribute' => 'name_th',
                                'data' => Branch::getTypeaHead(),  //function นี้ถูกสร้างใน models
                                'options' => ['placeholder' => ''],
                                'pluginOptions' => ['highlight'=>true], 
                                'pluginEvents' => [                                    
                                    "typeahead:selected" => "function() { console.log('typeahead:selected'); }",
                                ]
                            ]);
                        ?> 
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
                        <li><input type="checkbox" name="mon" id="mon"><label for="mon">จันทร์</label></li>
                        <li><input type="checkbox" name="tue" id="tue"><label for="tue">อังคาร</label></li>
                        <li><input type="checkbox" name="wed" id="wed"><label for="wed">พุธ</label></li>
                        <li><input type="checkbox" name="thu" id="thu"><label for="thu">พฤหัสบดี</label></li>
                        <li><input type="checkbox" name="fri" id="fri"><label for="fri">ศุกร์</label></li>
                        <li><input type="checkbox" name="sat" id="sat"><label for="sat">เสาร์</label></li>
                        <li><input type="checkbox" name="sun" id="sun"><label for="sun">อาทิตย์</label></li>
                    </ul>
                    <ul>
                        <li>เวลาตรวจ</li>                        
                        <li><input type="checkbox" name="morning" id="morning"><label for="morning">ช่วงเช้า</label></li>
                        <li><input type="checkbox" name="afternoon" id="afternoon"><label for="afternoon">ช่วงบ่าย</label></li>     
                        <button id="search">ค้นหา</button>                             
                    </ul>    
                </div>
            </div>   
        </form>
        <div class="doctor" id="card-doctor">
            <!-- https://www.youtube.com/watch?v=QIYY3QWm0eE -->
        </div>
    </section>

    <?php
    $this->registerJs(<<<JS
        $('#search').on('click', function(e) { 
            e.preventDefault();            
            let data = $('#form-search').serialize();
            console.log(data);
        });
    JS
    );