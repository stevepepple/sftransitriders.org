<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>
		<title>SFTRU - About the San Francisco Transit Riders</title>
		
		<?php 
		echo file_get_contents("http://" . $_SERVER['HTTP_HOST'] . "/header.php?ipad=" . (bool) strpos($_SERVER['HTTP_USER_AGENT'],'iPad')); 
		?>
		
	</head>
	<body style="margin: 0;" onScroll="blurPhoto();">
	
		<div id="bgphoto_short" style="background-image:url('../img/buttons.jpg');"></div>
		<div id="bgphotoOverlay"></div>
		<div id="photo_overlay" class="short">
				<h1>About SFTRU</h1>
				<div class="overlay_sub">Current and future riders united to achieve excellent, affordable, and growing transit</div>
		</div>		
		
		<!-- Nav -->
		<?php 
		echo file_get_contents("http://" . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . "/../nav.php?class=short&page=" . basename(getcwd())); 
		?>
		
		
		<div id="content_wrapper_short" style="background-color:#f4f5f0;">
		
		
			
			<div id="content_wrapper_sub" style="background-color:#fff;">
			
				<div class="content_item" style="padding-top:50px;padding-bottom:50px;">
			
			<div id="sidebar">
				<h2>Stay Informed</h2>
				<p>Follow transit news and SFTRU events and happenings.</p>
				<p><input type="text" placeholder="Enter Your Email" class="textfield" style="width:230px;"></input></p>
				<br><br>
				<h2>Support Transit!</h2>
				<p>Become a member and help shape the future of transit in San Francisco.</p>
				<p><a href="../join/" class="white"><div class="but_default" style="width:190px;">Join Today</div></a></p>
				<p><a href="../involved/" class="white"><div class="but_default but_default_grey" style="width:190px;">Learn More</div></a></p>
			</div>
			
					<h1>Who We Are</h1>
					<br>
					<p>Transit riders from throughout the City, working toward better transit in San Francisco.</p>

<p>SFTRU fights for an excellent, affordable, and growing public transit system because it is essential to the character and soul of San Francisco. Unlike places where transit is a choice of last resort, Muni is used by and benefits everyone in our City. It enables nearly a third of households to get around without a car and increases the livability and vibrancy of city life.</p>

<p>Although San Francisco is often on the cutting edge, our transit system has fallen behind that of other major cities. We are frustrated with the delays, slow travel times, and lack of funding for better service.</p>

<p>San Franciscans have consistently supported transit, and they deserve a reliable, robust, and 21st-century transit system. SFTRU is delivering that change. Please become a member to join our community and support our work.</p>
				</div>
			</div>
			
			<div id="content_wrapper_sub" style="background-color:#eee;">
				<div class="content_item" style="padding-top:50px;padding-bottom:50px;">
				
					<h1>Executive Board</h1>
						<p>Our board is composed of transit advocates, community leaders, and past transportation veterans.</p>
						
						<div class="boardphoto"><img src="../img/photo_selby.png" width=133 height=133><p>Thea Selby<br><span class="photosubtitle">Chair</span></p></div>
						<div class="boardphoto"><img src="../img/photo_straus.png" width=133 height=133><p>Peter Straus<br>&nbsp;</p></div>
						<div class="boardphoto"><img src="../img/photo_martin.png" width=133 height=133><p>Reed Martin<br>&nbsp;</p></div>
						<div class="boardphoto"><img src="../img/photo_sisson.png" width=133 height=133><p>Daniel Sisson<br>&nbsp;</p></div>
						<div class="boardphoto"><img src="../img/photo_stearns.png" width=133 height=133><p>Esther Stearns<br>&nbsp;</p></div>
						
						<p><a href="" class="orange">View Board Meeting Minutes &raquo;</a></p>
							
				</div>
			</div>
			
			<div id="content_wrapper_sub" style="background-color:#fff;">
				<div class="content_item" style="padding-top:50px;padding-bottom:50px;">
				
				
					<h1>SFTRU Staff</h1>
						<div class="member_profile" style="border-bottom:0px !important;">
							<div class="profile_photo" style="background-image:url('../img/photo_magy.png');"></div>
							<div class="profile">
								<h2>Ilyse Magy</h2>
								<p>Ilyse Magy is an organizer and artist committed to empowering others to actively engage with civic systems. She holds an MFA in Social Practice from California College of the Arts. Prior to SFTRU, she did design and communication work with SF Environment on their Clean Transportation team. Her long-time obsession with Muni is perhaps best represented in her project with Revel Art Collective, <a href="http://http://revelartcollective.com/portfolio/muni-media-map/">Muni Media Map</a>. Originally from the Metro Detroit area, she came to San Francisco in 2008 seeking a city with viable public transportation, and is working to make that a reality.</p>
							</div>
						</div>
						
				</div>
			</div>
			
			<div id="content_wrapper_sub" style="background-color:#eee;">
				<div class="content_item" style="padding-top:50px;padding-bottom:50px;">
				
					<div class="col" style="margin-right: 120px;">
						<h2>National Allies</h2>
						<p>SFTRU is a member of the Transportation for America campaign, a broad coalition of housing, business, environmental, public health, transportation, equitable development, and other organizations. We're all seeking to align our national, state, and local transportation policies with an array of issues like economic opportunity, climate change, energy security, health, housing and community development.</p>

<p>For more information, visit their home page at <a href="http://t4america.org/">t4america.org</a>.</p>
					</div>
					
					<div class="col" style="margin: 0;">
						<h2>About Us</h2>
						<p>San Francisco Transit Riders is a certified 501(c)(3) tax-exempt nonprofit organization.</p>
						<p>SF Transit Riders' EIN is 47-4568771</p>
					</div>
					
				</div>
			</div>
			
			
		
		<!-- Footer -->
		<?php 
		echo file_get_contents("http://" . $_SERVER['HTTP_HOST'] . "/footer.php"); 
		?>

		</div>

		
	</body>
</html>
