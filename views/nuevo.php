<?php require '../partials/header.php' ; ?>

    <div class="container">

     <div class="card mt-5">
       <div class="card-header">
         <h2>Registrar Cliente</h2>
       </div>
       <div class="card-body">
         <form method ="post" action="../models/insertar.php">
         <div class="form-group">
            <div class="form-row">
              <div class="col">
                <input type="text" class="form-control" name="nombres" id ="nombres"placeholder="Nombres"  required>
              </div>
              <div class="col">
                <input type="text" class="form-control" name ="apellidos" id="apellidos" placeholder="Apellidos"  required>
              </div>
            </div>
          </div>
          <div class="input-group mb-4">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-envelope"></i></span>
            </div>
            <input type="email" name ="correo" id="correo" class="form-control" placeholder="Ingrese su correo"  required>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                  </div>
                  <input type="password" name="clave" id="clave" class="form-control" placeholder="Contraseña"  required>
                </div>
              </div>
              <div class="col">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                  </div>
                  <input type="password" name="confirClave" id="confirClave" class="form-control" placeholder="Confirme contraseña">
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
           <select id="sexo" name="sexo" for ="sexo" class="form-control">
              <option selected>Sexo</option>
              <option value="M">M</option>
              <option value="F">F</option>
           </select>
           </div>
           
           <div class="form-group">
              <button type="submit" class="btn btn-info">Registrar</button>
           </div>
         </form>
       </div>
     </div>
    </div>
    
    
<?php require '../partials/footer.php' ; ?>