<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>TURISBOL</title>
    
    <!-- load CSS -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600"/>
    <!-- Google web font "Open Sans" -->
    <link rel="stylesheet" href="_css/bootstrap.min.css" />
    <!-- https://getbootstrap.com/ -->
    <link rel="stylesheet" href="_slick/slick.css" />
    <link rel="stylesheet" href="_slick/slick-theme.css" />
    <link rel="stylesheet" href="_css/magnific-popup.css" />
    <link rel="stylesheet" href="_css/tooplate-style.css" />
  </head>

  <body>
    <!-- Loader -->
    <div id="loader-wrapper">
      <div id="loader"></div>
      <div class="loader-section section-left"></div>
      <div class="loader-section section-right"></div>
    </div>

    <div class="tm-main-container">
      <div class="tm-top-container">       
        <!-- Menu -->
        <nav id="tmNav" class="tm-nav">          
          <a class="tm-navbar-menu" href="#">Menu</a>
          <ul class="tm-nav-links">
            <li class="tm-nav-item active">
              <a href="#" data-linkid="0" data-align="right" class="tm-nav-link">Principal</a>
            </li>
            <li class="tm-nav-item">
              <a href="#" data-linkid="1" data-align="right" class="tm-nav-link">Quienes Somos</a>
            </li>
            <li class="tm-nav-item">
              <a
                href="#"
                data-linkid="2"
                data-align="middle"
                class="tm-nav-link">Galería</a>
            </li>
            <li class="tm-nav-item">
              <a href="#" data-linkid="3" data-align="left" class="tm-nav-link">Iniciar sesión</a>
            </li>
          </ul>
        </nav>

        <!-- Site header -->
        <header class="tm-site-header-box tm-bg-dark">
          <h1 class="tm-site-title"><font color="red">TUR</font><font color="yellow">IS</font><font color="green">BOL</font></h1>
        </header>
      </div>
      <!-- tm-top-container -->

      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <!-- Site content -->
            <div class="tm-content">
              <!-- Seccion  Introduccion -->
              <section class="tm-section tm-section-0">
                <h2 class="tm-section-title mb-3 font-weight-bold">
                  <font color="yellow">Reserva tu pasaje Online</font>
                </h2>
                <div class="tm-textbox tm-bg-dark">
                  
                <!-- Default box -->
                  <div class="box">
                    <div class="box-body">

                      <form>  
                        
                      <table class = "table table-borderer table-striped" width="550" cellspacing="0" cellpadding="2">
                            <thead>
                                <tr>
                                    <td align="middle"></td>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <td>
                                      <label for="start">Fecha Inicio:</label>
                                    </td>
                                    <td>
                                      <input type="date" id="inico" name="trip-inicio"
                                      value="2021-08-01"
                                      min="2021-08-01" max="2021-08-31"> <br>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                    <label for="start">Fecha Final : </label>
                                    </td>
                                    <td>
                                      <input type="date" id="fin" name="trip-fin"
                                      value="2021-08-31"
                                      min="2021-08-01" max="2021-08-31"> <br>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                    <label for="start">Destino : </label>
                                    </td>
                                    <td>
                                      <select class="form-select form-select-sm" aria-label=".form-select-sm example">
                                        <option selected>Selecciona destino</option>
                                        <option value="1">Oruro</option>
                                        <option value="2">La Paz</option>
                                        <option value="3">Cochabamba</option>
                                      </select>
                                    </td>
                                </tr>
                                <tr>
                                  <td></td>
                                  <td valign="left">
                                    <input type="hidden" id="form_sent" name="form_sent" value="true"><br/>
                                    <input type="submit" id="btn_submit" class = "btn btn-primary"value="Buscar viaje"><br/>
                                  </td>
                                </tr>
                            </tbody>
                        </table>

                        <script>    
                          export default {
                            data() {
                              const now = new Date()
                              const today = new Date(now.getFullYear(), now.getMonth(), now.getDate())

                              const minDate = new Date(today)
                              minDate.setMonth(minDate.getMonth() - 2)
                              minDate.setDate(15)

                              const maxDate = new Date(today)
                              maxDate.setMonth(maxDate.getMonth() + 2)
                              maxDate.setDate(15)

                              return {
                                value: '',
                                min: minDate,
                                max: maxDate
                              }
                            }
                          }
                        </script> 
                      </form>

                        <hr>
                        <?php if (isset($_GET['form_sent']) && $_GET['form_sent'] == "true") {?>
                        <?php
                            include_once('controladores/conector.php');
                            $SDATE = $_GET['trip-inicio'];
                            $SSDATE = explode('/', $SDATE);
                            $START_DATE = $_GET['trip-inicio'];//$SSDATE[0]."-".$SSDATE[1]."-".$SSDATE[2];
                            //echo('<h3>'.$START_DATE.'</h3>');

                            $EDATE = $_GET['trip-fin'];
                            $EEDATE = explode('/', $EDATE);
                            $END_DATE = $_GET['trip-fin'];//$EEDATE[2]."-".$EEDATE[0]."-".$EEDATE[1];
                            //echo('<h3>'.$END_DATE.'</h3>');

                            //SELECT * FROM test WHERE course_date BETWEEN '2021-08-28' AND '2021/08/29'

                          $strsql = "SELECT * FROM programacion WHERE fecha BETWEEN '$START_DATE' AND '$END_DATE'";
                          $rs = mysqli_query($link, $strsql) or die(mysqli_error());
                          $row = mysqli_fetch_assoc($rs);
                          $total_rows = mysqli_num_rows($rs);
                          print_r($row, $total_rows);
                        ?>
                        <table class = "table table-borderer table-striped" width="550" cellspacing="0" cellpadding="2">
                            <thead>
                                <tr>
                                    <td>Nº</td>
                                    <td>Fecha</td>
                                    <td>Hora</td>
                                    <td>Destino</td>
                                    <td>Acción</td>
                                </tr>
                            </thead>

                            <?php if ($total_rows > 0) {
                                    do {
                            ?>
                            <tbody>
                                <tr>
                                    <td><?php echo($row['cod_programacion']); ?></td>
                                    <td><?php echo($row['fecha']); ?></td>
                                    <td><?php echo($row['hora']); ?></td>
                                    <td>destino</td>
                                    <td>
                                        <div class="btn-group">
                                            <button class="btn btn-warning"><i class="fa fa-pencil"> Reservar</i></button>
                                        </div>
                                    </td>
                                </tr>
                                <?php
                                        } while ( $row = mysqli_fetch_assoc($rs) );
                                        mysqli_free_result($rs);
                                    } else {
                                ?>
                                <tr>
                                    <td colspan="3">No existe Viajes.</td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                        <?php } ?>
                    </div>
                  </div>
                <!-- /.box -->

                </div>
              </section>
              <!-- Seccion Mision y Vision -->
              <section class="tm-section tm-section-1">
                <div class="tm-textbox tm-textbox-2 tm-bg-dark">
                  <h2 class="tm-text-blue mb-4">MISIÓN</h2>
                  <p class="mb-4">
                    Somos una empresa de responsabilidad social, que busca incrementar el turismo, mediante la prestación de servicios turísticos innovadores y de calidad, que contribuyan al desarrollo integral del ser humano, en armonía con la naturaleza.
                  </p>
                  <h2 class="tm-text-blue mb-4">VISIÓN</h2>
                  <p class="mb-4">
                    Ser la empresa de servicios turísticos de mayor referencia, que logre insertar en la cultura de la gente, la costumbre de hacer turismo dentro de Bolivia.
                  </p>                  
                </div>
              </section>

              <!-- Seccion Galeria de imagenes -->
              <section class="tm-section tm-section-2 mx-auto">
                <div class="grid tm-gallery">
                  <figure class="effect-goliath tm-gallery-item">
                    <img src="_img/lapaz.jpg" alt="Image 1" class="" />
                    <figcaption>
                      <h2>
                        Ciudad de
                        <span>La Paz</span>
                      </h2>
                      <p>Vista panorámica Illimani.</p>
                      <a href="_img/lapaz.jpg">View more</a>
                    </figcaption>
                  </figure>
                  <figure class="effect-goliath tm-gallery-item">
                    <img src="_img/coroico.jpg" alt="Pretty Girl" class="" />
                    <figcaption>
                      <h2>
                        
                        <span>Yungas</span>
                      </h2>
                      <p>Ruta ciclística</p>
                      <a href="_img/coroico.jpg">View more</a>
                    </figcaption>
                  </figure>
                  <figure class="effect-goliath tm-gallery-item">
                    <img src="_img/concordia.jpg" alt="Cristo de la Concordia" class="" />
                    <figcaption>
                      <h2>
                        Ciudad
                        <span>Cochabamba</span>
                      </h2>
                      <p>Cristo de la Concordia</p>
                      <a href="_img/concordia.jpg">View more</a>
                    </figcaption>
                  </figure>
                  <figure class="effect-goliath tm-gallery-item">
                    <img src="_img/dino.jpg" alt="Stairs" class="" />
                    <figcaption>
                      <h2>
                        Dino Land
                        <span>Park</span>
                      </h2>
                      <p>Ciudad de Cochabamba</p>
                      <a href="_img/dino.jpg">View more</a>
                    </figcaption>
                  </figure>
                  <figure class="effect-goliath tm-gallery-item">
                    <img src="_img/santa cruz.jpg" alt="Misiones Jesuiticas" class="" />
                    <figcaption>
                      <h2>
                        Ciudad de
                        <span>Santa Cruz</span>
                      </h2>
                      <p>Misiones Jesuiticas</p>
                      <a href="_img/santa cruz.jpg">View more</a>
                    </figcaption>
                  </figure>
                  <figure class="effect-goliath tm-gallery-item">
                    <img src="_img/diablo.jpg" alt="Muela del Diablo" class="" />
                    <figcaption>
                      <h2>
                        Chochis
                        <span>Santa Cruz</span>
                      </h2>
                      <p>La Muela del Diablo</p>
                      <a href="_img/diablo.jpg">View more</a>
                    </figcaption>
                  </figure>
                  <figure class="effect-goliath tm-gallery-item">
                    <img src="_img/sucre.jpg" alt="Sucre" class="" />
                    <figcaption>
                      <h2>
                        Ciudad de
                        <span>Sucre</span>
                      </h2>
                      <p>Universidad San Francisco Xavier</p>
                      <a href="_img/sucre.jpg">View more</a>
                    </figcaption>
                  </figure>
                  <figure class="effect-goliath tm-gallery-item">
                    <img src="_img/casa.jpg" alt="Casa de la Libertad" class="" />
                    <figcaption>
                      <h2>
                        Ciudad de
                        <span>Sucre</span>
                      </h2>
                      <p>Casa de la Libertad</p>
                      <a href="_img/casa.jpg">View more</a>
                    </figcaption>
                  </figure>
                  <figure class="effect-goliath tm-gallery-item">
                    <img src="_img/uva.jpg" alt="Tarija" class="" />
                    <figcaption>
                      <h2>
                        Ciudad de
                        <span>Tarija</span>
                      </h2>
                      <p>Viñedo</p>
                      <a href="_img/uva.jpg">View more</a>
                    </figcaption>
                  </figure>
                  <figure class="effect-goliath tm-gallery-item">
                    <img src="_img/tarijeña.jpg" alt="Tarijeña" class="" />
                    <figcaption>
                      <h2>
                        La
                        <span>Tarijeña</span>
                      </h2>
                      <p>Vestimenta típica de la mujer Tarijeña</p>
                      <a href="_img/tarijeña.jpg">View more</a>
                    </figcaption>
                  </figure>
                  <figure class="effect-goliath tm-gallery-item">
                    <img src="_img/orurito.jpg" alt="Oruro" class="" />
                    <figcaption>
                      <h2>
                        Ciudad de
                        <span>Oruro</span>
                      </h2>
                      <p>Vista panorámica casco del minero</p>
                      <a href="_img/orurito.jpg">View more</a>
                    </figcaption>
                  </figure>
                  <figure class="effect-goliath tm-gallery-item">
                    <img src="_img/carnaval.jpg" alt="Carnaval" class="" />
                    <figcaption>
                      <h2>
                        Carnaval de
                        <span>Oruro</span>
                      </h2>
                      <p>Danza de la Morenada</p>
                      <a href="_img/carnaval.jpg">View more</a>
                    </figcaption>
                  </figure>
                </div>
              </section>

              <!-- Seccion Login -->

              <section class="tm-section tm-section-3 tm-section-center">
                <form action="" class="tm-contact-form" method="post">
                  <div class="form-group mb-4">
                    <h2 class="tm-text-light"><font color="black">INICIAR SESIÓN</h2>
                    <input
                      type="text"
                      id="ingUsuario"
                      name="ingUsuario"
                      class="form-control"
                      placeholder="Ingrese su Usuario"
                      required
                    />
                  </div>
                  <div class="form-group mb-4">
                    <input
                      type="password"
                      id="ingPassword"
                      name="ingPassword"
                      class="form-control"
                      placeholder="Ingrese su Contraseña"
                      required
                    />
                  </div>
            
                  <div class="form-group mb-0">
                    <button type="submit" class="btn tm-send-btn tm-fl-center">
                      INGRESAR
                    </button>
                  </div>
                  <?php 
                      $login =new ControladorUsuarios();
                      $login -> ctrIngresoUsuarios(); 
                  ?>
                </form>
              </section>
            </div>
          </div>
        </div>
      </div>

      <div class="tm-bottom-container">

        <!-- Footer -->
        <footer>
          || Copyright &copy; 2021 GRUPO C # ||  
        </footer>
      </div>
    </div>

    <script src="_js/jquery-1.11.0.min.js"></script>
    <script src="_js/background.cycle.js"></script>
    <script src="_slick/slick.min.js"></script>
    <script src="_js/jquery.magnific-popup.min.js"></script>
    <script>
      let slickInitDone = false;
      let previousImageId = 0,
        currentImageId = 0;
      let pageAlign = "right";
      let bgCycle;
      let links;
      let eachNavLink;

      window.onload = function() {
        $("body").addClass("loaded");
      };

      function navLinkClick(e) {
        if ($(e.target).hasClass("external")) {
          return;
        }

        e.preventDefault();

        if ($(e.target).data("align")) {
          pageAlign = $(e.target).data("align");
        }

        // Change bg image
        previousImageId = currentImageId;
        currentImageId = $(e.target).data("linkid");
        bgCycle.cycleToNextImage(previousImageId, currentImageId);

        // Change menu item highlight
        $(`.tm-nav-item:eq(${previousImageId})`).removeClass("active");
        $(`.tm-nav-item:eq(${currentImageId})`).addClass("active");

        // Change page content
        $(`.tm-section-${previousImageId}`).fadeOut(function(e) {
          $(`.tm-section-${currentImageId}`).fadeIn();
          // Gallery
          if (currentImageId === 2) {
            setupSlider();
          }
        });

        adjustFooter();
      }

      $(document).ready(function() {
        // Set first page
        $(".tm-section").fadeOut(0);
        $(".tm-section-0").fadeIn();

        // Set Fondos de pantalla
        
        bgCycle = $("body").backgroundCycle({
          imageUrls: [
            "_img/mercedes.jpg",
            "_img/cordillera.jpg",
            "_img/lago.jpg",
            "_img/cerro.jpg"
          ],
          fadeSpeed: 1500,
          duration: -1,
          backgroundSize: SCALING_MODE_COVER
        });

        eachNavLink = $(".tm-nav-link");
        links = $(".tm-nav-links");

        // "Menu" open/close
        if (links.hasClass("open")) {
          links.fadeIn(0);
        } else {
          links.fadeOut(0);
        }

        $("#tm_about_link").on("click", navLinkClick);
        $("#tm_work_link").on("click", navLinkClick);

        // Each menu item click
        eachNavLink.on("click", navLinkClick);

        $(".tm-navbar-menu").click(function(e) {
          if (links.hasClass("open")) {
            links.fadeOut();
          } else {
            links.fadeIn();
          }

          links.toggleClass("open");
        });

        // window resize
        $(window).resize(function() {
          // If current page is Gallery page, set it up
          if (currentImageId === 2) {
            setupSlider();
          }

          // Adjust footer
          adjustFooter();
        });

        adjustFooter();
      }); // DOM is ready

      function adjustFooter() {
        const windowHeight = $(window).height();
        const topHeight = $(".tm-top-container").height();
        const middleHeight = $(".tm-content").height();
        let contentHeight = topHeight + middleHeight;

        if (pageAlign === "left") {
          contentHeight += $(".tm-bottom-container").height();
        }

        if (contentHeight > windowHeight) {
          $(".tm-bottom-container").addClass("tm-static");
        } else {
          $(".tm-bottom-container").removeClass("tm-static");
        }
      }

      function setupSlider() {
        let slidesToShow = 4;
        let slidesToScroll = 2;
        let windowWidth = $(window).width();

        if (windowWidth < 480) {
          slidesToShow = 1;
          slidesToScroll = 1;
        } else if (windowWidth < 768) {
          slidesToShow = 2;
          slidesToScroll = 1;
        } else if (windowWidth < 992) {
          slidesToShow = 3;
          slidesToScroll = 2;
        }

        if (slickInitDone) {
          $(".tm-gallery").slick("unslick");
        }

        slickInitDone = true;

        $(".tm-gallery").slick({
          dots: true,
          customPaging: function(slider, i) {
            var thumb = $(slider.$slides[i]).data();
            return `<a>${i + 1}</a>`;
          },
          infinite: true,
          prevArrow: false,
          nextArrow: false,
          slidesToShow: slidesToShow,
          slidesToScroll: slidesToScroll
        });

        // Open big image when a gallery image is clicked.
        $(".slick-list").magnificPopup({
          delegate: "a",
          type: "image",
          gallery: {
            enabled: true
          }
        });
      }
    </script>
  </body>
</html>
