
		
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
			
			function blurPhoto() {
			
				document.getElementById("photo_overlay").style.opacity = 1 - Math.max(Math.min(((1 - ((385 - window.pageYOffset) / 385)) * 1.5),1),0);
				var scale = Math.max(Math.min(1-((window.pageYOffset/540)*0.61),1),0.39);
				var yMove = Math.max(Math.min((window.pageYOffset/580)*-340,0),-340);
				var opacity = Math.max(Math.min((window.pageYOffset/300),1),0);
				//var blurbg = Math.max(Math.min((window.pageYOffset/300)*300,300),0) / -2;
				var blurbg = Math.min((window.pageYOffset/300)*300,300) / -2;
				var overlaybg = Math.max(Math.min((window.pageYOffset/300)*300,300),0) / 2.5;
				if(document.getElementById("bgphoto_short").classList.contains("ridethevote")) {
					document.getElementById("nav_rtv_logo").style.opacity = (Math.min(Math.max(window.pageYOffset - (500 - 100),0),100) / 100);
					if((Math.min(Math.max(window.pageYOffset - (500 - 100),0),100) / 100) <= 0.1) {
						document.getElementById("nav_rtv_logo").style.pointerEvents = "none";
					} else {
						document.getElementById("nav_rtv_logo").style.pointerEvents = "all";
					}
					if(window.pageYOffset < 0) {
						document.getElementById("photo_overlay").style.webkitTransform = "translate3D(0,"+overlaybg+"px,0)";
						document.getElementById("bgphoto_short").style.webkitTransform = "translate3D(0,"+blurbg/2+"px,0)";
					}
				} else {
					document.getElementById("photo_overlay").style.webkitTransform = "translate3D(0,"+overlaybg+"px,0)";
					document.getElementById("bgphoto_short").style.webkitTransform = "translate3D(0,"+blurbg+"px,0)";
				}
				
				var elementExists = document.getElementById("bgphoto2_short");
				if(typeof(elementExists) != 'undefined' && elementExists != null) {
					document.getElementById("bgphoto2_short").style.webkitTransform = "translate3D(0,"+blurbg+"px,0)";
					document.getElementById("bgphoto2_short").style.opacity = opacity;
				}
				
				var shortHeight;
				if(getComputedStyle(document.getElementById("nav_left")).opacity == 0) {
					shortHeight = 240;
				} else {
					shortHeight = 380;
				}
				
				if(window.pageYOffset >= shortHeight) {
					document.getElementById("navbar").className = "short fixed";
				} else {
					document.getElementById("navbar").className = "short";
				}
				
			}
			
			function scrollTall() {
				if(window.pageYOffset >= 580) {
					document.getElementById("navbar").className = "tall fixed";
				} else {
					document.getElementById("navbar").className = "tall";
				}
			}
			
			function scrollMed() {
				if(window.pageYOffset >= 580) {
					document.getElementById("navbar").className = "fixed";
				} else {
					document.getElementById("navbar").className = "";
				}
			}
			
			function toggleSubnav() {
				
				if(getComputedStyle(document.getElementById("navbar")).height == "120px") {
					document.getElementById("navbar").style.height = "60px";
					document.getElementById("nav_menu").innerHTML = "MENU";
				} else {	
					document.getElementById("navbar").style.height = "120px";
					document.getElementById("nav_menu").innerHTML = "CLOSE";
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