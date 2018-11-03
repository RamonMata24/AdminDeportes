<?php

// Clase controlador
class MvcController{
	
		//funcion para mostrar la pagina
		public function pagina(){
			include('Views/template.php');
		}


		//funcion de enlaces
		public function enlacesPaginasController(){
					// trabajar con los enlaces de las paginas
			//validamos si la variable "action" viene vacia , es decir , cuando se abre la pagina por primera vez se debe cargar la vista index1.php


			if (isset($_GET['action'])) {
				//guardar el valor de la variable action en "Views/modules/navegacion.php en el cual se recibe mediante el metodo GET esa variable "

				$enlacesController = $_GET['action'];

			}else{
				//si viene vacio inicializo con index

				$enlacesController = "index";
			}
			
			$respuesta = Paginas::enlacesPaginasModel($enlacesController);
			include $respuesta;

		}

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
											   //JUGADORES
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


			// Funcion para mostar los datos de la tabla jugadores 
			public function vistaJugadoresController(){
				//se le asigna la clase Datos con la funcion de vista con el parametro que es el nombre de la tabla 
				$respuesta = Datos::vistaJugadores('jugadores');
				//foreach para traer los datos
				foreach ($respuesta as $jugador => $item) {
					echo '<tr>
						<td>'.$item["id"].'</td>
						<td>'.$item["nombre"].'</td>
						<td>'.$item["apellido"].'</td>
						<td>'.$item["correo"].'</td>
						<td>'.$item["deporte"].'</td>
						<td><a href="index1.php?action=editarJugador&id='.$item["id"].'"><button  class="btn btn-warning"><i class="fa fa-pencil"></i></button></a></td>
						<td><a href="index1.php?action=eliminarJugador&id='.$item["id"].'"><button class="btn btn-danger"><i class="fa fa-trash"></i></button></a></td>
					</tr>';
				}	
			}
			// funcion para registrar un jugador
			public function addJugadorController(){
				// condicion para obtener los datos mediante el submit registro
				if (isset($_POST['registro'])) {
					//variable datos que es un array con los valores del metodo post 
					$datos = array(
						'nombre' => $_POST['nombre'],
						'apellido' => $_POST['apellido'],
						'correo' => $_POST['correo'],
						'deporte' => $_POST['deporte']
					);
					//la varibale respuesta que es igual a la clase Datos con el metodo a ejecutar mandando como parametros los datos del post y el nombre de la tabla
					$respuesta = Datos::addJugador($datos, 'jugadores');
					//condiciones para el registro exitoso
					if($respuesta == "success"){
						header("location:index1.php?action=jugadores");
					} else {
						header("location:index1.php");
					}
				}
					
			}

						
				//funcion controller para borrar un jugador
				public function deleteJugadorController(){
						//se obtiene el id mediante el metodo get
					if (isset($_GET['id'])) {
						//se manda mediante la funcion delete jugador con dos paramentros el id obtenido y el nombre de la tabla
						$respuesta = Datos::deleteJugador($_GET['id'], 'jugadores');
							//condicion para la eliminacion completada
						if($respuesta == "success"){
							header("location:index1.php?action=jugadores");
						} else {
							echo 'Error al eliminar usuario';
						}
					}
			}

			//funcion controller para cargar los jugadores al momento de querer actualizar
			public function getJugadorController(){
				//se obtiene el id del jugador mediante el get 
				if (isset($_GET['id'])) {
					$id = $_GET['id'];
					//hacemos la consulta rapida mediante el metodo getJugador y el nombre de la tabla
					$respuesta = Datos::getJugador($id, 'jugadores');
					//en la tabla traemos los valores con la variable respuesta 
					echo '
					<div class="content">
						<div class = "container-fluid">
							<div class="box-body">
							<div class="form-group">
							
							<input type="hidden" name="id" value="'.$respuesta["id"].'">
							
							<div class="form-group">
								<label>Nombre:</label><br>
								<input type="text" class="form-control"  name="nombre"  value="'.$respuesta["nombre"].'" >
							</div>

							<div class="form-group">
								<label>Apellido:</label>
								<input type="text" class="form-control" name="apellido"   value="'.$respuesta["apellido"].'" >
							</div>
							<div class="form-group">
								<label>Correo:</label>
								<input type="email" class="form-control" name="correo"  value="'.$respuesta["correo"].'"   >
							</div>

							<div class="form-group">
								<label>Deporte:</label>
								<input type ="text" class = "form-control" name ="deporte"  value="'.$respuesta["deporte"].'">
							</div>

							
							

							<input type="submit" class="btn btn-success" value = "Actualizar">
						
						</div>
						</div>
					</div>  
			</div>                    
						';
				
				}

				
			}

				//funcion controller para actualizar un jugador
			public function editJugadorController(){
				//mediante el id recibido 
				if (isset($_POST['id'])) {
					//mandamos los datos del post en el array 
					$jugador = array(
						'id' => $_POST['id'],
						'nombre' => $_POST['nombre'],
						'apellido' => $_POST['apellido'],
						'correo' => $_POST['correo'],
						'deporte' => $_POST['deporte']
					);
					//hacemos uso de la funcion updateJugador mandando dos parametros los datos y el nombre de la tabla
					$respuesta = Datos::updateJugador($jugador, 'jugadores');
					// condicion para la correcta ejecucion del update
					if($respuesta == "success"){
						header("location:index1.php?action=jugadores");
					} else {
						echo 'Error al actualizar usuario';
					}
				}
					
			}


//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
											   //DEPORTES
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			
				// Funcion para mostar los datos de la tabla deportes 
				public function vistaDeportesController(){
					//se le asigna la clase Datos con la funcion de vista con el parametro que es el nombre de la tabla 
					$respuesta = Datos::vistaDeportes('deportes');
					//foreach para traer los datos
					foreach ($respuesta as $deporte => $item) {
						echo '<tr>
							<td>'.$item["id"].'</td>
							<td>'.$item["deporte"].'</td>
							<td><a href="index1.php?action=editarDeporte&id='.$item["id"].'"><button  class="btn btn-warning"><i class="fa fa-pencil"></i></button></a></td>
							<td><a href="index1.php?action=eliminarDeporte&id='.$item["id"].'"><button class="btn btn-danger"><i class="fa fa-trash"></i></button></a></td>
						</tr>';
					}	
				}
				// funcion para registrar un deporte
				public function addDeporteController(){
					// condicion para obtener los datos mediante el submit registro
					if (isset($_POST['registro'])) {
						//variable datos que es un array con los valores del metodo post 
						$datos = array(
							'deporte' => $_POST['deporte']
						);
						//la varibale respuesta que es igual a la clase Datos con el metodo a ejecutar mandando como parametros los datos del post y el nombre de la tabla
						$respuesta = Datos::addDeporte($datos, 'deportes');
						//condiciones para el registro exitoso
						if($respuesta == "success"){
							header("location:index1.php?action=deportes");
						} else {
							header("location:index1.php");
						}
					}
						
				}
	
							
					//funcion controller para borrar un deporte
					public function deleteDeporteController(){
							//se obtiene el id mediante el metodo get
						if (isset($_GET['id'])) {
							//se manda mediante la funcion delete jugador con dos paramentros el id obtenido y el nombre de la tabla
							$respuesta = Datos::deleteDeporte($_GET['id'], 'deportes');
								//condicion para la eliminacion completada
							if($respuesta == "success"){
								header("location:index1.php?action=deportes");
							} else {
								echo 'Error al eliminar usuario';
							}
						}
				}
	
				//funcion controller para cargar los deportes al momento de querer actualizar
				public function getDeporteController(){
					//se obtiene el id del deporte mediante el get 
					if (isset($_GET['id'])) {
						$id = $_GET['id'];
						//hacemos la consulta rapida mediante el metodo getDeporte y el nombre de la tabla
						$respuesta = Datos::getDeporte($id, 'deportes');
						//en la tabla traemos los valores con la variable respuesta 
						echo '  
						<div class="content">
							<div class = "container-fluid">
								<div class="box-body">
								<div class="form-group">
								
								<input type="hidden" name="id" value="'.$respuesta["id"].'">
								
								<div class="form-group">
									<label>Deporte:</label><br>
									<input type="text" class="form-control"  name="deporte"  value="'.$respuesta["deporte"].'" >
								</div>
	
	
								<input type="submit" class="btn btn-success" value = "Actualizar">
							
							</div>
							</div>
						</div>  
				</div>                    
							';
					
					}
	
					
				}
	
					//funcion controller para actualizar un deporte
				public function editarDeporteController(){
					//mediante el id recibido 
					if (isset($_POST['id'])) {
						//mandamos los datos del post en el array 
						$datos = array(
							'id' => $_POST['id'],
							'deporte' => $_POST['deporte']
						);
						//hacemos uso de la funcion updateDeporte mandando dos parametros los datos y el nombre de la tabla
						$respuesta = Datos::updateDeporte($datos, 'deportes');
						// condicion para la correcta ejecucion del update
						if($respuesta == "success"){
							header("location:index1.php?action=jugadores");
						} else {
							echo 'Error al actualizar usuario';
						}
					}
						
				}

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
											   //EQUIPOS
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

				// Funcion para mostar los datos de la tabla equipos 
				public function vistaEquiposController(){
					//se le asigna la clase Datos con la funcion de vista con el parametro que es el nombre de la tabla 
					$respuesta = Datos::vistaEquipos('equipos');
					//foreach para traer los datos
					foreach ($respuesta as $equipo => $item) {
						echo '<tr>
							<td>'.$item["id"].'</td>
							<td>'.$item["nombre"].'</td>
							<td>'.$item["deporte"].'</td>
							<td><a href="index1.php?action=editarEquipo&id='.$item["id"].'"><button  class="btn btn-warning"><i class="fa fa-pencil"></i></button></a></td>
							<td><a href="index1.php?action=eliminarEquipo&id='.$item["id"].'"><button class="btn btn-danger"><i class="fa fa-trash"></i></button></a></td>
						</tr>';
					}	
				}
				// funcion para registrar un equipo
				public function addEquipoController(){
					// condicion para obtener los datos mediante el submit registro
					if (isset($_POST['registro'])) {
						//variable datos que es un array con los valores del metodo post 
						$datos = array(
							'nombre' => $_POST['nombre'],
							'deporte' => $_POST['deporte']
						);
						//la varibale respuesta que es igual a la clase Datos con el metodo a ejecutar mandando como parametros los datos del post y el nombre de la tabla
						$respuesta = Datos::addEquipo($datos, 'equipos');
						//condiciones para el registro exitoso
						if($respuesta == "success"){
							header("location:index1.php?action=equipos");
						} else {
							header("location:index1.php");
						}
					}
						
				}
	
							
					//funcion controller para borrar un equipo
					public function deleteEquipoController(){
							//se obtiene el id mediante el metodo get
						if (isset($_GET['id'])) {
							//se manda mediante la funcion delete jugador con dos paramentros el id obtenido y el nombre de la tabla
							$respuesta = Datos::deleteEquipo($_GET['id'], 'equipos');
								//condicion para la eliminacion completada
							if($respuesta == "success"){
								header("location:index1.php?action=equipos");
							} else {
								echo 'Error al eliminar equipo';
							}
						}
				}
	
				//funcion controller para cargar los deportes al momento de querer actualizar
				public function getEquipoController(){
					//se obtiene el id del deporte mediante el get 
					if (isset($_GET['id'])) {
						$id = $_GET['id'];
						//hacemos la consulta rapida mediante el metodo getEquipo y el nombre de la tabla
						$respuesta = Datos::getEquipo($id, 'equipos');
						//en la tabla traemos los valores con la variable respuesta 
						echo '  
						<div class="content">
							<div class = "container-fluid">
								<div class="box-body">
								<div class="form-group">
								
								<input type="hidden" name="id" value="'.$respuesta["id"].'">
								
								<div class="form-group">
									<label>Nombre:</label><br>
									<input type="text" class="form-control"  name="nombre"  value="'.$respuesta["nombre"].'" >
								</div>
								<div class="form-group">
									<label>Deporte:</label><br>
									<input type="text" class="form-control"  name="deporte"  value="'.$respuesta["deporte"].'" >
								</div>
								<input type="submit" class="btn btn-success" value = "Actualizar">
							
							</div>
							</div>
						</div>  
				</div>                    
							';
					
					}
	
					
				}
	
					//funcion controller para actualizar un equipo
				public function editarEquipoController(){
					//mediante el id recibido 
					if (isset($_POST['id'])) {
						//mandamos los datos del post en el array 
						$datos = array(
							'id' => $_POST['id'],
							'nombre' => $_POST['nombre'],
							'deporte' => $_POST['deporte']
						);
						//hacemos uso de la funcion updateDeporte mandando dos parametros los datos y el nombre de la tabla
						$respuesta = Datos::updateEquipo($datos, 'equipos');
						// condicion para la correcta ejecucion del update
						if($respuesta == "success"){
							header("location:index1.php?action=equipos");
						} else {
							echo 'Error al actualizar un equipo';
						}
					}
						
				}

///////////////////////////////////////////////////////////////
	//funcion controller para el conteo de los deportes 
	public function deportes(){

		$count = Datos::count_deportes('deportes');
		echo ($count);		
	}

	//funcion controller para el conteo de los equipos
	public function equipos(){

		$count = Datos::count_equipos('equipos');
		echo ($count);		
	}
	//funcion controller para el conteo de jugadores
	public function jugadores(){

		$count = Datos::count_jugadores('jugadores');
		echo ($count);	
	
		}

	

}


?>