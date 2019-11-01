<?php require '../partials/header.php' ;
require '../models/conexion.php';
$id = $_GET['id'];
$consulta = "SELECT * FROM clientes where id = $id" ;
$resultados = $oConex -> prepare($consulta);

//ejecutar
$resultados -> execute();
$fila = $resultados -> fetch(PDO::FETCH_OBJ) ;
?>

    <div class="container">

     <div class="card mt-5">
       <div class="card-header">
         <h2>Actualizar Cliente</h2>
       </div>
       <div class="card-body">
         <form method ="post" action="../models/update.php">
         <input type="text"  value ="<?=$fila->id?>" name="id" style="visibility:hidden">
           <div class="form-group">
           <div class="form-group">
            <div class="form-row">
              <div class="col">
                <input type="text" class="form-control"  value ="<?=$fila->nombres?>" name="nombres" id ="nombres" required>
              </div>
              <div class="col">
                <input type="text" class="form-control" value ="<?=$fila->apellidos?>" name ="apellidos" id="apellidos" required>
              </div>
            </div>
          </div>
          <div class="input-group mb-4">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-envelope"></i></span>
            </div>
            <input type="email"value ="<?=$fila->correo?>" name ="correo" id="correo" class="form-control" placeholder="Ingrese su correo"  required>
          </div>

           <div class="form-group">
           <label for="sexo">Sexo</label>
           <input value ="<?=$fila->sexo?>"id="sexo" name="sexo" for ="sexo" class="form-control">
           </div>
           <div class="form-group">
              <button  type="submit" class="btn btn-info">Actualizar</button>
           </div>
         </form>
       </div>
     </div>
    </div>

<?php require '../partials/footer.php' ; ?>