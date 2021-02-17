   

    
    <?php
        foreach($model as $item){
    ?>
    <div class="card-x">   
        <img  id="show_profile" src="<?= Yii::getAlias('@web') ?>/<?= $item['image'] ?>" alt="">               
        <div class="profile">
        <div class='text'>วันทีออกตรวจ</div>
            <ul> 
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
/* ส่วนของ หมอ */
.doctor{
    width: 95%;
    margin: 0 auto;
    display: grid;
    grid-template-columns: 1fr 1fr 1fr 1fr;
}
.card-x{
    position: relative;
    width: 80%;   
    margin: 2rem auto;
    padding-bottom: 0;
}
.card-x img {
    position: inherit;
    margin: 0 auto;
    width: 100%; 
    height: 100%;   
    padding: 0;
}
.card-x .profile {    
    position: absolute;    
    display: none;  /*block */  
    width: 100%;
    height: 50%;
    bottom: 0;
    background-color: #FFFFFF;
    text-align: center;
    opacity: 0.9;
    transition: all .5s;
}
    .card-x > .profile ul{  
        /* text-align: left; */
        color: #000;           
        padding: 0; 
        buttom:0;  
    }
    .card-x > .profile >.text{
        height:3rem;
        background-color: #4ebdb7;
        color:#fff;
        display: block;
        font-size: 1.17em;        
        font-weight: bold;
    }
    .card-x > .profile ul li{
        color: #000;
        padding: 0px 0 0 15px;
        border-bottom:1px dotted #4ebdb7;
        text-align: left;
        transition: all .5s;
    }

.card-x img:hover ~ .profile, .card-x .profile:hover{
    display: block;
}
</style>
