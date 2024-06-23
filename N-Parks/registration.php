<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Page</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }

        .fname {
            text-align: center;
            margin-top: 20px;
        }

        .fh3 {
            color: #333;
        }

        form {
            width: 500px;
            margin: 0 auto;
            background: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0px 10px 10px 30px rgba(0,0,0,0.1);
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: calc(100% - 22px);
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            outline: none;
        }

        input[type="text"]:focus,
        input[type="email"]:focus,
        input[type="password"]:focus {
            border-color: #3498db;
        }

        button.f-btn {
            padding: 10px 20px;
            margin-top: 10px;
            border: none;
            border-radius: 5px;
            background-color: #3498db;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button.f-btn:hover {
            background-color: #2980b9;
        }

        a.btn-reg-sign {
            text-decoration: none;
            color: #3498db;
        }
    </style>
</head>
<body>
<div class="fname">
        <h2 class="fh3">Welcome To Registration Form Of SUGGESTION</h2>
    </div>
    <br>
    <br>
    <form action="registration.php" method="post">
        <center>
            <input type="text" name="name" id="name" placeholder="Enter Your Name*" required><br>
            <input type="email" name="email" id="email "placeholder="Enter Email ID *" required><br>
            <input type="text" name="mobile" id="mobile"placeholder="Enter Your Mobile Number *" maxlength="10" minlength="10" pattern="[0-9]{10}" required><br>
            <input type="password" name="pass" id="pass"placeholder="Enter Password*"  required><br>    
            <button type="submit" class="f-btn" id="submit-btn" onclick="">Submit</button>
            <button type="reset" class="f-btn">Reset</button><br>
            <em>Already Have an Account ?<a href="login.php" class="btn-reg-sign">SIGN IN</a></em>
            
        </center>        
    </form>
    <?php
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            
            include ('_dbconnect.php');
            
            $uname=$_POST['name'];
            $email=$_POST['email'];
            $mob=$_POST['mobile'];
            $pass=$_POST['pass'];
            $existSql="SELECT * FROM user WHERE uname='$email';";
            $result=mysqli_query($conn,$existSql);
            $numExistRows=mysqli_num_rows($result);
            if($numExistRows > 0){
                $ShowError="Email Already Exist";
                echo "<script>alert('$ShowError');</script>";
            }
            else{
                $sql="INSERT INTO `user` (`uname`, `email`, `mob`, `pass`, `date`) VALUES ('$uname', '$email', '$mob', '$pass', current_timestamp());";
                $res=mysqli_query($conn,$sql);
                if ($res) {
                    echo "<script>
                    alert('Registrition is Completed ');
                    </script>";
                }
                if($res){
                    header("location:login.php");
                }
            }
            
        }
    ?>
</body>
</html>