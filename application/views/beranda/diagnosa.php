<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <title>Sipakar - Diagnosa Perbuahan Cuaca</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/png" href="favicon.ico">

        <!--Google Font link-->
        <link href="https://fonts.googleapis.com/css?family=Ubuntu:300,300i,400,400i,500,500i,700,700i" rel="stylesheet">


        <link rel="stylesheet" href=" <?= base_url()?>asset/home/assets/css/swiper.min.css">
        <link rel="stylesheet" href=" <?= base_url()?>asset/home/assets/css/animate.css">
        <link rel="stylesheet" href=" <?= base_url()?>asset/home/assets/css/iconfont.css">
        <link rel="stylesheet" href=" <?= base_url()?>asset/home/assets/css/font-awesome.min.css">
        <link rel="stylesheet" href=" <?= base_url()?>asset/home/assets/css/bootstrap.min.css">
        <link rel="stylesheet" href=" <?= base_url()?>asset/home/assets/css/magnific-popup.css">
        <link rel="stylesheet" href=" <?= base_url()?>asset/home/assets/css/bootsnav.css">
      


        <!--For Plugins external css-->
        <!--<link rel="stylesheet" href=" <?= base_url()?>asset/home/assets/css/plugins.css" />-->
        <!--Theme custom css -->
        <link rel="stylesheet" href=" <?= base_url()?>asset/home/assets/css/style.css">

        <!--Theme Responsive css-->
        <link rel="stylesheet" href=" <?= base_url()?>asset/home/assets/css/responsive.css" />

        <script src=" <?= base_url()?>asset/home/assets/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
    </head>

    <body data-spy="scroll" data-target=".navbar-collapse">


        <!-- Preloader -->
        <div id="loading">
            <div id="loading-center">
                <div id="loading-center-absolute">
                    <div class="object" id="object_one"></div>
                    <div class="object" id="object_two"></div>
                    <div class="object" id="object_three"></div>
                    <div class="object" id="object_four"></div>
                </div>
            </div>
        </div><!--End off Preloader -->


        <div class="culmn">
            <!--Home page style-->


            <nav class="navbar navbar-default bootsnav navbar-fixed white no-background">
                <div class="container">  

                    <!-- Start Atribute Navigation -->
                    <div class="attr-nav">
                        <ul>
                        <li><a href="<?= base_url()?>login" class="btn btn-sm"> <i class="fa fa-lock"></i> Login</a></li>
                        </ul>
                    </div>        
                    <!-- End Atribute Navigation -->


                    <!-- Start Header Navigation -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                            <i class="fa fa-bars"></i>
                        </button>
                        <a class="navbar-brand" href="<?= base_url()?>">
                            <img src=" <?= base_url()?>asset/home/assets/images/logo.png" class="logo logo-display" alt="">
                            <img src=" <?= base_url()?>asset/home/assets/images/footer-logo.png" class="logo logo-scrolled" alt="">
                            
                        </a>

                    </div>
                    <!-- End Header Navigation -->

                    <!-- navbar menu -->
                    <div class="collapse navbar-collapse" id="navbar-menu">
                        <ul class="nav navbar-nav navbar-center">
                            <li><a href="<?= base_url()?>">Home</a></li>                    
                            <li><a href="<?= base_url()?>">Pengembang</a></li>
                            <li><a href="<?= base_url()?>">Petunjuk Pengguna</a></li>
                            <li><a href="<?= base_url()?>beranda/diagnosa">Diagnosa</a></li>
                           <!--  <li><a href="#download">Download</a></li> -->
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </div>   
            </nav>

            <!--Home Sections-->

            <section id="home" class="">
                <div class="container" style="padding-top: -200px;">
                    <div class="row">
                        <div class="main_home">
                           
                      
				
				  <!-- Main content -->
					<div class="col-md-offset-1 col-md-10">
						<?php $this->load->view($view)?>
					</div>
			
	

                        </div>
                      

                    </div><!--End off row-->
                </div><!--End off container -->
            </section> <!--End off Home Sections-->



            <!--Featured Section-->
           

<!--  -->



          

            <!-- scroll up-->
            <div class="scrollup">
                <a href="#"><i class="fa fa-chevron-up"></i></a>
            </div><!-- End off scroll up -->
            
            
            <footer id="footer" class="footer bg-black">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <nav class="navbar navbar-default bootsnav footer-menu no-background">
                                <div class="container">  

                                    <!-- Start Atribute Navigation -->
                                    <div class="attr-nav">
                                        <ul>
                                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                        </ul>
                                    </div>        
                                    <!-- End Atribute Navigation -->


                                    <!-- Start Header Navigation -->
                                    <div class="navbar-header">
                                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-footer">
                                            <i class="fa fa-bars"></i>
                                        </button>
                                        <a class="navbar-brand" href="<?= base_url()?>"><img src=" <?= base_url()?>asset/home/assets/images/footer-logo.png" class="logo" alt=""></a>
                                    </div>
                                    <!-- End Header Navigation -->

                                    <!-- navbar menu -->
                                    <div class="collapse navbar-collapse" id="navbar-footer">
                                        <ul class="nav navbar-nav navbar-center">
                                        <!--     <li><a href="#home">Home</a></li>                    
                                            <li><a href="#features">Features</a></li>
                                            <li><a href="#reviews">Reviews</a></li>
                                            <li><a href="#download">Download</a></li> -->
                                        </ul>
                                    </div><!-- /.navbar-collapse -->
                                </div>   
                            </nav>
                        </div>
                        <div class="divider"></div>
                        <div class="col-md-12">
                            <div class="main_footer text-center p-top-40 p-bottom-30">
                                <p class="wow fadeInRight" data-wow-duration="1s">
                                    Made with 
                                    <i class="fa fa-heart"></i>
                                    by Fadilah Riczky
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>




        </div>

        <!-- JS includes -->

        <script src=" <?= base_url()?>asset/home/assets/js/vendor/jquery-1.11.2.min.js"></script>
        <script src=" <?= base_url()?>asset/home/assets/js/vendor/bootstrap.min.js"></script>

        <script src=" <?= base_url()?>asset/home/assets/js/jquery.magnific-popup.js"></script>
        <script src=" <?= base_url()?>asset/home/assets/js/jquery.easing.1.3.js"></script>
        <script src=" <?= base_url()?>asset/home/assets/js/swiper.min.js"></script>
        <script src=" <?= base_url()?>asset/home/assets/js/jquery.collapse.js"></script>
        <script src=" <?= base_url()?>asset/home/assets/js/bootsnav.js"></script>



        <script src=" <?= base_url()?>asset/home/assets/js/plugins.js"></script>
        <script src=" <?= base_url()?>asset/home/assets/js/main.js"></script>
        

    </body>
</html>
