
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php
                    $conteo = new MvcController();
                    $conteo->deportes();
                  ?></h3>

              <p>Deportes</p>
            </div>
            <div class="icon">
              <i class="fa fa-futbol-o"></i>
            </div>
            <a href="index1.php?action=deportes" class="small-box-footer">
                More info 
                <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?php
                    $conteo = new MvcController();
                    $conteo->equipos();
                  ?></h3>

              <p>Equipos</p>
            </div>
            <div class="icon">
              <i class="fa fa-users"></i>
            </div>
            <a href="index1.php?action=equipos" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?php
                    $conteo = new MvcController();
                    $conteo->jugadores();
                  ?></h3>

              <p>Jugadores</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="index1.php?action=jugadores" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>