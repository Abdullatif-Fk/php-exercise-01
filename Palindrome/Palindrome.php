
<style>
body{
    background-color:blue;
}
#content{
width:60%;
margin-top:10%;
margin-left:25%; 

}
#input{
    margin-left:25%;
    margin-top:20px;
}
</style>


<?php
$check=-1;

function Palindrome($string){   
    if (strrev($string) == $string){   
        return 1;   
    } 
    else{ 
        return 0; 
    } 
}
if(isset($_POST['submit'])){
    
    $check=Palindrome($_POST['input']);
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div id="content">
    <form method="POST">
        <h1>Enter String to Chek if the string is a palindrome :</h1>
        <input type="text" name ="input" id="input">
        <input type="submit" name="submit">
        <p>
        <?php
            if($check ==1){
                echo "This string is a palindrome";

            }else if ($check==0){
                echo"This string is not a palindrome";
            }else{echo"";}
        
        
        ?>
        
        </p>
       
    </form>
    </div>
    
</body>
</html>