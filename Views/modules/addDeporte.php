<div class="content">
        <div class = "container-fluid">
		  <h1>Registrar Deporte</h1>
			<div class="box-body">
      		 <div class="form-group">
				<form role="form" method='post'>
                
					<div class="form-group">
						<label>Nombre:</label><br>
						<input type="text" class="form-control"  name="deporte" placeholder="Nombre..." required >
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
    $registro->addDeporteController();


?>