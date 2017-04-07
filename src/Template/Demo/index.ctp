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
<body>
</html>

