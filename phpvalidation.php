<?php include "conn.php" ?>

<?php
$fnameErr = $lnameErr = $numberErr = $emailErr =  $passwordErr = $cpasswordErr =  "";
$fname = $lname = $number = $email = $hashed_password = $cpassword =  "";

if (isset($_POST["submit"])) {
    if (empty($_POST["fname"])) {
        $fnameErr = "Please enter your name";
    } else {
        $fname = ($_POST["fname"]);
    }

    if (empty($_POST["lname"])) {
        $lnameErr = "Please enter your name";
    } else {
        $lname = ($_POST["lname"]);
    }

    if (empty($_POST["email"])) {
        $emailErr = "Please enter your email";
    } else {
        $email = ($_POST["email"]);

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }
    }

    if (empty($_POST["number"])) {
        $numberErr = "Please enter your contact number";
    } else {
        $number = ($_POST["number"]);

        if(!preg_match('/^[0-9]{10}+$/', $number)) {
            $numberErr = "Only numbers are allowed";
        }
    }

    if (empty($_POST["password"])) {
        $passwordErr = "Please enter your password";
    } else {
        $password = ($_POST["password"]);
        $lowercase = preg_match('@[a-z]@', $password);
        $uppercase = preg_match('@[A-Z]@', $password);
        $numeric = preg_match('@[0-9]@', $password);
        $specialchar = preg_match('@[^\w]@', $password);
        
        if(!$lowercase || !$uppercase || !$numeric || !$specialchar || strlen($password) < 8) {
            $passwordErr = "Password should contain at least one lowercase letter, one uppercase letter, one numeric digit, one special character, and be at least 8 characters long.";
        }else{
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        }
    }
    if (empty($_POST["cpassword"])) {
        $cpasswordErr = "Please enter your confirm password";
    } else {
        $cpassword = ($_POST["cpassword"]);
    }

    // Insert data into database only if there are no errors
    if (empty($fnameErr) && empty($lnameErr) && empty($numberErr) && empty($emailErr) && empty($passwordErr) && empty($cpasswordErr)) {
        // Check if email already exists in database
        $email_check_query = "SELECT * FROM users WHERE email='$email' LIMIT 1";
        $result = mysqli_query($conn, $email_check_query);
        $user = mysqli_fetch_assoc($result);
        if ($user) { // If email already exists
            $emailErr = "Email already exists";
        } else { // If email does not exist, insert data into database
            $sql = "INSERT INTO users (fname, lname, number, email, password) 
            VALUES ('$fname', '$lname', '$number', '$email', '$hashed_password')";


            if(mysqli_query($conn, $sql)) {
                ?>

                <script>
                    window.location.href = 'login.html';
                </script>
                <?php
            } else {
                echo "ERROR: Sorry, something went wrong. " . mysqli_error($conn);
            }

            // Close connection
            mysqli_close($conn);
        }
    }
}
?>
