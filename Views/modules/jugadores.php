
<h2 class="box-title"><font size="10">Jugadores Registrados</font></h2>
            
<a href="index1.php?action=addJugador"><button type = "button" class="btn btn-success" ><i class="fa fa-plus"></i></button></a></td>
<a href="index1.php?action=inicio"><button class="btn btn-primary" ><i class="fa fa-home"></i></button></a></td>

<div class="row">

        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>Id</th>
                  <th>Nombre</th>
                  <th>Apellido</th>
                  <th>Correo</th>
                  <th>Deporte</th>
                  
                </tr>
                <tbody>
		
			<?php 
				$mvc = new MvcController();
				$mvc->vistaJugadoresController();
			
			?>

		</tbody>
               
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>