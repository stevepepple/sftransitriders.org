<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>
		<title>SFTRU - Join</title>

		<?php
		echo file_get_contents("http://" . $_SERVER['HTTP_HOST'] . "/header.php?ipad=" . (bool) strpos($_SERVER['HTTP_USER_AGENT'],'iPad'));
		?>

		<script language="javascript" type="text/javascript" src="validate.js"></script>
<script language="javascript" type="text/javascript">
	var crowdfundingURL = "http://indiegogo.com/projects/make-transit-awesome";

	function showHideMemberships() {
		var thisform = document.forms[0];
		var donation_type = thisform.donation_type;

		for (var i = 0; i < donation_type.length; i++) {
			if (donation_type[i].checked && (donation_type[i].value=="Donate" || donation_type[i].value=="IGG")) {
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
			if (donation_type[i].checked && donation_type[i].value=="IGG") {
				// Go to IndieGogo, not Membership
				window.location.href = crowdfundingURL;
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
	<body style="margin: 0;">

		<!-- Nav -->
		<?php
		echo file_get_contents("http://" . $_SERVER['HTTP_HOST'] . "/nav.php?class=top&page=" . basename(getcwd()));
		?>


		<div id="content_wrapper_verytop" style="background-color:#fff;">

			<form method="post" action="https://livablecity.org/donate-sftru/review.php" onsubmit="return validate();">
		    <input type="hidden" name="card_amount" value="">

			<div id="content_wrapper_sub" style="background-color:#fff;">
				<div class="content_item" style="padding-top:0px;padding-bottom:50px;">

					<h1>Donations &amp; Membership</h1>

						<p>The SF Transit Riders are working to create excellent public transit that attracts a growing number of passengers for a more livable city. <i>We rely on people like you who love San Francisco.</i> Thank you.</p>

						<p class="head"><h2>What type of donation are you making?</h2></p>

						<div class="radio bigbut" style="text-align:left;padding:10px 20px 10px 20px;margin-bottom:20px;text-transform: none !important;max-width: 800px;position:relative;display:inline-block;" onClick="location.href=crowdfundingURL;">
							<img src="/img/sftru_mtalogo.png" width=140 height=152 style="position:absolute;right:10px;top:10px;display: block;">
								<input type="radio" name="donation_type" value="IGG" onclick="showHideMemberships();" checked="true" style="vertical-align:middle;">
							 	<div style="display:inline-block;position:relative;max-width:calc(100% - 160px);">Support Our Indiegogo Campaign!</div><br/>
							 	<div class="emitalic" style="color:#fff !important;font-weight: normal;margin-left:26px;line-height:24px;display: inline-block;position:relative;max-width: 80%;max-width:calc(100% - 160px);">
							 		Earn great rewards and help bring the SF Transit Riders to the next level by supporting our <i>Make Transit Awesome</i> crowdfunding campaign on Indiegogo!
							 		<p><div class="but_default_selected" style="display:inline-block;">Only <?php

$date = strtotime("May 19, 2016 11:59 PM");
$remaining = $date - time();
$days_remaining = floor($remaining / 86400);
echo $days_remaining;

?> Days Left!</div></p>
<p>Donating to our Indiegogo campaign <b>does</b> count toward membership.</p>
							 	</div>
						</div>
						<p class="radio"><input type="radio" name="donation_type" value="Join" onclick="showHideMemberships();"> <b>Become a Member</b>
						<span class="emitalic">Join our community and support better transit.</span></p>
						<p class="radio"><input type="radio" name="donation_type" value="Renew" onclick="showHideMemberships();"> <b>Renew Membership</b>
						<span class="emitalic">Renew your membership to continue your support.</span></p>
						<p class="radio"><input type="radio" name="donation_type" value="Donate" onclick="showHideMemberships();"> <b>A One-Time Donation</b>
						<span class="emitalic">Any amount you are able to give is greatly appreciated.</span> </p>
						<p style="padding-top: 10px;"><a href="/business/">Looking for Business Memberships?</a></p>
				</div>
			</div>

			<div id="memberships" style="background-color:#f2f2f2;display: none;">
				<div class="content_item" style="padding-top:20px;padding-bottom:20px;">

					<p class="head"><h2>Select Your Membership Level</h2></p>

					<p class="radio">
						<input type="radio" name="membership" value="benefactor" id="selAmount">
						<span class="donation_amount">$1000+</span>
						<span class="donation_desc">
							<strong>Owl Benefactor</strong>
							<span class="emitalic">91-Owl: Longest route at 24.1 miles</span>
						</span></p>
					<p class="radio">
						<input type="radio" name="membership" value="patron" id="selAmount">
						<span class="donation_amount">$500 &ndash; $999</span>
						<span class="donation_desc">
							<strong>Sunset Patron</strong>
							<span class="emitalic">29-Sunset: Longest daytime route, 14.5 miles</span>
						</span></p>
					<p class="radio">
						<input type="radio" name="membership" value="sustainer" id="selAmount">
						<span class="donation_amount">$200 &ndash; $499</span>
						<span class="donation_desc">
							<strong>Oceanview Sustainer</strong>
							<span class="emitalic">M-Oceanview: Longest streetcar route, 9 miles</span>
						</span></p>
					<p class="radio">
						<input type="radio" name="membership" value="contributor" id="selAmount">
						<span class="donation_amount">$100 &ndash; $199</span>
						<span class="donation_desc">
							<strong>Mission Contributor</strong>
							<span class="emitalic">14-Mission: Longest trolley bus route, 7.8 miles</span>
						</span></p>
					<p class="radio">
						<input type="radio" name="membership" value="collector" id="selAmount">
						<span class="donation_amount">$50 &ndash; $99</span>
						<span class="donation_desc">
							<strong>Cable Car Collector</strong>
							<span class="emitalic">Powell-Hyde: Longest cable car route, 2.1 miles</span>
						</span></p>
					<p class="radio">
						<input type="radio" name="membership" value="member" id="selAmount">
						<span class="donation_amount">$25+</span>
						<span class="donation_desc">
							<strong>Standard Membership</strong>
							<span class="emitalic">&nbsp;</span>
						</span></span></p>
					<p class="radio">
						<input type="radio" name="membership" value="student" id="selAmount">
						<span class="donation_amount">$5+</span>
						<span class="donation_desc">
							<strong>Student Membership</strong>
							<span class="emitalic">&nbsp;</span>
						</span></span></p>

				</div>
			</div>


			<div id="content_wrapper_sub" style="background-color:#fff;">
				<div class="content_item" style="padding-top:20px;padding-bottom:50px;">

<p class="head"><input type="button" value="Continue to Donate &raquo;" class="but_default" onClick="continueDonation();"></p>

<p>&nbsp;</p>

						<p style="opacity:0.5;"><i>San Franciscans have consistently supported transit, and they deserve a reliable, robust, and 21st-century transit system. SFTRU's past accomplishments and future action plan are together delivering that change. By becoming a member, you'll join our community and support our work. We thank you!</i></p>

				</div>
			</div>
			</form>



			<!-- Footer -->
		<?php
		echo file_get_contents("http://" . $_SERVER['HTTP_HOST'] . "/footer.php");
		?>

		</div>


	</body>
</html>
