<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>
		<title>SFTRU - Our Work</title>
		
		<?php 
		echo file_get_contents("http://" . $_SERVER['HTTP_HOST'] . "/header.php?ipad=" . (bool) strpos($_SERVER['HTTP_USER_AGENT'],'iPad')); 
		?>

	</head>
	<body style="margin: 0;" onScroll="blurPhoto();">
	
		<div id="bgphoto_short" style="background-image:url('../img/award.jpg');"></div>
		<div id="bgphotoOverlay"></div>
		<div id="photo_overlay" class="short">
			<h1>Our Work</h1>
			<div class="overlay_sub">Helping to build the future of public transit in San Francisco</div>
		</div>
		
		<!-- Nav -->
		<?php 
		echo file_get_contents("http://" . $_SERVER['HTTP_HOST'] . "/nav.php?class=short&page=" . basename(getcwd())); 
		?>
		
		<!-- Content -->
		<div id="content_wrapper_short" style="background-color:#f4f5f0;">
			
			<div id="content_wrapper_sub" style="background-color:#fff;">
				<div class="content_item" style="padding-top:30px;padding-bottom:50px;">
					<div class="centeredcols">
						<div class="threecol" onClick="window.location.hash='geary';">
							<div class="threecol_photo circle" style="background-image:url('../img/geary_small.jpg');"></div>
							<h2>Geary Rapid Transit</h2>
							<p>Geary Boulevard is in great need of better transit service, from speed to reliability to better capacity. We're working to advance a vision for rapid transit along Geary, leveraging rider feedback to push the SFCTA to develop a plan forward.</p>
							
						</div>
						
						<div class="threecol" onClick="window.location.hash='vanness';">
							<div class="threecol_photo circle" style="background-image:url('../img/VN_BRT.png');"></div>
							<h2>Van Ness Rapid Transit</h2>
							<p>The Van Ness BRT is a bus-focused rapid transit line running 2 miles from Mission to Lombard along Van Ness Avenue. We've been advocating for years on this much-needed project, and continue to work with the SFMTA to make smart, rider-based decisions.</p>
						</div>
						
						<div class="threecol" onClick="window.location.hash='munichallenge';">
							<div class="threecol_photo circle" style="background-image:url('../img/munichallenge_small.png');"></div>
							<h2>22-Day Challenge</h2>
							<p>We invited the Mayor, the Board of Supervisors, and other city officials to ride Muni for 22 days in June, 2015 to better understand the rider's daily experience and prioritize funding and planning a more reliable, robust, and visionary transit system.</p>
							
						</div>
						
						<div class="threecol" onClick="window.location.hash='tep';">
							<div class="threecol_photo circle" style="background-image:url('../img/tep_small.jpg');"></div>
							<h2>Transit Effectiveness</h2>
							<p>The SFMTA spent years gathering data and developing a plan to address Muni's most critical needs throughout the city. SFTRU continues to advocate for the proposed efficiency improvements, hosting forums for riders, and attending community outreach.</p>
						</div>
						
						<div class="threecol" onClick="window.location.hash='ballot';">
							<div class="threecol_photo circle" style="background-image:url('../img/cityhall.jpg');"></div>
							<h2>Funding for Transit</h2>
							<p>In the November 2014 election, education and outreach by SF Transit Riders helped to successfully secure major funding for Muni with Propositions A and B and squarely defeat the anti-transit, pro-parking Proposition L.
</p>
						</div>
						
						<div class="threecol" onClick="window.location.hash='alldoor';">
							<div class="threecol_photo circle" style="background-image:url('../img/alldoor_small.jpg');"></div>
							<h2>All-Door Boarding</h2>
							<p>SFTRU members proposed an all-door boarding pilot program to SFMTA in fall 2011. The agency put the policy change before the MTA Board which, after testimony by SFTRU members, ultimately adopted the proposal.</p>
						</div>
						
						<div class="threecol" onClick="window.location.hash='forums';">
							<div class="threecol_photo circle" style="background-image:url('../img/forum.jpg');"></div>
							<h2>Transit Forums</h2>
							<p>We regularly host forums, partnering with organizations to bring together panels of experts, officials, and neighborhood leaders to address provocative issues in transit, foster dialogue, and collectively generate new ideas.</p>
						</div>
						
					</div>
					
				</div>
			</div>
			
			<!-- GEARY BRT -->
			<a name="geary"> </a>
			<div id="content_wrapper_sub" style="background-color:#eee;">
				<div class="content_item" style="padding-top:50px;padding-bottom:50px;">
					<h1>Geary Bus Rapid Transit (BRT)</h1>
					<br>
					<div class="leftimage"><img src="../img/geary_flyer.png"></div>
					<div class="righttext">
					The Geary BRT will be a bus rapid transit line running from the Outer Richmond to Downtown. Geary BRT is still in a planning phase and there are various proposals on the table, but the general idea is a dedicated transit lane, ideally center running most if not all the way, low floor buses, transit signal priority at stop lights, and bus stop consolidation. 

<p>Geary is one of the main East - West arteries in the city, and an extremely important travel corridor for transit from the more residential Richmond district to downtown, and passing through the Fillmore and Van Ness.  
SF Transit Riders has been a strong advocate for a complete center running BRT including filling in the Fillmore underpass and reengineering the Masonic intersection - all with the purpose of making a transition to light rail in the future an easy process.</p>

<p>We are disappointed in the current plans for Geary BRT and the continued delays, and we encourage the SFCTA and the MTA to think long term and adopt the most efficient plans.</p> 

<p>We continue to advocate for a rapid transit corridor on Geary with a future hope of a light rail or subway / LRV hybrid.</p>

<p>Work with us on getting your voice heard and not allowing watered down plans instead of effective transit policy.</p>
					</div>
					
					<div class="takeaction">
						<h4>Support Geary Rapid Transit</h4>
						<div class="takeactionthreecol">
							<a href="../volunteer/"><img src="../img/volunteer.png" class="workvolunteerimg" border=0 noborder></a>
							<h3>Volunteer on Campaign</h3>
							<p>Help be a part of the Geary Rapid Transit campaign.</p>
							<p><a href="../volunteer/"><div id="" class="but_default">Volunteer</div></a>
						</div>
						<div class="takeactionthreecol">
							<a href="../join/?campaign=geary"><img src="../img/member.png" class="workvolunteerimg" border=0 noborder></a>
							<h3>Become a Member</h3>
							<p>Support this campaign through your membership.</p>
							<p><a href="../join/?campaign=geary"><div id="" class="but_default">Join / Donate</div></a>
						</div>
						<div class="takeactionthreecol">
							<a href="../volunteer/"><img src="../img/email.png" class="workvolunteerimg" border=0 noborder></a>
							<h3>Keep Informed</h3>
							<p>Be notified of updates &amp; actions on this campaign.</p>
							<p><a href="../volunteer/"><div id="" class="but_default">Sign Up</div></a>
						</div>
					</div>
					
				</div>
			</div>
			
			<!-- VAN NESS BRT -->
			<a name="vanness"> </a>
			<div id="content_wrapper_sub" style="background-color:#fff;">
				<div class="content_item" style="padding-top:50px;padding-bottom:50px;">
					<h1>Van Ness Bus Rapid Transit (BRT)</h1>
					<br>
					<div class="leftimage"><img src="../img/VN_BRT.png"></div>
					<div class="righttext">
					The Van Ness BRT is a bus-focused rapid transit line running 2 miles from Mission Street to Lombard Street along Van Ness Avenue. The proposal calls for converting two mixed traffic lanes to be converted to transit-only separated lanes for buses. The chosen design includes 2 center lanes with right-side boarding, traffic signal prioritization for transit, and a consolidated set of stops maximizing transfer opportunities to other lines.
					<p>As part of the Van Ness BRT process, SFTRU has worked hard to keep pushing the MTA:</p>
					<ul>
						<li>Adopted a rider-selected design for Van Ness BRT, including buses that run in the center lanes of the street for more reliable and faster service.</li>
						<li>When Muni was considering moving the bus to the slower curb-side lanes, we met with MTA and successfully advocated for keeping the bus in the faster, center lanes.</li>
						<li>Held a forum on Van Ness BRT so that transit riders could speak directly with agency officials about the project.</li>
					</ul>
					</div>
					
					
					
					<div class="takeaction">
						<h4>Support Van Ness Rapid Transit</h4>
						<div class="takeactionthreecol">
							<a href="../volunteer/"><img src="../img/volunteer.png" class="workvolunteerimg" border=0 noborder></a>
							<h3>Volunteer on Campaign</h3>
							<p>Help be a part of the Van Ness Rapid Transit campaign.</p>
							<p><a href="../volunteer/"><div id="" class="but_default">Volunteer</div></a>
						</div>
						<div class="takeactionthreecol">
							<a href="../join/?campaign=vanness"><img src="../img/member.png" class="workvolunteerimg" border=0 noborder></a>
							<h3>Become a Member</h3>
							<p>Support this campaign through your membership.</p>
							<p><a href="../join/?campaign=vanness"><div id="" class="but_default">Join / Donate</div></a>
						</div>
						<div class="takeactionthreecol">
							<a href="../volunteer/"><img src="../img/email.png" class="workvolunteerimg" border=0 noborder></a>
							<h3>Keep Informed</h3>
							<p>Be notified of updates &amp; actions on this campaign.</p>
							<p><a href="../volunteer/"><div id="" class="but_default">Sign Up</div></a>
						</div>
					</div>
					
				</div>
			</div>
			
			<!-- 22-DAY MUNI CHALLENGE -->
			<a name="munichallenge"> </a>
			<div id="content_wrapper_sub" style="background-color:#eee;">
				<div class="content_item" style="padding-top:50px;padding-bottom:50px;">
					<h1>22-Day Muni Challenge</h1>
					<br>
					<div class="leftimage"><img src="../img/22day_orange.png" width=324 height=423 style="width:324px; height:423px;"></div>
					<div class="righttext">
					
					Participating officials tweeted while riding, walking to, or waiting for transit every day for those 22 days, posting it to Twitter with photos using the hashtag #OnBoardSF.

<p>The challenge ran from Monday, June 1st to Monday, June 22nd, one day for each of the years since 1993 when San Francisco voters passed Proposition AA: "City officials and full-time employees [shall] travel to and from work on public transit at least twice a week." 22 years later, this policy agreement has never been acted on, and this is a chance to make up for lost time!</p>

<p>When they regularly ride public transit, city officials better understand the rider's daily experience and prioritize funding and planning a more reliable, robust, and visionary transit system to support it. This is an opportunity for our city officials to promote their own commitment to public transportation, showcasing that they care about the future of Muni.</p>

<p><a href="http://sftransitriders.org/munichallenge">View Leaderboard &amp; Event Details &raquo;</a></p>

					</div>
					
					
					
					<div class="takeaction">
						<h4>Support Events Like the 22-Day Muni Challenge</h4>
						<div class="takeactionthreecol">
							<a href="../volunteer/"><img src="../img/volunteer.png" class="workvolunteerimg" border=0 noborder></a>
							<h3>Volunteer on Campaign</h3>
							<p>Help be a part of the Transit Action Committee.</p>
							<p><a href="../volunteer/"><div id="" class="but_default">Volunteer</div></a>
						</div>
						<div class="takeactionthreecol">
							<a href="../join/?campaign=munichallenge"><img src="../img/member.png" class="workvolunteerimg" border=0 noborder></a>
							<h3>Become a Member</h3>
							<p>Support this campaign through your membership.</p>
							<p><a href="../join/?campaign=munichallenge"><div id="" class="but_default">Join / Donate</div></a>
						</div>
						<div class="takeactionthreecol">
							<a href="../volunteer/"><img src="../img/email.png" class="workvolunteerimg" border=0 noborder></a>
							<h3>Keep Informed</h3>
							<p>Be notified of actions similar to this campaign.</p>
							<p><a href="../volunteer/"><div id="" class="but_default">Sign Up</div></a>
						</div>
					</div>
					
				</div>
			</div>
			
			<!-- TEP -->
			<a name="tep"> </a>
			<div id="content_wrapper_sub" style="background-color:#fff;">
				<div class="content_item" style="padding-top:50px;padding-bottom:50px;">
					<h1>Transit Effectiveness Project (TEP)</h1>
					<br>
					<div class="leftimage"><img src="../img/tep_small.jpg"></div>
					<div class="righttext">
					If you are not familiar with the Transit Effectiveness Project, it is the first major overhaul of the entire Muni bus route system in 30 years (the last major changes occurred from 1979 to 1984) and was initially proposed in 2006.<p>

<p>Some features include:
<ul>
<li>Bus bulbs (expanded waiting areas) so buses no longer have to pull over to board passengers, and fight traffic to pull out.</li>
<li>Longer buses on some routes.</li>
<li>Bus-only lanes</li>
<li>Major restructuring of bus routes</li>
<li>Optimized bus stops</li>
<li>Prepaid boarding</li></ul></p>
					</div>
					
					
					
					<div class="takeaction">
						<h4>Support Transit Effectiveness</h4>
						<div class="takeactionthreecol">
							<a href="../volunteer/"><img src="../img/volunteer.png" class="workvolunteerimg" border=0 noborder></a>
							<h3>Volunteer on Campaign</h3>
							<p>Help be a part of the Transit Effectiveness campaign.</p>
							<p><a href="../volunteer/"><div id="" class="but_default">Volunteer</div></a>
						</div>
						<div class="takeactionthreecol">
							<a href="../join/?campaign=tep"><img src="../img/member.png" class="workvolunteerimg" border=0 noborder></a>
							<h3>Become a Member</h3>
							<p>Support this campaign through your membership.</p>
							<p><a href="../join/?campaign=tep"><div id="" class="but_default">Join / Donate</div></a>
						</div>
						<div class="takeactionthreecol">
							<a href="../volunteer/"><img src="../img/email.png" class="workvolunteerimg" border=0 noborder></a>
							<h3>Keep Informed</h3>
							<p>Be notified of updates &amp; actions on this campaign.</p>
							<p><a href="../volunteer/"><div id="" class="but_default">Sign Up</div></a>
						</div>
					</div>
					
				</div>
			</div>
			
			
			<!-- BALLOT MEASURES -->
			<a name="ballot"> </a>
			<div id="content_wrapper_sub" style="background-color:#eee;">
				<div class="content_item" style="padding-top:50px;padding-bottom:50px;">
					<h1>Funding for Transit</h1>
					<br>
					<div class="leftimage"><img src="../img/cityhall.jpg"></div>
					<div class="righttext">
					In the November 2014 election, education and outreach by SF Transit Riders helped to successfully secure major funding for Muni with Propositions A and B and squarely defeat the anti-transit, pro-parking Proposition L.
					
<p>Prop. A was a bond measure authorizing up to $500 million in borrowing for Muni capital improvements.  Beginning July 2015, Prop. B will direct an additional $22 million (increasing annually) to SFMTA for Muni and increased street safety.  Significantly, Prop. B Muni funds can only be spent on increasing service: either buying more buses and trains, or paying to increase service on the street.</p>

<p>But catching up and keeping up with the needs of a growing transit system to adequately serve future travel demand in the region will still require additional resources in coming years.  In 2015 or 2016, a Vehicle License Fee, first proposed in 2014 but not pursued, is expected to be proposed which would replace Prop. B funding while also providing for other SFMTA expenditures such as street repaving.  The SF Transit Riders will be in the midst of the jousting for funds to ensure the maximum availability of such funding for Muni service.</p>

<p>SFTRU is also working with SFMTA and a coalition of activists looking at a strategy to ensure transit is equitably distributed to all populations within the City, but this may then require additional resources to remedy deficiencies as well.</p>

					</div>
					
					
					<div class="takeaction">
						<h4>Support Ballot Initiatives</h4>
						<div class="takeactionthreecol">
							<a href="../volunteer/"><img src="../img/volunteer.png" class="workvolunteerimg" border=0 noborder></a>
							<h3>Volunteer on Campaign</h3>
							<p>Help be a part of the Transit Ballot Initiatives campaign.</p>
							<p><a href="../volunteer/"><div id="" class="but_default">Volunteer</div></a>
						</div>
						<div class="takeactionthreecol">
							<a href="../join/?campaign=ballot"><img src="../img/member.png" class="workvolunteerimg" border=0 noborder></a>
							<h3>Become a Member</h3>
							<p>Support this campaign through your membership.</p>
							<p><a href="../join/?campaign=ballot"><div id="" class="but_default">Join / Donate</div></a>
						</div>
						<div class="takeactionthreecol">
							<a href="../volunteer/"><img src="../img/email.png" class="workvolunteerimg" border=0 noborder></a>
							<h3>Keep Informed</h3>
							<p>Be notified of updates &amp; actions on this campaign.</p>
							<p><a href="../volunteer/"><div id="" class="but_default">Sign Up</div></a>
						</div>
					</div>
					
					
				</div>
			</div>
			
			<!-- ALL-DOOR BOARDING -->
			<a name="alldoor"> </a>
			<div id="content_wrapper_sub" style="background-color:#fff;">
				<div class="content_item" style="padding-top:50px;padding-bottom:50px;">
					<h1>All-Door Boarding</h1>
					<br>
					<div class="leftimage"><img src="../img/alldoor.jpg"></div>
					<div class="righttext">
					SFTRU members proposed an all-door boarding pilot program to SFMTA in fall 2011. The agency put the policy change before the MTA Board which, after testimony by SFTRU members, ultimately adopted the proposal.
<p>All-Door Boarding has decreased boarding times on many routes, including by 17.9% on the 1AX-California and 8% on the 38-Geary.</p>
<p>For this work, the SF Transit Riders received an award from Livable City for our success implementing this policy change, and All-Door Boarding was voted the Best Livable Streets story on Streetsblog in 2012.</p>
<p>Through our campaign work, we proposed the pilot program, created and distributed 2,500 informational brochures to inform riders about All-Door Boarding, and successfully worked with the SFMTA to see that it was implemented.</p> 
					</div>
					
					
					
					<div class="takeaction">
						<h4>Support All-Door Boarding</h4>
						<div class="takeactionthreecol">
							<a href="../volunteer/"><img src="../img/volunteer.png" class="workvolunteerimg" border=0 noborder></a>
							<h3>Volunteer on Campaign</h3>
							<p>Help be a part of the Geary Rapid Transit campaign.</p>
							<p><a href="../volunteer/"><div id="" class="but_default">Volunteer</div></a></p>
						</div>
						<div class="takeactionthreecol">
							<a href="../join/?campaign=alldoor"><img src="../img/member.png" class="workvolunteerimg" border=0 noborder></a>
							<h3>Become a Member</h3>
							<p>Support this campaign through your membership.</p>
							<p><a href="../join/?campaign=alldoor"><div id="" class="but_default">Join / Donate</div></a>
						</div>
						<div class="takeactionthreecol">
							<a href="../volunteer/"><img src="../img/email.png" class="workvolunteerimg" border=0 noborder></a>
							<h3>Keep Informed</h3>
							<p>Be notified of updates &amp; actions on this campaign.</p>
							<p><a href="../volunteer/"><div id="" class="but_default">Sign Up</div></a>
						</div>
					</div>
					
					
				</div>
			</div>
			
			
			<!-- TRANSIT FORUMS -->
			<a name="forums"> </a>
			<div id="content_wrapper_sub" style="background-color:#eee;">
				<div class="content_item" style="padding-top:50px;padding-bottom:50px;">
					<h1>Transit Forums</h1>
					<br>
					<div class="leftimage"><img src="../img/forum.jpg"></div>
					<div class="righttext">
					We are committed to hosting regular community forums, partnering with other progressive organizations to bring together panels of experts, officials, and neighborhood leaders to address provocative issues in transit. Our forums always include time for open discussion in order to foster dialogue and collectively generate new ideas.
					<p>Some popular past forums include:<br/>&nbsp;</p>
					<h2>Parking: A Temporary Problem?</h2>
					<p>With car use declining among young people, driverless cars in our future, and an influx of carsharing and ridesharing services, is our current seemingly gridlocked parking problem soon to be solved? Can improving transit access and reliability to neighborhoods reduce the strain on parking, even while removing parking spaces? Does the latest influx of goods transportation and delivery services make it worse? How can Parking Benefit Districts turn "no" into "yes" for neighborhoods? In June 2014, SF Transit Riders partnered with SPUR, TransForm, and SFPark to host a free forum about the state of parking in San Francisco. Six panelists, including innovative automobile and parking analysts, neighborhood leaders, and land use experts  talked about what the current state of parking is, how it affects us all, and how we can plan for public transit given this shift in car use. After they each presented a specific set of tools to reduce parking stress, forum participants then broke into groups to discuss applying these tools and others throughout the city.</p>
					
					<a href="http://sftru.nationbuilder.com/parking_forum">View Forum Details &raquo;</a> &nbsp;&nbsp;&nbsp; | &nbsp;&nbsp;&nbsp; <a href="http://sftru.nationbuilder.com/parking_forum_recap">View Forum Recap &raquo;</a>
					<p>&nbsp;</p>
					<h2>Bridging the Gaps In Transit and Housing Funding</h2>
					<p>San Francisco needs more affordable housing, a robust public transit system, and fully funded social services if it is to remain an efficient, diverse, compassionate city. Unfortunately, some political leaders have pitted transportation and housing activists against one another in recent years, particularly so in the Fall 2014 election on Propositions A, B, G, K, and L. Six panelists including transit advocates, housing advocates, and even Supervisor Scott Weiner shed light on how public transportation service and facilities are paid for, and then we'll examine how the conflict happened, the political tactics that were being employed, and what can be done to bridge the gap.
</p>
					
					<a href="http://sftru.nationbuilder.com/bridging_gaps">View Forum Details &raquo;</a> &nbsp;&nbsp;&nbsp; | &nbsp;&nbsp;&nbsp; <a href="http://sftru.nationbuilder.com/sfbg_bridging_gaps_recap">View Forum Recap &raquo;</a>
					</div>
					
					
					
					<div class="takeaction">
						<h4>Support All-Door Boarding</h4>
						<div class="takeactionthreecol">
							<a href="../volunteer/"><img src="../img/volunteer.png" class="workvolunteerimg" border=0 noborder></a>
							<h3>Volunteer on Campaign</h3>
							<p>Help be a part of the Geary Rapid Transit campaign.</p>
							<p><a href="../volunteer/"><div id="" class="but_default">Volunteer</div></a></p>
						</div>
						<div class="takeactionthreecol">
							<a href="../join/?campaign=alldoor"><img src="../img/member.png" class="workvolunteerimg" border=0 noborder></a>
							<h3>Become a Member</h3>
							<p>Support this campaign through your membership.</p>
							<p><a href="../join/?campaign=alldoor"><div id="" class="but_default">Join / Donate</div></a>
						</div>
						<div class="takeactionthreecol">
							<a href="../volunteer/"><img src="../img/email.png" class="workvolunteerimg" border=0 noborder></a>
							<h3>Keep Informed</h3>
							<p>Be notified of updates &amp; actions on this campaign.</p>
							<p><a href="../volunteer/"><div id="" class="but_default">Sign Up</div></a>
						</div>
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
