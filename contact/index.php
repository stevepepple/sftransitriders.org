<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>
		<title>SFTRU - Contact</title>
		
		<?php 
		echo file_get_contents("http://" . $_SERVER['HTTP_HOST'] . "/header.php?ipad=" . (bool) strpos($_SERVER['HTTP_USER_AGENT'],'iPad')); 
		?>

	</head>
	<body style="margin: 0;" onScroll="blurPhoto();">
	
		<div id="bgphoto_short" style="background-image:url('../img/signing.jpg');"></div>
		<div id="bgphotoOverlay"></div>
		<div id="photo_overlay" class="short">
			<h1>Contact SFTRU</h1>
			<div class="overlay_sub">Get in touch with your inner transit</div>
		</div>
		
		<!-- Nav -->
		<?php 
		echo file_get_contents("http://" . $_SERVER['HTTP_HOST'] . "/nav.php?class=short&page=" . basename(getcwd())); 
		?>
		
		<!-- Content -->
		<div id="content_wrapper_short" style="background-color:#f4f5f0;">
			
			<div id="content_wrapper_sub" style="background-color:#fff;">
				<div class="content_item" style="padding-top:50px;padding-bottom:50px;">
					
					<div class="col" style="margin-right: 120px;">
						<h2>Questions</h2>
						<p>Send all questions and comments to <a href="mailto:info@sftru.org">hello@sftransitriders.org</a></p>
						<p>San Francisco Transit Riders<br>P.O. Box 193341<br>San Francisco, CA 94119</p>
						<br>
						<h2>Media Inquiries</h2>
						<p>Direct all media inquiries to <a href="mailto:info@sftru.org">info@sftransitriders.org</a>, or call <a href="tel:1-415-323-6363">(415) 323-6363</a>.
					</div>
					
					<div class="col" style="margin: 0;">
						<h2>Connect</h2>
						<p>Want to follow SFTRU news, actions, and upcoming events? Connect with us on social media:
							<ul>
								<li><a href="http://facebook.com/SFTRU">Facebook SFTRU</a></li>
								<li><a href="http://twitter.com/sftru">Twitter @SFTRU</a></li>
								<li><a href="https://www.flickr.com/photos/sftru/">Flickr SFTRU</a></li>
								<li><a href="http://instagram.com/sftru/">Instagram SFTRU</a></li>
							</ul>
						</p>
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
