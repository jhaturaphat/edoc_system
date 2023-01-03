<?php
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Edoc Main: ' . $xmodel['edoc_name'];
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
    

    <form id="form_share" action="<?= Url::to(['/backend/edoc-main/share-to']) ?>"> 
        <input type="hidden" name="_csrf" id="_csrf" value="<?=\Yii::$app->request->getCsrfToken()?>" />   
        <input type="hidden" id="e_main_id" value="<?= $xmodel['e_main_id'] ?>">
        <input type="hidden" id="edoc_id" value="<?= $xmodel['edoc_id'] ?>">
        <input type="hidden" id="e_id" value="<?= $xmodel['e_id'] ?>">        
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
    <a  class="btn btn-primary" id="btn_share">แจ้งเวียน</a>
  </div>
</div>

<?php
$script = <<< JS
    $("#btn_share").click(function(){        
        var ward = [];        
        $('input[name="dep[]"]').each(function () {
            if ($(this).is(':checked')) {
                ward.push($(this).val());
            }
        });
        if(ward.length === 0) return;
        //console.log(ward);
        $.ajax({
            url: $('#form_share').attr('action'),
            type: "POST",
            data: { 
                _csrf : $("#_csrf").val(),            
                ward: ward,                
                e_id: $("#e_id").val(),         
                edoc_id: $("#edoc_id").val(),         
                e_main_id: $("#e_main_id").val()         
            },
            success: function (data, textStatus, jqXHR) {
                if(jqXHR.status === 200){
                    Swal.fire({                    
                    icon: 'success',
                    title: 'บันทึกสำเร็จ',
                    showConfirmButton: false,
                    timer: 1500
                    }); 
                    setTimeout(() => {
                        $("input[type=checkbox]").prop('checked', false);
                        $("#modal_send").modal("hide");
                    }, 1500); 
                }                
            },
            error: function(jqXHR,textStatus,error){  
                
                console.log(error);
                console.log(jqXHR);
                console.log(textStatus);
                Swal.fire({                    
                    icon: 'error',
                    title: jqXHR.status,
                    text: error,
                    showConfirmButton: true
                });                
                $("input[type=checkbox]").prop('checked', false);
                $("#modal_send").modal("hide");
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
