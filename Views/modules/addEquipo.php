<div class="content">
        <div class = "container-fluid">
		  <h1>Registrar Equipo</h1>
			<div class="box-body">
      		 <div class="form-group">
				<form role="form" method='post'>
                
					<div class="form-group">
						<label>Nombre:</label><br>
						<input type="text" class="form-control"  name="nombre" placeholder="Nombre..." required >
					</div>
                    
					<div class = "form-group">
					<label>Deporte:</label>
					<select class = "form-control" name ="deporte">
					<option value = "0">Seleccione:</option>
					<?php	
						 $mysqli = new mysqli('localhost', 'root', '', 'practica13','3306');
						 $query = $mysqli -> query ("SELECT * FROM deportes");
						 while ($valores = mysqli_fetch_array($query)) {
						   echo '<option value="'.$valores[id].'">'.$valores[deporte].'</option>';
						 }
					?>
					</select>
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
    $registro->addEquipoController();


?>