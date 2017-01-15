<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>
		<title>SFTRU - Get Involved</title>
		
		<?php 
		echo file_get_contents("http://" . $_SERVER['HTTP_HOST'] . "/header.php?ipad=" . (bool) strpos($_SERVER['HTTP_USER_AGENT'],'iPad')); 
		?>
		
		<script src="../jquery.min.js" type="text/javascript"></script>
		<script src="../date.js" type="text/javascript"></script>
		<script src="../GCalEvents.js" type="text/javascript"></script>
		
		<script>
		
			function submitEmail() {
				alert('ok!');
				document.forms[0].action = "http://sftru.nationbuilder.com/forms/signups";
				alert(document.forms[0].action);
				document.forms[0].submit();
			}
			
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
	
		<div id="bgphoto_short" style="background-image:url('../img/alldoorphoto.jpg');"></div>
		<div id="bgphotoOverlay"></div>
		<div id="photo_overlay" class="short">
				<h1>Get Involved</h1>
				<div class="overlay_sub">Help us create the future of public transit for everyone in San Francisco</div>
		</div>		
		
		<!-- Nav -->
		<?php 
		echo file_get_contents("http://" . $_SERVER['HTTP_HOST'] . "/nav.php?class=short&page=" . basename(getcwd())); 
		?>
		
		
		<div id="content_wrapper_short" style="background-color:#f4f5f0;">
		
		
			
			<div id="content_wrapper_sub" style="background-color:#fff;">
			
				<div class="content_item" style="padding-top:50px;padding-bottom:50px;">
				
					<div class="section topsection">
						<a href="../join/"><img src="../img/member.png" width=200 height=200 border=0 noborder></a>
						<h1>Become a Member</h1>
						Become a member and support our on-the-ground efforts to push Muni forward.
						<br/><br/>
						<a href="../join/"><div id="" class="but_default">Join / Renew</div></a>
					</div>
					<div class="section bottomsection">
						<a href="../volunteer/"><img src="../img/volunteer.png" width=200 height=200 border=0 noborder></a>
						<h1>Volunteer With Us</h1>
						Take to the trains! Be a part of our direct advocacy and volunteer today.
						<br/><br/>
						<a href="../volunteer/"><div id="" class="but_default">Volunteer</div></a>
					</div>
			
					
				</div>
			</div>
			
			<div id="content_wrapper_sub" style="background-color:#2c353c;background-image:url('../img/honeycomb_bg.png');background-repeat: repeat-x repeat-y;">
				<div class="content_item" style="padding-top:50px;padding-bottom:50px;">
				
					<div class="centerquote">
						<p>Sign up for our email list to keep up to date with transit news, SFTRU forums and events, and transit action alerts.</p>
						<p></p>
						<iframe src="http://sftru.nationbuilder.com/email" width=100% border=0 noborder style="border:0;" scrolling="no"></iframe>
						
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
						<?php // echo file_get_contents("http://sftru.nationbuilder.com/email"); ?>
					</div>
				
				</div>
			</div>
			
			<div id="content_wrapper_sub" style="background-color:#eee;">
				<div class="content_item" style="padding-top:50px;padding-bottom:50px;">
				
					<div class="col" style="margin-right: 120px;">
						<h2>Join our Transit Action Committee</h2>
						<p>Do you have an idea to make Muni better? Want to get involved with a campaign? Attend the monthly Transit Action Committee meeting! At these informal meetings, we plan our campaigns and forums and discuss ideas for improving Muni. Everyone is welcome, even if you're not a member.</p>
						<p><a href="../#upcomingEvents" id="nextTAC">Upcoming TAC Meetings &raquo;</a></p>
					</div>
					
					<div class="col" style="margin: 0;">
						<h2>Attend a Forum or Event</h2>
						<p>Want to learn more about SFTRU? Or perhaps you're fascinated by transit in San Francisco, whether the history or the future. Or maybe you'd enjoy having discussions with other similar transit riders about Muni? Check out one of our periodic forums and events.</p>
						<p><a href="../#upcomingEvents">Upcoming Forums and Events &raquo;</a></p>
					</div>
				
				</div>
			</div>
			
			<div id="content_wrapper_sub" style="background-color:#fff;">
				<div class="content_item" style="padding-top:50px;padding-bottom:50px;">
				
					<h1>Member Profiles</h1>
						<p>Being a member of SFTRU is more than supporting our work; you become part of a community of transit riders in San Francisco. Meet some of your fellow members:<br/>&nbsp;</p>
						<div class="member_profile">
							<div class="profile_photo" style="background-image:url('../img/Fellow_Melissa_Gordon.jpg');"></div>
							<div class="profile">
								<h2>Melissa Gordon</h2>
								<p>Melissa Danielle Gordon is a born-and-raised San Franciscan who appreciates a good bike ride and a blanket made of fog. If she's not riding her bike with a camera around her neck, she's on the bus with a camera in her hand. Go Giants!</p>
							</div>
						</div>
						<div class="member_profile">
							<div class="profile_photo" style="background-image:url('../img/Fellow_Robyn_Huey.jpg');"></div>
							<div class="profile">
								<h2>Robyn Huey</h2>
								<p>Robyn Huey is a native San Franciscan who has ridden Muni and BART all her life. In 2011, she added Amtrak to the bunch with the beginning of her undergraduate career at University of California, Davis, studying Landscape Architecture. Her pupils dilate at the sight of clever, well-thought-out design, and she enjoys expressing her passion for art. Philz Coffee and Philz specialty-made black tea are her beverages of choice followed by the potato as her #1 favorite food. When traveling in the City, her choice of bus lines include the 44, 49, 47, and 38.</p>
							</div>
						</div>
						<div class="member_profile">
							<div class="profile_photo" style="background-image:url('../img/Ben_Kaufman1.jpg');"></div>
							<div class="profile">
								<h2>Ben Kaufman</h2>
								<p>Ben Kaufman was born and raised in and around Boston, Massachusetts, and has lived in San Francisco since the summer of 2007. Since moving to San Francisco, Ben has worked as a small-business organizer in Bayview-Hunters Point and a field organizer for the David Chiu for Mayor campaign. Despite his love for Bayview small businesses and David Chiu, his true passion lies in public transportation organizing and advocacy. After taking Muni to work a handful of times over his first few days in the City, he was so shocked and frustrated by the snail's pace of the bus that he took up riding a bicycle to work but promised himself he would revert back to regularly riding public transit once Muni relinquished its title as "the slowest transit system in the nation." He is now proud to be actively involved in fighting for a more efficient, more reliable Muni network as a member of the San Francisco Transit Riders Union.</p>
							</div>
						</div>
						<p>&nbsp;</p>
						<p>San Franciscans have consistently supported transit, and they deserve a reliable, robust, and 21st-century transit system. SFTRU's past accomplishments and future action plan are together delivering that change. Please become a member to join our community and support our work.</p>
							
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
