<?php

error_reporting(E_ALL);
set_time_limit(0);

date_default_timezone_set('Europe/London');

?>

<?php
    function build_table($array){
    // start table
    $html = '<table>';
    // header row
    $html .= '<tr>';
    $html .= '<th> STT </th>';
    foreach($array["1"] as $key=>$value){
            $html .= '<th>' . $key . '</th>';
    }
    $html .= '</tr>';

    // data rows
    foreach( $array as $key=>$value){
        $html .= '<tr>';

	        foreach($value as $key2=>$value2){
	            $html .= '<td>' . $value2 . '</td>';
	        }
        $html .= '</tr>';
    }

    // finish table and return it

    $html .= '</table>';
    return $html;
}
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<title>PHPExcel Reader Example #01</title>

</head>
<body>

<h1>PHPExcel Reader Example #01</h1>
<h2>Simple File Reader using PHPExcel_IOFactory::load()</h2>
<?php

/** Include path **/
set_include_path(get_include_path() . PATH_SEPARATOR . '../../../Classes/');

/** PHPExcel_IOFactory */
include 'PHPExcel/IOFactory.php';


$inputFileName = './sampleData/example1.xls';
echo 'Loading file ',pathinfo($inputFileName,PATHINFO_BASENAME),' using IOFactory to identify the format<br />';
$objPHPExcel = PHPExcel_IOFactory::load($inputFileName);


echo '<hr />';

$sheetData = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);

echo '<pre>';
 var_dump(json_encode($sheetData));
echo '</pre>';

echo build_table($sheetData);


// $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
// PHPExcel_Settings::setZipClass(PHPExcel_Settings::ZIPARCHIVE);
// $objWriter->save('./save/example1.xls');
?>
<body>
</html>