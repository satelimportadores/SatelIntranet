           <!-- sidebar menu -->
          <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

            <div class="menu_section">
              <h3>General</h3>
              <ul class="nav side-menu">
                <li><a><i class="fa fa-home"></i> Inicio <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu" style="display: none">
                    <li><a href="index.php">Resumen</a></li>

                  </ul>
                </li>
                <li><a><i class="fa fa-edit"></i>Ventas<span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu" style="display: none">

                    <li><a href="contacts.php">Clientes</a></li>
                    <li><a href="actualizacion.php">Actualización de clientes</a></li>
                    <li><a href="cliente_nuevo.php">Cliente nuevo</a></li>
                    <li><a href="tareas.php">Tareas</a></li>
                  </ul>
                </li>
                <li><a><i class="fa fa-phone-square"></i>Post venta<span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu" style="display: none">

                  <li><a href="post_venta.php">Llamadas post venta</a></li>
                  <li><a href="pqrsf.php">PQRSF</a></li>

                  </ul>
                </li>
                <li><a><i class="fa fa-search"></i>Consultas<span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu" style="display: none">

                    <li><a href="pedidos.php">Pedidos</a></li>
                    <li><a href="calender.php">Calendario</a></li>

                  </ul>
                </li>
                <?php 

                include_once('php/consultas_css.php');
                  if ( $precios_ventas == 1) {
                  echo '<li><a><i class="fa fa-money"></i>Precios<span class="fa fa-chevron-down"></span></a>';
                  echo '<ul class="nav child_menu" style="display: none">';

                    echo '<li><a href="precios.php">Ver precios</a>';


                  echo '</ul>';
                  }


                 ?>


                  


              </ul>
            </div>


          </div>
          <!-- /sidebar menu -->



  <script src="js/custom.js"></script>

