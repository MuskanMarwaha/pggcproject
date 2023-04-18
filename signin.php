<?php include "conn.php" ?>
<?php include "phpvalidation.php" ?>

<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
   
    <link rel="stylesheet" href="s.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <style>.error{color: red;}</style>
   </head>
<body>
  <div class="container">
    <div class="title">Registration</div>
    <div class="content">
    <form id="form" action="" method="POST">
        <div class="user-details">
          <div class="input-box">
            <span class="details">First Name</span>
            <input type="text" placeholder="Enter your First name" name="fname" >
            <span class = "error"> <?php echo $fnameErr;?></span>
          </div>
          <div class="input-box">
            <span class="details">Last Name</span>
            <input type="text" placeholder="Enter your Last name" name="lname" >
            <span class = "error"> <?php echo $lnameErr;?></span>
          </div>
          <div class="input-box">
            <span class="details">Email</span>
            <input type="email" placeholder="Enter your email" name="email" >
            <span class = "error"> <?php echo $emailErr;?></span>
          </div>
          <div class="input-box">
            <span class="details">Phone Number</span>
            <input type="text" placeholder="Enter your number" name="number" >
            <span class = "error"> <?php echo $numberErr;?></span>
          </div>
          <div class="input-box">
            <span class="details">Password</span>
            <input type="password" placeholder="Enter your password" name="password" >
            <span class = "error"> <?php echo $passwordErr;?></span>
          </div>
          <div class="input-box">
            <span class="details">Confirm Password</span>
            <input type="password" placeholder="Confirm your password" name="cpassword" >
            <span class = "error"> <?php echo $cpasswordErr;?></span>
          </div>
        </div>
       
        <div class="button">
          <input type="submit" name="submit" id="submit" value="Register">
        </div>
      </form>
    </div>
  </div>

</body>
</html>
