<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-76603688-1', 'auto');
  ga('send', 'pageview');

</script>

<div id="navbar_placeholder" <?php if($_GET['class']=='short') { echo 'class="short"'; } elseif($_GET['class']=='tall') { echo 'class="tall"'; } elseif($_GET['class']=='top') { echo 'class="top fixed"'; } elseif($_GET['class']=='med') { echo 'class="med"'; }  ?>></div>
<div id="navbar" <?php if($_GET['class']=='short') { echo 'class="short"'; } elseif($_GET['class']=='tall') { echo 'class="tall"'; } elseif($_GET['class']=='med') { echo 'class="med"'; } elseif($_GET['class']=='top') { echo 'class="top fixed"'; } ?>>
	<div id="nav_content">
		<div id="nav_left">
			<a href="/about/"><div id="" class="but<?php if($_GET['page']=='about') { echo ' butselected'; } ?>">About</div></a>
			<a href="/contact/"><div id="" class="but<?php if($_GET['page']=='contact') { echo ' butselected'; } ?>">Contact</div></a>
			<a href="/work/"><div id="" class="but<?php if($_GET['page']=='work') { echo ' butselected'; } ?>">Our Work</div></a>
		</div>
		<a href="/"><div id="nav_logo"></div></a>
		<?php if($_GET['page']=='ridethevote' || $_GET['page']=='rtv') { echo '<a href="/ridethevote/"><div id="nav_rtv_logo" class="' . $_GET['page'] . '"></div></a>'; } ?>
		<div id="nav_right">
			<a href="/involved/"><div id="" class="but<?php if($_GET['page']=='involved') { echo ' butselected'; } ?>">Get Involved</div></a>
			<a href="/join/"><div id="" class="but_default<?php if($_GET['page']=='join') { echo '_selected'; } ?>">Join / Renew</div></a>
		</div>
	</div>
	<div id="nav_menu" onclick="toggleSubnav();">
		MENU
	</div>
	<a id="nav_join" href="/join/">
		JOIN
	</a>
	<div id="nav_submenu">
		<a href="/about/">ABOUT</a>
		<a href="/contact/">CONTACT</a>
		<a href="/work/">OUR WORK</a>
		<a href="/involved/">GET INVOLVED</a>
	</div>
</div>