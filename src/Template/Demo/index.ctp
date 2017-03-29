<?php
use Cake\Routing\Router;
error_reporting(E_ALL);
set_time_limit(0);
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<title>PHPExcel Reader Example #01</title>

</head>
<body>

<h2>Demo</h2>
<?php

echo 'Export file <a href="'. Router::url(['controller' => 'Demo', 'action' => 'download', 1]).'"> Excel </a><br />';
echo 'Input Data <a href="'. Router::url(['controller' => 'Demo', 'action' => 'input', 1]).'"> hear </a><br />';
?>


<body>
</html>