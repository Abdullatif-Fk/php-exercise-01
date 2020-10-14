
<?php







if($_SERVER["REQUEST_METHOD"]=='POST'){

    $name_error = $email_error = $username_error = $password_error = $day_error = $year_error = $SSN_error = $phone_error="";
    $name = $email = $username = $password =$month =$day = $year = $SSN = $phone ="";
    
    $info_arraytemp="";
    

    function test_input($data){
        $data=trim($data);
        $data=stripcslashes($data);
        $data=htmlspecialchars($data);
        return $data;
    }



    function nameChech(){
        $name=test_input($_POST["name"]);
        if( empty($name)){
            $name_error="Name is required.";
            return $name_error;
        
        }else if(!preg_match("/^[a-zA-Z-' ]*$/",$name)){
            $name_error="Only letters and white space allowed";
            return $name_error;    
             
        }
        else{
            return true;
        }
            

      }



    function emailCheck(){
        $email=test_input($_POST["email"]);  
        if( empty($email) ){
                return  $email_error="Email is required.";
            }else if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
                return $email_error = "Invalid email format";
            }else{
                return true;
            }
            
        }





        function usernameCheck(){
            $username=test_input( $_POST["username"]  );
            if(  empty($username)  ){
                return   $username_error="Username is required.";
            }else if(!preg_match("/^[a-zA-Z-' ]*$/",$username)){
                return  $username_error="Invalid username format";
    
            }else{
                return true;
            }
        }
        
        
        function passwordCheck(){
            $password=test_input($_POST["password"]);
            $passwordc=test_input($_POST["passwordconfirm"]);
            if(empty( $_POST["password"]) || empty($_POST["passwordconfirm"]) ){
                return  $password_error="Password is required.";
            }else if($password===$passwordc){    
                $password_error="Password is correct."; 
                return true;
            }else{
                return  $password_error="Password is not correct.";
            }
        }



        function birthdayCheck(){
            $day=test_input( $_POST["BirthDay"]  );
            if(  empty($_POST["BirthDay"])  ){
                return $day_error="BirthDay is required.";
            }else if( !preg_match("/^[0-9]{2}$/",$day) ){
                return  $day_error="Enter 2 digits please";    
            }else{
                return true;

            }    
        }



        function birthyearCheck(){
            $year=test_input( $_POST["BirthYear"]  );
            if(  empty($_POST["BirthYear"])  ){
                return  $year_error="BirthYear is required.";
            }else if( !preg_match("/^[0-9]{4}$/",$year)  ){
                return  $year_error="Enter 4 digits please";
            }else{
                return true;
            }
        
        }


        function SSNCheck(){
            $SSN=test_input( $_POST["ssn"]  );
            if(  empty($_POST["ssn"])  ){
                return $SSN_error="SSN is required.";
            }else  if( !preg_match("/^[0-9]{3}-[0-9]{2}-[0-9]{4}$/",$SSN)  ){
                return $SSN_error="SSN should be like 154-58-6987 ";
            }else{
                return true;
            }
            
        }



        function phoneCheck(){
            $phone=test_input( $_POST["phone"]  );
            if(  empty($_POST["phone"])  ){
                return $phone_error="Phone number is required.";
            }else if( !preg_match("/^((961[\s+-]*(3|7(0|1)))|(03|7(0|1)))[\s+-]*\d{6}$/",$phone)  ){
                return $phone_error=" The phone number should be Like 961(3,03,70,71)234578";
            }
            else {
                return true;
            }
        }


        $name_error=nameChech();
        $username_error=usernameCheck();
        $email_error=emailCheck();
        $password_error=passwordCheck();
        $day_error=birthdayCheck();
        $year_error=birthyearCheck();
        $SSN_error=SSNCheck();
        $phone_error=phoneCheck();
        $info_array = array($_POST["name"],$_POST["email"],$_POST["username"],$_POST["password"],$_POST["passwordconfirm"],$_POST["BirthMonth"],$_POST["BirthDay"],$_POST["BirthYear"],$_POST["ssn"],$_POST["phone"]);

        
        $test=$name_error + $username_error +$email_error +$password_error +$day_error +$year_error+ $SSN_error+ $phone_error;
       
       
        if($test==8){
        $info_arraytemp=$info_array;
        
        
        if(isset($_POST['submit'])){
            header('Location: safe.php');
                
            }
   

       }
       

       if ( $_POST["usernamel"] ===$info_array[2] && $_POST["passwordl"]===$info_array[3] ){
        //print_r($test);
        //print_r($info_arraytemp);
      //  if(isset($_POST["submit1"])){
            header('Location: safe.php');
                
            //}
   

       }


       
            
     
                
      // print_r ($info_array[3]);

      // print_r ($info_array[2]);
                
        
                

}





?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="pagestyle.css">
    <title>Document</title>
</head>
<body>

 <form id="contactform"  method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
             <div  class="form">
                 
                <div class="register">
                <h1> Register :</h1>
                    <p class="contact"><label for="name">Name</label></p> 
                    <input id="name" name="name" placeholder="First and last name"  tabindex="1" type="text" value="<?php echo $info_array[0]; ?>"  > 
                    <div class="error"><?php if($name_error!=="1"){echo"$name_error";} ?></div>

                    <p class="contact"><label for="email">Email</label></p> 
                    <input id="email" name="email" placeholder="example.thing@domain.com" value=<?php echo "$info_array[1]"; ?> > 
                    <div class="error"><?php if($email_error!=="1"){echo"$email_error";}?></div>


                    <p class="contact"><label for="username">Create a username</label></p> 
                    <input id="username" name="username" placeholder="username"  tabindex="2" type="text" value=<?php echo "$info_array[2]"; ?>> 
                    <div class="error"><?php if($username_error!=="1"){echo"$username_error"; }?></div>


                    <p class="contact"><label for="password">Create a password</label></p> 
                    <input  id="password" name="password" type="password" value=<?php echo "$info_array[3]"; ?>> 
                    
                   
                    <p class="contact"><label for="passwordconfirm">Confirm your password</label></p> 
                    <input  id="passwordconfirm" name="passwordconfirm" type="password" value=<?php echo "$info_array[4]"; ?>> 
                    <div class="error"><?php if($password_error!=="1"){echo"$password_error";} ?></div>
                   
                    <div>
                    <label>Birthday</label>
                    <label class="month"> 
                        <select class="select-style" name="BirthMonth">
                            
                            <option  value="01">January</option>
                            <option value="02">February</option>
                            <option value="03" >March</option>
                            <option value="04">April</option>
                            <option value="05">May</option>
                            <option value="06">June</option>
                            <option value="07">July</option>
                            <option value="08">August</option>
                            <option value="09">September</option>
                            <option value="10">October</option>
                            <option value="11">November</option>
                            <option value="12" >December</option>
                                    
                        </select>
                    </label> <br><br>
                    <div>   
                        <label>Day<input id="day" class="birthday"  name="BirthDay"  placeholder="Day" value=<?php echo "$info_array[6]"; ?> ></label>
                        <span class="error"><?php if($day_error!=="1"){echo"$day_error";} ?></span>
                        <label>Year <input id="year" class="birthyear"  name="BirthYear" placeholder="Year" value=<?php echo "$info_array[7]"; ?> ></label>
                        <span class="error"><?php if($year_error!=="1"){echo"$year_error"; }?></span>
                    </div><br>
                    </div>  
                        
                    <label>Social Security Number <input id="ssn" class="ssn"  name="ssn" placeholder="125-25-6987" value=<?php echo "$info_array[8]"; ?> ></label>
                    <div class="error"><?php if($SSN_error!=="1"){echo"$SSN_error";} ?></div>
                    
                        
                            
                        

                   
                    

                    <p class="contact"><label for="phone">Mobile phone</label></p> 
                    <input id="phone" name="phone" placeholder="phone number Like 961 3 558796" type="text" value=<?php echo "$info_array[9]"; ?>>
                    <div class="error"><?php if($phone_error!=="1"){echo"$phone_error";} ?></div> 
                    <div>
                    <input class="buttom" name="submit" id="submit" tabindex="5" value="Sign me up!" type="submit">
                    </div>        
                </div>
         </form> 
                
                        
                <div class="login">
                <h1> Log in :</h1>
                    <p class="contact"><label for="username">Username</label></p> 
                    <input id="username" name="usernamel" placeholder="username"  tabindex="2" type="text"> 
                    <p class="contact"><label for="username">Password</label></p> 
                    <input id="username" name="passwordl" placeholder="password"  tabindex="2" type="password"> 
                    
                    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
                    <div>
                    <input class="buttom" name="submit1" id="submit" tabindex="5" value="Log in" type="submit">
                    </div>
                    </form>
        

                </div>



</div>
                        
    

    
</body>
</html>
<?php


/*
//echo $bool1 ? 'truen' : 'false n';
echo $bool2 ? 'true us' : 'false us';
echo $bool3 ? 'true em' : 'false em';
echo $bool4 ? 'true ps' : 'false ps';
echo $bool5 ? 'true d' : 'false d';
echo $bool6 ? 'true y' : 'false y';
echo $bool7 ? 'true s' : 'false s';
echo $bool8 ? 'true p' : 'false p';*/



?>