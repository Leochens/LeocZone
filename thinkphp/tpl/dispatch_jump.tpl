{__NOLAYOUT__}<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no"/>
    {include file="../application/index/view/common/header.html" /}
    <title>跳转提示</title>
    <style>
    .msg{
        display: none;
    }
    </style>
</head>
<body>
    <div class="col-lg-8 col-lg-offset-2 col-xs-10 col-xs-offset-1">
       
        <div class="msg post animated slideInUp">
            
            <?php switch ($code) {?>
            <?php case 1:?>
            <h1><i class="fa fa-check-square fa-5x" aria-hidden="true" ></i></h1>
            <p class="success"><?php echo(strip_tags($msg));?></p>
            <?php break;?>
            <?php case 0:?>
            <h1><i class="fa fa-exclamation-circle fa-5x" aria-hidden="true"></i></h1>
            <p class="error"><?php echo(strip_tags($msg));?></p>
            <?php break;?>
            <?php } ?>
              <p class="">
             我马上就要<a  id="href" href="<?php echo($url);?>"><b style="color:#49c0b6">飞啦</b></a> 嘟嘟嘟： <b id="wait">2</b>
                </p>

        </div>

        
    </div>
    <script type="text/javascript">
        (function(){
            var wait = document.getElementById('wait'),
                href = document.getElementById('href').href;
            var interval = setInterval(function(){
                var time = --wait.innerHTML;
                if(time <= 0) {
                    location.href = href;
                    clearInterval(interval);
                };
            }, 1000);
        })();
        $('#MSG').modal(show);
        $(document).ready(function(){  
        $("#Mymodal").click(function(){  
            $("#new").modal("show")  
        })  
    })  
    </script>


    {include file="../application/index/view/common/script.html" /}
    <script>
    $('.msg').css('display','block');
    </script>
</body>
</html>
