<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>
		<title>SFTRU - Opportunities</title>
		
		<noscript><meta http-equiv="refresh" content="0; URL=/join/nojs.php"/></noscript>
		
		<?php 
		echo file_get_contents("http://" . $_SERVER['HTTP_HOST'] . "/header.php?ipad=" . (bool) strpos($_SERVER['HTTP_USER_AGENT'],'iPad')); 
		?>
		
		<script language="javascript" type="text/javascript" src="validate.js"></script>
<script language="javascript" type="text/javascript">
	
	function showHideMemberships() {
		var thisform = document.forms[0];
		var donation_type = thisform.donation_type;
		
		for (var i = 0; i < donation_type.length; i++) {
			if (donation_type[i].checked && donation_type[i].value=="Donate") {
				document.getElementById("memberships").style.display = "none";
				break;
			} else if (donation_type[i].checked) {
				document.getElementById("memberships").style.display = "block";
				break;
			}
		}
	}
	
	function continueDonation() {
		var thisform = document.forms[0];
		var donation_type = thisform.donation_type;
		
		var donationURL = "https://sftru.nationbuilder.com/donate/";
		var membershipBaseURL = "https://sftru.nationbuilder.com/join_";
		
		for (var i = 0; i < donation_type.length; i++) {
			if (donation_type[i].checked && donation_type[i].value=="Donate") {
				// Go to Donation, not Membership
				window.location.href = donationURL;
				return true;
			}
		}
		
		var membership_type = thisform.membership;
		for (var i = 0; i < membership_type.length; i++) {
			if (membership_type[i].checked) {
				window.location.href = membershipBaseURL + membership_type[i].value;
				return true;
			}
		}
		
		// Didn't match anything -- nothing selected?
		alert("Please select a Membership Level.");

		
	}
	
function validate() {
	var bflag = false;
	var bOth = false;
	var thisform = document.forms[0];
	var chkGroup = thisform.amount;
	for (var i = 0; i < chkGroup.length; i++) {
		if (chkGroup[i].checked) {
			bflag = true;
			if (chkGroup[i].value=="other") {
				bOth = true;
				thisform.card_amount.value=thisform.othAmount.value;
			} else {
				thisform.card_amount.value=chkGroup[i].value;
			}
		}
	}
	if (!bflag)
		alert('Please select an amount to give.');
	else if (bOth && !isValidNum(thisform.othAmount.value))
		alert('Please enter the amount you wish to give.');
	else if (thisform.card_fname.value=="")
		alert('Please enter the billing first name.');
	else if (thisform.card_lname.value=="")
		alert('Please enter the billing last name.');
	else if (thisform.card_address1.value=="")
		alert('Please enter the billing street address.');
	else if (thisform.card_city.value=="")
		alert('Please enter the billing city.');
	else if (thisform.card_state.value=="")
		alert('Please enter the billing state.');
	else if (thisform.card_zip.value=="")
		alert('Please enter the billing zip code.');
/* 	else if (thisform.card_country.value=="") */
/* 		alert('Please enter the billing country.'); */
	else if (thisform.card_phone.value=="")
		alert('Please enter the billing telephone number.');
	else if (!(emailCheck(thisform.card_email.value)))
		alert('Please enter a valid email address.');
	else if (!CheckCardNumber(thisform))
		return false;
	else {
		if (bOth) {
			thisform.card_amount.value=thisform.othAmount.value;
		}
		return true;
	}
	return false;
}
</script>
		
	</head>
	<body style="margin: 0;" onScroll="blurPhoto();">	
	
		<div id="bgphoto_short" style="background-image:url('../img/sftr_church.jpg');"></div>
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
			
			<form method="post" action="https://livablecity.org/donate-sftru/review.php" onsubmit="return validate();">
		    <input type="hidden" name="card_amount" value="">
			
			<div id="content_wrapper_sub" style="background-color:#fff;">
				<div class="content_item" style="padding-top:0px;padding-bottom:50px;">


					<div class="member_profile">
						<h1>Job Opportunities</h1>
						
						<p>The SF Transit Riders are working to create excellent public transit that attracts a growing number of passengers for a more livable city. Join us and help shape the future of world-class transit in San Francisco!</p>
						<p>&nbsp;</p>
						
					</div>
						
					<div class="member_profile">
						<h2>Executive Director</h2>


<p>The San Francisco Transit Riders has a unique and exciting opportunity. We're seeking a dynamic, "startup" Executive Director with a love for urban living. We need a leader who can grow an all-volunteer grassroots organization into a staffed, powerful advocacy group. We need an organization with broad membership that represents the voice of the transit rider and advocates for effective change.</p>


<p>The successful candidate will have prior experience in achieving sustainable fund-raising at a non-profit or similar group. S/he will run the day to day operations with motivated volunteers, contractors, and a dedicated board. The successful candidate can translate the strategic direction and mission of the group into an achievable plan.</p>


<p><b>Responsibilities</b></p>
<ul>
<li>Fund-raising and building long-term sustainable sources of funding for the organization
<li>Planning and execution of initiatives and day to day operations
<li>Grow and diversify our membership and build coalitions with other city groups
<li>Representing transit riders and the SFTR with city and regional government and with other non-profits and neighborhood groups in San Francisco
</ul>

<p><b>Key Qualities</b>
<p>The individual we are looking for has a passion for and experience working in the area of transit, urban living, or other related areas.  S/he is comfortable in a start-up environment and has the vision and leadership skills to take the organization to the next level.  Our members are passionate about transit and they enjoy the interaction of being part of SFTR.  The right leader will leverage this social aspect of our work and create an engaging environment for members and volunteers.</p>


<p>Most importantly s/he has the entrepreneurial ability to build a sustainable funding stream.  SFTR had its most successful fundraising year ever in 2016 and we need a leader who can turn that success into year after year funding.  The position will pay a ramp-up salary for 6 months but the individual hired will need to fund her/his own further compensation through fundraising and membership growth.</p>




<p><b>Required Experience</b></p>
<ul>
<li>3-5 years of leadership experience in the nonprofit world, preferably with exposure to small, scrappy organizations.
<li>Proven ability as a fundraiser for a non-profit 
<li>Experience managing employees and volunteers 
<li>Planning and execution of events or initiatives 
<li>Experience with coalition building among non-profits and exposure to city politics
<li>Knowledge of San Francisco and bilingual Spanish or Cantonese a plus
</ul>

<p>If you are a steady, upbeat and organized leader, who cares about the vibrancy of cities and has experience building start-up non-profits we hope you will consider joining the San Francisco Transit Riders.</p>

<p>Please submit your application to <a href="mailto:jobs@sftransitriders.org">jobs@sftransitriders.org</a></p>
						<p>&nbsp;</p>
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
