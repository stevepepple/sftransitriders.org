<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>
		<title>SFTRU - 2016 November Propositions</title>
		
		<?php 
		echo file_get_contents("http://" . $_SERVER['HTTP_HOST'] . "/header.php?ipad=" . (bool) strpos($_SERVER['HTTP_USER_AGENT'],'iPad')); 
		?>
		
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
			$candidates = array_map('str_getcsv', file('../results.csv'));
		    array_walk($candidates, function(&$a) use ($candidates) {
		      $a = array_combine($candidates[0], $a);
		    });
		    array_shift($candidates); # remove column header
		    
			$bartcandidates = array_map('str_getcsv', file('../bart3.csv'));
		    array_walk($bartcandidates, function(&$b) use ($bartcandidates) {
		      $b = array_combine($bartcandidates[0], $b);
		    });
		    array_shift($bartcandidates); # remove column header
			
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
			$bartcandidates = multi_sort($bartcandidates, $key = 'district');
		?>
		
		<script src="/jquery.min.js" type="text/javascript"></script>
		<script src="/date.js" type="text/javascript"></script>
		<script src="/GCalEvents.js" type="text/javascript"></script>
		
		<script>
			
			var candidates = <?php echo json_encode($candidates); ?>;
			var bartcandidates = <?php echo json_encode($bartcandidates); ?>;
			
			function filterByProperty(array, prop, values){
			    var filtered = [];
			    for(var i = 0; i < array.length; i++){
			
			        var obj = array[i];
			
			        for(var key in obj){
				        if(key == prop) {
				            if(typeof(obj[key] == "object")){
				                var item = obj[key];
				                for(var v = 0; v < values.length; v++) {
					                console.log(values[v]);
					                if(obj[key] == values[v]){
					                    filtered.push(obj);
					                    break;
					                }
				                }
				            }
				        }
			        }
			
			    }    
			
			    return filtered;
			}

			
			function candidate_filter(tVal) {
				var district;
				var bartdistrict = bartcandidates;
				
				if(tVal == 0) {
					district = candidates;
				} else {
					district = filterByProperty(candidates, "district", [tVal]);
				}
				
				var sections = [ "redcarpet", "brt", "dtx", "subway" ];
				
				for(var section in sections) {
					var supports = filterByProperty(district, sections[section], ["Yes"]);
					var opposes = filterByProperty(district, sections[section], ["No"]);
					
					var html = "<div class='support'><b>SUPPORTS</b><div class='small_candidates'>";
				
					for(var candidate in supports) {
						// supports[candidate]["img"]
						html += "<div class='candidate_small' onmouseover='hoverCandidate(this,\""+supports[candidate]["name"].toLowerCase().toTitleCase()+"\");' onmouseout=\"leaveCandidate();\"><img src='../img/candidates/" + supports[candidate]["img"] + "' style='width:100%;height:auto'></div>";
					}
					html += "</div></div><div class='nosupport'><b>DOES NOT SUPPORT</b><div class='small_candidates'>";
					
					for(var candidate in opposes) {
						html += "<div class='candidate_small gray' onmouseover='hoverCandidate(this,\""+opposes[candidate]["name"].toLowerCase().toTitleCase()+"\");' onmouseout=\"leaveCandidate();\"><img src='../img/candidates/" + opposes[candidate]["img"] + "' style='width:100%;height:auto'></div>";
					}
					html += "</div></div>";
					
					$("#" + sections[section]).html(html);
				}
				
				var props = [ "propj", "propk", "proprr"];
					
				
				for(var prop in props) {
					var supports = filterByProperty(district, props[prop], ["Yes","Support"]);
					supports = supports.concat(filterByProperty(bartdistrict, props[prop], ["Yes","Support"]));
					var opposes = filterByProperty(district, props[prop], ["No","Oppose"]);
					opposes = opposes.concat(filterByProperty(bartdistrict, props[prop], ["No","Oppose"]));
					var nostance = filterByProperty(district, props[prop], ["No Stance"]);
					nostance = nostance.concat(filterByProperty(bartdistrict, props[prop], ["No Stance"]));
					
					var html = "<div class='support narrow'><b>SUPPORTS</b><div class='small_candidates'>";
				
					for(var candidate in supports) {
						html += "<div class='candidate_small' onmouseover='hoverCandidate(this,\""+supports[candidate]["name"].toLowerCase().toTitleCase()+"\");' onmouseout=\"leaveCandidate();\"><img src='../img/candidates/" + supports[candidate]["img"] + "' style='width:100%;height:auto'></div>";
					}
					html += "</div></div><div class='nostance'><b>NO STANCE</b><div class='small_candidates'>";
				
					for(var candidate in nostance) {
						html += "<div class='candidate_small gray' onmouseover='hoverCandidate(this,\""+nostance[candidate]["name"].toLowerCase().toTitleCase()+"\");' onmouseout=\"leaveCandidate();\"><img src='../img/candidates/" + nostance[candidate]["img"] + "' style='width:100%;height:auto'></div>";
					}
					html += "</div></div><div class='nosupport narrow'><b>OPPOSES</b><div class='small_candidates'>";
					
					for(var candidate in opposes) {
						html += "<div class='candidate_small gray' onmouseover='hoverCandidate(this,\""+opposes[candidate]["name"].toLowerCase().toTitleCase()+"\");' onmouseout=\"leaveCandidate();\"><img src='../img/candidates/" + opposes[candidate]["img"] + "' style='width:100%;height:auto'></div>";
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
			
			function findAddress() {
				var address = $("#addr").val();
				
				address = address.toUpperCase();
				var searchtype = "ADDRESSSIMPLE";
				
				//standardize the address string to match with MAD format
				address = address.replace("      "," ");
				address = address.replace("     "," ");
				address = address.replace("    "," ");
				address = address.replace("   "," ");
				address = address.replace("  "," ");
				address = address.replace(" 1ST"," 01ST");
				address = address.replace(" FIRST STREET"," 01ST");
				address = address.replace(" FIRST ST"," 01ST");
				address = address.replace(" 2ND"," 02ND");
				address = address.replace(" SECOND"," 02ND");
				address = address.replace(" 3RD"," 03RD");
				address = address.replace(" THIRD"," 03RD");
				address = address.replace(" 4TH"," 04TH");
				address = address.replace(" FOURTH"," 04TH");
				address = address.replace(" 5TH"," 05TH");
				address = address.replace(" FIFTH"," 05TH");
				address = address.replace(" 6TH"," 06TH");
				address = address.replace(" SIXTH"," 06TH");
				address = address.replace(" 7TH"," 07TH");
				address = address.replace(" SEVENTH"," 07TH");
				address = address.replace(" 8TH"," 08TH");
				address = address.replace(" EIGHTH"," 08TH");
				address = address.replace(" 9TH"," 09TH");
				address = address.replace(" NINETH"," 09TH");
				address = address.replace(" TENTH"," 10TH");
				address = address.replace(" ELEVENTH"," 11TH");
				address = address.replace(" TWELTH"," 12TH");
				address = address.replace(" THIRTEENTH"," 13TH");
				address = address.replace(" FOURTEENTH"," 14TH");
				address = address.replace(" FIFTHTEENTH"," 15TH");
				address = address.replace(" SIXTEENTH"," 16TH");
				address = address.replace(" SEVENTEENTH"," 17TH");
				address = address.replace(" EIGHTEENTH"," 18TH");
				address = address.replace(" NINETEENTH"," 19TH");
				address = address.replace(" TWENTIETH"," 20TH");
				address = address.replace(" TWENTY-FIRST"," 21ST");
				address = address.replace(" TWENTYFIRST"," 21ST");
				address = address.replace(" TWENTY-SECOND"," 22ND");
				address = address.replace(" TWENTYSECOND"," 22ND");
				address = address.replace(" TWENTY-THIRD"," 23RD");
				address = address.replace(" TWENTYTHIRD"," 23RD");
				address = address.replace(" TWENTY-FOURTH"," 24TH");
				address = address.replace(" TWENTYFOURTH"," 24TH");
				address = address.replace(" TWENTY-FIFTH"," 25TH");
				address = address.replace(" TWENTYFIFTH"," 25TH");
				address = address.replace(" TWENTY-SIXTH"," 26TH");
				address = address.replace(" TWENTYSIXTH"," 26TH");
				address = address.replace(" TWENTY-SEVENTH"," 27TH");
				address = address.replace(" TWENTYSEVENTH"," 27TH");
				address = address.replace(" TWENTY-EIGHTH"," 28TH");
				address = address.replace(" TWENTYEIGHTH"," 28TH");
				address = address.replace(" TWENTY-NINETH"," 29TH");
				address = address.replace(" TWENTYNINETH"," 29TH");
				address = address.replace(" THIRTIETH"," 30TH");
				address = address.replace(" THIRTY-FIRST"," 31ST");
				address = address.replace(" THIRTYFIRST"," 31ST");
				address = address.replace(" THIRTY-SECOND"," 32ND");
				address = address.replace(" THIRTYSECOND"," 32ND");
				address = address.replace(" THIRTY-THIRD"," 33RD");
				address = address.replace(" THIRTYTHIRD"," 33RD");
				address = address.replace(" THIRTY-FOURTH"," 34TH");
				address = address.replace(" THIRTYFOURTH"," 34TH");
				address = address.replace(" THIRTY-FIFTH"," 35TH");
				address = address.replace(" THIRTYFIFTH"," 35TH");
				address = address.replace(" THIRTY-SIXTH"," 36TH");
				address = address.replace(" THIRTYSIXTH"," 36TH");
				address = address.replace(" THIRTY-SEVENTH"," 37TH");
				address = address.replace(" THIRTYSEVENTH"," 37TH");
				address = address.replace(" THIRTY-EIGHTTH"," 38TH");
				address = address.replace(" THIRTYEITGHTH"," 38TH");
				address = address.replace(" THIRTY-NINETH"," 39TH");
				address = address.replace(" THIRTYNINETH"," 39TH");
				address = address.replace(" FOURTIETH"," 40TH");
				address = address.replace(" FOURTY-FIRST"," 41ST");
				address = address.replace(" FOURTYFIRST"," 41ST");
				address = address.replace(" FOURTY-SECOND"," 42ND");
				address = address.replace(" FOURTYSECOND"," 42ND");
				address = address.replace(" FOURTY-THIRD"," 43RD");
				address = address.replace(" FOURTYTHIRD"," 43RD");
				address = address.replace(" FOURTY-FOURTH"," 44TH");
				address = address.replace(" FOURTYFOURTH"," 44TH");
				address = address.replace(" FOURTY-FIFTH"," 45TH");
				address = address.replace(" FOURTYFIFTH"," 45TH");
				address = address.replace(" FOURTY-SIXTH"," 46TH");
				address = address.replace(" FOURTYSIXTH"," 46TH");
				address = address.replace(" FOURTY-SEVENTH"," 47TH");
				address = address.replace(" FOURTYSEVENTH"," 47TH");
				address = address.replace(" FOURTY-EIGHTH"," 48TH");
				address = address.replace(" FOURTYEIGHTH"," 48TH");
				
				address = address.replace(" SAN FRANCISCO, CA","");
				address = address.replace(" SAN FRANCISCO CA","");
				address = address.replace(", SAN FRANCISCO, CA","");
				address = address.replace(", SAN FRANCISCO CA","");
				
				address = address.replace(" SF, CA","");
				address = address.replace(" SF CA","");
				address = address.replace(", SF, CA","");
				address = address.replace(", SF CA","");
				
				if (address.indexOf("#")>-1) {
					address=address.substring(0,address.indexOf("#")-1)
				}
				//There are some street names in SF where avenue, lane and terrace appear in the middle of the address (they are not the street type), only replace these if they appear at the end of the address string
				if (address.substring(address.length,address.length-7)==" AVENUE") {
					address = address.substring(0,address.length-7) + " AVE"
				}
				if (address.substring(address.length,address.length-5)==" LANE") {
					address = address.substring(0,address.length-5) + " LN"
				}
				if (address.substring(address.length,address.length-6)==" PLAZA") {
					address = address.substring(0,address.length-6) + " PLZ"
				}
				if (address.substring(address.length,address.length-8)==" TERRACE") {
					address = address.substring(0,address.length-8) + " TER"
				}
				//alert(address)
				address = address.replace(" STREET"," ST");
				address = address.replace(" PLACE"," PL");
				//address = address.replace(" AVENUE"," AVE");
				address = address.replace(" ALLEY"," ALY");
				address = address.replace(" BOULEVARD"," BLVD");
				address = address.replace(" CIRCLE"," CIR");
				address = address.replace(" COURT"," CT");
				address = address.replace(" DRIVE"," DR");
				//address = address.replace(" HILL"," HL");
				address = address.replace(" HIGHWAY"," HWY");
				//address = address.replace(" LANE"," LN");
				//address = address.replace(" PLAZA"," PLZ");
				address = address.replace(" ROAD"," RD");
				//address = address.replace(" TERRACE"," TER");
				//alert(address)
				
				address = address.replace("'","")
				var stTypeExists = "false"
				switch (address.substring(address.length,address.length-3))
				{
				case " ST":
					stTypeExists = "true"
					break;
				case " PL":
					stTypeExists = "true"
					break;
				case " CT":
					stTypeExists = "true"
					break;
				case " DR":
					stTypeExists = "true"
					break;
				//case " HL":
				//	stTypeExists = "true"
				//	break;
				case " LN":
					stTypeExists = "true"
					break;
				case " RD":
					stTypeExists = "true"
					break;
				}
				
				switch (address.substring(address.length,address.length-4))
				{
				case " AVE":
					stTypeExists = "true"
					break;
				case " ALY":
					stTypeExists = "true"
					break;
				case " HWY":
					stTypeExists = "true"
					break;
				case " CIR":
					stTypeExists = "true"
					break;
				case " PLZ":
					stTypeExists = "true"
					break;
				case " TER":
					stTypeExists = "true"
					break;
				case " WAY":
					stTypeExists = "true"
					break;
				}
				
				switch (address.substring(address.length,address.length-5))
				{
				case " BLVD":
					stTypeExists = "true"
					break;
				case " WEST":
					stTypeExists = "true"
					break;
				case " EAST":
					stTypeExists = "true"
					break;
				}
				
				switch (address.substring(address.length,address.length-6))
				{
				case " SOUTH":
					stTypeExists = "true"
					break;
				case " NORTH":
					stTypeExists = "true"
					break;
				
				}

				//If the user has not entered a street type switch the search to look though the MAD field that doesn't include street type
				if (stTypeExists=="false") {
					searchtype = "ADDRESSNOTY";
				}
				
				$("#whichdistrict").html("<img src='/img/spinner.gif' width=50 height=50>");
				$("#whichdistrict").css("display","inline-block");
				
				$.getJSON( ("/districtlookup.php?q=Supervisor&addr=" + encodeURIComponent(address) + "&type=" + searchtype), function( data ) {
					console.log(data["district"]);
					$("#whichdistrict").html("<b>" + data["address"].toLowerCase().toTitleCase() + "</b> is in Supervisor District <b>" + data["district"] + "</b>");
				});
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
				background-image: url('../img/candidate_overlay.png');
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
			
			#whichdistrict {
				font-style: normal;
				font-weight: lighter;
				font-size: 20px;
				font-family: Avenir-Medium,"Avenir Medium",AvenirNext,"Avenir Next",Avenir,HelveticaNeue-UltraLight,"Helvetica Neue Ultra Light","Helvetica Neue-Ultra Light",Verdana,Tahoma,Geneva,Helvetica,Arial,sans-serif;
				display: none;
				position: relative;
				background-color: #fff;
				color: #000;
				text-shadow: none;
				padding: 10px 30px 10px 30px;
				border-radius: 10px;
				margin-top: 10px;
				line-height: 1em;
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
			
			.filter.small {
				height: 30px;
				line-height: 30px;
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
	
		<div id="bgphoto_short" style="background-image:url('../img/cityhall.jpg');"></div>
		<div id="bgphotoOverlay"></div>
		<div id="photo_overlay" class="short">
				<h1>2016 Fall Propositions</h1>
				<div class="overlay_sub">Find out which ballot initiatives have the greatest impact on transit</div>
		</div>		
		
		<!-- Nav -->
		<?php 
		echo file_get_contents("http://" . $_SERVER['HTTP_HOST'] . "/nav.php?class=short&page=rtv"); 
		?>
		
		
		<div id="content_wrapper_short" style="background-color:#f4f5f0;">
		
		
			
			<div id="content_wrapper_sub" style="background-color:#fff;">
			
				<div class="content_item" style="padding-top:50px;padding-bottom:60px;text-align:center;">
					<h1 style="line-height: 1.2em;padding: 0;margin:0;">Transit-Related Propositions</h1>
					<p class="centertext" style="min-height: 0;">There are three major ballot initiatives that have impacts on the quality of public transit in San Francisco and the Bay Area this fall. Below we outline why each of these measures is important.</p>
					<p><img src="../img/propsjkrr.png" width="426" height="200"></p>
			<a name="propositionj"> </a>
										
				</div>
			</div>
			
			<div id="content_wrapper_sub" style="background-color:#f4f5f0;">
			
				<div class="content_item" style="padding-top:0px;padding-bottom:20px;text-align:center;">
					<div class="member_profile noborder">
							<div class="centertext">
								<h1 style="line-height: 1.2em;padding: 0;margin:0;">Yes <span style="color:#3e464d;">on Prop J</span></h1>
								<p class="centertext" style="min-height: 0;">Propositions J and K combine to guarantee funding for two of the City's most important priorities: addressing our homelessness crisis and fixing roads and transit. Specifically, Prop J amends the city charter to create a Transportation Improvement Fund. This will go toward funding more BART and Muni trains to make moving around San Francisco easier and less crowded, while ensuring that fares for low-income families, youth, seniors, and people with disabilities remain affordable.  Indirectly, Prop. J will also free up resources for increases in Muni service, with better night and evening service high on people's priority lists.</p>
								<p style="padding-bottom: 30px;">This fund also provides for safety improvements like bike lanes and crosswalks, as well as a significant expansion in pothole and pavement repair&mdash;including on heavily used transit streets.
</p>
								<div class="stancetable" id="propj">
												
								</div>
			<a name="propositionk"> </a>
							</div>
						</div>
						
										
				</div>
			</div>
			<div id="content_wrapper_sub" style="background-color:#fff;">
			
				<div class="content_item" style="padding-top:5px;padding-bottom:20px;text-align:center;">
					<div class="member_profile noborder">
							<div class="centertext">
								<h1 style="line-height: 1.2em;padding: 0;margin:0;">Yes <span style="color:#3e464d;">on Prop K</span></h1>
								<p class="centertext" style="min-height: 0;">Simply put, <b>Prop K funds Prop J</b>. Without Prop K, Prop J becomes meaningless, because there are no funds to implement Prop J's programs, and Prop J will be voided.</p>
								<p style="padding-bottom: 30px;">Funds are provided by a sales tax that would add 0.75% increase to the existing tax. (The net increase will be 0.5%, as a 0.25% tax expires in December.) Propositions J and K go hand in hand and both must pass for improvements to take effect.</p>
								<div class="stancetable" id="propk">
												
								</div>
			<a name="propositionl"></a>
							</div>
						</div>
						
										
				</div>
			</div>
			
			<div id="content_wrapper_sub" style="background-color:#f4f5f0;">
			
				<div class="content_item" style="padding-top:5px;padding-bottom:20px;text-align:center;">
					<div class="member_profile noborder">
							<div class="centertext">
								<h1 style="line-height: 1.2em;padding: 0;margin:0;color:#3e464d;">No on Prop L</h1>
								<p class="centertext" style="min-height: 0;">Prop L proposes to change the way appointments are made to the SFMTA Board, by splitting appointments between the Mayor and the Board of Supervisors, and make it easier for the Board of Supervisors to overrule the SFMTA's budget. Unfortunately, this will make the SFMTA <i>more politically divisive</i> and likely more resistant to transportation improvements.</p>
								<p class="centertext" style="min-height: 0;padding-bottom: 30px;">For example, the SFMTA board recently voted to construct boarding islands along Taraval Street, a vital improvement to keep L-Taraval riders from continuing to get hit by cars when they alight at surface stops. Many spoke in opposition at the hearing, including the representative of Supervisor Norman Yee&mdash;coincidentally the sponsor of Prop L. That is the type of politics Prop L would introduce to SFMTA decision-making.</p>
							</div>
			<a name="propositionrr"></a>
						</div>
						
										
				</div>
			</div>
			
			<div id="content_wrapper_sub" style="background-color:#fff;">
			
				<div class="content_item" style="padding-top:5px;padding-bottom:20px;text-align:center;">
					<div class="member_profile noborder">
							<div class="centertext">
								<h1 style="line-height: 1.2em;padding: 0;margin:0;">Yes <span style="color:#3e464d;">on Prop RR</span></h1>
								<p class="centertext" style="min-height: 0;">BART is a critical regional transportation system not just for San Francisco, but the entire Bay Area. The system's 44 years are is beginning to show, and Proposition RR will help bring BART to a state of good repair, and allow BART to continue to provide a safe and reliable system, reduce crowding, keep cars off the roads, and protect our environment. Proposition RR includes a detailed plan of how BART will ensure the system can continue to operate reliably and safely.</p>
								<h3><a href="http://www.yesforbart.com/whymeasurerr">Learn More About Proposition RR &raquo;</a></h3>
								<div class="stancetable" id="proprr">
												
								</div>
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
