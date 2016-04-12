<?php get_header(); ?>

<div id="page">
	<!-- START HEADER -->
	<header id="header" class="small with-separation-bottom">
		<!-- POINTER ANIMATED -->
		<canvas id="header-canvas"></canvas>

		<!-- TOP NAVIGATION -->
		<div id="top-navigation">
			<ul class="animate-me fadeInDown" data-wow-duration="1.2s">
				<li class="menu-item"><i class="fa fa-phone"></i> 202.905.5337</li>
				<li class="menu-item"><a href="contact.html"><i class="fa"></i>Contact Us</a></li>
				<li class="menu-item"><span class="navigation-social">Follow Us!</span> <a href="http://facebook.com/skylitedc"><i class="fa fa-facebook"></i></a> <a href="http://twitter.com/skylitedc"><i class="fa fa-twitter"></i></a><a hr ef="http://instagram.com/skylitedc"><i class="fa fa-instagram"></i></a></li>
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
						<li class="menu-item"><a href="http://www.richardsandoval.com">Richard Sandoval Restaurants</a></li>
						<li class="menu-item"><a href="#">El Centro D.F. 14th Street</a></li>
						<li class="menu-item"><a href="#">El Centro D.F. Georgetown</a></li>
						<li class="menu-item"><a href="#">Masa 14</a></li>
						<li class="menu-item"><a href="#">Toro Toro</a></li>
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
					<a href="index.html" id="logo-navigation">
						<span>NIGHTLIFE LOGISTICS</span>
					</a>
				</div>
				<ul id="right-navigation" class="animate-me fadeInRightBig">
					<?php wp_nav_menu( array(
						'menu' => 'Right menu'
						) ); ?>
					</nav>

					<!-- SHADOW -->
					<div id="shade2"></div>

					<!-- HEADER SLIDER -->
					<div class="flexslider" id="header-slider">
						<ul class="slides">
							<li><img src="<?php bloginfo('template_directory'); ?>/images/backgrounds/bg2.jpg" alt="SLider Image"></li>
						</ul>	
					</div>

				</header>
				<!-- END HEADER -->

				<!-- START MAIN CONTAINER -->
				<div class="main-container">
					<div>
						<?php if ( have_posts() ) : ?>
							<?php while ( have_posts() ) : the_post(); 
							$post_thumbnail_id = get_post_thumbnail_id();
							$post_thumbnail_url = wp_get_attachment_url( $post_thumbnail_id );
							?> 
								<div class="row">
									<!--PORTFOLIO -->
									<div class="col-lg-6">
										<div class="flexslider image-slider">
											<!--SLIDER -->
											<ul class="slides">
												<li>
													<img width="100%" src="<?php echo $post_thumbnail_url; ?>" />
												</li>
											</ul>
										</div>
										<!--SHARE BUTTONS -->
										<ul class="share-buttons animate-me fadeInUp">
											<script>function fbs_click() {u=location.href;t=document.title;window.open('http://www.facebook.com/sharer.php?u='+encodeURIComponent(u)+'&t='+encodeURIComponent(t),'sharer','toolbar=0,status=0,width=626,height=436'); return false;}</script>
											<li><a rel="nofollow" href="http://www.facebook.com/share.php?u=<;url>" onclick="return fbs_click()" target="_blank" class="btn btn-default button-facebook" ><i class="fa fa-facebook"></i> Share it</a></li>
											<li><a href="http://twitter.com/home/?status=Your tweet text." target="_blank" class="btn btn-default button-twitter"><i class="fa fa-twitter"></i> Tweet it</a></li>
										</ul>
									</div>
									<div class="col-lg-6">
										<!--ITEM DETAILS -->
										<h1 class="animate-me fadeInRight project-title"><?php wp_title('',true); ?></h1>
										<hr class="align-left"/>
										<?php the_content(); ?>	
									</div>
								</div>
							<?php endwhile; ?>
						<?php endif; ?>
					</div>

					<br/>

					<section class="contact-container with-separation-bottom with-separation-top">
						<div class="contact-boxes">
							<div class="contact-box contact-box-facebook animate-me zoomIn">
								<h2>Facebook</h2>
								<p>Like our page and send us message directly from our brand new Facebook page.</p>
								<a href="http://facebook.com/skylitedc" class="btn btn-default"><i class="fa fa-facebook"></i> Like Our Page</a>
							</div>
							<div class="contact-box contact-box-twitter animate-me zoomIn">
								<h2>Twitter</h2>
								<p>Follow us to interact, chat and share our ideas on Twitter.</p>
								<a href="http://twitter.com/skylitedc" class="btn btn-default"><i class="fa fa-twitter"></i> Follow us</a>
							</div>
							<div class="contact-box contact-box-email animate-me zoomIn">
								<h2>Instagram</h2>
								<p>Flick through our pics on our instagram!</p>
								<a href="http://instagram.com/skylitedc" class="btn btn-default"><i class="fa fa-instagram"></i> Browse Pics</a>
							</div>  
							<div class="contact-box contact-box-email animate-me zoomIn">
								<h2>Snapchat</h2>
								<a href="contact.html" class="btn btn-default"><i class="fa fa-envelope"></i> Coming Soon!</a>
							</div>
						</div>
					</section>


					<!-- CUSTOM CONTAINER -->
					<section class="custom-section-container with-separation-bottom with-separation-top">
						<div class="container">
							<div class="custom-section-text">
								<h2 class="animate-me fadeInLeft">Sign up for our newsletter!</h2>
								<p class="animate-me fadeInLeft">Keep up-to-date with everyone we have going on all in one place! Everything from which DJ's we are bringing, to th enext themed party, etc...</p>

							</div>
							<div class="custom-section-buttons">
								<a href="http://eepurl.com/bjVkjD" class="btn btn-default animate-me fadeInRight"><i class="fa fa-book"></i> Sign Up!</a>
								<a href="http://skyliteweekly.com" class="btn btn-default animate-me fadeInRight"><i class="fa fa-paper-plane"></i> Check it Out</a>
							</div>
						</div>
					</section>
				</div>
				<!-- END MAIN CONTAINER -->
				<?php get_footer(); ?>




				<