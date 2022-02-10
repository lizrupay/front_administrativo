<?php	include 'sesion_actualiza.php';	?>

<header class="header">
      <nav class="navegacion">
        <div class="navegacion__izquierda">

          <ul>
            <li>
              <span class="navegacion__izquierda--menu" id="menu-icon"><i class="fas fa-bars"></i></span>
            </li>

            <li>
              <a class="navegacion__izquierda--item" href="sistema.php"><i class="fas fa-home"></i></a>
            </li>
          </ul>

        </div>
        <div class="navegacion__derecha">

          <ul>
            <li>
              <a class="navegacion__derecha--item" href="#"><i class="far fa-moon"></i></a>
            </li>
            <li>
              <a class="navegacion__derecha--item" href="#"><i class="fas fa-search"></i></a>
            </li>
            <li>
              <a class="navegacion__derecha--item" href="#"><i class="far fa-bell"></i></a>
            </li>
            <li>

              <a class="navegacion__derecha--item-usuario" href="#">
                <div class="usuario-navegacion">
                  <div class="usuario-navegacion__nombre">
                      <input 
                        type="hidden" 
                        class="" 
                        name="gg_codigo_usuario" 
                        id="gg_codigo_usuario" 
                        value="<?php echo $gg_pp_codigo_usuario; ?>" 
                        placeholder=""
                        readonly
                        />

          
                    <p class="usuario-navegacion__nombre--usuario"><?php echo $gg_pp_nombreapellido_usuario; ?></p>
                    <span class="usuario-navegacion__nombre--rol"><?php echo $gg_pp_nombreperfil; ?></span>
                  </div>
                  <div class="usuario-navegacion__avatar">
                    <img src="https://pixinvent.com/demo/vuexy-vuejs-admin-dashboard-template/demo-1/img/13-small.d796bffd.png"  alt=""/>
                  </div>
                </div>
              </a>

            </li>
          </ul>

        </div>
      </nav>
    </header>