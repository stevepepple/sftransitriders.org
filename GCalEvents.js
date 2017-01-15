// Gratefully derived from Kevin Deldycke's post on 7/12/12
// http://kevin.deldycke.com/2012/07/displaying-upcoming-events-google-calendar-javascript
function GCalEvents(gcal_json_url) {


        // Get list of upcoming iCal events formatted in JSON
        jQuery.getJSON(gcal_json_url, function(data){
        
        	var firstBoard = 0;
        	var firstTAC = 0;

            // Parse and render each event
            jQuery.each(data.items, function(i, item){
                if(i == 0) {
                	if(jQuery("#gcal-events").length > 0) {
	                    jQuery("#gcal-events").first().hide();
	                }
                };
                
                // event title
                var event_title = item.summary;
                
                // event url
                var event_url = item.htmlLink;
                
                // event contents
                var event_contents = jQuery.trim(item.description);
                
                // make each separate line a new list item
                event_contents = event_contents.replace(/\n\n/g,"\n");
                event_contents = event_contents.replace(/\n\n/g,"\n");
                event_contents = event_contents.replace(/\n\n/g,"\n");
                event_contents = event_contents.replace(/\n\n/g,"\n");
                event_contents = event_contents.replace(/\n/g,"<br>");
                
                if(event_contents.indexOf("http://sftru.") > -1) {
                	var regex = /(http:\/\/sftru\.\S+)/;
	                event_url = event_contents.match(regex)[0];
	                event_contents = event_contents.replace(regex, "");
                } 
                /* else if(event_contents.match(/(http:\/\/(www.|)facebook\.\S+)/)) {
                	var regex = /(http:\/\/(www.|)facebook\.\S+)/;
	                event_url = event_contents.match(regex)[0];
	                event_contents = event_contents.replace(regex, "");
                } */
                event_contents = event_contents.replace(/<br><br>/g,"<br>");
                event_contents = event_contents.replace(/<br>$/g,"");
                if(event_contents.split('<br>').length > 2) {
	                event_contents = event_contents.split('<br>')[0] + " " + event_contents.split('<br>')[1];
	            }
                
                // event start date/time
                var event_start_date = new Date(item.start.dateTime);
                
                // if event has a start time (as oppose to all day), format date with time
                if(event_start_date.getHours() != 0 || event_start_date.getMinutes() != 0) {
                    //var event_start_str = event_start_date.toString("YYYY-MM-ddThh:mm:ss-06:00");
                    //var event_start_str = event_start_date.toISOString();
                    var event_start_str = event_start_date.toString("h:mm tt : dddd MMMM d");
                    var event_start_smstr = event_start_date.toString("h:mm tt, dddd MMM d");
                } else {
                // otherwise format start as date only (without time)
                    var event_start_str = event_start_date.toString("dddd MMMM d");  
                    var event_start_smstr = event_start_date.toString("ddd MMM d");              
                };
                
                // event location - if not null, surround with parens
                var event_loc = item.location;
                var location = "";
                if(event_loc != "") {
                	if(event_loc.indexOf(",") > -1) {
	                	location = event_loc.substring(0,event_loc.indexOf(","))
	                } else {
		                location = event_loc;
	                }
	                event_loc = "<span class='eventloc'>&nbsp;&nbsp;&mdash;&nbsp;&nbsp;at " + location + "</span>";
	            };
                
                var iconImg = "";
                
                if(event_title.toLowerCase().indexOf('board') > -1) {
                	if(firstBoard > 0) {
	                	return;
                	}
                	iconImg = "_board";
                	firstBoard = 1;
                } else if(event_title.toLowerCase().indexOf('transit action') > -1) {
                	if(firstTAC > 0) {
	                	return;
                	}
                	iconImg = "_tac";
                	firstTAC = 1;
                	jQuery("#nextTAC").first().hide();
                	jQuery("#nextTAC").last().before("<a href='"+event_url+"'>Next Meeting: " + event_start_smstr + " &raquo;</a>");
                	
                } else if(event_title.toLowerCase().indexOf('crawl') > -1) {
                	iconImg = "_party";
                } else if(event_title.toLowerCase().indexOf('party') > -1) {
                	iconImg = "_party";
                } else if(event_title.toLowerCase().indexOf('tac') > -1) {
                	if(firstTAC > 0) {
	                	return;
                	}
                	iconImg = "_tac";
                	firstTAC = 1;
                }
                
                
                if(jQuery("#gcal-events").length > 0) {
                // Render the event
	                jQuery("#gcal-events").last().before(
	                    "<a class='eventdiv' href='"
	                    + event_url
	                    + "'><table border=0 cellpadding=0 cellspacing=0><tr><td valign=top><img src='img/cal"
	                    + iconImg
	                    + ".png' width=100 height=100></td><td valign=middle style='padding-left:40px;'>"
	                    + "<h2 style='margin:0;'>" + event_title + "</h2>"
	                    + event_contents
	                    + "<br><span class='datetime'>" + event_start_str + event_loc + "</span></td></tr></table></a>"
						);
				}
            });
        });
    }