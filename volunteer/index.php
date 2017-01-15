<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>
		<title>SFTRU - Volunteer</title>
		
		<?php 
		echo file_get_contents("http://" . $_SERVER['HTTP_HOST'] . "/header.php?ipad=" . (bool) strpos($_SERVER['HTTP_USER_AGENT'],'iPad')); 
		?>
		
		<script src="../jquery.min.js" type="text/javascript"></script>
		<script src="../date.js" type="text/javascript"></script>
		<script src="../GCalEvents.js" type="text/javascript"></script>
		
		<script>
			function resizeIframe(obj) {
				obj.style.height = obj.contentWindow.document.body.scrollHeight + 'px';
			}
			
			
			//MDN PolyFil for IE8 (This is not needed if you use the jQuery version)
			if (!Array.prototype.forEach){
				Array.prototype.forEach = function(fun /*, thisArg */){
				"use strict";
				if (this === void 0 || this === null || typeof fun !== "function") throw new TypeError();
				
				var
				t = Object(this),
				len = t.length >>> 0,
				thisArg = arguments.length >= 2 ? arguments[1] : void 0;

				for (var i = 0; i < len; i++)
				if (i in t)
					fun.call(thisArg, t[i], i, t);
				};
			}
		</script>
		
	</head>
	<body style="margin: 0;" onScroll="blurPhoto();">
	
		<div id="bgphoto_short" style="background-image:url('../img/street_volunteer.jpg');background-position:top center !important;"></div>
		<div id="bgphotoOverlay"></div>
		<div id="photo_overlay" class="short">
				<h1>Volunteer with SFTRU</h1>
				<div class="overlay_sub">Take to the trains! Be a part of our direct advocacy and volunteer with us.</div>
		</div>		
		
		<!-- Nav -->
		<?php 
		echo file_get_contents("http://" . $_SERVER['HTTP_HOST'] . "/nav.php?class=short&page=" . basename(getcwd())); 
		?>
		
		
		<div id="content_wrapper_short" style="background-color:#fff;">
		
		
			
			<div id="content_wrapper_sub" style="background-color:#fff;">
				<div class="content_item" style="padding-top:0px;padding-bottom:50px;">
				
				<div class="member_profile">
						<p><h3>SFTRU has a number of volunteer-related opportunities throughout the year. We'd love for you to be a part of our direct action. Learn more about the ways you can help make a difference for transit in San Francisco.</h3></p>
						<p>&nbsp;</p>
				</div>
						<br/>
						
					<iframe src="http://sftru.nationbuilder.com/volunteer_email1" width=100% border=0 noborder style="border:0;" scrolling="no"></iframe>
					
					<script type="text/javascript" src="../iframeResizer.min.js"></script> 
						<script type="text/javascript">
				
							iFrameResize({
								log                     : true,                  // Enable console logging
								enablePublicMethods     : true,                  // Enable methods within iframe hosted page
								resizedCallback         : function(messageData){ // Callback fn when resize is received
									$('p#callback').html(
										'<b>Frame ID:</b> '    + messageData.iframe.id +
										' <b>Height:</b> '     + messageData.height +
										' <b>Width:</b> '      + messageData.width + 
										' <b>Event type:</b> ' + messageData.type
									);
								},
								messageCallback         : function(messageData){ // Callback fn when message is received
									$('p#callback').html(
										'<b>Frame ID:</b> '    + messageData.iframe.id +
										' <b>Message:</b> '    + messageData.message
									);
									alert(messageData.message);
								},
								closedCallback         : function(id){ // Callback fn when iFrame is closed
									$('p#callback').html(
										'<b>IFrame (</b>'    + id +
										'<b>) removed from page.</b>'
									);
								}
							});
				
				
						</script>
						
				</div>
				
			</div>
			
			<div id="content_wrapper_sub" style="background-color:#efefef;">
				<div class="content_item" style="padding-top:50px;padding-bottom:50px;">
			
					<div class="col" style="margin-right: 120px;background-image:url('../img/tac.jpg');height:300px;width:420px;">
					</div>
					
					<div class="col" style="margin: 0;">
						<h2>Join our Transit Action Committee</h2>
						<p>Do you have an idea to make Muni better? Want to get involved with a campaign? Attend the monthly Transit Action Committee meeting! At these informal meetings, we plan our campaigns and forums and discuss ideas for improving Muni. Everyone is welcome, even if you're not a member.</p>
						<p><a href="./#upcomingEvents" id="nextTAC">Upcoming TAC Meetings &raquo;</a></p>
					</div>
				</div>
			</div>
					
					
			<div id="content_wrapper_sub" style="background-color:#fff;">
				<div class="content_item" style="padding-top:50px;padding-bottom:50px;">
						
						
					<div class="col" style="margin-right: 120px;background-image:url('../img/event.jpg');height:300px;width:420px;">
					</div>
					
					<div class="col" style="margin: 0;">
						<h2>Attend a Forum or Event</h2>
						<p>Want to learn more about SFTRU? Or perhaps you're fascinated by transit in San Francisco, whether the history or the future. Or maybe you'd enjoy having discussions with other similar transit riders about Muni? Check out one of our periodic forums and events.</p>
						<p><a href="../#upcomingEvents">Upcoming Forums and Events &raquo;</a></p>
					</div>
					
				</div>
			</div>
					
					
			<div id="content_wrapper_sub" style="background-color:#efefef;">
				<div class="content_item" style="padding-top:50px;padding-bottom:50px;">
						
						
					<div class="col" style="margin-right: 120px;background-image:url('../img/cityhall.jpg');height:300px;width:420px;">
					</div>
					
					<div class="col" style="margin: 0;">
						<h2>Speak Up for Transit at City Hall</h2>
						<p>Want to help represent the voices of transit riders throughout San Francisco? Come out and speak up at SFMTA board meetings, transit hearings, budget discussions, and more. Every voice that shows up represents hundreds of other transit riders in the city.</p>
						<p><a href="http://sftru.nationbuilder.com/volunteer">Sign Up to Volunteer for City Hall events &raquo;</a></p>
					</div>
					
				</div>
			</div>
					
					
			<div id="content_wrapper_sub" style="background-color:#fff;">
				<div class="content_item" style="padding-top:50px;padding-bottom:50px;">
						
						
					<div class="col" style="margin-right: 120px;background-image:url('../img/alldoorphoto.jpg');height:300px;width:420px;">
					</div>
					
					<div class="col" style="margin: 0;">
						<h2>Take to the Streets!</h2>
						<p>We're always looking for people who are interested and eager to talk to transit riders directly about issues that affect riders. If you're interested in helping out with our on the ground efforts, let us know!</p>
						<p><a href="http://sftru.nationbuilder.com/volunteer">Sign Up to our Volunteer List &raquo;</a></p>
					</div>
					
				</div>
			</div>
			
		
			<!-- Footer -->
		<?php 
		echo file_get_contents("http://" . $_SERVER['HTTP_HOST'] . "/footer.php"); 
		?>


		</div>

		
	</body>
	<script type="text/javascript">
		var currentdate = new Date();
		var enddate = new Date();
		// enddate.setHours(enddate.getHours()+1488); // 2 Months
		enddate.setHours(enddate.getHours()+2976); // 4 Months
		
		var dateString = currentdate.toISOString(); //("h:mm tt : dddd MMMM d");
		var endDateString = enddate.toISOString(); //("h:mm tt : dddd MMMM d");
		
		var calendar_json_url = "https://www.googleapis.com/calendar/v3/calendars/n8ir7ib1r7f6st2pi82c72ugp8%40group.calendar.google.com/events?key=AIzaSyCM1uVx8co2ScVW7LbMMh_ZswUa_aMrs7k&timeMin="+dateString+"&orderBy=startTime&singleEvents=true&maxResults=5&timeMax="+endDateString
		$(document).ready(GCalEvents(calendar_json_url));
	</script>
</html>
