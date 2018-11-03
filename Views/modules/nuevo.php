<div class="content">
        <div class = "container-fluid">
		  <h1>Registrar Admin</h1>
			<div class="box-body">
      		 <div class="form-group">
				<form role="form" method='post'>
                
					<div class="form-group">
						<label>Username:</label><br>
						<input type="text" class="form-control"  name="username" placeholder="Username..." required >
					</div>

					<div class="form-group">
						<label>Email:</label>
						<input type="email" class="form-control" name="email"  placeholder="Email..." required >
					</div>

					<div class="form-group">
						<label>Password:</label>
						<input type="password" class="form-control" name="password"  placeholder="Password..." required >
					</div>					
					<button type="submit" name="registro" class="btn btn-success">Guardar</button>
				</form>
				</div>
                </div>
            </div>  
</div>

<?php

	// CLASE Y FUNCION DEL CONTROLADOR
    $registro = new MvcController();
    $registro->addUserController();


?>