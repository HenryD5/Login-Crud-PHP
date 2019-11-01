<?php
session_start();

require 'models/conexion.php';
$consulta = "SELECT id, nombres, apellidos, correo, sexo FROM clientes";


$resultados = $oConex -> prepare($consulta ,[PDO::ATTR_CURSOR =>  PDO::CURSOR_SCROLL]);
$resultados -> execute();
//consulta
if (isset($_SESSION['user_id'])) {
    $records = $oConex->prepare('SELECT id, correo, clave FROM clientes WHERE id = :id');
    $records->bindParam(':id', $_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);
    $user = null;
    if (count($results) > 0) {
      $user = $results;
    }

}
/*while ($fila = $resultados -> fetchObject() ){

echo $fila ->id ;
echo $fila -> apellidos;
echo $fila -> nombres;
echo $fila -> sexo . "<br/>";

}*/
?>


<?php if(!empty($user)): ?>
<div class="text-center">
<br> Welcome : <span class="text-white"> <?= $user['correo']; ?></span>
      <br>You are Successfully Logged In
      <a href="views/logout.php" class="text-white">
        Logout
      </a>
 </div>  
<?php require 'partials/header.php' ; ?>
<div class="container">
    <div class="car mt-5d">
        <div class="card-header">
            <h1> Clientes</h1>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <td>Id</td>
                    <td>Nombres</td>
                    <td>Apellidos</td>
                    <td>Correo</td>
                    <td>Sexo</td>
                    <td>Action</td>
                </tr>
                <?php while ($fila = $resultados -> fetchObject() ){ ?>
            
                <tr>
                    <td><?php echo $fila ->id ;?></td>
                    <td><?php echo $fila -> nombres;?></td>
                    <td><?php echo $fila -> apellidos;?></td>
                    <td><?php echo $fila -> correo;?></td>
                    <td><?php echo $fila -> sexo . "<br/>";?></td>
                    <td>
                    <a href="views/editar.php?id=<?=  $fila->id?>" class="btn btn-success">Edit</a>
                    <a onclick="return confirm('Esta seguro de eliminar el registro?')" href="models/delete.php?id=<?= $fila->id?>" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
                <?php }?>
            </table>
            <a class="btn btn-success" href="views/nuevo.php">Nuevo Registro</a>
        </div>
    </div>

</div>

<?php else: ?>
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
<div class="text-center">
   <h1 class="mt-5">BIENVENIDO</h1>
    <a href="views/login.php">Login</a> <!--or
    <a href="signup.php">Signup</a>-->
</div>
<?php endif; ?>
<?php require 'partials/footer.php' ; ?>