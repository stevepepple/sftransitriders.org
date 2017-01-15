function isValidNum(str){
	var SETOFint= '.0123456789';
	if (str=="")
		return false;
	for(var i=0; i< str.length; i++)
		if(SETOFint.indexOf(str.charAt(i))==-1 )
			return false;
   return true;
}

function emailCheck (emailStr) {
	var emailPat=/^(.+)@(.+)$/;
	var specialChars="\\(\\)<>@,;:\\\\\\\"\\.\\[\\]";
	var validChars="\[^\\s" + specialChars + "\]";
	var quotedUser="(\"[^\"]*\")";
	var ipDomainPat=/^\[(\d{1,3})\.(\d{1,3})\.(\d{1,3})\.(\d{1,3})\]$/;
	var atom=validChars + '+';
	var word="(" + atom + "|" + quotedUser + ")";
	var userPat=new RegExp("^" + word + "(\\." + word + ")*$");
	var domainPat=new RegExp("^" + atom + "(\\." + atom +")*$");

	var matchArray=emailStr.match(emailPat);
	if (matchArray==null)
		return false;

	var user=matchArray[1];
	var domain=matchArray[2];

	if (user.match(userPat)==null)
	    return false;

	var IPArray=domain.match(ipDomainPat);
	if (IPArray!=null) {
		for (var i=1;i<=4;i++)
	    	if (IPArray[i]>255)
				return false;
		return true;
	}

	var domainArray=domain.match(domainPat);
	if (domainArray==null)
	    return false;
	
	var atomPat=new RegExp(atom,"g");
	var domArr=domain.match(atomPat);
	var len=domArr.length;
	if (domArr[domArr.length-1].length<2 || domArr[domArr.length-1].length>4)
		return false;
	if (len<2)
	   return false;
	return true;
}

var Cards = new makeArray(4);
Cards[0] = new CardType("MasterCard", "51,52,53,54,55", "16");
var Mastercard = Cards[0];
Cards[1] = new CardType("Visa", "4", "13,16");
var Visa = Cards[1];
Cards[2] = new CardType("AmEx", "34,37", "15");
var AmEx = Cards[2];
Cards[3] = new CardType("Discover", "6011", "16");
var Discover = Cards[3];
var LuhnCheckSum = Cards[4] = new CardType();

function CheckCardNumber(form) {
var tmpyear;

card = form.card_type.options[form.card_type.selectedIndex].value;
if (card=='') {
	alert("Please select the credit card type.");
	return false;
}

if (form.card_number.value.length == 0) {
	alert("Please enter a card number.");
	form.card_number.focus();
	return false;
}

if (form.card_expmonth.selectedIndex == 0) {
	alert("Please select the expiration month.");
	form.card_expmonth.focus();
	return false;
}

if (form.card_expyear.selectedIndex == 0) {
	alert("Please select the expiration year.");
	form.card_expyear.focus();
	return false;
}

tmpyear = "20" + form.card_expyear.options[form.card_expyear.selectedIndex].value;
tmpmonth = form.card_expmonth.options[form.card_expmonth.selectedIndex].value;

if (!(new CardType()).isExpiryDate(tmpyear, tmpmonth)) {
	alert("This card has already expired.");
	return false;
}

var retval = eval(card + ".checkCardNumber(\"" + form.card_number.value + "\", " + tmpyear + ", " + tmpmonth + ");");
cardname = "";
if (retval) {
// comment this out if used on an order form
	return true;
} else {
// The cardnumber has the valid luhn checksum, but we want to know which
// cardtype it belongs to.
for (var n = 0; n < Cards.size; n++) {
if (Cards[n].checkCardNumber(form.card_number.value, tmpyear, tmpmonth)) {
cardname = Cards[n].getCardType();
break;
   }
}
if (cardname.length > 0) {
alert("This looks like a " + cardname + " number, not a " + card + " number.");
}
else {
alert("This card number is not valid. Please make sure you've entered all the numbers correctly with no spaces or dashes.");
      }
   }
   	return false;
}

function CardType() {
var n;
var argv = CardType.arguments;
var argc = CardType.arguments.length;

this.objname = "object CardType";

var tmpcardtype = (argc > 0) ? argv[0] : "CardObject";
var tmprules = (argc > 1) ? argv[1] : "0,1,2,3,4,5,6,7,8,9";
var tmplen = (argc > 2) ? argv[2] : "13,14,15,16,19";

this.setCardNumber = setCardNumber;  // set CardNumber method.
this.setCardType = setCardType;  // setCardType method.
this.setLen = setLen;  // setLen method.
this.setRules = setRules;  // setRules method.
this.setExpiryDate = setExpiryDate;  // setExpiryDate method.

this.setCardType(tmpcardtype);
this.setLen(tmplen);
this.setRules(tmprules);
if (argc > 4)
this.setExpiryDate(argv[3], argv[4]);

this.checkCardNumber = checkCardNumber;  // checkCardNumber method.
this.getExpiryDate = getExpiryDate;  // getExpiryDate method.
this.getCardType = getCardType;  // getCardType method.
this.isCardNumber = isCardNumber;  // isCardNumber method.
this.isExpiryDate = isExpiryDate;  // isExpiryDate method.
this.luhnCheck = luhnCheck;// luhnCheck method.
return this;
}

function checkCardNumber() {
var argv = checkCardNumber.arguments;
var argc = checkCardNumber.arguments.length;
var cardnumber = (argc > 0) ? argv[0] : this.cardnumber;
var year = (argc > 1) ? argv[1] : this.year;
var month = (argc > 2) ? argv[2] : this.month;

this.setCardNumber(cardnumber);
this.setExpiryDate(year, month);

if (!this.isCardNumber())
return false;
if (!this.isExpiryDate())
return false;

return true;
}

function getCardType() {
return this.cardtype;
}

function getExpiryDate() {
return this.month + "/" + this.year;
}

function isCardNumber() {
var argv = isCardNumber.arguments;
var argc = isCardNumber.arguments.length;
var cardnumber = (argc > 0) ? argv[0] : this.cardnumber;
if (!this.luhnCheck())
return false;

for (var n = 0; n < this.len.size; n++)
if (cardnumber.toString().length == this.len[n]) {
for (var m = 0; m < this.rules.size; m++) {
var headdigit = cardnumber.substring(0, this.rules[m].toString().length);
if (headdigit == this.rules[m])
return true;
}
return false;
}
return false;
}

function isExpiryDate() {
var argv = isExpiryDate.arguments;
var argc = isExpiryDate.arguments.length;

year = argc > 0 ? argv[0] : this.year;
month = argc > 1 ? argv[1] : this.month;

if (!isNum(year+""))
return false;
if (!isNum(month+""))
return false;
today = new Date();
expiry = new Date(year, month);
if (today.getTime() > expiry.getTime())
return false;
else
return true;
}

function isNum(argvalue) {
argvalue = argvalue.toString();

if (argvalue.length == 0)
return false;

for (var n = 0; n < argvalue.length; n++)
if (argvalue.substring(n, n+1) < "0" || argvalue.substring(n, n+1) > "9")
return false;

return true;
}

function luhnCheck() {
var argv = luhnCheck.arguments;
var argc = luhnCheck.arguments.length;

var CardNumber = argc > 0 ? argv[0] : this.cardnumber;

if (! isNum(CardNumber)) {
return false;
  }

var no_digit = CardNumber.length;
var oddoeven = no_digit & 1;
var sum = 0;

for (var count = 0; count < no_digit; count++) {
var digit = parseInt(CardNumber.charAt(count));
if (!((count & 1) ^ oddoeven)) {
digit *= 2;
if (digit > 9)
digit -= 9;
}
sum += digit;
}
if (sum % 10 == 0)
return true;
else
return false;
}

function makeArray(size) {
this.size = size;
return this;
}

function setCardNumber(cardnumber) {
this.cardnumber = cardnumber;
return this;
}

function setCardType(cardtype) {
this.cardtype = cardtype;
return this;
}

function setExpiryDate(year, month) {
this.year = year;
this.month = month;
return this;
}

function setLen(len) {
// Create the len array.
if (len.length == 0 || len == null)
len = "13,14,15,16,19";

var tmplen = len;
n = 1;
while (tmplen.indexOf(",") != -1) {
tmplen = tmplen.substring(tmplen.indexOf(",") + 1, tmplen.length);
n++;
}
this.len = new makeArray(n);
n = 0;
while (len.indexOf(",") != -1) {
var tmpstr = len.substring(0, len.indexOf(","));
this.len[n] = tmpstr;
len = len.substring(len.indexOf(",") + 1, len.length);
n++;
}
this.len[n] = len;
return this;
}

function setRules(rules) {
// Create the rules array.
if (rules.length == 0 || rules == null)
rules = "0,1,2,3,4,5,6,7,8,9";
  
var tmprules = rules;
n = 1;
while (tmprules.indexOf(",") != -1) {
tmprules = tmprules.substring(tmprules.indexOf(",") + 1, tmprules.length);
n++;
}
this.rules = new makeArray(n);
n = 0;
while (rules.indexOf(",") != -1) {
var tmpstr = rules.substring(0, rules.indexOf(","));
this.rules[n] = tmpstr;
rules = rules.substring(rules.indexOf(",") + 1, rules.length);
n++;
}
this.rules[n] = rules;
return this;
}
