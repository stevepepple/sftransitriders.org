<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>
		<title>SFTRU - Join</title>
		
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

					<h1>Business Membership</h1>
					
					<p>You know San Francisco is one of the best cities in the world, that's why you chose to locate your business here. There are many things that make San Francisco a world-class city, but our transit system is not one of them...<i>yet</i>. That's what we work to change, and you can join us! A truly livable city is one where everyone can use a sustainable mode to commute to work.  Demonstrate your commitment to robust, reliable public transit by supporting SF Transit Riders with a Business Membership.</p>
						
				</div>
			</div>
			
			<div id="memberships" style="background-color:#f2f2f2;">
				<div class="content_item" style="padding-top:20px;padding-bottom:20px;">
						
					<p class="head"><h2>Select Your Membership Level</h2></p>
						
					<p class="radio">
						<input type="radio" name="membership" value="platinum" id="selAmount">
						<span class="donation_amount">$5000 / year</span>
						<span class="donation_desc">
							<strong>Platinum Level Business Membership</strong>
							<span class="emitalic"><a href="">Learn More about our Platinum Level</a></span>
						</span></p>
					<p class="radio">
						<input type="radio" name="membership" value="gold" id="selAmount"> 
						<span class="donation_amount">$2500 / year</span>
						<span class="donation_desc">
							<strong>Gold Level Business Membership</strong>
							<span class="emitalic"><a href="">Learn More about our Gold Level</a></span>
						</span></p>
					<p class="radio">
						<input type="radio" name="membership" value="silver" id="selAmount"> 
						<span class="donation_amount">$1000 / year</span>
						<span class="donation_desc">
							<strong>Silver Level Business Membership</strong>
							<span class="emitalic"><a href="">Learn More about our Silver Level</a></span>
						</span></p>
					<p class="radio">
						<input type="radio" name="membership" value="bronze" id="selAmount"> 
						<span class="donation_amount">$500 / year</span>
						<span class="donation_desc">
							<strong>Bronze Level Business Membership</strong>
							<span class="emitalic"><a href="">Learn More about our Bronze Level</a></span>
						</span></p>
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
