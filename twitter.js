// Twitter Feed Importer
var twitterFeed = "";
var articles = new Array();

$.getJSON('twitter.php', function(data) {
	var theCount = 0;
  $.each(data, function(i) {
  if(theCount > 4) {
	  return;
  }
    //console.log( data[i] );
    if(data[i]['text'] && data[i]['text'] != undefined && data[i]['text'].length > 0) {
    	var tweet = data[i]['text'];
    	var tweet_url = "";
    	var tweet_via = new Array();
		console.log( data[i] );
		
		if(tweet.match(/^@/)) {
			return;
		}
		
		// alert(tweet);
		
		var removetagsregex = /(#\w+\s*)$/ig;
		var removementionsregex = /(@\w+\s*)$/ig;
		for(var m=0 ; m < 999 ; m++) {
			var endit = 0;
			for(var l=0 ; l < 999 ; l++) {
				if(tweet.match(removetagsregex)) {
					console.log("match#");
					tweet = tweet.replace(removetagsregex," ");
					endit = 1;
				} else {
					break;
				}
			}
			console.log("done1");
			for(var l=0 ; l < 999 ; l++) {
				if(tweet.match(removementionsregex)) {
					console.log("match@");
					tweet = tweet.replace(removementionsregex,"");
					endit = 1;
				} else {
					break;
				}
				endit = 1;
			}
				console.log("done2");
			if(endit == 0) {
				console.log("end");
				break;
			}
		}
		
		
		
        var viaregex = /^[RM]T @(\S+):(\s+)/i;
        if(tweet.match(viaregex)) {
        	tweet_via = tweet.match(viaregex)[1];
        
			console.log(tweet_via);
			tweet = tweet.replace(viaregex, "");
			tweet = tweet + " (via @" + tweet_via + ")";
		}
		
		tweet = tweet.replace(/#(\w+)\s*/ig,"$1");
		
        var multiplementions = /(@\w+)\s+(@\w+)/ig;
        tweet = tweet.replace(multiplementions,"$1, $2");
        tweet = tweet.replace(multiplementions,"$1, $2");
        tweet = tweet.replace(multiplementions,"$1, $2");
		
		
        var mentionregex = /(@\w+)/ig;
        var mentions = tweet.match(mentionregex);
        if(tweet.match(mentionregex)) {
        	console.log(mentions);
	    	console.log ("pizzas");
        	for(var j=0 ; j < mentions.length ; j++) {
        		console.log(mentions[j]);
        		for(var k=0 ; k < data[i]['entities']['user_mentions'].length ; k++) {
					if("@" + data[i]['entities']['user_mentions'][k]['screen_name'].toLowerCase() == mentions[j].toLowerCase()) {
						var toreplacemention = new RegExp(mentions[j], "ig");
						tweet = tweet.replace(toreplacemention,data[i]['entities']['user_mentions'][k]['name']);
					}
        		}
        	}
		}
		     
			console.log(tweet);   
    	
//     	if(tweet.indexOf("http://") > -1 || tweet.indexOf("https://") > -1) {
    	if(data[i]['entities']['urls'].length > 0) {
	    	theCount++;
        	var regex = /(http:\/\/\S+|https:\/\/\S+)/ig;
            // tweet_url = tweet.match(regex)[0];
//             if(data[i]['entities']['urls'].length > 0) {
            		tweet_url = data[i]['entities']['urls'][0]['expanded_url'];
//             }
            // alert(tweet + " -- " + tweet_url);
            tweet = tweet.replace(/:\s*http:/ig, ". http:");
            tweet = tweet.replace(regex, "");
            var theNum = i;
            
			
			console.log( tweet_url );
	    	$.getJSON(('http://api.embed.ly/1/oembed?key=423dce35efdd424e94c864823ae49eb6&url=' + tweet_url), function(thumbdata) {
	    		//alert('hotit');
	    		// console.log('got data');
	    		console.log ("pizza");
	    		console.log (thumbdata);
	    		console.log (theNum);
	    		console.log( jQuery("#twitterfeed").children(".tweet").eq(theNum) );
	    		console.log(jQuery("#twitterfeed").children(".tweet").eq(theNum).children(".tweetimg").first().html());
	    		var tweetxt = jQuery("#twitterfeed").children(".tweet").eq(theNum).children(".tweetxt").first().html();
	    		
	    		// jQuery("#twitterfeed").children(".tweet").eq(theNum).children(".tweetimg").first().replaceWith("<div class='tweetimg'><img src=" + thumbdata['thumbnail_url'] + " width=100 height=100></div>");
	    		
	    		var thumbimg;
	    		if(thumbdata['thumbnail_url'].length > 3) {
	    			thumbimg = thumbdata['thumbnail_url'];
	    		} else if(tweet_url.match(/sfmta\.com/i)) {
		    		thumbimg = "/img/sfmta_logo.png";
	    		}
	    		
	    		jQuery("#twitterfeed").children(".tweet").eq(theNum).children(".tweetimg").first().css("background-image","url(" + thumbimg + ")");
	    		
	    		//jQuery("#twitterfeed").children(".tweet").eq(theNum).children(".tweetxt").first().children(".tweettitle").first().after("<div class='tweetxt' style='border-bottom: 1px solid #ccc;'>" + tweetxt + "<p style='font-size:14px'>" + thumbdata['description'] + "</p></div>");
	    		jQuery("#twitterfeed").children(".tweet").eq(theNum).children(".tweetxt").first().children(".tweettitle").first().after("<p style='font-size:14px'>" + thumbdata['description'] + "</p>");
			// console.log( thumbdata );
	    	});
	    	
	    	//423dce35efdd424e94c864823ae49eb6
        } 
        
    	// twitterFeed += "<div class='tweet'><div class='tweetimg'>hi</div><div class='tweetxt'>" + tweet + "</div></div>";
    	var replaceTxt = "<div class='tweetxt' style='border-bottom: 1px solid #ccc;'><p class='tweettitle'><b>" + tweet + "</b></p>";
    	if(tweet_url.length > 0) {
	    	replaceTxt += "<p><a href='" + tweet_url + "'>View Details &raquo;</a></p>";
    	}
    	
    	replaceTxt += "</div>";
    	
    	jQuery("#twitterfeed").children(".tweet").eq(theNum).children(".tweetxt").first().replaceWith(replaceTxt);
    	jQuery("#twitterfeed").children(".tweet").eq(theNum).css("display","block");
    }
    
  });
  //alert(twitterFeed);
  // jQuery("#twitterfeed").last().before(twitterFeed);
});