<?php get_header(); ?>


<div id="page">
	<!-- START HEADER -->
	<header id="header" class="big with-separation-bottom">
		<!-- POINTER ANIMATED -->
		<canvas id="header-canvas"></canvas>
		
		<!-- TOP NAVIGATION -->
		<div id="top-navigation">
			<ul class="animate-me fadeInDown" data-wow-duration="1.2s">
				<li class="menu-item"><i class="fa fa-phone"></i> 202.905.5337</li>
				<li class="menu-item"><a href="contact.html"><i class="fa"></i>Contact Us</a></li>
				<li class="menu-item"><span class="navigation-social">Follow Us!</span> <a href="http://facebook.com/skylitedc"><i class="fa fa-facebook"></i></a> <a href="http://twitter.com/skylitedc"><i class="fa fa-twitter"></i></a><a href="http://instagram.com/skylitedc"><i class="fa fa-instagram"></i></a></li>
				<li class="menu-item">
					<!-- SEARCHFORM -->
					<div id="search-container" class="animate-me fadeInDown">
						<form role="search" method="get" action="#" >
							<input type="text" value="" name="s" id="s" placeholder="Search..."/>
							<input type="hidden" name="searchsubmit" id="searchsubmit" value="true" />
							<button type="submit" name="searchsubmit"><i class="fa fa-search"></i></button>
						</form>
					</div>
					<a href="#" id="search-toggle"><i class="fa"></i></a>
				</li>
				<li class="menu-item menu-item-has-children language-switcher">
					<!-- LANGUAGES -->
					<a href="#"><i class="fa fa-flag"></i> Our Partners <i class="fa fa-angle-down"></i></a>
					<ul class="sub-menu bounceInDown">
						<li class="menu-item">Richard Sandoval Restaurants</li>
					</ul>
				</li>
			</ul>
		</div>
		
		<!-- MOBILE NAVIGATION -->
		<nav id="navigation-mobile"></nav>
		
		<!-- MAIN MENU -->
		<nav id="navigation">
			<!-- DISPLAY MOBILE MENU -->
			<a href="#" id="show-mobile-menu"><i class="fa fa-bars"></i></a>
			<!-- CLOSE MOBILE MENU -->
			<a href="#" id="close-navigation-mobile"><i class="fa fa-long-arrow-left"></i></a>
			
			<ul id="left-navigation" class="animate-me fadeInLeftBig">
				<?php wp_nav_menu( array(
				    'menu' => 'Left menu'
				) ); ?>
			</ul>
			<div  class="animate-me flipInX" data-wow-duration="3s">
				<a href="/" id="logo-navigation">
					<span>NIGHTLIFE LOGISTICS</span>
				</a>
			</div>
			<ul id="right-navigation" class="animate-me fadeInRightBig">
				<?php wp_nav_menu( array(
			    	'menu' => 'Right menu'
				) ); ?>
			</ul>
		</nav>
		
		<!-- TEXT SLIDER -->
		<div id="ticker" class="animate-me zoomIn">
			
		</div>  		
		
		<!-- SCROLL BOTTOM -->
		<div id="scroll-bottom" class="animate-me fadeInUpBig">
			<a href="#"><i class="fa fa-angle-double-down"></i></a>
		</div>
		
		<!-- SHADOW -->
		<div id="shade"></div>

		<!-- SLIDER NAVIGATION (DELETE IF YOU DON'T USE THE SLIDER) -->
		<div class="navigation-slider-container">
			<a href="#" id="sliderPrev"><i class="fa fa-arrow-left"></i></a>
			<a href="#" id="sliderNext"><i class="fa fa-arrow-right"></i></a>
		</div>

		<!-- HEADER SLIDER -->
		<div class="flexslider" id="header-slider">
			<ul class="slides">
				<li style="background-color:#000;"><img class="main-banner" src="<?php bloginfo('template_directory'); ?>/images/backgrounds/bg1.jpg" alt="SLider Image" style=""></li>
				<li><img src="<?php bloginfo('template_directory'); ?>/images/backgrounds/bg2.jpg" alt="SLider Image"></li>
			</ul>
		</div>
		<!-- OR VIDEO -> https://github.com/VodkaBears/Vide -->
		  	<!--<div id="header-video"
			    data-vide-bg="ogv: images/video/video, webm: images/video/video, poster: images/video/poster" data-vide-options="posterType: jpg, loop: true, muted: true, position: 50% 50%">
			</div>-->
			
		</header>
		<!-- END HEADER -->

		<div class="clearfix"></div>
		<!-- COMMENTS SHORTCODEs -->
		<div>
			<h2 class="with-breaker animate-me fadeInUp">
				<a href="fb_gallery.html">Latest Galleries</a>
			</h2>

			<div class="portfolio-container with-separation-bottom with-separation-top animate-me zoomIn">
				<a id="home-gallery" href="fb_gallery.html"></a>
			</div>
		</div>
		<div>

			<h2 class="with-breaker animate-me fadeInUp">
				<a href="events-page.html">Upcoming Events</a>
			</h2>

			<div id="home-events" class="portfolio-container with-separation-bottom with-separation-top animate-me zoomIn">
				<a id="home-events" href="events-page.html"></a>
			</div>
		</div>
		<h2 class="with-breaker animate-me fadeInUp">

			Social Media<span style="color:#000">Like, Share and Follow Us!</span>
		</h2>

		<section class="contact-container with-separation-bottom with-separation-top">
			<div class="contact-boxes">
				<div class="contact-box contact-box-facebook animate-me zoomIn">
					<h2>Facebook</h2>

					<a href="http://facebook.com/skylitedc" class="btn btn-default"><i class="fa fa-facebook"></i> Like Our Page</a>
				</div>
				<div class="contact-box contact-box-twitter animate-me zoomIn">
					<h2>Twitter</h2>

					<a href="http://twitter.com/skylitedc" class="btn btn-default"><i class="fa fa-twitter"></i> Follow us</a>
				</div>
				<div class="contact-box contact-box-email animate-me zoomIn">
					<h2>Instagram</h2>

					<a href="http://instagram.com/skylitedc" class="btn btn-default"><i class="fa fa-instagram"></i> Browse Pics</a>
				</div>  
				<div class="contact-box contact-box-email animate-me zoomIn">
					<h2>Snapchat</h2>
					<a href="contact.html" class="btn btn-default"><i class="fa fa-envelope"></i> Coming Soon!</a>
				</div>
			</section>
		</div>

		<!--PORTFOLIO -->

		<h2 class="with-breaker animate-me fadeInUp">
			<a href="http://skyliteweekly.com">Newsletter</a>
		</h2>


		<!-- CUSTOM CONTAINER -->
		<section class="custom-section-container with-separation-bottom with-separation-top">
			<div class="container">
				<div class="custom-section-text">
					<h2 class="animate-me fadeInLeft">Sign up for our newsletter!</h2>


				</div>
				<div class="custom-section-buttons	">
					<a href="http://eepurl.com/bjVkjD" class="btn btn-default animate-me fadeInRight"><i class="fa fa-book"></i> Sign Up</a>
					<a href="http://skyliteweekly.com" class="btn btn-default animate-me fadeInRight"><i class="fa fa-paper-plane"></i> Check it Out</a>
				</div>
			</div>
		</section>
		<div>

			<h2 class="with-breaker animate-me fadeInUp">
				<a href="talent.html">Talent</a>
			</h2>
			<div  class="portfolio-container with-separation-bottom with-separation-top animate-me zoomIn">
				<a id="home-talents" href="talent.html"></a>
			</div>
		</div>

		<!-- CUSTOM CONTAINER -->

		<!-- START MAIN CONTAINER -->
		<div class="main-container">
			<div class="">
				<!-- SKILLS -->
				<br>
				<h2 class="with-breaker animate-me fadeInUp" style="color:#000">
					What do we do</h2>
				</h2>
				<div id="skills-container" class=" container-fluid skills">
					<div class="skills-row row">
						<div class="col-md-3 skill animate-me zoomIn">
							<a href="about.html"><h4 >Strategic Marketing</h4></a>
							<p>Strategic marketing is the fundamental underpinning of our fortes. We have been known to develop strong marketing strategies that remain in effect to this day.</p>
						</div>
						<div class="col-md-3 skill animate-me zoomIn">
							<a href="about.html"><h4 >Nightlife Logistics</h4></a>
							<p> This is where we plan, execute and oversee the entire aspect of all nightlife operations and logistics, at all our venues.</p>
						</div>
						<div class="col-md-3 skill animate-me zoomIn">
							<a href="about.html"><h4>Event Management</h4></a>
							<p>Here we oversee the conception to the development of an event in its entirety. This involves, but is not limited to, financial, crowd control, and liability aspects of each event.</p>
						</div>
						<div class="col-md-3 skill animate-me zoomIn">
							<a href="about.html"><h4>Talent Management</h4></a>
							<p>Boasting some of the best talent in the District, our roster is a collective our resident DJ's who were carefully chosen to be apart of our exclusive list of talent.</p>
						</div>
					</div>
				</div>
				<div class="skill-button center animate-me fadeInUp">
					<a href="events-page.html" class="btn btn-default"><i class="fa fa-trophy"></i>Check out upcoming Events</a>
				</div>
				<!-- END MAIN CONTAINER -->

				<?php get_footer(); ?>