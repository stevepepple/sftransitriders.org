<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>

		<title>SFTRU - Ride the Vote 2016</title>
		
		<?php 
		echo file_get_contents("http://" . $_SERVER['HTTP_HOST'] . "/header.php?ipad=" . (bool) strpos($_SERVER['HTTP_USER_AGENT'],'iPad')); 
		?>
		
		<meta name="twitter:card" content="summary">
		<meta name="twitter:site" content="@sftru">
		<meta name="twitter:title" content="Ride the Vote 2016">
		<meta name="twitter:description" content="We're excited to introduce San Francisco's first ever all-transit election guide! Learn about all of the transit-related policies on the ballot for this fall&mdash;and find out candidate stances on policies and actions that affect transit in San Francisco.">
		<meta name="twitter:creator" content="@sftru">
		<meta name="twitter:image" content="http://sftransitriders.org/ridethevote/img/rtv_photo.jpg">
		
		<meta property="og:title" content="Ride the Vote 2016" />
		<meta property="og:type" content="article" />
		<meta property="og:url" content="http://sftransitriders.org/ridethevote/" />
		<meta property="og:image" content="http://sftransitriders.org/ridethevote/img/rtv_photo.jpg" />
		<meta property="og:description" content="We're excited to introduce San Francisco's first ever all-transit election guide! Learn about all of the transit-related policies on the ballot for this fall&mdash;and find out candidate stances on policies and actions that affect transit in San Francisco." />
		
		<?php
			  function compare($a, $b)
			  {
			     global $key;
			     return strcmp($a[$key], $b[$key]);
			  } 
			function multi_sort($array, $akey)
			{  
			  usort($array, "compare");
			  return $array;
			}
			
// 			$candidates = array_map('str_getcsv', str_getcsv(file_get_contents('results.csv'),",",'"',"\\"));
			$candidates = array_map('str_getcsv', file('results.csv'));
		    array_walk($candidates, function(&$a) use ($candidates) {
		      $a = array_combine($candidates[0], $a);
		    });
		    array_shift($candidates); # remove column header
			
// 			$candidates = array_map('str_getcsv', file('results.csv'));


/*
			$candidates = [
				"London Lreed" => [
					"name" => "London Lreed",
					"district" => "5",
					"j" => true,
					"k" => true,
					"redcarpet" => true,
					"brt" => true,
					"dtx" => true,
					"subway" => true,
					"img" => "breed.jpg",
					"member" => true
				],
				"Dean Dreston" => [
					"name" => "Dean Dreston",
					"district" => "5",
					"j" => true,
					"k" => false,
					"redcarpet" => true,
					"brt" => false,
					"dtx" => true,
					"subway" => true,
					"img" => "breed.jpg",
					"member" => true
				],
				"Bruce Breston" => [
					"name" => "Bruce Breston",
					"district" => "3",
					"j" => true,
					"k" => false,
					"redcarpet" => true,
					"brt" => true,
					"dtx" => true,
					"subway" => false,
					"img" => "breed.jpg",
					"member" => true
				]
			];
*/
			
// 			sort($candidates);
// 			$candidates = multi_sort($candidates, $key = 'name');
			$candidates = multi_sort($candidates, $key = 'district');
		?>
		
		<script src="../jquery.min.js" type="text/javascript"></script>
		<script src="../date.js" type="text/javascript"></script>
		<script src="../GCalEvents.js" type="text/javascript"></script>
		
		<script>
			
			var candidates = <?php echo json_encode($candidates); ?>
			
			function filterByProperty(array, prop, value){
			    var filtered = [];
			    for(var i = 0; i < array.length; i++){
			
			        var obj = array[i];
			
			        for(var key in obj){
				        if(key == prop) {
				            if(typeof(obj[key] == "object")){
				                var item = obj[key];
				                if(obj[key] == value){
				                    filtered.push(obj);
				                }
				            }
				        }
			        }
			
			    }    
			
			    return filtered;
			}

			
			function candidate_filter(tVal) {
				var district;
				
				if(tVal == 0) {
					district = candidates;
				} else {
					district = filterByProperty(candidates, "district", tVal);
				}
				
				var sections = [ "redcarpet", "brt", "dtx", "subway" ];
				
				for(var section in sections) {
					var supports = filterByProperty(district, sections[section], "Yes");
					var opposes = filterByProperty(district, sections[section], "No");
					
					var html = "<div class='support'><b>SUPPORTS</b><div class='small_candidates'>";
				
					for(var candidate in supports) {
						// supports[candidate]["img"]
						html += "<div class='candidate_small' onmouseover='hoverCandidate(this,\""+supports[candidate]["name"].toLowerCase().toTitleCase()+"\");' onmouseout=\"leaveCandidate();\"><img src='img/candidates/" + supports[candidate]["img"] + "' style='width:100%;height:auto'></div>";
					}
					html += "</div></div><div class='nosupport'><b>DOES NOT SUPPORT</b><div class='small_candidates'>";
					
					for(var candidate in opposes) {
						html += "<div class='candidate_small gray' onmouseover='hoverCandidate(this,\""+opposes[candidate]["name"].toLowerCase().toTitleCase()+"\");' onmouseout=\"leaveCandidate();\"><img src='img/candidates/" + opposes[candidate]["img"] + "' style='width:100%;height:auto'></div>";
					}
					html += "</div></div>";
					
					$("#" + sections[section]).html(html);
				}
				
				var props = [ "propj", "propk" ];
					
				
				for(var prop in props) {
					var supports = filterByProperty(district, props[prop], "Support");
					var opposes = filterByProperty(district, props[prop], "Oppose");
					var nostance = filterByProperty(district, props[prop], "No Stance");
					
					var html = "<div class='support narrow'><b>SUPPORTS</b><div class='small_candidates'>";
				
					for(var candidate in supports) {
						html += "<div class='candidate_small' onmouseover='hoverCandidate(this,\""+supports[candidate]["name"].toLowerCase().toTitleCase()+"\");' onmouseout=\"leaveCandidate();\"><img src='img/candidates/" + supports[candidate]["img"] + "' style='width:100%;height:auto'></div>";
					}
					html += "</div></div><div class='nostance'><b>NO STANCE</b><div class='small_candidates'>";
				
					for(var candidate in nostance) {
						html += "<div class='candidate_small gray' onmouseover='hoverCandidate(this,\""+nostance[candidate]["name"].toLowerCase().toTitleCase()+"\");' onmouseout=\"leaveCandidate();\"><img src='img/candidates/" + nostance[candidate]["img"] + "' style='width:100%;height:auto'></div>";
					}
					html += "</div></div><div class='nosupport narrow'><b>OPPOSES</b><div class='small_candidates'>";
					
					for(var candidate in opposes) {
						html += "<div class='candidate_small gray' onmouseover='hoverCandidate(this,\""+opposes[candidate]["name"].toLowerCase().toTitleCase()+"\");' onmouseout=\"leaveCandidate();\"><img src='img/candidates/" + opposes[candidate]["img"] + "' style='width:100%;height:auto'></div>";
					}
					html += "</div></div>";
					
					$("#" + props[prop]).html(html);
				}
				
				
			}
			
			function getRandomInt(min, max) {
			  min = Math.ceil(min);
			  max = Math.floor(max);
			  return Math.floor(Math.random() * (max - min)) + min;
			}
			
			function hoverCandidate(tWhich,tName) {
				$("#hover_name").css("display","block");
				if($(tWhich).hasClass("gray")) {
					$("#hover_name").css("background-color","#555");
				} else {
					$("#hover_name").css("background-color","#E86E10");
				}
				$("#hover_name").text(tName);
				$("#hover_name").offset({ top: $(tWhich).offset().top + $(tWhich).height() + 7, left: $(tWhich).offset().left - (($("#hover_name").width() - $(tWhich).width())/2) - 10})
			}
			
			function leaveCandidate() {
				$("#hover_name").css("display","none");
			}
		
			function submitEmail() {
				alert('ok!');
				document.forms[0].action = "http://sftru.nationbuilder.com/forms/signups";
				alert(document.forms[0].action);
				document.forms[0].submit();
			}
			
			function resizeIframe(obj) {
				obj.style.height = obj.contentWindow.document.body.scrollHeight + 'px';
			}
			
			function showBox(tWhich,tName) {
/*
				$("#screen_box").css("width",$(tWhich).width()+"px");
				$("#screen_box").css("height",$(tWhich).height()+"px");
				$("#screen_box").offset({ top: $(tWhich).offset().top, left: $(tWhich).offset().left});
				
*/
				
				
				$("#screen_box").css("width","600px");
				$("#screen_box").css("height","600px");
				$("#screen_box").offset({ top: (($(window).height()-600)/2), left: (($(window).width()-600)/2) });
				
				$("#screen_box").css("display","block");
				$("#screen_overlay").css("display","block");
				
				$("#screen_box").css("width","600px");
				$("#screen_box").css("height","600px");
				$("#screen_box").offset({ top: (($(window).height()-600)/2), left: (($(window).width()-600)/2) });
				
				
// 				$("#screen_box").addClass("animate");
				
				//
				
/*
				$("#screen_box").css("width","600px");
				$("#screen_box").css("height","600px");
				$("#screen_box").offset({ top: (($(window).height()-600)/2), left: (($(window).width()-600)/2) });
*/
			}
			
			function hideBox() {
				$("#screen_box").css("display","none");
				$("#screen_overlay").css("display","none");
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
			
			String.prototype.toTitleCase = function(){
			  var smallWords = /^(a|an|and|as|at|but|by|en|for|if|in|nor|of|on|or|per|the|to|vs?\.?|via)$/i;
			
			  return this.replace(/[A-Za-z0-9\u00C0-\u00FF]+[^\s'-]*/g, function(match, index, title){
			    if (index > 0 && index + match.length !== title.length &&
			      match.search(smallWords) > -1 && title.charAt(index - 2) !== ":" &&
			      (title.charAt(index + match.length) !== "'" || title.charAt(index - 1) === "'") &&
			      (title.charAt(index + match.length) !== '-' || title.charAt(index - 1) === '-') &&
			      title.charAt(index - 1).search(/[^\s'-]/) < 0) {
			      return match.toLowerCase();
			    }
			
			    if (match.substr(1).search(/[A-Z]|\../) > -1) {
			      return match;
			    }
			
			    return match.charAt(0).toUpperCase() + match.substr(1);
			  });
			};
		
		</script>
		
		<style>
			#hover_name {
				z-index: 9999;
				position: absolute;
				background-color: #E86E10;
				color: #fff;
				top: 100px;
				left: 100px;
				padding: 2px 10px 2px 10px;
				font-style: normal;
				font-weight: lighter;
				font-size: 14px;
				font-family: Avenir-Medium,"Avenir Medium",AvenirNext,"Avenir Next",Avenir,HelveticaNeue-UltraLight,"Helvetica Neue Ultra Light","Helvetica Neue-Ultra Light",Verdana,Tahoma,Geneva,Helvetica,Arial,sans-serif;
				border-radius: 11px;
				display: none;
			}
			
			.small_candidates {
				line-height:0;
			}
			
			.small_candidates .candidate_small {
				width:22%;
				min-width: 50px;
				height:auto;
				margin:2px;
				padding:0 ;
				position:relative;
				display:inline-block;
				line-height:0;
				outline: 0px rgba(255,255,255,0) solid;
				-webkit-filter: saturate(100%);
				-webkit-transition-duration: 0.7s,0.7s;
				-webkit-transition-property: -webkit-filter,opacity;
				opacity: 1.0;
			}
			
			.small_candidates .narrow {
				-webkit-filter: saturate(10%);
				opacity: 0.8;
			}
			
			.small_candidates .gray {
				-webkit-filter: saturate(10%);
				opacity: 0.8;
			}
			
			.small_candidates:hover .candidate_small {
				-webkit-filter: saturate(0%);
				-webkit-transition-duration: 0.7s,0.7s;
				-webkit-transition-property: -webkit-filter,opacity;
				opacity: 0.5;
			}
			
			.small_candidates:hover .candidate_small:hover {
				-webkit-filter: saturate(110%);
				outline: 2px #E86E10 solid;
				-webkit-transition-duration: 0.01s;
				-webkit-transition-property: -webkit-filter;
				opacity: 1.0;
/* 				-webkit-transition-property: -webkit-filter; */
			}
			
			.small_candidates:hover .gray:hover {
				outline: 2px #555 solid;
			}
			
			
			
			.candidates .candidate_large {
				background-color:#E86E10;
				width:18%;
				min-width: 100px;
				height:auto;
				margin:3px;
				border: 2px white solid;
				padding:0;
				position:relative;
				display:inline-block;
				line-height:0;
				outline: 0px rgba(255,255,255,0) solid;
				-webkit-filter: saturate(80%);
				-webkit-transition-duration: 0.8s;
/* 				-webkit-transition-property: -webkit-filter; */
			}
			
			.candidate_overlay {
				position: absolute;
				bottom: 0px;
				left: 0px;
				width: 100%;
				background-image: url('img/candidate_overlay.png');
				background-size: cover;
				background-repeat: no-repeat;
				box-sizing: border-box;
				padding-top: 20%;
				color: #fff;
				font-family: AvenirNext-Bold,"Avenir Next Bold",AvenirNext,"Avenir Next",Avenir,HelveticaNeue-UltraLight,"Helvetica Neue Ultra Light","Helvetica Neue-Ultra Light",Verdana,Tahoma,Geneva,Helvetica,Arial,sans-serif;
				font-weight: bold;
				font-size: 15px;
				text-transform: uppercase;
				line-height: 15px;
				vertical-align: bottom;
			}
			
			.candidate_overlay_office {
				font-style: normal;
				font-weight: lighter;
				font-size: 12px;
				font-family: Avenir-Medium,"Avenir Medium",AvenirNext,"Avenir Next",Avenir,HelveticaNeue-UltraLight,"Helvetica Neue Ultra Light","Helvetica Neue-Ultra Light",Verdana,Tahoma,Geneva,Helvetica,Arial,sans-serif;
				color: yellow;
				position: relative;
				display: block;
				margin-bottom: 10px;
			}
			
			.candidates:hover .candidate_large {
				-webkit-filter: saturate(0%);
				-webkit-transition-duration: 1.0s,0.4s;
				-webkit-transition-property: -webkit-filter,outline;
			}
			
/*
			.candidates:hover .candidate_large:hover .candidateimg {
				clip: rect(5%,5%,5%,5%);
				-webkit-transform: scale(110%);
				overflow:hidden;
			}
*/
			
			.candidates:hover .candidate_large:hover {
				-webkit-filter: saturate(110%);
				outline: 5px #E86E10 solid;
				-webkit-transition-duration: 0.4s;
/* 				-webkit-transition-property: -webkit-filter; */
			}
			
			.filter {
				height: 40px;
				overflow: hidden;
				background: transparent;
				-webkit-appearance: none;
				color: #fff;
				border: 1px #fff solid;
				font-family: AvenirNext-UltraLight, 'Avenir Next Ultra Light', 'Avenir Next-Ultra Light', AvenirNext, 'Avenir Next', Avenir, HelveticaNeue-UltraLight, 'Helvetica Neue Ultra Light', 'Helvetica Neue-Ultra Light', Verdana, Tahoma, Geneva, Helvetica, Arial, sans-serif;
				font-size: 24px;
				font-style: normal;
				font-weight: 100;
				line-height: 40px;
				padding: 0 20px 0 20px;
			}
			
			.stancetable {
				width: 100%;
				display: block;
				position: relative;
			}
			
			.support {
				float: left;
				text-align: left;
				color: #E86E10;
				width: 50%;
				padding-bottom: 50px;
			}
			
			.support.narrow {
				width: 33%;
				position: relative;
				display: inline-block;
			}
			
			.nosupport {
				float:right;
				text-align: right;
				color: #AAA;
				width: 50%;
				padding-bottom: 50px;
			}
			
			.nosupport.narrow {
				width: 33%;
				position: relative;
				display: inline-block;
			}
			
			.nostance {
				position: relative;
				display: inline-block;
				text-align: center;
				color: #AAA;
				width: 33%;
				padding-bottom: 50px;
			}
		</style>
		
	</head>
	<body style="margin: 0;" onScroll="blurPhoto();">
	
		<div id="bgphoto_short" class="ridethevote" style="background-image:url('img/ridethevote_head.jpg');"></div>
		<div id="photo_overlay" class="short">
		</div>		
		
		<!-- Nav -->
		<?php 
		echo file_get_contents("http://" . $_SERVER['HTTP_HOST'] . "/nav.php?class=short&page=" . basename(getcwd())); 
		?>
		
		
		<div id="content_wrapper_short" style="background-color:#f4f5f0;">
		
		
			
			<div id="content_wrapper_sub" style="background-color:#fff;">
			
				<div class="content_item" style="padding-top:50px;padding-bottom:20px;text-align:center;">
					<h2 style="line-height: 1.2em;padding: 0;margin:0;color:#3e464d;">Welcome to the San Francisco Transit Riders 2016 November Election Guide</h2>
					<p class="centertext" style="min-height: 0;">We're excited to share with you the San Francisco Transit Riders first ever election guide! Here you can learn about all of the transit-related policies on the ballot for this fall&mdash;and find out candidate stances on policies and actions that affect transit in San Francisco.</p>
										
				</div>
			</div>
			
			<div id="content_wrapper_sub" style="background-color:#fff;">
				<div class="content_item" style="padding-top:10px;padding-bottom:50px;">
					<div class="centeredcols">
						<div class="threecol large" onclick="window.location='bart/';">
							<div class="threecol_photo large" style="background-image:url('img/bart.jpg');"></div>
							<h2>BART Board of Directors</h2>
							<p>Two BART districts that cover San Francisco have Board of Director seats open. Find out what the candidates think about the future of BART &amp; regional transit.</p>
							
						</div>
						
						<div class="threecol large" onclick="window.location='candidates/';">
							<div class="threecol_photo large" style="background-image:url('img/candidates.jpg');"></div>
							<h2>Local &amp; State Candidates</h2>
							<p>San Francisco's State Senator and half of the Board of Supervisors will be determined this November. Learn more about these candidates' stances on public transit.</p>
						</div>
						
						<div class="threecol large" onclick="window.location='propositions';">
							<div class="threecol_photo large" style="background-image:url('img/yesjk.jpg');"></div>
							<h2>Transit-Related Ballot Propositions</h2>
							<p>Propositions J &amp; K together can improve funding for fixing roads &amp; transit (and our homelessness crisis), while Proposition RR will help keep BART safe and reliable.</p>
							
						</div>
												
					</div>
					
				</div>
			</div>
			
			
			
		
			<!-- Footer -->
		<?php 
		echo file_get_contents("http://" . $_SERVER['HTTP_HOST'] . "/footer.php"); 
		?>


		</div>
		
		<div id="hover_name"> </div>
		
		<div id="screen_overlay" onclick="hideBox();">
			<div id="screen_fade"></div>
		</div>
		
		<div id="screen_box"></div>

		
	</body>
	<script type="text/javascript">
		candidate_filter(0);
		
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
