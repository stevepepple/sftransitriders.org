<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>
		<title>SFTRU - San Francisco Transit Riders</title>
		
		<?php 
		echo file_get_contents("http://" . $_SERVER['HTTP_HOST'] . "/header.php?ipad=" . (bool) strpos($_SERVER['HTTP_USER_AGENT'],'iPad')); 
		?>
		<meta name="google-site-verification" content="AKdSILM5XTCzv2u-5zCZS6moH-Gw4Ca_ZplAqmZVfC0" />
		<script src="jquery.min.js" type="text/javascript"></script>
		<script src="date.js" type="text/javascript"></script>
		<script src="GCalEvents.js" type="text/javascript"></script>
		
		<script src="index.js" type="text/javascript"></script>

	</head>
	<body style="margin: 0;">
	
		<div id="bgphoto" style="background-image:url('img/blurPhoto1.png');"></div>
		<div id="bgphoto2" style="background-image:url('img/blurPhoto2.png');"></div>
		<div id="bgphotoOverlay"></div>
		<div id="logowrap">
			<div id="logo_s"></div>
			<div id="logo"></div>
		</div>
		<div id="photo_overlay">
				<h1>Make Transit Awesome</h1>
				<div class="overlay_sub">SF Transit Riders is a rider-based grassroots advocate for world-class transit in San Francisco</div>
		</div>
		
		<!-- Nav -->
		<?php 
		echo file_get_contents("http://" . $_SERVER['HTTP_HOST'] . "/nav.php?class=&page="); 
		?>
		
		
		<div id="content_wrapper" style="background-color:#FCF9F3;z-index:999;">
		
			
			<!-- https://www.googleapis.com/calendar/v3/calendars/n8ir7ib1r7f6st2pi82c72ugp8%40group.calendar.google.com/events?key=AIzaSyCM1uVx8co2ScVW7LbMMh_ZswUa_aMrs7k&timeMin=2015-01-17T02:08:00-06:00&orderBy=startTime&singleEvents=true -->
			
			<div id="content_wrapper_sub" style="background-color:#fff;">
				<div class="content_item" style="padding-top:50px;padding-bottom:50px;">
					<h1>Get Involved</h1>
					<br><br>
					
					<div class="col" style="margin-right: 120px;">
						<h2>Join our Transit Action Committee</h2>
						<p>Do you have an idea to make Muni better? Want to get involved with a campaign? Attend the monthly Transit Action Committee meeting! At these informal meetings, we plan our campaigns and forums and discuss ideas for improving Muni. Everyone is welcome, even if you're not a member.</p>
						<p><a href="" id="nextTAC">Upcoming TAC Meetings &raquo;</a></p>
					</div>
					
					<div class="col" style="margin: 0;">
						<h2>Attend a Forum or Event</h2>
						<p>Want to learn more about SFTRU? Or perhaps you're fascinated by transit in San Francisco, whether the history or the future. Or maybe you'd enjoy having discussions with other similar transit riders about Muni? Check out one of our periodic forums and events.</p>
						<p><a href="#upcomingEvents">Upcoming Forums and Events &raquo;</a></p>
					</div>
					
					<div id="manyways"><h3>There are many ways to get involved.<a name="upcomingEvents"> </a><a href="/involved/">Learn More</a> about opportunities with SFTRU.</h3></div>
				</div>
			</div>

			<div id="content_wrapper_sub" style="background-color:#f2f2f2;">
				<div class="content_item" style="padding-top:50px;padding-bottom:50px;">
										<h1 style="margin-bottom:50px;">Upcoming Events</h1>
					<div id="gcal-events"><h3><i>No Upcoming Events</i></h3></div>
					<div id="fullcal"><h3><a href="https://www.google.com/calendar/embed?src=n8ir7ib1r7f6st2pi82c72ugp8%40group.calendar.google.com&ctz=America/Los_Angeles&mode=AGENDA">See Full Events Calendar &raquo;</a></h3>
					</div>
				</div>
			</div>
			
			
			
			<div id="content_wrapper_sub" style="background-color:#2c353c;background-image:url('img/honeycomb_bg.png');background-repeat: repeat-x repeat-y;">
				<div class="content_item" style="padding-top:50px;padding-bottom:50px;">
					<div class="centerquote">
						<p>Building on our past <a href="">accomplishments and victories</a>, we have an <a href="">aggressive action plan</a> for 2016.</p>

						<p>We hope to have your knowledge, time, and<br>experience to help implement it.</p>
						
						<p><a href="/work/" class="orange">LEARN MORE &raquo;</a></p>
					</div>
				</div>
			</div>
			
			<div id="content_wrapper_sub" style="background-color:#f2f2f2;">
				<div class="content_item" style="padding-top:50px;padding-bottom:50px;">
					
					<h1 style="margin-bottom:50px;">Blog</h1>
					<script async src="/js/medium.js"></script>
			
					<div style="vertical-align: middle;overflow-y: hidden;overflow-x: scroll;white-space:nowrap;height:470px;">
						
					<?php
						
						$json = file_get_contents( "http://sftransitriders.org/medium.php" );
						$blog = json_decode( $json, true );
						$maxcount = 5;
						$count = 0;
						
						foreach($blog["payload"]["posts"] as &$post) {
							$count++;
							
							if($count > $maxcount) {
								break;
							}
							
							echo "<a class='m-story' data-collapsed='true' href='https://medium.com/@SFTRU/" . $post["uniqueSlug"] . "'>" . $post["title"] . "</a>";
						}
								
					?>
						<a class='m-profile' data-collapsed='true' href='https://medium.com/@SFTRU/'>SFTRU</a>
					</div>
				</div>
			</div>


			<div id="content_wrapper_sub" style="background-color:#fff;">
				<div class="content_item" style="padding-top:50px;padding-bottom:50px;">
										<h1 style="margin-bottom:50px;">News</h1>
					<div id="twitterfeed">
						<div class='tweet'><div class='tweetimg'></div><div class='tweetxt'></div></div>
						<div class='tweet'><div class='tweetimg'></div><div class='tweetxt'></div></div>
						<div class='tweet'><div class='tweetimg'></div><div class='tweetxt'></div></div>
						<div class='tweet'><div class='tweetimg'></div><div class='tweetxt'></div></div>
						<div class='tweet'><div class='tweetimg'></div><div class='tweetxt'></div></div>
						<div class='tweet'><div class='tweetimg'></div><div class='tweetxt'></div></div>
						<div class='tweet'><div class='tweetimg'></div><div class='tweetxt'></div></div>
						<div class='tweet'><div class='tweetimg'></div><div class='tweetxt'></div></div>
						<div class='tweet'><div class='tweetimg'></div><div class='tweetxt'></div></div>
						<div class='tweet'><div class='tweetimg'></div><div class='tweetxt'></div></div>
					</div>
					<script src="twitter.js" type="text/javascript"></script>
				</div>
			</div>
			
			
		<!-- Footer -->
		<?php 
		echo file_get_contents("http://" . $_SERVER['HTTP_HOST'] . "/footer.php?dir=1"); 
		?>
			
			
		</div>

		
	</body>
	<script type="text/javascript">
		window.onscroll = blurPhoto;
		
		var currentdate = new Date();
		var enddate = new Date();
		// enddate.setHours(enddate.getHours()+1488); // 2 Months
		enddate.setHours(enddate.getHours()+2976); // 4 Months
		
		var dateString = currentdate.toISOString(); //("h:mm tt : dddd MMMM d");
		var endDateString = enddate.toISOString(); //("h:mm tt : dddd MMMM d");
		
		var calendar_json_url = "https://www.googleapis.com/calendar/v3/calendars/n8ir7ib1r7f6st2pi82c72ugp8%40group.calendar.google.com/events?key=AIzaSyCM1uVx8co2ScVW7LbMMh_ZswUa_aMrs7k&timeMin="+dateString+"&orderBy=startTime&singleEvents=true&maxResults=5&timeMax="+endDateString
		$(document).ready(GCalEvents(calendar_json_url));
	</script>
	</script>
</html>
