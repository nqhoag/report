

<?php

error_reporting(E_ALL);
set_time_limit(0);
?>

<h2>Demo</h2>
<?php
echo 'Export file <a href="download"> Excel </a><br />';
echo $style;
?>

<form  method="post">
    
    <?=  $sheetData?>
    
    <button class="success"> Lưu thay đổi </button>
</form>
<input name="txtName" id="txtName">
<span class="errspan">ss</span>

<style>
    table tr td {
        border: 1px solid #ddd;
    }
    
    ::-webkit-input-placeholder {
        text-align: center;
     }

    :-moz-placeholder { /* Firefox 18- */
       text-align: center;  
    }

    ::-moz-placeholder {  /* Firefox 19+ */
       text-align: center;  
    }

    :-ms-input-placeholder {  
       text-align: center; 
    }
    
    .errspan {
        float: right;
        margin-right: 6px;
        margin-top: -40px;
        position: relative;
        z-index: 2;
        color: red;
    }

    .help-tip{
        position: static;
        top:10px;
	text-align: center;
	background-color: #cf2a0e;
	border-radius: 50%;
	width: 17px;
	height: 17px;
	font-size: 13px;
	line-height: 20px;
	cursor: default;
    }

    .help-tip:before{
            content:'!';
            font-weight: bold;
            color:#fff;
    }

    .help-tip:hover p{
            display:block;
            transform-origin: 100% 0%;

            -webkit-animation: fadeIn 0.3s ease-in-out;
            animation: fadeIn 0.3s ease-in-out;

    }

    .help-tip p{	/* The tooltip */
            display: none;
            text-align: left;
            padding: 20px;
            width: 300px;
            border-radius: 3px;
            box-shadow: 1px 1px 1px rgba(0, 0, 0, 0.2);
            right: -4px;
            color: #cf2a0e;
            font-size: 13px;
            line-height: 1.4;
            background-color: #ccffff;
    }

    .help-tip p:before{ /* The pointer of the tooltip */
            position: absolute;
            content: '';
            width:0;
            height: 0;
            border:6px solid transparent;
            border-bottom-color:#1E2021;
            right:10px;
            top:-12px;
    }

    .help-tip p:after{ /* Prevents the tooltip from being hidden */
            width:100%;
            height:40px;
            content:'';
            position: absolute;
            top:-40px;
            left:0;
    }

    /* CSS animation */

    @-webkit-keyframes fadeIn {
            0% { 
                    opacity:0; 
                    transform: scale(0.6);
            }

            100% {
                    opacity:100%;
                    transform: scale(1);
            }
    }

    @keyframes fadeIn {
            0% { opacity:0; }
            100% { opacity:100%; }
    }
    
</style>
<script>
    function setError(message, cell){
        $("#" + cell).after('<div class="help-tip errspan"><p>'+message+'</p></div>');
    }
    <?php
    echo isset($script) ? $script : ""; 
    ?>
</script>


