<?php 

require_once("conexion.php");

class Datos extends Conexion {
  
	/*
    public static function loginModel($admin, $tabla){
		
		$stmt = Conexion::get_conexion()->prepare("SELECT email , password FROM $tabla WHERE email = :email");
        $stmt->bindParam(':email', $admin['email'], PDO::PARAM_STR);
        $stmt->bindParam(':password', $admin['password'], PDO::PARAM_STR);			
		$stmt->execute();

		return $stmt->fetch();
		$stmt->close();
	}*/
	



	public static function vistaJugadores($tabla){
		$stmt = Conexion::get_conexion()->prepare("SELECT j.id , j.nombre , j.apellido, j.correo , d.deporte
												  FROM $tabla j
												  INNER JOIN deportes d on d.id=j.deporte
												  ORDER BY id asc;");
		$stmt->execute();
		return $stmt->fetchAll();
		$stmt->close();
	}
    
	public function addJugador($dato, $tabla){
		
		$stmt = Conexion::get_conexion()->prepare("INSERT INTO $tabla (nombre,apellido,correo,deporte) VALUES (:nombre,:apellido,:correo,:deporte)");
		$stmt->bindParam(':nombre', $dato['nombre'], PDO::PARAM_STR);
		$stmt->bindParam(':apellido', $dato['apellido'], PDO::PARAM_STR);
		$stmt->bindParam(':correo', $dato['correo'], PDO::PARAM_STR);
		$stmt->bindParam(':deporte', $dato['deporte'], PDO::PARAM_INT);

		if ($stmt->execute()) {
			return 'success';
		} else {
			return 'error';
		}

		$stmt->close();

	}


	public function getJugador($id, $tabla){

		$stmt = Conexion::get_conexion()->prepare("SELECT * FROM $tabla where id = :id");
		$stmt->bindParam(':id', $id, PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->fetch();
		$stmt->close();
	}

	public function updateJugador($datos, $tabla){
		
		$stmt = Conexion::get_conexion()->prepare("UPDATE $tabla SET nombre = :nombre, apellido = :apellido, correo = :correo , deporte = :deporte WHERE id = :id");		
		$stmt->bindParam(':nombre', $datos['nombre'], PDO::PARAM_STR);
		$stmt->bindParam(':apellido', $datos['apellido'], PDO::PARAM_STR);
		$stmt->bindParam(':correo', $datos['correo'], PDO::PARAM_STR);
		$stmt->bindParam(':deporte', $datos['deporte'], PDO::PARAM_INT);
		$stmt->bindParam(':id', $datos['id'], PDO::PARAM_INT);

		if ($stmt->execute()) {
			return 'success';
		} else {
			return 'error';
		}

		$stmt->close();

	}

	public function deleteJugador($id, $tabla){

		$stmt = Conexion::get_conexion()->prepare("DELETE FROM $tabla where id = :id");
		$stmt->bindParam(':id', $id, PDO::PARAM_INT);
		if ($stmt->execute()) {
			return 'success';
		} else {
			return 'error';
		}
		
		$stmt->close();
	}



	////////////////////////////////// 

	public static function vistaDeportes($tabla){
		$stmt = Conexion::get_conexion()->prepare("SELECT * FROM $tabla");
		$stmt->execute();
		return $stmt->fetchAll();
		$stmt->close();
	}
    
	public function addDeporte($dato, $tabla){
		
		$stmt = Conexion::get_conexion()->prepare("INSERT INTO $tabla (deporte) VALUES (:deporte)");
		$stmt->bindParam(':deporte', $dato['deporte'], PDO::PARAM_STR);
		if ($stmt->execute()) {
			return 'success';
		} else {
			return 'error';
		}

		$stmt->close();

	}


	public function getDeporte($id, $tabla){
		$stmt = Conexion::get_conexion()->prepare("SELECT * FROM $tabla where id = :id");
		$stmt->bindParam(':id', $id, PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->fetch();
		$stmt->close();
	}

	public function updateDeporte($datos, $tabla){
		
		$stmt = Conexion::get_conexion()->prepare("UPDATE $tabla SET deporte = :deporte WHERE id = :id");		
		$stmt->bindParam(':deporte', $datos['deporte'], PDO::PARAM_STR);
		$stmt->bindParam(':id', $datos['id'], PDO::PARAM_INT);
		if ($stmt->execute()) {
			return 'success';
		} else {
			return 'error';
		}

		$stmt->close();

	}

	public function deleteDeporte($id, $tabla){

		$stmt = Conexion::get_conexion()->prepare("DELETE FROM $tabla where id = :id");
		$stmt->bindParam(':id', $id, PDO::PARAM_INT);
		if ($stmt->execute()) {
			return 'success';
		} else {
			return 'error';
		}
		
		$stmt->close();
	}

/////////////////////////////////////////////////

public static function vistaEquipos($tabla){
	$stmt = Conexion::get_conexion()->prepare("SELECT e.id , e.nombre , d.deporte
												FROM  $tabla e
												INNER JOIN deportes d on d.id=e.deporte
												ORDER BY id asc;
	$tabla");
	$stmt->execute();
	return $stmt->fetchAll();
	$stmt->close();
}

public function addEquipo($dato, $tabla){
	
	$stmt = Conexion::get_conexion()->prepare("INSERT INTO $tabla (nombre,deporte) VALUES (:nombre,:deporte)");
	$stmt->bindParam(':nombre', $dato['nombre'], PDO::PARAM_STR);
	$stmt->bindParam(':deporte', $dato['deporte'], PDO::PARAM_STR);
	if ($stmt->execute()) {
		return 'success';
	} else {
		return 'error';
	}

	$stmt->close();

}


public function getEquipo($id, $tabla){
	$stmt = Conexion::get_conexion()->prepare("SELECT * FROM $tabla where id = :id");
	$stmt->bindParam(':id', $id, PDO::PARAM_INT);
	$stmt->execute();
	return $stmt->fetch();
	$stmt->close();
}

public function updateEquipo($datos, $tabla){
	
	$stmt = Conexion::get_conexion()->prepare("UPDATE $tabla SET nombre = :nombre , deporte = :deporte WHERE id = :id");
	$stmt->bindParam(':nombre', $datos['nombre'], PDO::PARAM_STR);		
	$stmt->bindParam(':deporte', $datos['deporte'], PDO::PARAM_STR);
	$stmt->bindParam(':id', $datos['id'], PDO::PARAM_INT);
	if ($stmt->execute()) {
		return 'success';
	} else {
		return 'error';
	}

	$stmt->close();

}

public function deleteEquipo($id, $tabla){

	$stmt = Conexion::get_conexion()->prepare("DELETE FROM $tabla where id = :id");
	$stmt->bindParam(':id', $id, PDO::PARAM_INT);
	if ($stmt->execute()) {
		return 'success';
	} else {
		return 'error';
	}
	
	$stmt->close();
}


//////////////////
//funcion para el conteo de deportes
public static function count_deportes($tabla){
	$model = new Conexion();
	$conexion = $model->get_conexion();
	$sql = "SELECT COUNT(*) AS total FROM $tabla";
	$stm = $conexion->prepare($sql);
	$stm->execute();
	$results = $stm->fetchall();
	$getCount = $results[0]['total'];
	return $getCount;
	
	
}
//funcion para el conteo de equipos
public static function count_equipos($tabla){
	$model = new Conexion();
	$conexion = $model->get_conexion();
	$sql = "SELECT COUNT(*) AS total FROM $tabla";
	$stm = $conexion->prepare($sql);
	$stm->execute();
	$results = $stm->fetchall();
	$getCount = $results[0]['total'];
	return $getCount;
	
	}
	
//funcion para el conteo de jugadores
public static function count_jugadores($tabla){
	$model = new Conexion();
	$conexion = $model->get_conexion();
	$sql = "SELECT COUNT(*) AS total FROM $tabla";
	$stm = $conexion->prepare($sql);
	$stm->execute();
	$results = $stm->fetchall();
	$getCount = $results[0]['total'];
	return $getCount;
	
	}
}

?>