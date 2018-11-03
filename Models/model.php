<?php 

class Paginas{
	
        public static function enlacesPaginasModel($enlacesModel){

            if ( 
            $enlacesModel == "jugadores" ||
            $enlacesModel == "addJugador" ||
            $enlacesModel == "editarJugador" ||
            $enlacesModel == "eliminarJugador" ||
            $enlacesModel == "deportes" ||
            $enlacesModel == "addDeporte" ||
            $enlacesModel == "editarDeporte" ||
            $enlacesModel == "eliminarDeporte" ||
            $enlacesModel == "equipos" ||
            $enlacesModel == "addEquipo" ||
            $enlacesModel == "editarEquipo" ||
            $enlacesModel == "eliminarEquipo" ||
            $enlacesModel == "salir" ) {

            //mostramos el url concatenado con la variable $enlacesModel
            $module = "Views/modules/".$enlacesModel.".php";

        }		

        //una vez que action viene vacio (validando en el controlador) entonces se consulta si la variable $enlacesModel es igual a la cadea "index" para de ser asi se muestre index.php

        else if ($enlacesModel == "index") {
            $module = "Views/modules/inicio.php";


        }
        else if ($enlacesModel == "nuevo"){

            $module = "Views/modules/alumnoReg.php";

        }
        else if ($enlacesModel == "editar"){

            $module = "Views/modules/editar.php";

        }
        else if ($enlacesModel == "eliminar"){

            $module = "Views/modules/jugadores.php";

        }else if ($enlacesModel == "cambio"){

            $module = "Views/modules/jugadores.php";

        }
        
            // Validar una LISTA BLANCA
        else{

            $module = "Views/modules/inicio.php";

        }

        return $module;
        }
    }



?>