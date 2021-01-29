<?php
use yii\helpers\Url;
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
                        <input type="text" placeholder="" id="doctor">
                        <i class="fas fa-search"></i>
                    </div>  
                </div>
            </div>       
            <div class="s-filter">
                <label for="">ค้นหาแบบระบุเงื่อนไข</label>
                <div class="s-filter-item">   
                    <ul>
                        <li>วันทำงาน</li>
                        <li><input type="checkbox" name="work_date" id="mon" value="mon"><label for="mon">จันทร์</label></li>
                        <li><input type="checkbox" name="work_date" id="tue" value="tue"><label for="tue">อังคาร</label></li>
                        <li><input type="checkbox" name="work_date" id="wed" value="wed"><label for="wed">พุธ</label></li>
                        <li><input type="checkbox" name="work_date" id="thu" value="thu"><label for="thu">พฤหัสบดี</label></li>
                        <li><input type="checkbox" name="work_date" id="fri" value="fri"><label for="fri">ศุกร์</label></li>
                        <li><input type="checkbox" name="work_date" id="sat" value="sat"><label for="sat">เสาร์</label></li>
                        <li><input type="checkbox" name="work_date" id="sun" value="sun"><label for="sun">อาทิตย์</label></li>
                    </ul>
                    <ul>
                        <li>เวลาตรวจ</li>                        
                        <li><input type="checkbox" name="time_period" id="morning" value="morning"><label for="morning">ช่วงเช้า</label></li>
                        <li><input type="checkbox" name="time_period" id="afternoon" value="afternoon"><label for="afternoon">ช่วงบ่าย</label></li>     
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
        $("#card-doctor").load("index.php?r=doctor/default-search",{branch:'', doctor:'',work_date:'', time_period:'' });   
        $('#search').on('click', function(e) { 
            e.preventDefault();  
            let branch = $("#branch-name_th").val();   
            let doctor = $("#doctor").val();              
            let work_date = $("input[name='work_date']:checked").map(function(){return $(this).val();}).get();
            let time_period = $("input[name='time_period']:checked").map(function(){return $(this).val();}).get();
            
            if(branch === ""){
                alert("ข้อมูลไม่ครบ กรอกข้อมูลสาขาที่เชี่ยวชาญ"); return;
            }
            $.post("index.php?r=doctor/default-search",{branch:branch, doctor:doctor,work_date:work_date, time_period:time_period })
            .done(function(data){
                $("#card-doctor").html(data);
            });          
        }); // End on click
    JS
    );