<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>
		<title>2016 Transit Week</title>

		
		<?php 
		echo file_get_contents("http://" . $_SERVER['HTTP_HOST'] . "/header.php?ipad=" . (bool) strpos($_SERVER['HTTP_USER_AGENT'],'iPad')); 
		?>
         
		<meta property="og:title" content="Transit Week">
		<meta property="og:type" content="article">
		<meta property="og:image" content="http://sftransitriders.org/transitweek/og_transitweek.png">
		<meta property="og:url" content="http://sftransitriders.org/transitweek/">
		<meta property="og:description" content="Join us September 12-17 and add your voice to San Francisco Transit Riders! Lets make transit work for everyone.">

		<meta name="twitter:card" content="summary">
		<meta name="twitter:title" content="Transit Weeks">
		<meta name="twitter:description" content="Join the voice of transit riders">
		<meta name="twitter:image" content="http://sftransitriders.org/transitweek/og_transitweek.png?1">		

		<script src="../jquery.min.js" type="text/javascript"></script>
		<script src="../date.js" type="text/javascript"></script>
		<script src="../GCalEvents.js" type="text/javascript"></script>
		
		<script src="../index.js" type="text/javascript"></script>
		<script src="/js/iframeResizer.min.js" type="text/javascript"></script>
	    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCCaQiUJXFEU0rOgipWabWtEOy4THJXfSs&libraries=geometry"></script>


		<script src="map.js" type="text/javascript"></script>

		
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

		<style>

    		@media only screen and (max-device-width: 480px) {

		    	#sidebar {
					display: block !important;
	    			width: 90% !important;
	    			height: 94vh !important;
    				min-height: 520px !important;
	    		}	
			}

			@media screen and (-ms-high-contrast: active), (-ms-high-contrast: none) {

				.headcol_small_l, 
				.headcol_small_r {
					font-size: 3.8vw
				}

			}


			.events {
				list-style-type: none;
				margin:0px;
				padding: 0;
				width: 40%;
			}

			.events li:hover {
				background-color: #EBF6F9;
				color: #333333;
				border: solid 1px #AAD0E0;
			}

			.events li {
				border-bottom: solid 1px #DDD;
				margin: 0;
				padding: 12px;
			}

			.events li:last-child, .events .last {
				border-bottom: none;
			}

			.events .sign {
				float:left;
				width: 36px;
				height: 36px;
				border: solid 1px #CCC;
				margin: 12px;
				border-radius: 3px 3px 3px 3px;
				-moz-border-radius: 3px 3px 3px 3px;
				-webkit-border-radius: 3px 3px 3px 3px;
				color: #CCC;
				font-size: 1.6em;
				line-height: 1.4em;
				text-align:center;
			}

			.map {
				border: solid 1px #CCC;
				border-radius: 3px 3px 3px 3px;
				-moz-border-radius: 3px 3px 3px 3px;
				-webkit-border-radius: 3px 3px 3px 3px;
				padding:0;
				position:relative;
			}

			.yellow {
				color: #FFF100;
			}			

			#munimap {
	      		width: 60%;
	      		height:100%;
	      		background: black;
	      		position: absolute;
	      		top: 0;
	      		right: 0;
	      		bottom: 0;
      		}

			.committee {
				-webkit-column-count: 4; /* Chrome, Safari, Opera */
	 			-moz-column-count: 4; /* Firefox */
	 			column-count: 4;
				width: 70%;
			}

			.boarde {
				width: 30%;
			}

			.committee, .board {
				list-style: none;
				font-size: 0.8em;
				float:left;
			}

			.committee li, .board li {
				line-height: 1em;
				-webkit-column-break-inside: avoid;
          		page-break-inside: avoid;
               	break-inside: avoid;
               	margin-bottom: 0px;
               	padding-bottom: 12px;
			}

			.committee .title, .board .title {
				color: #777;
				font-size: 0.7em;
			}
			/*
			#bgphoto, #bgphotoOverlay, #photo_overlay {
				max-height: 580px;
				height: 400px;
			}
			*/
		</style>

		
	</head>
	<body style="margin: 0;" onScroll="scrollMed();">
	
		
		<div id="bgphoto" class="med" style="background-image:url(&#39;/img/blurPhoto2.png&#39;);"></div>
		<div id="bgphotoOverlay" class="med"></div>
		<div id="photo_overlay" class="high" style="width: 92%;margin-left:-46%;">
				<div class="head">
					<div class="headcol_small_l" style="width: 32%; font-size: 4.0vw; line-height: 4vw; color: #FFF; padding-top:140px; margin:0px;">
						Transit Week
						<br><span style="font-size: 2.3vw; color: #EDE8A9">More smiles <span style="color: #FFF100;">#onboardSF<span></span></span></span></div>
					<div class="headcol_mid" style="text-align:center; width: 226px"><img src="/img/logo_transit_week.png" width="210"></div>
					<div class="headcol_small_r" style="width: 34%; font-size: 4.0vw; line-height: 4vw; margin-top: 20px; color: #FFF;">
						September 12-17
						<br><span style="font-size: 2.3vw; color: #EDE8A9">Join the voice of <span style="color: #FFF100;">transit riders<span></span></span></span></div>
				</div>
				<div class="head_text" style="color: #FFF !important;line-height: 40px;position: relative;display: inline-block;">

				</div>
		</div>		
		
		<!-- Nav -->
		<?php 
		echo file_get_contents("http://" . $_SERVER['HTTP_HOST'] . "/nav.php?class=med&page=" . basename(getcwd())); 
		?>
		
		
		<div id="content_wrapper" class="med" style="background-color:#f4f5f0;">
					
			<div id="content_wrapper_sub" style="background-color:#fff;">
				
			<div class="content_item" style="padding-top:50px;">				
					<div id="sidebar" style="width:340px; height: 520px; margin-bottom: 20px;">
						<h2>Make your ride count!</h2>
						<span>Sign up here to get the inside scoop on the activities and events planned.</span>
						<iframe src="http://sftru.nationbuilder.com/2016_muni_challenge_pledge" width="100%" height="500px" ;="" border="0" noborder="" style="border:0;" scrolling="no"></iframe>
					</div>

					<h1>Transit Week</h1>
					<h3>September 12-17, 2016</h3>
					<h2>Get #OnBoardSF for a stronger, sustainable transit system.</h2>

					<p>We&rsquo;re celebrating San Francisco public transit and all those who ride transit.</p>
					<p>Join us September 12-17 and add your voice to San Francisco Transit Riders! Lets make transit work for everyone.</p>
					<p>Transit Week is a celebration of transit riders who make living and working in San Francisco better for everyone. By taking transit, you help improve the climate, the streets and the city.  More transit means:</p>

					<ul>
						<li>Lower carbon emissions and cleaner air</li>
						<li>Less traffic congestion and safer streets</li>
						<li>Vibrant neighborhoods and a livable city</li>
					</ul>
					<img src="people-on-muni.png" width="90%">
				</div>

			</div>

			<div id="content_wrapper_sub" style="background-color:#fff;">
				<div class="content_item" style="padding-top:50px;">
					<h1>Events &amp; Activities</h1>
					<p>We want to build a culture in this city that supports public transit, and we want to bring  "More Smiles #OnBoardSF."  Here is where you can find the celebration throughout the week of September 12-17.</p>
					<p> Click or tap the Muni routes below for more information:</p>
					<div class="map">
						<ul class="events">
							<li>
								<span class="sign" id="city_hall"><img src="city-hall.png"></span>
								Monday September 12<sup>th</sup> <br> City Hall: Press Conference &amp; Kickoff
							</li>
							<li>
								<span class="sign" id="38" style="color:#7B4CA1">38</span>
								Tuesday September 13<sup>th</sup><br> 38: Geary
							</li>
							<li>
								<span class="sign" id="22" style="color:#F5A623">22</span>
								Wednesday September 14<sup>th</sup><br> 22: Fillmore
							</li>
							<li>
								<span class="sign" id="KT" style="color:#4C91A0">KT</span>
								Thursday September 15<sup>th</sup><br> KT: Ingleside / Third Street
							</li>
							<li>
								<span class="sign" id="24" style="color:#4CA06E">24</span>
								Friday September 16<sup>th</sup><br> 24: Divisadero
							</li>
							<li>
								<span class="sign" id="14" style="color:#B76762">14</span>
								Saturday September 17<sup>th</sup><br> 14: Mission
							</li>
						</ul>
						<div id="munimap"></div>
					</div>
				</div>
			</div>

			<div id="content_wrapper_sub" style="background-color:#fff;">
				<div class="content_item" style="padding-top:50px;padding-bottom:50px;">
					<h1>Partners</h1>
					<div>
					<h3>Special thanks to our host committee who are making this week possible:</h3>
					<ul class="committee">
						<li>Alex Randolph<br><span class="title">Trustee, City College of San Francisco</span></li>
						<li>Amy Bacharach<br><span class="title">Trustee, City College of San Francisco</span></li>
						<li>Bouchra Simmons<br><span class="title">Trustee, City College of San Francisco</span></li>
						<li>Brigitte Davila<br><span class="title">Trustee, City College of San Francisco</span></li>
						<li>David Chiu<span class="title">State Assembly Member, California State Assembly</span></li>
						<li>Deborah Raphael<br><span class="title">Director of the Department of Environment</span></li>
						<li>Dr. Emily Murase<br><span class="title">Commissioner, San Francisco Unified School District</span></li>
						<li>Ed Reiskin<br><span class="title">Director of Transportation, SFMTA</span></li>
						<li>Gillian Gillette<br><span class="title">Director of Transportation Policy Office of Mayor Edwin M. Lee</span></li>
						<li>Guy Lease <br><span class="title">Special Trustee, City College of San Francisco </span></li>
						<li>Hydra Mendoza<br><span class="title">Commissioner, San Francisco Unified School District</span></li>					
						<li>Jill Wynns<br><span class="title">Commissioner, San Francisco Unified School District</span></li>
						<li>John Rizzo<br><span class="title">Tustree, City College of San Francisco </span></li>
						<li>John Rahaim<br><span class="title">Planning Director, City and County of San Francisco</span></li>
						<li>Mark Leno<br><span class="title">State Senator, California State Senate</span></li>
						<li>Matt Haney<br><span class="title">President, San Francisco Unified School District</span></li>
						<li>Myong Leigh<br><span class="title">Deputy Superintendent, San Francisco Unified School District</span></li>
						<li>Naomi Kelly<br><span class="title">City Administrator, San Francisco</span></li>
						<li>Nick Josefowicz<br><span class="title">Director, BART</span></li>
						<li>Phil Ting<br><span class="title">State Assembly Member, California State Assembly </span></li>
						<li>Rachel Norton<br><span class="title">Commissioner, San Francisco Unified School District</span></li>
						<li>Rafael Mandelman<br><span class="title">Trustee, City College of San Francisco</span></li>
						<li>Sandra Lee Fewer<br><span class="title">Commissioner, San Francisco Unified School District</span></li>
						<li>Shamann Walton<br><span class="title">Vice President, San Francisco Unified School District</span></li>
						<li>Steve Ngo<br><span class="title">Trustee, City College of San Francisco </span></li>
						<li>Susan Lamb<br><span class="title">Interim Chancellor, City College of San Francisco </span></li>
						<li>Thea Selby<br><span class="title">Trustee, City College of San Francisco </span></li>
						<li>Tilly Chang<br><span class="title">Executive Director, SFCTA </span></li>
						<li>Tom Radulovich<br><span class="title">President, Board of Directors, BART</span></li>
					</ul>
					<ul class="board">
						<li class="title">Mayor &amp; Board of Supervisors:</li>
						<li>Eric Mar <span class="title">District 1</span></li>
						<li>Mark Farrell <span class="title">District 2</span></li>
						<li>Aaron Peskin <span class="title">District 3</span></li>
						<li>Katy Tang <span class="title">District 4</span></li>
						<li>London Breed <span class="title">District 5</span></li>
						<li>Jane Kim <span class="title">District 6</span></li>
						<li>Norman Yee <span class="title">District 7</span></li>
						<li>Scott Wiener <span class="title">District 8</span></li>
						<li>David Campos <span class="title">District 9</span></li>
						<li>Malia Cohen <span class="title">District 10</span></li>
						<li>John Avalos <span class="title">District 11</span></li>
						<li>Ed Lee <span class="title">Mayor</span></li>
					</ul>
					</div>


					<h3 style="clear:left">Transit Week is sponsored by:</h3>
					<p>
						<a href="https://www.accenture.com/us-en"><img src="accenture.png" width="180"></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<a href="https://www.sfmta.com/"><img src="sfmta.png" width="180"></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<a href="http://sftransitriders.org/transitweek/"><img src="giants.png" width="150"></a>
						<br>
						<a href="http://www.arup.com/"><img src="arup.png" width="120"></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<a href="http://www.aecom.com//"><img src="aecom.png" width="130" height="107"></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<a href="https://www.google.com/"><img src="google.png" width="130"></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<a href="http://sfcta.org/"><img src="sfcta.png" width="90"></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<a href="https://www.ucsf.edu/"><img src="ucsf.png" width="120"></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<a href="http://www.350bayarea.org/350_san_francisco/"><img src="350SF.png" width="120"></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					</p>

					<p>We want to partner with organizations across the Bay Area to support our city officials in riding public transportation! <br>If your organization or corporation would like to act as a partner or sponsor, or for more information, please contact us at <a href="mailto:info@sftru.org">info@sftru.org</a>.</p>

				</div>
			</div>

		
			
			<div id="content_wrapper_sub" style="background-color:#2c353c;background-image:url('../img/honeycomb_bg.png');background-repeat: repeat-x repeat-y;">
				<div class="content_item" style="padding-top:50px;padding-bottom:50px;">
				
					<div class="centerquote">
						<p>Sign up for our email list to keep up to date with transit news, SFTRU forums and events, and transit action alerts.</p>
						<p></p>
						<iframe src="http://sftru.nationbuilder.com/email" width=100% border=0 noborder style="border:0;" scrolling="no"></iframe>
						
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
