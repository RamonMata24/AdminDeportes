<?php
    session_start();//incia sesion
    session_unset();//
    session_destroy();//se desstruye la session

    require_once("Models/conexion.php"); //se rquiere la coexion

    $usuario = filter_input(INPUT_POST,'username');//se filtra el username
    $contrasena = filter_input(INPUT_POST, 'password');//se filtra la password

    // validacion que los campos no esten vacios
    if($usuario === false || $usuario === NULL || $usuario === '' || 
        $contrasena === false || $contrasena === NULL || $contrasena === ''){

        header('Location: index.php');
        exit();
    }

    //Validacion del usuario
    // con una consulta mediante PDO
	$stmt = Conexion::get_conexion()->prepare('SELECT * FROM administrador where username = :username');
    $stmt ->bindParam(':username',$usuario);
    $stmt ->execute();
    $r = $stmt->fetch(PDO::FETCH_ASSOC);

    if($r){
        //se inicia la sesion 
        if($r['password'] === $contrasena){
            session_start();
			$_SESSION['validar'] = true;
            $_SESSION['usuario_id'] = (int)$r['id'];
            $_SESSION['username'] = $r['username'];
            $_SESSION['correo'] = $r['email'];
            header('Location: index1.php');
            exit();
        }
    }
    header('Location: index1.php');
?>