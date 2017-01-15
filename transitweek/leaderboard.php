<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>
		<title>22-Day Muni Challenge</title>
		
		<?php 
		echo file_get_contents("http://" . $_SERVER['HTTP_HOST'] . "/header.php?ipad=" . (bool) strpos($_SERVER['HTTP_USER_AGENT'],'iPad')); 
		?>
         
		<meta property="og:title" content="22-Day Muni Challenge" />
		<meta property="og:type" content="article" />
		<meta property="og:image" content="http://sftransitriders.org/img/22day_orange.png" />
		<meta property="og:url" content="http://sftransitriders.org/munichallenge/" />
		<meta property="og:description" content="We're inviting the Mayor, the Board of Supervisors, and other city officials to ride Muni for 22 days in June. Tweet #OnBoardSF to participate!" />
		    
		<meta name="twitter:card" content="summary" />
		<meta name="twitter:title" content="22-Day Muni Challenge" />
		<meta name="twitter:description" content="We're inviting the Mayor, the Board of Supervisors, and other city officials to ride Muni for 22 days in June. Tweet #OnBoardSF to participate!" />
		<meta name="twitter:image" content="http://sftransitriders.org/img/22day_orange.png" />
		
		<script src="../jquery.min.js" type="text/javascript"></script>
		<script src="../date.js" type="text/javascript"></script>
		<script src="../GCalEvents.js" type="text/javascript"></script>
		
		<script src="../index.js" type="text/javascript"></script>
		
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
	<body style="margin: 0;" onScroll="scrollTall();">
	
		<div id="bgphoto" style="background-image:url('/img/blurPhoto2.png');"></div>
		<div id="bgphotoOverlay"></div>
		<div id="photo_overlay" class="high">
				<div class="head">
					<div class="headcol_small_l" style="font-size: 45px;color: #FFF;">Introducing the</div>
					<div class="headcol_mid" style="text-align:center;"><img src="/img/22day_white.png" width=162 height=211></div>
					<div class="headcol_small_r" style="font-size: 45px;color: #FFF;">Muni Challenge</div>
				</div>
				<div class="head_text" style="color: #FFF !important;line-height: 40px;position: relative;display: inline-block;">
					We're inviting the <span class="bold">Mayor</span>, the <span class="bold">Board of Supervisors</span>, and other <span class="bold">city officials</span> to ride Muni for 22 days in June.
				</div>
		</div>		
		
		<!-- Nav -->
		<?php 
		echo file_get_contents("http://" . $_SERVER['HTTP_HOST'] . "/nav.php?class=tall&page=" . basename(getcwd())); 
		?>
		
		
		<div id="content_wrapper" class="tall" style="background-color:#f4f5f0;">
			
			<iframe width=100% height=700 border=0 noborder style="border:0;box-shadow:0;" src="https://muni-challenge.herokuapp.com"></iframe>
		
			<div id="content_wrapper_sub" style="background-color:#fff;">
				<div class="content_item" style="padding-top:50px;padding-bottom:50px;">
				
					<h1>About the Challenge</h1>
						<p>Participating officials will tweet while riding, walking to, or waiting for transit every day for those 22 days, posting it to Twitter with an optional photo using the hashtag #OnBoardSF. If they don't take transit for one of those days, they will tweet their reason why with the same hashtag.</p>

<p>The challenge runs from Monday, June 1st to Monday, June 22nd, one day for each of the years since 1993 when San Francisco voters passed Proposition AA: "City officials and full-time employees [shall] travel to and from work on public transit at least twice a week." 22 years later, this policy agreement has never been acted on, and now is a chance to make up for lost time!</p>

<p>When they regularly ride public transit, city officials better understand the rider's daily experience and prioritize funding and planning a more reliable, robust, and visionary transit system to support it. This is an opportunity for our city officials to promote their own commitment to public transportation, showcasing that they care about the future of Muni.</p>

						
				</div>
			</div>
		
			<div id="content_wrapper_sub" style="background-color:#FCF9F3;text-align:center;">
				<div class="content_item" style="padding-top:50px;padding-bottom:50px;">
					<a href="http://sftru.nationbuilder.com/munichallenge" style="background-color:#E86E11;color:#fff;border-radius: 5px;padding: 10px 50px 10px 50px;">Take the Pledge to Join In!</a>
					<div class="head_text" style="font-size: 27px;color: #000000;line-height: 40px;position: relative;display: inline-block;margin-top: 30px;">
						<i>and then</i>
					</div>
					<div class="head_yellow">
						Tweet #OnBoardSF to Participate
					</div>
					<div class="head_text" style="font-size: 27px;color: #000000;line-height: 40px;position: relative;display: inline-block;margin-top: 30px;">
						Look back here for updates and in June when we unveil the 22-Day Muni Challenge Leaderboard.
					</div>
						
				</div>
			</div>
			
			<div id="content_wrapper_sub" style="background-color:#fff;">
				<div class="content_item" style="padding-top:50px;padding-bottom:50px;">
					<h1>Sponsors</h1>
					<p><a href="http://swyftapp.com"><img src="swyft.png" width=209 height=114></a></p>
					<hr style="margin-top:80px;margin-bottom:100px;">
					<h1>Community Partners</h1>
					<p><a href="http://walksf.org"><img src="walk-sf-square.gif" width=143 height=143></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="http://sfbike.org"><img src="sfbc.jpg" width=199 height=116></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="http://www.greencaltrain.com/friends-of-caltrain/"><img src="foc.jpg" width=244 height=104></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="http://www.livablecity.org"><img src="livablecity.png" width=190 height=112></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="http://yptransportation.org/yptsfbay/"><img src="yptsfbaylogo.png" width=151 height=125></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="http://www.sfcta.org"><img src="cta.png" width=141 height=150></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="http://www.ybca.org"><img src="ybca.gif" width=120 height=120></a></p>
					
					<p>We want to partner with organizations across the Bay Area to support our city officials in riding public transportation! If your organization or corporation would like to act as a partner or sponsor, or for more information, please contact us at <a href="mailto:info@sftru.org">info@sftru.org</a>.</p>

						
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
