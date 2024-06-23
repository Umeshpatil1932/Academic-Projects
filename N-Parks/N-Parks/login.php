 <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login Page</title>
  <link rel="stylesheet" href="styles.css"> <!-- Linking external CSS file -->
  <style>
            body {
              font-family: Arial, sans-serif;
              font-weight: bold;
              margin: 0;
              padding: 0;
              display: flex;
              justify-content: center;
              align-items: center;
              height: 100vh;
              background-color: #f4f4f4;
            }

            .login-container {
              background-color: #fff;
              padding: 20px;
              border-radius: 5px;
              box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
              width: 500px;
              height: 400px;
            }

            .login-form {
              max-width: 300px;
              margin: 0 auto;
            }

            .login-form h2 h1 {
              text-align: center;
              margin-bottom: 20px;
            }

            .input-group {
              margin-bottom: 15px;
            }

            .input-group label {
              display: block;
              margin-bottom: 5px;
              font-weight: bold;
              font-size: 20px;
            }
            .input-group.label.a{
                align-items: center;
            }

            .input-group input {
              width: 95%;
              height: 50px;
              padding: 6px;
              border-radius: 3px;
              border: 2px solid #ccc;
            }

            button {
              width: 100%;
              height: 60px;
              font-size: 25px;
              padding: 6px;
              border: none;
              border-radius: 3px;
              background-color: #007bff;
              color: #fff;
              cursor: pointer;
              transition: background-color 0.3s ease;
            }

            button:hover {
              background-color: #0056b3;
            }

  </style>
</head>
<body>
  
  <div class="login-container">
    <form method="POST" action="login.php">
        <h1>Login for the Give Suggestion</h1>
        <!-- <h2>Login</h2> -->
      <div class="input-group">
        <label for="username">Username</label>
        <input type="email" id="email" name="email" placeholder="Enter your Email" required>
      </div>
      <div class="input-group">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" placeholder="Enter your password" required>
      </div>
      <button type="submit">Login</button>
        
        <label for="signup"><center><a href="registration.php"><h3>for New User</h3></a></center></label>
    </form>
  </div>
</body>
</html>
 <?php

    $login = false;
    $ShowError = false;
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        include('_dbconnect.php');
        $conn = mysqli_connect($servername, $username, $password, $database);
        $email = $_POST['email'];
        $pass = $_POST['password'];
        if (!$conn) {
            die("Fail TO Connect with Database ! Due to this Error" . mysqli_connect_error());
        } else {
            // Inseating Data to Database
            // $sql="INSERT INTO userdb (name, email, mobile_no, password, dt) VALUES ('$name', '$email', '$mno', '$pass', current_timestamp());";
            $sql = "Select * from user where email='$email' AND pass='$pass'";
            $res = mysqli_query($conn, $sql);
            $num = mysqli_num_rows($res);
            if ($num == 1) {
                $login = true;
                session_start();
                $records=mysqli_fetch_assoc($res);
                $u_data=array($records['srno'],$records['uname'],$records['email'],$records['pass']);
                $id=$u_data['2'];
                $srno=$u_data['0'];
                $_SESSION['loggedin'] = true;
                $_SESSION['u_data'] = $u_data;
                $_SESSION['id']=$id;
                $_SESSION['srno']=$srno;
            } else {
                $ShowError = "Invalid Login Credentials !";
                echo "<script>alert('$ShowError')</script>";
            }

        }
    }

    ?>
    <?php
    if ($login == true) {
        header("location:suggestion.php");
    }
    ?>