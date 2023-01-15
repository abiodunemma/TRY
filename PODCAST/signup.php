<?php 
include_once 'db/connect.php';
include_once 'db/function.php';

error_reporting(0);



if(isset($_COOKIE['user_id'])){
    $user_id = $_COOKIE['user_id'];
}else{
    setcookie('user_id', create_unique_id(), time() + 60*60*24*30);
}




if(isset($_POST['submit'])){
    
    $id = create_unique_id();

    $email = $_POST['email'];
    $email = filter_var($email, FILTER_SANITIZE_STRING);

    $username = $_POST['username'];
    $username = filter_var($username, FILTER_SANITIZE_STRING);
  
    $country = $_POST['country'];
    $country = filter_var($country, FILTER_SANITIZE_STRING);

    $age = $_POST['age'];
    $age = filter_var($age, FILTER_SANITIZE_STRING);

    $phone = $_POST['phone'];
    $phone = filter_var($phone, FILTER_SANITIZE_STRING);

    $password = $_POST['password'];
    $password = filter_var($password, FILTER_SANITIZE_STRING);

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    try{
        $sqlInsert = "INSERT INTO users (id, email, username, country, age, phone, password)
         VALUES (:id, :email, :username, :country, :age, :phone, :password)";

         $statement = $db->prepare($sqlInsert);
         $statement->execute(array(':id' => $id,':email' => $email, ':username' => $username, ':country' => $country, ':age' => $age, ':phone' => $phone, ':password' => $hashed_password));
         if($statement->rowCount() ==1){
            $success_msg[] = 'user registered!';
         }

    }catch(PDOException $ex){
         $warning_msg[] = ' username or email already taken';
    }
    
}
















?>






<!DOCTYPE HTML>
<html>
<head>
  <title>Regrister</title>
  <style>
body{
      margin: 0;
      padding: 0;
      background: blueviolet;
  }
.signup-form{
  width: 300px;
  padding: 20px;
  text-align: center;
  background: url(19.png);
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%,-50%);
  overflow: hiden;
}
.signup-form h1{
  margin-top: 100px;
  font-family: 'permanant Marker', cursive;
  color: #fff;
  font-size: 40px;
}
.signup-form input{
    display: block;
    width: 100%;
    padding: 0 16px;
    height: 44px;
    text-align: center;
    box-sizing: border-box;
    outline: none;
    border: none;
    font-family: "montserrat",sans-serif;
}
.txtb{
    margin: 20px 0;
    background: rgba(255,255,255,.5);
     border-radius: 6px;
}
.signup-btn{
    margin-top: 60px;
    margin-bottom: 20px;
    background: #487eb0;
    color: #fff;
    border-radius: 44px;
    cursor: pointer;
    transition: 0.8s;
}
.signup-btn:hover{
    transform: scale(0.96);
}
.signup-form a{
   text-decoration: none;
   color: ffff;
   font-family: "montserrat",sans-serif;
   font-size: 14px;
   padding: 10px;
   transition: 0.8s;
   display: block;
}
.signup-form a:hover{
     background: rgba(0,0,0,.3);
 }

</style>
</head>

<body>
<?php  if(isset($result)) echo $result; ?>
  <div class="signup-form">
    <form clas="" action="" method="POST">
    <h1>Register</h1>
    <input type="email" placeholder=" Email" name="email" value=" " class="txtb" required>
    <input type="text" placeholder="Username"  name="username" value="" class="txtb"  required>
    <input type="text" placeholder="Country"  name="country" value="" class="txtb"  required>
    <input type="age" placeholder="age"  name="age" value="" class="txtb"  required>
    <input type="number" placeholder="phone-number"  name="phone" value="" class="txtb"  required>
    <input type="password" placeholder="Password" name="password" value="" class="txtb" required >

    <input type="submit" name="submit"  class="sigup-btn">
    <a href="index.php">Already Have one ?.Login</a>
    </form>
 </div>
</body>
 <?php include 'db/alert.php'; ?>
</html>