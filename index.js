			// Test element we apply both kinds of transforms to:
			var testEl = document.createElement('div');
			testEl.style.MozTransform = 'translate(100px) rotate(20deg)';
			testEl.style.webkitTransform = 'translate(100px) rotate(20deg)';
			testEl.style.msTransform = 'translate(100px) rotate(20deg)';
			//testEl.style.OTransform = 'translate(100px) rotate(20deg)';
			var styleAttrLowercase = testEl.getAttribute('style').toLowerCase();
			
			// when we check for existence of it in the style attribute;
			// only valid ones will be there.
			var hasMozTransform = styleAttrLowercase.indexOf('moz') !== -1;
			var hasWebkitTransform = styleAttrLowercase.indexOf('webkit') !== -1;
			var hasOTransform = styleAttrLowercase.indexOf('O') !== -1;
			var hasMSTransform = styleAttrLowercase.indexOf('ms') !== -1;
			if(!hasMozTransform && !hasOTransform && !hasWebkitTransform) {
				//hasMSTransform = styleAttrLowercase.indexOf('transform') !== -1;
			}
		
			function centerPhoto() {
			
				document.getElementById("bgphoto").style.top = Math.min(0,((document.getElementById("content_wrapper").offsetTop - window.pageYOffset) / 2) - (document.getElementById("bgphoto").offsetHeight / 2)) + "px";
			}
			
			function swapStep(tStep) {
				document.getElementById(tStep).className = "tabButton_h";
				document.getElementById(tStep + "content").style.display = "block";
				
				for(var x = 2; x <= 5; x++) {
					if(("step"+x) != tStep) {
						document.getElementById("step"+x).className = "tabButton";
						document.getElementById("step" + x + "content").style.display = "none";
					}
				}
			}
			
			var currentPromo = 1;
			var promoRun = 0;
			
			function nextPromo() {
				var nextPromo = currentPromo+1;
				if(nextPromo > promoCount) {
					nextPromo = 1;
				}
				
				var curTransform = "-125%";
				if(promoRun == 0) {
					curTransform = "-25%";
				}
				
				$("#promo" + currentPromo).css({
				    transform: "translate3d("+curTransform+", 0, 0)",
				    opacity: 0
				});
				
				$("#promo" + currentPromo).on("transitionend webkitTransitionEnd oTransitionEnd MSTransitionEnd",
					function(e){
						$(this).css({ 
							left: "100%",
							transform: "translate3d(0, 0, 0)",
							display: "none"
						});
						// do something here
					    $(this).off(e);
				});
				
				
				$("#promo" + nextPromo).css({
					display: "block",
					left: "100%"
				});
				
				setTimeout(function () {
				    $("#promo" + nextPromo).css({
					    transform: "translate3d(-100%, 0, 0)",
					    opacity: 1
					});
			    }, 20);
				
				
				
				promoRun++;
				currentPromo = nextPromo;

				
				
/*
				$("#promo2").css("display","block");
				$("#promo2").css("left","0px");
				$("#promo2").css("opacity","1");
*/
			}
			
			
			function blurPhoto() {
				document.getElementById("photo_overlay").style.opacity = 1 - Math.max(Math.min(((1 - ((385 - window.pageYOffset) / 385)) * 1.5),1),0);
				document.getElementById("logo").style.opacity = 1 - Math.max(Math.min(((1 - ((385 - window.pageYOffset) / 385)) * 1.5),1),0);
				
//				100px over which to fade
//				Start @ 440
				document.getElementById("logo_s").style.opacity = 1 - (Math.min(Math.max(window.pageYOffset - 400,0),100) / 100);
					
				var scale = Math.max(Math.min(1-((window.pageYOffset/540)*0.61),1),0.39);
				var yMove = Math.max(Math.min((window.pageYOffset/580)*-340,0),-340);
				var opacity = Math.max(Math.min((window.pageYOffset/300),1),0);
				var blurbg = Math.max(Math.min((window.pageYOffset/580)*580,580),0) / -2;
				var logobg = Math.max(Math.min((window.pageYOffset/580)*580,580),0) / -4.5;
				
				if(hasWebkitTransform) {
					document.getElementById("bgphoto").style.webkitTransform = "translate3D(0,"+blurbg+"px,0)";
					document.getElementById("bgphoto2").style.webkitTransform = "translate3D(0,"+blurbg+"px,0)";
					document.getElementById("logo").style.webkitTransform = "scale("+ scale +")";
					document.getElementById("logo_s").style.webkitTransform = "scale("+ scale +")";
					document.getElementById("logowrap").style.webkitTransform = "translate3D(0,"+logobg+"px,0)";
					document.getElementById("photo_overlay").style.webkitTransform = "translate3D(0,"+(logobg*-1)+"px,0)";
				} else if(hasMSTransform) {
					document.getElementById("bgphoto").style.msTransform = "translate3D(0,"+blurbg+"px,0)";
					document.getElementById("bgphoto2").style.msTransform = "translate3D(0,"+blurbg+"px,0)";
					document.getElementById("logo").style.msTransform = "scale("+ scale +")";
					document.getElementById("logo_s").style.msTransform = "scale("+ scale +")";
					document.getElementById("logowrap").style.msTransform = "translate3D(0,"+logobg+"px,0)";
					document.getElementById("photo_overlay").style.msTransform = "translate3D(0,"+(logobg*-1)+"px,0)";
				} else if(hasMozTransform) {
					document.getElementById("bgphoto").style.mozTransform = "translate(0,"+blurbg+"px)";
					document.getElementById("bgphoto2").style.mozTransform = "translate(0,"+blurbg+"px)";
					document.getElementById("logo").style.mozTransform = "scale("+ scale +")";
					document.getElementById("logo_s").style.mozTransform = "scale("+ scale +")";
					document.getElementById("logowrap").style.mozTransform = "translate(0,"+logobg+"px)";
					document.getElementById("photo_overlay").style.mozTransform = "translate3D(0,"+(logobg*-1)+"px,0)";
				} else {
					document.getElementById("bgphoto").style.transform = "translate(0,"+blurbg+"px)";
					document.getElementById("bgphoto2").style.transform = "translate(0,"+blurbg+"px)";
					document.getElementById("logo").style.transform = "scale("+ scale +")";
					document.getElementById("logo_s").style.transform = "scale("+ scale +")";
					document.getElementById("logowrap").style.transform = "translate(0,"+logobg+"px)";
					document.getElementById("photo_overlay").style.transform = "translate3D(0,"+(logobg*-1)+"px,0)";
				}
				
				
				//document.getElementById("logo").style.webkitTransform = "scale("+ scale +") translate3D(0,"+yMove+"px,0)";
				document.getElementById("bgphoto2").style.opacity = opacity;
				
				var fixedHeight;
				
				
				if(document.getElementById("photo_overlay").classList.contains("short")) {
					fixedHeight = 380; //284
				} else if(document.getElementById("photo_overlay").classList.contains("tall")) {
					fixedHeight = (window.innerHeight*0.9) - 100;
				} else {
					fixedHeight = 580;
				}
/*
				if(getComputedStyle(document.getElementById("logo_s")).display == "none") {
					fixedHeight = 284;
				} else {
					fixedHeight = 580;
				}
*/
				
				document.getElementById("nav_logo").style.opacity = (Math.min(Math.max(window.pageYOffset - (fixedHeight - 100),0),100) / 100);
				
				
				if(window.pageYOffset >= fixedHeight) {
					if(document.getElementById("photo_overlay").classList.contains("short")) {
						document.getElementById("navbar").className = "short fixed";
					} else if(document.getElementById("photo_overlay").classList.contains("tall")) {
						document.getElementById("navbar").className = "tall fixed";
					} else {
						document.getElementById("navbar").className = "fixed";
					}
				} else {
					if(document.getElementById("photo_overlay").classList.contains("short")) {
						document.getElementById("navbar").className = "short";
					} else if(document.getElementById("photo_overlay").classList.contains("tall")) {
						document.getElementById("navbar").className = "tall";
					} else {
						document.getElementById("navbar").className = "";
					}
				}
				
			}
			
			
			/*
			function blurPhoto() {
				if(document.getElementById("content_wrapper").offsetTop != 285) {
			//alert(document.getElementById("content_wrapper").offsetTop);
				document.getElementById("photo_overlay").style.top = (window.pageYOffset / 2.5) + 120 + "px";
				document.getElementById("photo_overlay").style.opacity = 1 - Math.max(Math.min(((1 - ((385 - window.pageYOffset) / 385)) * 1.5),1),0);
				document.getElementById("bgphoto2").style.opacity = Math.max(Math.min(((1 - ((385 - window.pageYOffset) / 385)) * 4),1),0);
				document.getElementById("logo").style.width = 204 - (Math.max(Math.min(((1 - ((385 - window.pageYOffset) / 385)) * 1.5),1),0) * 120) + 'px';
				document.getElementById("logo").style.height = 204 - (Math.max(Math.min(((1 - ((385 - window.pageYOffset) / 385)) * 1.5),1),0) * 120) + 'px';
				//document.getElementById("logo").style.width = ((Math.max(Math.min(((((385 - window.pageYOffset) / 385)) * 1),1),0) * 120) + 84) + 'px';
				//document.getElementById("logo").style.height = ((Math.max(Math.min(((((385 - window.pageYOffset) / 385)) * 1),1),0) * 120) + 84) + 'px';
				document.getElementById("logo").style.top = 100 - (Math.max(Math.min(((1 - ((385 - window.pageYOffset) / 385)) * 1.5),1),0) * 90) + 'px';
				document.getElementById("logo_s").style.opacity = 1 - ((350 - Math.min(Math.max(250,window.pageYOffset),350)) / 100);
				document.getElementById("topbglineshadow").style.opacity = 1 - ((350 - Math.min(Math.max(250,window.pageYOffset),350)) / 100);
				
				}
			} */
			
			function hoverStory(tNum) {
				for(x = 1; x <= 3; x++) {
					if(x == tNum) {
						document.getElementById(("story" + tNum)).style.opacity = 1;
						document.getElementById(("story" + tNum)).style.borderColor = "#ff9a00";
					} else {
						document.getElementById(("story" + x)).style.opacity = 0.2;
						document.getElementById(("story" + x)).style.borderColor = "#fff";
					}
				}
			}
			
			function leaveStory() {
				for(x = 1; x <= 3; x++) {
					document.getElementById(("story" + x)).style.opacity = 1;
					document.getElementById(("story" + x)).style.borderColor = "#fff";
				}
			}