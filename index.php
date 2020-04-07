<?php

if(isset($_POST['signup']))
{

  if(!empty($_POST['email']) && !empty($_POST['pass']) && !empty($_POST['cnfpass']) && !empty($_POST['uname']))
  {
    $connection= mysqli_connect('localhost','root','toor','registerdb');
  

    $email=$_POST['email'];
    $uname=$_POST['uname'];
    $pass= $_POST['pass'];
    $cpass = $_POST['cnfpass'];



      if($connection)

                  {


                      $query = "insert into users (username,email,password) values ('$uname','$email','$pass')";
                      $result=mysqli_query($connection,$query);
                      if($result)
                      {
                          echo '<script type="text/JavaScript">  
                          alert("Successful "); 
                          </script>' ;
                      }
        

          
          

                  }
                }

                else{
                  echo '<script type="text/JavaScript">  
                  alert("fill all the fields "); 
                  </script>' ;
                }


}


if(isset($_POST['login']))
{

  if(!empty($_POST['email']) && !empty($_POST['pass']))
  {
  $chk = 0;

  $user=$_POST['uname'];  
  $pass=$_POST['pass'];  

  $con=mysqli_connect('localhost','root','toor','registerdb');
  echo '<script type="text/JavaScript">  
  console.log("con"); 
  </script>' ;
  $query="SELECT * FROM users WHERE username='".$user."' AND password='".$pass."'";  
  $result=mysqli_query($con,$query);
  $numrows=mysqli_num_rows($result);  
  if($numrows!=0)  
  {  
      while($row=mysqli_fetch_assoc($result))  
      {  
      $dbusername=$row['username'];  
      $dbpassword=$row['password'];  
     
      }
    
            if($user == $dbusername && $pass == $dbpassword)  
            {  
            
                    echo '<script type="text/JavaScript">  
                      alert("Login successful "); 
                      </script>' ;
                     $chk = 1;
            

            } 
            
         


  }
  
  if($chk == 0) 
  {
   echo '<script type="text/JavaScript">  
   alert("incorrect user name or password "); 
   </script>' ;
 } 
}
else{
  echo '<script type="text/JavaScript">  
   alert("fill all the fields "); 
   </script>' ;
}
}

  ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="index.css">



    
</head>
<body>

<nav class="navbar navbar-default">
  <div class="container-fluid">
  <div class="navbar-header">
      <h3>Register Here</h3>
    </div>
</div>
</nav>
    <div class="container">


    <div class="row headd">
    <h2>Enter the system</h4>
    <h4>It is neccessary to login to your account to sign up for a course</h4>
    </div>
    
   
    <div class="col-md-5  ">

        
        
            <div class="form form-group">
            <h4>ARE YOU NEW? REGISTER</h4>
                  <form  method="post">
                  
                  <div class="rows">
                  <input class="inputs form-control" type="text" name="uname" placeholder="User Name" required="required">
                  </div>
                  <div class="rows">
                  <input class="inputs form-control" type="email" name="email" placeholder="Email" required="required">
                  </div>
                  <div class="rows">
                  <input class="inputs form-control" type="password" name="pass" id="pass" placeholder="Password" required="required" required="required">
                  </div>
                  <input class="inputs form-control" type="password" name="cnfpass" id="cnfpass" placeholder="Confirm Password" required="required">

                  <div class="rows">

                  <button class="inputs button btn btn-default"  type="submit" name="signup">Register</button>
              

                    </div>

                  
                  
                  </form>  


                  

              </div>

   
             

    </div>

    <script>
            var password = document.getElementById("pass");
            var confirm_password = document.getElementById("cnfpass");

            function validatePassword(){
              if(password.value != confirm_password.value) {
                confirm_password.setCustomValidity("Passwords Don't Match");
              } else {
                confirm_password.setCustomValidity('');
              }
            }

            pass.onchange = validatePassword;
            cnfpass.onkeyup = validatePassword;
    </script>

    <div class="col-md-5">

    <div class="form form-group" id="f1">
    <h4>ALREADY A STUDENT? LOGIN</h4>
                  <form  method="post">
                  
                  <div class="rows">
                  <input class="inputs form-control" type="text" name="uname" placeholder="User Name" required="required">
                  </div>
                  
                  <div class="rows">
                  <input class="inputs form-control" type="password" name="pass" placeholder="Password" required="required">
                  </div>
                  <div class="checkbox">
                  <label style="color:white"><input  type="checkbox" name="chk">Remember me?</label>
                  </div>
                  

                  <div class="rows">

                  <button class=" button btn btn-default login" id="b"  type="submit" name="login">Login</button>
                  <br><br><br>
                    </div>

                  
                  
                  </form>  
              </div>
    </div>

   

    
    </div>
      
    
</body>
</html>

<?php

?>