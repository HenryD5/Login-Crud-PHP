<?php 

session_start();
if (isset($_SESSION['user_id'])) {
  header('Location: /login+crud_php');
}
require '../models/conexion.php';

if (!empty($_POST['correo']) && !empty($_POST['password'])) {
    $records = $oConex->prepare('SELECT id, correo, clave FROM clientes WHERE correo = :correo');
    $records->bindParam(':correo', $_POST['correo']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);
    $message = '';

    if (count($results) > 0 && $_POST['password']===$results['clave']) {
      $_SESSION['user_id'] = $results['id'];
      header("Location: /login+crud_php");
    } else {
      $message = 'Sorry, those credentials do not match';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="../assets/css/styles.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
</head>
<body>



<?php if(!empty($message)): ?>
      <p> <?= $message ?></p>
    <?php endif; ?>
    
<h1>Login</h1>

<!--<span><a href="signup.php">or Signup</a></span>-->
    <form action="login.php" method="post">
    <input type="text" name="correo" value="" placeholder="Enter your email">
    <input type="password" name="password" placeholder ="Enter your password">
    <input type="submit"value="Send">
    </form>
</body>
</html>