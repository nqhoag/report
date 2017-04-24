<?php

error_reporting(E_ALL);
set_time_limit(0);
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<title>Setting</title>

</head>
<body>

<h2>Setting Demo</h2>

<div class="tabs">
    <?= $tab ?>
</div>
<form  method="post">
    
    <?=  $sheetData?>
    
    <button class="success"> Lưu thay đổi </button>
</form>
<?php
echo $style;

?>
<style>
    table tr td {
        border: 1px solid #ddd;
    }
</style>
<script>
    function showorhide(){
        $( "select.index" )
            .filter(function( index ) {
              return $(this).val() == 1;
            }).parent().find("input,select").show();
    }
    showorhide();
    $("select.index").on("change", function (){
        if($(this).val() == 1)
            $(this).parent().find("input, select:not(.index)").show();
        else
            $(this).parent().find("input, select:not(.index)").hide();
        
    })
</script>
<body>
</html>

