<?php
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Edoc Main: ' . $model['edoc_name'];
$this->params['breadcrumbs'][] = ['label' => 'Edoc Mains', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'index';

?>



<div class="card">
  <div class="card-header">
  <?= Html::encode($this->title) ?>
</div>
  <div class="card-body ">
    <!--  -->
    <div class="custom-control custom-radio custom-control-inline">
    <input type="radio" class="custom-control-input" id="check" name="RadiosExample">
    <label class="custom-control-label" for="check">ทั้งหมด</label>
    </div>

    <!-- Default inline 2-->
    <div class="custom-control custom-radio custom-control-inline">
    <input type="radio" class="custom-control-input" id="uncheck" name="RadiosExample">
    <label class="custom-control-label" for="uncheck">ยกเลิก</label>
    </div>
    
    <hr>
    

    <form action="<?= Url::to(['/backend/edoc-sent/sends']) ?>">
        <input type="hidden" id="e_main_id" value="<?= $model['e_main_id'] ?>">
        <input type="hidden" id="edoc_id" value="<?= $model['edoc_id'] ?>">
        <input type="hidden" id="e_id" value="<?= $model['e_id'] ?>">        
    <?php    
    foreach($dep as $val){ 
        echo '<div class="custom-control custom-checkbox custom-control-inline col-2">';
        echo '<input type="checkbox" class="custom-control-input" name="dep[]" id="'.$val["dep_id"].'" value="'.$val["dep_id"].'">';
        echo '<label class="custom-control-label" for="'.$val["dep_id"].'">'.$val["dep_name"].'</label>';
        echo '</div>';
    }    
    ?>
    </form>
    <br>
    <hr>
    <a  class="btn btn-primary" id="sendd">แจ้งเวียน</a>
  </div>
</div>

<?php
$script = <<< JS
    $("#sendd").click(function(){
        var ward = [];
        var id = $("#e_main_id").val();
        $('input[name="dep[]"]').each(function () {
            if ($(this).is(':checked')) {
                ward.push($(this).val());
            }
        });
        if(ward.length === 0) return;
        console.log(ward);
        $.ajax({
            url: $('form').attr('action'),
            type: "POST",
            data: {
                ward: ward,
                id: id           
            },
            success: function (data, textStatus, jqXHR) {
                
            }
        });
    });

    $("input[type=radio]").on("change", function(){        
        if(document.getElementById('check').checked) {
            $("input[type=checkbox]").prop('checked', true)
        }else if(document.getElementById('uncheck').checked) {
            $("input[type=checkbox]").prop('checked', false);
        }
    });
    

JS;
$this->registerJs($script);
?>
