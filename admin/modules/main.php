<div class="clear"></div>
<div class="main">
<?php
            if(isset($_GET['action']) && $_GET['query']){
                $tam=$_GET['action'];
                $query=$_GET['query'];
            }else{
                $tam='';
                $query='';
            }
            if($tam=='qldanhmucsanpham' && $query=='them'){
                include("modules/qldanhmucsp/them.php");
                include("modules/qldanhmucsp/lietke.php");
            }elseif($tam=='qldanhmucsanpham' && $query=='sua'){
                include("modules/qldanhmucsp/sua.php");
            }elseif($tam=='qlsanpham' && $query=='them'){
                include("modules/qlsp/them.php");
                include("modules/qlsp/lietke.php");
            }elseif($tam=='qlsanpham' && $query=='sua'){
                include("modules/qlsp/sua.php");
            }else{
                include("modules/dashboard.php");
            }
            ?>
</div>