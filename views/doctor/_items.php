   

    
    <?php
        foreach($model as $item){
    ?>
    <div class="card-x">   
        <img  id="show_profile" src="<?= Yii::getAlias('@web') ?>/<?= $item['image'] ?>" alt="">               
        <div class="profile">
            <ul> วันทีออกตรวจ
                <?php foreach($item['work_date'] as $val){ ?>
                <li><?= $val['name'] ?></li>
                <?php } ?>
            </ul>
        </div>
    </div> 
    <?php
        }        
    ?>  

<?php 
 //print_r($model);
$this->registerJs(<<<JS
    
JS
);
?>

<script>
    $(function(){
       $("#show_profile").click(function(){
        console.log($(this).attr('src'));
       });
    })
</script>


<style scoped>
    .card-x .profile {    
    display: none;
    position: absolute;
    width: 100%;
    height: 50%;
    bottom: 9%;
    background-color: #FFFFFF;
    text-align: center;
    opacity: 0.9;
    transition: all .5s;
}
    .card-x > .profile ul{  
        /* text-align: left; */
        color: #000;           
        padding: 0;   
    }
    .card-x > .profile ul li{
        color: #000;
        padding: 0px 0 0 15px;
        text-align: left;
    }
</style>
