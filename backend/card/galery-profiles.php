<?php
include '../auth/sql.php';
include '../auth/encryp.php';
include '../auth/query.php';
session_start();

?>
<!DOCTYPE html>
<!--[if IE 8 ]><html class="no-js oldie ie8" lang="en"> <![endif]-->
<!--[if IE 9 ]><html class="no-js oldie ie9" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>

    <!--- basic page needs
   ================================================== -->
    <meta charset="utf-8">
    <title>Kards</title>
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- mobile specific metas
   ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- CSS
   ================================================== -->
    <link rel="stylesheet" href="../assets/css/base.css">
    <link rel="stylesheet" href="../assets/css/main1.css">
    <link rel="stylesheet" href="../assets/css/vendor.css">

    <!-- script
   ================================================== -->
    <script src="../assets/js/modernizr.js"></script>
    <script src="../assets/js/pace.min.js"></script>

    <!-- favicons
	================================================== -->
    <link rel="icon" type="image/png" href="../assets/favicon.png">

</head>

<body id="top">

    <!-- header 
   ================================================== -->
    <!-- /header -->

    <!-- intro section
   ================================================== -->
    <!-- /intro -->


    <!-- about section
   ================================================== -->
    <!-- /process-->


    <!-- resume Section
   ================================================== -->
    <!-- /features -->


    <!-- Portfolio Section
   ================================================== -->
    <section id="portfolio">

        <div class="row section-intro">
            <div class="col-twelve">

                <h5>Portfolio</h5>
                <h1>Check Out Some of My Works.</h1>

                <p class="lead">Lorem ipsum Do commodo in proident enim in dolor cupidatat adipisicing dolore officia
                    nisi aliqua incididunt Ut veniam lorem ipsum Consectetur ut in in eu do.</p>

            </div>
        </div> <!-- /section-intro-->
        <div class="row portfolio-content">
            <div class="row button-section">
                <div class="col-twelve">
                    <a href="#" onclick="window.history.back()" title="Hire Me"
                        class="button stroke smoothscroll">Previous</a>
                    <a href="#" title="Download CV" class="button button-primary">Download CV</a>
                </div>
            </div>

            <div class="col-twelve">

                <!-- portfolio-wrapper -->
                <div id="folio-wrapper" class="block-1-2 block-mob-full stack">

                    <?php foreach ($rowUpdateCards as $key => $profiles) : ?>
                    <div class="bgrid folio-item">
                        <div class="item-wrap">
                            <img src="../upload_picture/<?= $profiles['photo'] ?>" alt="Liberty">
                            <a href="#modal-0<?= $profiles['id'] ?>" class="overlay">
                                <div class="folio-item-table">
                                    <div class="folio-item-cell">
                                        <h3 class="folio-title"><?= $profiles['title'] ?></h3>
                                        <span class="folio-types">
                                            Graphic Design
                                        </span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <?php endforeach; ?>

                    <!-- /folio-item -->

                    <!-- <div class="bgrid folio-item">
                        <div class="item-wrap">
                            <img src="../assets/img/portfolio/shutterbug.jpg" alt="Shutterbug">
                            <a href="#modal-02" class="overlay">
                                <div class="folio-item-table">
                                    <div class="folio-item-cell">
                                        <h3 class="folio-title">Shutterbug</h3>
                                        <span class="folio-types">
                                            Web Design
                                        </span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div> -->
                    <!-- /folio-item -->

                    <!-- <div class="bgrid folio-item">
	               <div class="item-wrap">
	               	<img src="../assets/img/portfolio/clouds.jpg"alt="Clouds">
	                  <a href="#modal-03" class="overlay">             		                  
	                     <div class="folio-item-table">
	                     	<div class="folio-item-cell">
	                     		<h3 class="folio-title">Clouds</h3>	     					    
		     					    	<span class="folio-types">
		     					       	  Web Design
		     					      </span>		     		
		     					   </div> 	                      	
	                     </div>                    
	                  </a>
	               </div>
	        		</div> -->
                    <!-- /folio-item -->

                    <!-- <div class="bgrid folio-item">
	               <div class="item-wrap">
	               	<img src="../assets/img/portfolio/beetle.jpg" alt="Beetle">
	                  <a href="#modal-04" class="overlay">                  	                 
	                     <div class="folio-item-table">
	                     	<div class="folio-item-cell">
	                     		<h3 class="folio-title">Beetle</h3>	     					    
		     					    	<span class="folio-types">
		     					       	  Branding
		     					      </span>		     		
		     					   </div>  	                      	
	                     </div>                    
	                  </a>
	               </div>
	        		</div> -->
                    <!-- /folio-item -->

                    <!-- <div class="bgrid folio-item">
	               <div class="item-wrap">
	               	<img src="../assets/img/portfolio/lighthouse.jpg" alt="Lighthouse">
	                  <a href="#modal-05" class="overlay">             		                  
	                     <div class="folio-item-table">
	                     	<div class="folio-item-cell">
	                     		<h3 class="folio-title">Lighthouse</h3>	     					    
		     					    	<span class="folio-types">
		     					       	  Web Development
		     					      </span>		     		
		     					   </div> 	                      	
	                     </div>                    
	                  </a>
	               </div>
	        		</div> -->
                    <!-- /folio-item -->

                    <!-- <div class="bgrid folio-item">
	               <div class="item-wrap">
	               	<img src="../assets/img/portfolio/salad.jpg" alt="Salad">
	                  <a href="#modal-06" class="overlay">
	                     <div class="folio-item-table">
	                     	<div class="folio-item-cell">
	                     		<h3 class="folio-title">Salad</h3>	     					    
		     					    	<span class="folio-types">
		     					       	  Branding
		     					      </span>		     		
		     					   </div>	                      	
	                     </div>                    
	                  </a>
	               </div>
	        		</div> -->
                    <!-- /folio-item -->

                    <!-- modal popups - begin
	            ============================================================= -->

                    <?php foreach ($rowUpdateCards as $data) :  ?>
                    <div id="modal-0<?= $data['id'] ?>" class="popup-modal slider mfp-hide">

                        <div class="media">
                            <img src="../upload_picture/<?= $data['photo'] ?>" alt="" />
                        </div>

                        <div class="description-box">
                            <h4><?= $data['title'] ?></h4>
                            <p>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum
                                auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit.</p>

                            <div class="categories">Web Development</div>
                        </div>

                        <div class="link-box">
                            <a href="http://www.behance.net">Details</a>
                            <a href="#" class="popup-modal-dismiss">Close</a>
                        </div>

                    </div>
                    <?php endforeach; ?>
                    <!-- /modal-01 -->

                    <!-- <div id="modal-02" class="popup-modal slider mfp-hide">

                        <div class="media">
                            <img src="../assets/img/portfolio/modals/m-shutterbug.jpg" alt="" />
                        </div>

                        <div class="description-box">
                            <h4>Shutterbug</h4>
                            <p>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum
                                auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit.</p>

                            <div class="categories">Web Design</div>
                        </div>

                        <div class="link-box">
                            <a href="http://www.behance.net">Details</a>
                            <a href="#" class="popup-modal-dismiss">Close</a>
                        </div>

                    </div>  -->
                    <!-- /modal-02 -->

                    <!-- <div id="modal-03" class="popup-modal slider mfp-hide">

                        <div class="media">
                            <img src="../assets/img/portfolio/modals/m-clouds.jpg" alt="" />
                        </div>

                        <div class="description-box">
                            <h4>Clouds</h4>
                            <p>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum
                                auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit.</p>

                            <div class="categories">Web Design</div>
                        </div>

                        <div class="link-box">
                            <a href="http://www.behance.net">Details</a>
                            <a href="#" class="popup-modal-dismiss">Close</a>
                        </div>

                    </div>  -->
                    <!-- /modal-03 -->

                    <!-- <div id="modal-04" class="popup-modal slider mfp-hide">

                        <div class="media">
                            <img src="../assets/img/portfolio/modals/m-beetle.jpg" alt="" />
                        </div>

                        <div class="description-box">
                            <h4>Beetle</h4>
                            <p>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum
                                auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit.</p>

                            <div class="categories">Branding</div>
                        </div>

                        <div class="link-box">
                            <a href="http://www.behance.net">Details</a>
                            <a href="#" class="popup-modal-dismiss">Close</a>
                        </div>

                    </div>  -->
                    <!-- /modal-04 -->

                    <!-- <div id="modal-05" class="popup-modal slider mfp-hide">

                        <div class="media">
                            <img src="../assets/img/portfolio/modals/m-lighthouse.jpg" alt="" />
                        </div>

                        <div class="description-box">
                            <h4>Lighthouse</h4>
                            <p>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum
                                auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit.</p>

                            <div class="categories">Web Development</div>
                        </div>

                        <div class="link-box">
                            <a href="http://www.behance.net">Details</a>
                            <a href="#" class="popup-modal-dismiss">Close</a>
                        </div>

                    </div>  -->
                    <!-- /modal-05 -->

                    <!-- <div id="modal-06" class="popup-modal slider mfp-hide">

                        <div class="media">
                            <img src="../assets/img/portfolio/modals/m-salad.jpg" alt="" />
                        </div>

                        <div class="description-box">
                            <h4>Salad</h4>
                            <p>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum
                                auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit.</p>

                            <div class="categories">Branding</div>
                        </div>

                        <div class="link-box">
                            <a href="http://www.behance.net">Details</a>
                            <a href="#" class="popup-modal-dismiss">Close</a>
                        </div>

                    </div> -->
                    <!-- /modal-06 -->


                    <!-- modal popups - end
	            ============================================================= -->

                </div> <!-- /portfolio-wrapper -->

            </div> <!-- /twelve -->

        </div> <!-- /portfolio-content -->

    </section> <!-- /portfolio -->


    <!-- CTA Section
   ================================================== -->
    <!-- /cta -->


    <!-- services Section
   ================================================== -->
    >
    <!-- /services -->


    <!-- stats Section
   ================================================== -->
    <!-- /stats -->


    <!-- contact
   ================================================== -->
    <!-- /contact -->


    <!-- footer
   ================================================== -->

    <footer>
        <div class="row">

            <div class="col-six tab-full pull-right social">

                <ul class="footer-social">
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-behance"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                    <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                </ul>

            </div>

            <div class="col-eight tab-full">
                <div class="copyright">
                    <span>© Copyright 2018 </span>
                    <span>Design by <a href="http://www.styleshout.com/">styleshout</a></span>
                    <span>Distributed by <a href="https://themewagon.com/">themewagon</a></span>
                </div>
            </div>

            <div id="go-top">
                <a class="smoothscroll" title="Back to Top" href="#top"><i class="fa fa-long-arrow-up"></i></a>
            </div>

        </div> <!-- /row -->
    </footer>

    <div id="preloader">
        <div id="loader"></div>
    </div>

    <!-- Java Script
   ================================================== -->
    <script src="../assets/js/jquery-2.1.3.min.js"></script>
    <script src="../assets/js/plugins.js"></script>
    <script src="../assets/js/main1.js"></script>

</body>

</html>