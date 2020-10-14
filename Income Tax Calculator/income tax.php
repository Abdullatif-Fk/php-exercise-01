<?php
$error1=$error2=$error1="";

if(is_numeric($_POST["Salary"]) ){
$salary=$_POST["Salary"];
//$salary=number_format($_POST["Salary"],2);
$ySalary=$salary*12;
//echo $ySalary;
$ysalary=number_format($ySalary,2);

if($salary <= 10000){
    $tax=0;
}else if($salary >= 10000 && $salary <= 25000){
    $tax=0.11;
    $social=0.04;
}else if($salary >= 25000 && $salary <= 50000){
    $tax=0.30;
    $social=0.04;

}else if($salary >= 50000){
    $tax=0.45;
    $social=0.04;
}
$taxamountm=$salary*$tax;
$taxamounty=$taxamountm*12;
$socialSecuritym=$salary*$social;
$socialSecurity=$socialSecuritym*12;

if(is_numeric($_POST["TaxFree"]) ){
    $TaxFree =$_POST["TaxFree"];
    $TaxFreem=($salary+$TaxFree)-$taxamountm-$socialSecuritym;
    $TaxFreey=$TaxFreem*12;


}

function check(){

    return $_POST["radio"];
}

function errors(){
    if(isset($_POST['submit']))
    if ($_POST["Salary"]==""){return $error1="please give us salary value.";
    }else if (empty($_POST["TaxFree"])){return $error2="please give us Tax Free Allowance in USD.";}
    
    if (empty($_POST["radio"])===""){ return $error3="please check monthly or Yearly.";}
    
    

}








}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <form method="POST" class="form">
    <div class="center">
        <p class="contact"><label for="Salary">Salary in USD: </label></p> 
        <input id="Salary" name="Salary" placeholder="Salary in USD"  tabindex="1" value=<?php echo $salary ;?> > 
        <span class="error"><?php echo $error1;?></span>
        <p class="contact"><label for="TaxFree">Tax Free Allowance in USD </label></p> 
        <input id="TaxFree" name="TaxFree" placeholder="Tax Free Allowance in USD"  tabindex="2" value=<?php echo $TaxFree ;?> >
        <span class="error"><?php echo $error2; ?></span>
        <div>
        <input type="radio" id="monthly" name="radio" value="monthly">
        <label for="monthly">monthly</label><br>
        <input type="radio" id="Yearly" name="radio" value="Yearly">
        <label for="Yearly">Yearly</label><br>
        <span class="error"><?php  echo $error3?></span>
        </div>
       
        <input class="buttom" name="submit" id="submit" tabindex="5" value="submit" type="submit">
    
    </div>
    


    <table > 
    <thead> 
    <tr> 
        <td></td> 
        <th>monthly</th> 
        <th>Yearly </th> 
        
    </tr> 
    </thead> 
    <tbody> 
    <tr id='row'> 
        <th>Total salary</th> 
        <td> <p><?php if(check()==="monthly") {echo $salary." $";}?></p> </td> 
        <td> <p><?php if(check()==="Yearly") {echo $ySalary." $";}?></p> </td> 
         
    </tr> 
    <tr> 
        <th>Taxamount</th> 
        <td> <p><?php if(check()==="monthly"){echo $taxamountm." $";}?></p> </td> 
        <td> <p><?php if(check()==="Yearly") {echo $taxamounty." $";}?></p> </td> 
         
    </tr> 
    <tr> 
        <th>Socialsecurityfee</th> 
        <td> <p><?php if(check()==="monthly"){ echo $socialSecuritym." $";}?></p> </td> 
        <td> <p><?php if(check()==="Yearly") {echo $socialSecurity." $";}?></p> </td> 
        
    </tr> 
    <tr> 
        <th>Salaryaftertax</th> 
        <td><p><?php if(check()==="monthly"){ echo $TaxFreem." $";}?></p></td> 
        <td><p><?php if(check()==="Yearly") {echo $TaxFreey." $";}?></p></td> 
         
    </tr> 
    </tbody> 
    </table> 
    </form>
    
</body>
</html>