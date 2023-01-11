 <?php 

include_once 'db/connect.php';
include_once 'db/alert.php';
include_once 'db/function.php';

if(isset($_POST['loginBtn'])){
       



    //collect from database
    $user = $_POST['username'];
    $password = $_POST['password'];





    //check if user exist in the datta base
    $sqlQuery = "SELECT * FROM users WHERE username = :username";
    $statement = $db->prepare($sqlQuery);
    $statement->execute(array(':username' => $user));


    while($row = $statement->fetch()){
      $id = $row['id'];
      $hashed_password = $row['password'];
      $username = $row['username'];

      if(password_verify($password, $hashed_password)){
        $_SESSION['id'] = $id;
        $_SESSION['username'] = $username;

  
      

        return('profile.php');
      }else{
        $result ="<p style ='color: red;'>The pasword or the username is wrong
        </p>";
      }
      }

  }else{
   $warning_msg[] = 'wrong';
  }

    






?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/1ab94d0eba.js" crossorigin="anonymous"></script>
    
    <link rel="stylesheet" href="style.css">
<head>
    <meta charset="utf-8">
  <title>login</title>
</head>

<style>

@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700&display=swap');

* {
    margin: 0;
    border: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: "Poppins", sans-serif;
}

body {
    background: linear-gradient(45deg, #8e2de2, #4a00e0);
    background-repeat: no-repeat;
    min-height: 100vh;
    min-width: 100vw;
    display: flex;
    align-items: center;
    justify-content: center;
}

main.container {
    background: white;
    min-width: 320px;
    min-height: 40vh;
    padding: 2rem;
    box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.2);
    border-radius: 8px;
}

main h2 {
    font-weight: 600;
    margin-bottom: 2rem;
    position: relative;
}

main h2::before {
    content: '';
    position: absolute;
    height: 4px;
    width: 25px;
    bottom: 3px;
    left: 0;
    border-radius: 8px;
    background: linear-gradient(45deg, #8e2de2, #4a00e0);
}

form {
    display: flex;
    flex-direction: column;
}

.input-field {
    position: relative;
}

form .input-field:first-child {
    margin-bottom: 1.5rem;
}

.input-field .underline::before {
    content: '';
    position: absolute;
    height: 1px;
    width: 100%;
    bottom: -5px;
    left: 0;
    background: rgba(0, 0, 0, 0.2);
}

.input-field .underline::after {
    content: '';
    position: absolute;
    height: 1px;
    width: 100%;
    bottom: -5px;
    left: 0;
    background: linear-gradient(45deg, #8e2de2, #4a00e0);
    transform: scaleX(0);
    transition: all .3s ease-in-out;
    transform-origin: left;
}

.input-field input:focus ~ .underline::after {
    transform: scaleX(1);
}

.input-field input {
    outline: none;
    font-size: 0.9rem;
    color: rgba(0, 0, 0, 0.7);
    width: 100%;
}

.input-field input::placeholder {
    color: rgba(0, 0, 0, 0.5);
}

form input[type="submit"] {
    margin-top: 2rem;
    padding: 0.4rem;
    width: 100%;
    background: linear-gradient(to left, #4776E6, #8e54e9);
    cursor: pointer;
    color: white;
    font-size: 0.9rem;
    font-weight: 300;
    border-radius: 4px;
    transition: all 0.3s ease;
}

form input[type="submit"]:hover {
    letter-spacing: 0.5px;
    background: linear-gradient(to right, #4776E6, #8e54e9);
}

.footer {
    display: flex;
    flex-direction: column;
    margin-top: 1rem;
}

.footer span {
    color: rgba(0, 0, 0, 0.7);
    font-size: 0.8rem;
    text-align: center;
}

.footer .social-field {
    padding: 0.4rem;
    border-radius: 4px;
    font-size: 0.85rem;
    width: 100%;
    cursor: pointer;
    margin-top: 1rem;
}

.footer .social-field a i {
    margin: 0 0.5rem;
    width: 15px;
}

.footer .social-field a {
    text-decoration: none;
    color: white;
}

.footer .social-field.twitter {
    background: linear-gradient(to right, #56a7f2, #468aca);
}

.footer .social-field.facebook {
    background: linear-gradient(to right, #1e3c72, #2a5298);
}

</style>
<!DOCTYPE html>
<html lang="pt-br">

<body>
    <main class="container">
        <h2>Login</h2>
        <form action="" method="POST">
            <div class="input-field">
                <input type="text" name="username" 
                    placeholder="Enter Your Username" required>
                <div class="underline"></div>
            </div>
            <div class="input-field">
                <input type="password" name="password" 
                    placeholder="Enter Your Password" required>
                <div class="underline"></div>
            </div>

            <input type="submit"  name="loginBtn" value="Continue">
        </form>

        <div class="footer">
            <span>Or Connect With Social Media</span>
            <div class="social-fields">
                <div class="social-field twitter">
                    <a href="#">
                        <i class="fab fa-twitter"></i>
                        Sign in with Twitter
                    </a>
                </div>
                <div class="social-field facebook">
                    <a href="signup.php">
                        <i class="fab fa-facebook-f"></i>
                        Sign up
                    </a>
                </div>
            </div>
        </div>
    </main>
</body>
</html>