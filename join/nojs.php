<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>
		<title>SFTRU - Join</title>
		
		
		<?php 
		echo file_get_contents("http://" . $_SERVER['HTTP_HOST'] . "/header.php?ipad=" . (bool) strpos($_SERVER['HTTP_USER_AGENT'],'iPad')); 
		?>
				
	</head>
	<body style="margin: 0;" onScroll="blurPhoto();">	
	
		<div id="bgphoto_short" style="background-image:url('../img/onboardsf.jpg');"></div>
		<div id="bgphotoOverlay"></div>
		<div id="photo_overlay" class="short">
				<h1> </h1>
				<div class="overlay_sub"> </div>
		</div>		
		
		<!-- Nav -->
		<?php 
		echo file_get_contents("http://" . $_SERVER['HTTP_HOST'] . "/nav.php?class=short&page=" . basename(getcwd())); 
		?>
		
		
		<div id="content_wrapper_short" style="background-color:#fff;">
			
			
			<div id="content_wrapper_sub" style="background-color:#fff;">
				<div class="content_item" style="padding-top:0px;padding-bottom:50px;">

					<h1>Donations &amp; Membership</h1>
					
						<p>The SF Transit Riders are working to create excellent public transit that attracts a growing number of passengers for a more livable city. <i>We rely on people like you who love San Francisco.</i> Thank you.</p>
						
						<p><b>Note: In order to make a donation toward SFTRU Membership, you must have Javascript enabled. Please enable Javascript and refresh this page.</b></p>
						<p>If, instead, you would like to make a one-time donation, you may continue without Javascript.</b></p>
						<br/>
						
						<a href="http://sftru.nationbuilder.com/donate/" class="but_default">Make a One-Time Donation &raquo;</a>

				</div>
			</div>
			
			
		
			<!-- Footer -->
		<?php 
		echo file_get_contents("http://" . $_SERVER['HTTP_HOST'] . "/footer.php"); 
		?>

		</div>

		
	</body>
</html>
