<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>hello</title>
  </head>
  <body>
    <?php
include("header.html");


$filename = 'friends.txt';


$file = fopen( $filename, "a" );
if (isset($_POST['input']) && !empty($_POST['input'])) {
  $friend = $_POST['input'];
}
if (isset($friend) && $friend!="") {

    fwrite( $file, $friend);
  }
    fclose($file);



$file = fopen( $filename, "r" );
if (isset($_POST['input'])) {
  while (!feof($file))
  {
    $line= fgets($file);
    echo "<li >$line  </li>";

  }
}
fclose($file);



if (isset($friend) && $friend!=""){
  $file = fopen( $filename, "a" );
  fwrite( $file, "".PHP_EOL);
  fclose($file);
}


if (isset($_POST['nameFilter']) && $_POST['nameFilter']!="") {
  $filter = $_POST['nameFilter'];
  $file = fopen( $filename, "r" );
  if (isset($_POST['startingWith'])){
    while(!feof($file)){
        $line= fgets($file) ;
        if (strpos($line,$filter)===0){
          echo "<li>$line </li>";
        }
    }
  }
  else {
    while(!feof($file)){
        $line= fgets($file) ;
        if (strstr($line,$filter)!==false){
          echo "<li>$line </li>";
        }
    }
  }

  fclose($file);
}



include("footer.html");


     ?>
  </body>
</html>
