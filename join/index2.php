<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>
		<title>SFTRU - Join</title>
		
		<?php 
		echo file_get_contents("http://" . $_SERVER['HTTP_HOST'] . "/header.php?ipad=" . (bool) strpos($_SERVER['HTTP_USER_AGENT'],'iPad')); 
		?>
		
		<script language="javascript" type="text/javascript" src="validate.js"></script>
<script language="javascript" type="text/javascript">
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
						
						<p class="radio"><input type="radio" name="donation_type" value="Join"> <b>Become a Member</b>
						<span class="emitalic">Join our community and support better transit.</span></p>
						<p class="radio"><input type="radio" name="donation_type" value="Renew"> <b>Renew Membership</b>
						<span class="emitalic">Renew your membership to continue your support.</span></p>
						<p class="radio"><input type="radio" name="donation_type" value="Donate"> <b>A One-Time Donation</b>
						<span class="emitalic">Any amount you are able to give is greatly appreciated.</span> </p>
				</div>
			</div>
			
			<div id="content_wrapper_sub" style="background-color:#f2f2f2;">
				<div class="content_item" style="padding-top:20px;padding-bottom:50px;">
			
					<p class="head"><h2>Specific Campaign Interests (Optional)</h2></p>
					<p style='margin-top:-12px;'>Any specific campaigns you're interested in being a part of and supporting through your membership.</p>
			
					<p class="radio"><input type="checkbox" name="volunteer[]" value="Geary Rapid Transit" id="volunteer" 
						<?php if($_GET['campaign'] == 'geary') { echo 'checked="checked"'; }  ?>> 
						<b>Geary Rapid Transit</b></p>
					<p class="radio"><input type="checkbox" name="volunteer[]" value="Van Ness Rapid Transit" id="volunteer" 
						<?php if($_GET['campaign'] == 'vanness') { echo 'checked="checked"'; }  ?>> 
						<b>Van Ness Rapid Transit</b></p>
					<p class="radio"><input type="checkbox" name="volunteer[]" value="Transit Effectiveness" id="volunteer" 
						<?php if($_GET['campaign'] == 'tep') { echo 'checked="checked"'; }  ?>> 
						<b>Transit Effectiveness</b></p>
					<p class="radio"><input type="checkbox" name="volunteer[]" value="Ballot Initiatives" id="volunteer" 
						<?php if($_GET['campaign'] == 'ballot') { echo 'checked="checked"'; }  ?>> 
						<b>Ballot Initiatives</b></p>
					<p class="radio"><input type="checkbox" name="volunteer[]" value="All-Door Boarding" id="volunteer" 
						<?php if($_GET['campaign'] == 'alldoor') { echo 'checked="checked"'; }  ?>> 
						<b>All-Door Boarding</b></p>
					<p class="radio"><input type="checkbox" name="volunteer[]" value="All-Door Boarding" id="volunteer">
						<b>Other interest:</b> <input type="text" name="volunteer[]" size="30" id="volunteer" maxlength="40" class="textfield"></p>

				</div>
			</div>
			<div id="content_wrapper_sub" style="background-color:#e2e2e2;">
				<div class="content_item" style="padding-top:20px;padding-bottom:20px;">
					<p>Your tax deductible donation will be processed securely through our credit card processor. Your credit card bill will indicate Livable City, our fiscal sponsor, as the recipient. Our site uses SSL encryption and your credit card information is never stored on our server.</p>
				</div>
			</div>
			
			<div id="content_wrapper_sub" style="background-color:#f2f2f2;">
				<div class="content_item" style="padding-top:20px;padding-bottom:20px;">
						
						<p class="head"><h2>Membership Level</h2></p>
						
<p class="radio"><input type="radio" name="amount" value="1000" id="selAmount"> <strong>$1000 Owl Benefactor</strong>
	<span class="emitalic">91-Owl: Longest route at 24.1 miles</span></p>
<p class="radio"><input type="radio" name="amount" value="500" id="selAmount"> <strong>$500 Sunset Patron</strong>
	<span class="emitalic">29-Sunset: Longest daytime route, 14.5 miles</span></p>
<p class="radio"><input type="radio" name="amount" value="200" id="selAmount"> <strong>$200 Oceanview Contributor</strong>
	<span class="emitalic">M-Oceanview: Longest streetcar route, 9 miles</span></p>
<p class="radio"><input type="radio" name="amount" value="100" id="selAmount"> <strong>$100 Mission Sustainer</strong>
	<span class="emitalic">14-Mission: Longest trolley bus route, 7.8 miles</span></p>
<p class="radio"><input type="radio" name="amount" value="75" id="selAmount"> <strong>$75 Cable Car Collector</strong>
	<span class="emitalic">Powell-Hyde: Longest cable car route, 2.1 miles</span></p>
<p class="radio"><input type="radio" name="amount" value="25" id="selAmount"> <strong>$25 Annual Membership</strong></p>
<p class="radio"><input type="radio" name="amount" value="other" id="selAmount"> <strong>Other amount:</strong> $<input type="text" name="othAmount" size="6" id="othAmount" maxlength="8" onfocus="document.forms[0].amount[6].checked=true;" class="textfield"></p>


				</div>
			</div>
			
			
			<div id="content_wrapper_sub" style="background-color:#fff;">
				<div class="content_item" style="padding-top:20px;padding-bottom:50px;">

					<div class="member_profile">
					

<p style="vertical-align:top;"><div style="display:inline-block;vertical-align:top;width:550px;"><p><h2>Billing Information</h2><p><table border="0" cellspacing="0" cellpadding="6">
	<tr>
		<td valign="top" align=right>Name:</td>
		<td align=left><input type="text" name="card_fname" id="FirstName" value="" size="40" class="textfield firstname" placeholder="First Name"><input 
				   type="text" name="card_lname" id="LastName" value="" size="40" class="textfield lastname" placeholder="Last Name"></td>
	</tr>
	<tr>
		<td align=right>Company:</td>
		<td align=left><input type="text" name="company" id="Company" value="" size="40" class="textfield fulltextwidth" placeholder="(Optional)"></td>
	</tr>
	<tr>
		<td valign="top" align=right>Address:</td>
		<td>
			<input type="text" name="card_address1" id="BillingAddressLine1" value="" size="40" class="textfield fulltextwidth" placeholder="Line 1"><br>
			<input type="text" name="card_address2" id="BillingAddressLine2" value="" size="40" class="textfield fulltextwidth" placeholder="Line 2">
			<div id="citybox">City<br><input type="text" name="card_city" id="BillingAddressCity" value="" size="20" maxlength="50" class="textfield city"></div>
			<div id="statebox">State<br><input type="text" name="card_state" id="BillingAddressState" value="" size="3" maxlength="2" class="textfield state"></div>
			<div id="zipbox">Zip<br><input type="text" name="card_zip" id="BillingAddressZip" value="" size="5" maxlength="6" class="textfield zip"></div>
		</td>
	</tr>
	<tr>
		<td align=right valign=top>Contact:</td>
		<td align=left valign=top><input type="text" name="card_phone" id="card_phone" value="" size="40" maxlength="30" class="textfield phone" placeholder="Telephone"><input type="text" name="card_email" id="Email" value="" size="40" class="textfield email" placeholder="Email">
	</tr>
	<tr valign="top">
		<td align=right>Comments:</td>
		<td align=left><textarea name="comments" rows="3" columns="40" placeholder="What transit lines do you ride?" class="textfield fulltextwidth"></textarea>
	</tr>
</table></div>

<div style="display:inline-block;vertical-align:top;width:440px;margin:0;">
<p><h2>Payment Information</h2><p>
<p><table border="0" cellspacing="0" cellpadding="6">
	<tr>
		<td align=right>Payment Type:</td>
		<td align=left>
<select name="card_type" id="PaymentType" class="but_popup" style="width:230px;max-width:85%;">
<option value="visa">Visa</option>
<option value="mc">Mastercard</option>
</select>
		</td>
	</tr>
	<tr>
		<td align=right>Credit Card #:</td>
		<td align=left><input type="text" name="card_number" id="CreditCardNumber" value="" size="20" maxlength="20" class="textfield" style="width:212px;max-width:77%;"></td>
	</tr>
	<tr>
		<td align=right>Expiration:</td>
		<td align=left>
<select name = "card_expmonth" id="CardExpMonth" class="but_popup" style="width:130px;max-width:46%;">
<option value = "">Month</option>
<option value = "01">1 - Jan</option>
<option value = "02">2 - Feb</option>
<option value = "03">3 - Mar</option>
<option value = "04">4 - Apr</option>
<option value = "05">5 - May</option>
<option value = "06">6 - Jun</option>
<option value = "07">7 - Jul</option>
<option value = "08">8 - Aug</option>
<option value = "09">9 - Sep</option>
<option value = "10">10 - Oct</option>
<option value = "11">11 - Nov</option>
<option value = "12">12 - Dec</option>
</select><select name = "card_expyear" id="CardExpYear" class="but_popup" style="margin-left:10px;width:90px;max-width:34%;">
<option value = "">Year</option>
<option value = "12">2012</option>
<option value = "13">2013</option>
<option value = "14">2014</option>
<option value = "15">2015</option>
<option value = "16">2016</option>
<option value = "17">2017</option>
<option value = "18">2018</option>
<option value = "19">2019</option>
<option value = "20">2020</option>
</select>
		</td>
	</tr>
	<tr><td></td><td><p class="head"><img src="http://livablecity.org/donate/quickssl_static.gif" border="0" width="115" height="55"></p></td></tr>
</table>
</p>
</div>
<p>&nbsp;</p>
</div>

<p class="head" style="width:100%;align:center;text-align:center;"><input type="submit" value="Confirm Details and Review Payment &raquo;" class="but_default"></p>
</form>

<p>&nbsp;</p>
						
						<p style="opacity:0.5;"><i>San Franciscans have consistently supported transit, and they deserve a reliable, robust, and 21st-century transit system. SFTRU's past accomplishments and future action plan are together delivering that change. By becoming a member, you'll join our community and support our work. We thank you!</i></p>
							
				</div>
			</div>
			
			
		
			<!-- Footer -->
		<?php 
		echo file_get_contents("http://" . $_SERVER['HTTP_HOST'] . "/footer.php"); 
		?>

		</div>

		
	</body>
</html>
