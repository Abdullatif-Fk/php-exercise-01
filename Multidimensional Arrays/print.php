<?php 
 
 $array=Array ( 
    "musicals" => 
    Array ( 
    "Oklahoma" ,
    "The Music Man" ,
    "South Pacific",
    ),
    "dramas" => 
    Array ( 
     "Lawrence of Arabia ",
     "To Kill a Mockingbird ",
     "Casablanca"
    ),
    "mysteries" => 
    Array ( 
    "The Maltese Falcon ",
    "Rear Window ",
    "North by Northwest" 
    ) 
    )









?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
<table>
<?php 
foreach ($array as $key => $value) {
   // $i=mb_strtoupper($key);
   $baz = strtoupper($key);
    echo "<td> $baz</td>";
    foreach ($value as $k => $v) {
        echo "<tr>";
        echo "<td>----> $k = </td>"; // Get index.
        echo "<td>$v</td>"; // Get value.
        echo "</tr>";
    }
}
?>
</table>


<table>
<p> Sorted Array :</p>
<?php 
ksort($array);


foreach ($array as $key => $value) {
    // $i=mb_strtoupper($key);
    $baz = strtoupper($key);
     echo "<td> $baz</td>";
     foreach ($value as $k => $v) {
         echo "<tr>";
         echo "<td>----> $k = </td>"; // Get index.
         echo "<td>$v</td>"; // Get value.
         echo "</tr>";
     }
 }
?>
</table>



    
</body>
</html>