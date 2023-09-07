<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<?php

$labelh = "22";
$labelw = "40";


$begrenzteLaenge = 10;
$isError = false;

var_dump($begrenzteLaenge);
if (isset($_POST['code1']) && $_POST['code1'] != ""){
    $code1 = $_POST['code1'];
    if (strlen($code1) > $begrenzteLaenge) {
        $isError = true;
        echo "Zeile 1 ist zu lang(max: 10 Zeichen)";
    } else {
        $print1 = "AE,550,10,1,1,1,1,".$code1."\n";
    }
}
var_dump($begrenzteLaenge);
if (isset($_POST['code2']) and $_POST['code2'] != ""){
    $code2 = $_POST['code2'];
    var_dump($begrenzteLaenge);
    if (strlen($code2) > $begrenzteLaenge) {
        $isError = true;
        echo "Zeile 2 ist zu lang(max: $begrenzteLaenge Zeichen)";
    } else {
        $print2 = "AE,480,10,1,1,1,1,".$code2."\n";
    }
}
    


if (isset($_POST['code3']) and $_POST['code3'] != ""){
    $code3 = $_POST['code3'];
    if (strlen($code3) > $begrenzteLaenge) {
        $isError = true;
        echo " Zeile 3 ist zu lang(max: 10 Zeichen)";
    }   else  {
        $print3 = "AE,410,10,1,1,1,1,".$code3."\n";
    }
}

if (isset($_POST['code4']) and $_POST['code4'] != ""){
    $code4 = $_POST['code4'];
    if (strlen($code4) > $begrenzteLaenge) {
        $isError = true;
        echo "Zeile 4 ist zu lang(max:10 Zeichen)";
    } else {
        $print4 = "AE,340,10,1,1,1,1,".$code4."\n";
    }
    
}

if (isset($_POST['code5']) and $_POST['code5'] != ""){
    $code5 = $_POST['code5'];
    if (strlen ($code5) > $begrenzteLaenge) {
        $isError = true;
        echo "Zeile ist zu lang(max:10 Zeichen)";
    } else { $print5 = "AE,270,10,1,1,1,1,".$code5."\n";
    }
    
}

if (isset($_POST['code6']) and $_POST['code6'] != ""){
    $code6 = $_POST['code6'];
    if (strlen($code6) > $begrenzteLaenge) {
        $isError = true;
        echo "Zeile ist zu lang(max: 10 Zeichen)";
    } else { 
        $print6 = "AE,200,10,1,1,1,1,".$code6."\n";
    }
    }
    

if (isset($_POST['code7']) and $_POST['code7'] != ""){
    $code7 = $_POST['code7'];
    if (strlen($code7) > $begrenzteLaenge) {
        $isError = true;
        echo "Zeile ist zu lang(max:10 Zeichen)";
    } else {
        $print7 = "AE,130,10,1,1,1,1,".$code7."\n";
    }
    
}

if (isset($_POST['code8']) and $_POST['code8'] != ""){
    $code8 = $_POST['code8'];
    if (strlen($code8) > $begrenzteLaenge) {
        $isError = true;
        echo "Zeile ist zu lang(max:10 Zeichen)";
    }   else {$print8 = "AE,60,10,1,1,1,1,".$code8."\n";
    }
}


//echo "++++".$code1."------<br>";
//echo "++++".$code2."-------<br>";

if ($isError == false) {

    if (isset($code1) or isset($code2) or isset($code3) or isset($code4) or isset($code5) or isset($code6) or isset($code7) or isset($code8)){  
    $textdruck = "^Ll10\n
^S2\n
^H19\n
^Q".$labelh."\n
^W".$labelw."\n
^L\n
~R25\n"; // H19
    
    if (isset($print1)){ 
        $textdruck = $textdruck.$print1."\n";
    }
    if (isset($print2)){ 
        $textdruck = $textdruck.$print2;
    }
    if (isset($print3)){ 
        $textdruck = $textdruck.$print3;
    }
    if (isset($print4)){ 
        $textdruck = $textdruck.$print4;
    }
    if (isset($print5)){
        $textdruck = $textdruck.$print5;
    }
    if (isset($print6)){
        $textdruck =$textdruck.$print6;
    }
    if (isset ($print7)){
        $textdruck = $textdruck.$print7;
    }
    if (isset ($print8)){
        $textdruck = $textdruck.$print8."\n";
    }

    $textdruck = $textdruck."E\n";

    Echo "Das Barcode Label wurde auf dem Drucker RDSDRU 30 gedruckt.";

    $fp = fopen ( 'c:\\temp\\1.txt' , 'w' ); // "C:\Temp\kabellable.php"
    fwrite ( $fp , $textdruck );
    fclose ( $fp ); 


    var_dump(file_get_contents('c:\\temp\\1.txt'));
    
    exec ("copy /b c:\\temp\\1.txt \\\\printers.robotron.de\\\RDSDRU030");
}

#(exec ("copy /b c:\\temp\\1.txt \\\\rdspc425.robotron.de\\etikett"));

//echo "<br>".$textdruck."<br>";
}

?>

<HTML>
    <HEAD>
    <TITLE>Robotron - Kabellabel</TITLE>
    </HEAD>
    <BODY BGCOLOR="#FFFFFF">

    <input type="button" id="nocopy" value="nocopy"/>
    <input type="button" id="copy" value="copy"/>
    <script>

document.getElementById("copy").addEventListener("click", function zeilenkopieren(){
    copy = true ;
});


document.getElementById("nocopy").addEventListener("click", function zeilenkopieren() {
    copy = false;
});
let copy = false;

 

    function zeilenkopieren(){
        if (copy) {
        document.forms[0].code5.value = document.forms[0].code1.value;
        document.forms[0].code6.value = document.forms[0].code2.value;
        document.forms[0].code7.value = document.forms[0].code3.value;
        document.forms[0].code8.value = document.forms[0].code4.value;
        }       
    }

/*let eingabefelder = document.forms[0].querySelectorAll();
eingabefelder.forEach(function (zeilenkopieren))    {
    
}*/ 



</script>

<H1>Kabellabel Creation (labelgr��e 40*22 KKKK)</H1>
<form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
    <p>1. Zeile: <input type="text" name="code1" size="   <?php echo $begrenzteLaenge +5; ?>"  maxlength="   <?php echo $begrenzteLaenge; ?>" value="<?php if (isset($code1)){ echo $code1;} ?>"/></p>
    <p>2. Zeile: <input type="text" name="code2" size="   <?php echo $begrenzteLaenge +5; ?>"  maxlength="   <?php echo $begrenzteLaenge; ?>" value="<?php if (isset($code2)){ echo $code2;} ?>"/></p>
    <p>3. Zeile: <input type="text" name="code3" size="   <?php echo $begrenzteLaenge +5; ?>"  maxlength="   <?php echo $begrenzteLaenge; ?>" value="<?php if (isset($code3)){ echo $code3;} ?>"/></p>
    <p>4. Zeile: <input type="text" name="code4" size="   <?php echo $begrenzteLaenge +5; ?>"  maxlength="   <?php echo $begrenzteLaenge; ?>" value="<?php if (isset($code4)){ echo $code4;} ?>"/></p>
    <p>5. Zeile: <input type="text" name="code5" size="   <?php echo $begrenzteLaenge +5; ?>"  maxlength="   <?php echo $begrenzteLaenge; ?>" value="<?php if (isset($code5)){ echo $code5;} ?>"/></p>
    <p>6. Zeile: <input type="text" name="code6" size="   <?php echo $begrenzteLaenge +5; ?>"  maxlength="   <?php echo $begrenzteLaenge; ?>" value="<?php if (isset($code6)){ echo $code6;} ?>"/></p>
    <p>7. Zeile: <input type="text" name="code7" size="   <?php echo $begrenzteLaenge +5; ?>"  maxlength="   <?php echo $begrenzteLaenge; ?>" value="<?php if (isset($code7)){ echo $code7;} ?>"/></p>
    <p>8. Zeile: <input type="text" name="code8" size="   <?php echo $begrenzteLaenge +5; ?>"  maxlength="   <?php echo $begrenzteLaenge; ?>" value="<?php if (isset($code8)){ echo $code8;} ?>"/></p>
    <input type="submit" value="Print Kabellabel" />
</form>


<script>
document.getElementsByName("code1")[0].addEventListener('keyup', zeilenkopieren);
document.getElementsByName("code2")[0].addEventListener('keyup', zeilenkopieren);
document.getElementsByName("code3")[0].addEventListener('keyup', zeilenkopieren);
document.getElementsByName("code4")[0].addEventListener('keyup', zeilenkopieren);

</script>
    
    </BODY>
</HTML>