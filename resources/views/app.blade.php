<!DOCTYPE html>
<html>
	<head>
		<meta name="tags" content="pony,ponys,fur,furs,mlp,fim,music,radio,hive,media,changeling,fandom">
		<meta name="author" content="Hive Media Productions">
		<meta name="description" content="">
		
		<title>The Hive Radio - A station by changelings, for everyone!</title>
		
		<link href="http://fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic,700italic" rel="stylesheet" type="text/css">
		<link href="http://netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.css" rel="stylesheet">
		<link href="{{URL::to('/')}}/css/unsemantic-grid-responsive.css" type="text/css" rel="stylesheet">
		<link href="{{URL::to('/')}}/css/style.css" type="text/css" rel="stylesheet">
	</head>
	
	<body>
		<!-- *** SITE HEADER *** -->
		<header>
			<div id="site-header" class="grid-container">
				<div class="site-logo grid-50">
					<img src="https://hiveradio.net/wp-content/themes/The%20Hive%20Radio/images/logo.png">
				</div>
				
				<!--<div class="site-text grid-45">
					<img src="{{URL::to('/')}}/img/logo-text.png">
				</div>		-->
			</div>
		</header>
		<!-- *** END SITE HEADER *** -->
		
		<!-- *** SITE BODY *** -->
		<div id="site-body" class="grid-container">
			<!-- *** SITE MENU *** -->
			<div class="site-left-sidebar grid-15 fixed-float">
				<ul class="site-sidebar-ul">
					<a href="/"><li class="site-sidebar-li {{Request::path() == '/' ? 'active' : ''}}">Home</li></a>
					<a href="/about"><li class="site-sidebar-li {{Request::path() == 'about' ? 'active' : ''}}">About Us</li></a>
					<a href="/b"><li class="site-sidebar-li {{Request::path() == 'b' ? 'active' : ''}}">Blog</li></a>
					<a href="/staff"><li class="site-sidebar-li {{Request::path() == 'staff' ? 'active' : ''}}">Staff</li></a>
					<a href="/chat"><li class="site-sidebar-li {{Request::path() == 'chat' ? 'active' : ''}}">Chat</li></a>
					<a href="/shows"><li class="site-sidebar-li {{Request::path() == 'shows' ? 'active' : ''}}">Shows</li></a>
					<a href="/join"><li class="site-sidebar-li {{Request::path() == 'join' ? 'active' : ''}}">Join Us</li></a>
				</ul>
			</div>
			<!-- *** END SITE MENU *** -->
			
			<!-- *** MAIN SITE CONTENT *** -->
			<div class="site-content grid-55">
				@yield('content')
			</div>
			<!-- *** END MAIN SITE CONTENT *** -->
			
			<!-- *** SITE SIDEBAR CONTENT *** -->
			<div class="site-right-sidebar grid-20 fixed-float">
				<ul class="site-sidebar-ul">
					
					@yield('sidebar-items')
					
					<li class="site-sidebar-li site-donate">
						<h3>Help Us Stay Online</h3>
						<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top"> <input type="hidden" name="cmd" value="_s-xclick"> <input type="hidden" name="encrypted" value="-----BEGIN PKCS7-----MIIHTwYJKoZIhvcNAQcEoIIHQDCCBzwCAQExggEwMIIBLAIBADCBlDCBjjELMAkGA1UEBhMCVVMxCzAJBgNVBAgTAkNBMRYwFAYDVQQHEw1Nb3VudGFpbiBWaWV3MRQwEgYDVQQKEwtQYXlQYWwgSW5jLjETMBEGA1UECxQKbGl2ZV9jZXJ0czERMA8GA1UEAxQIbGl2ZV9hcGkxHDAaBgkqhkiG9w0BCQEWDXJlQHBheXBhbC5jb20CAQAwDQYJKoZIhvcNAQEBBQAEgYACyuOGDIzHXY0XSMIWd/fksCojy5zA2JK1qRbageUlFLxO2aKCWaif7OjMVy3PAhFf+w12PEQDfllF42ixQRkSIKKf88DLrExbEfWTmpe5c2iHQGlqHCCSkQMS2PEbxSYt63TLj43Y8SJz4Qnh42+A3U6A5N0Lyh/u8N65vuTVUjELMAkGBSsOAwIaBQAwgcwGCSqGSIb3DQEHATAUBggqhkiG9w0DBwQI8AEVKwYopV2Agaj/NQOX3gNCYKY8SjvzKRebe+wuCZRq23iWVSx/YBBBocvFMjiHnumskBqg37DBD7c5xYwreojhmiCk3RSIPYR/5Wt62TzlPiGQu28aB1xUtRFbq52v/h0XZObhP7ifr2V5fUm/aEH4bQtPeMwFf0G2uHnFAk9Rqe7DTLPwtQu0sUO+rQkjzxuo1NJ3MSnjB3LH/ft5/GCS58Cl4aNK8LrAiNqi/YbmVZygggOHMIIDgzCCAuygAwIBAgIBADANBgkqhkiG9w0BAQUFADCBjjELMAkGA1UEBhMCVVMxCzAJBgNVBAgTAkNBMRYwFAYDVQQHEw1Nb3VudGFpbiBWaWV3MRQwEgYDVQQKEwtQYXlQYWwgSW5jLjETMBEGA1UECxQKbGl2ZV9jZXJ0czERMA8GA1UEAxQIbGl2ZV9hcGkxHDAaBgkqhkiG9w0BCQEWDXJlQHBheXBhbC5jb20wHhcNMDQwMjEzMTAxMzE1WhcNMzUwMjEzMTAxMzE1WjCBjjELMAkGA1UEBhMCVVMxCzAJBgNVBAgTAkNBMRYwFAYDVQQHEw1Nb3VudGFpbiBWaWV3MRQwEgYDVQQKEwtQYXlQYWwgSW5jLjETMBEGA1UECxQKbGl2ZV9jZXJ0czERMA8GA1UEAxQIbGl2ZV9hcGkxHDAaBgkqhkiG9w0BCQEWDXJlQHBheXBhbC5jb20wgZ8wDQYJKoZIhvcNAQEBBQADgY0AMIGJAoGBAMFHTt38RMxLXJyO2SmS+Ndl72T7oKJ4u4uw+6awntALWh03PewmIJuzbALScsTS4sZoS1fKciBGoh11gIfHzylvkdNe/hJl66/RGqrj5rFb08sAABNTzDTiqqNpJeBsYs/c2aiGozptX2RlnBktH+SUNpAajW724Nv2Wvhif6sFAgMBAAGjge4wgeswHQYDVR0OBBYEFJaffLvGbxe9WT9S1wob7BDWZJRrMIG7BgNVHSMEgbMwgbCAFJaffLvGbxe9WT9S1wob7BDWZJRroYGUpIGRMIGOMQswCQYDVQQGEwJVUzELMAkGA1UECBMCQ0ExFjAUBgNVBAcTDU1vdW50YWluIFZpZXcxFDASBgNVBAoTC1BheVBhbCBJbmMuMRMwEQYDVQQLFApsaXZlX2NlcnRzMREwDwYDVQQDFAhsaXZlX2FwaTEcMBoGCSqGSIb3DQEJARYNcmVAcGF5cGFsLmNvbYIBADAMBgNVHRMEBTADAQH/MA0GCSqGSIb3DQEBBQUAA4GBAIFfOlaagFrl71+jq6OKidbWFSE+Q4FqROvdgIONth+8kSK//Y/4ihuE4Ymvzn5ceE3S/iBSQQMjyvb+s2TWbQYDwcp129OPIbD9epdr4tJOUNiSojw7BHwYRiPh58S1xGlFgHFXwrEBb3dgNbMUa+u4qectsMAXpVHnD9wIyfmHMYIBmjCCAZYCAQEwgZQwgY4xCzAJBgNVBAYTAlVTMQswCQYDVQQIEwJDQTEWMBQGA1UEBxMNTW91bnRhaW4gVmlldzEUMBIGA1UEChMLUGF5UGFsIEluYy4xEzARBgNVBAsUCmxpdmVfY2VydHMxETAPBgNVBAMUCGxpdmVfYXBpMRwwGgYJKoZIhvcNAQkBFg1yZUBwYXlwYWwuY29tAgEAMAkGBSsOAwIaBQCgXTAYBgkqhkiG9w0BCQMxCwYJKoZIhvcNAQcBMBwGCSqGSIb3DQEJBTEPFw0xNDAxMTYwNzQ1NDRaMCMGCSqGSIb3DQEJBDEWBBQXEyI8qKUpi5cP8cdkssezWCVr8jANBgkqhkiG9w0BAQEFAASBgLLN3Wd21ar2Cz8bpKLnlIIJd16wzWJjtgZYsTGojyHSUUANBxLWwYr1ZOUR+tFD9xntPJM2ftAxfrE6wwQFvQulhxEb7YfhEcB4yW6ph9b86mWB4LeeTzBsAmKi/VZC6v4W3orZqKcvYTi9HEt7plqIud6YJSkM2KNpdYaXB+HN-----END PKCS7-----
"> <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!"> <img alt="" border="0" src="https://www.paypalobjects.com/en_AU/i/scr/pixel.gif" width="1" height="1"></form>
					</li>
					
					<li class="site-sidebar-li site-socal">
						<h3>Come Find Us!</h3>
						<a target="_blank" href="https://www.facebook.com/thehiveradio"><i class="fa fa-facebook-square fa-3x"></i></a>
						<a target="_blank" href="https://www.youtube.com/user/TheHiveRadio"><i class="fa fa-youtube-square fa-3x"></i></a>
						
						<br>
						
						<a target="_blank" href="https://plus.google.com/105511514719422184311/"><i class="fa fa-google-plus-square fa-3x"></i></a>
						<a target="_blank" href="https://www.twitter.com/thehiveradio"><i class="fa fa-twitter-square fa-3x"></i></a>
					</li>
				</ul>
			</div>
			<!-- *** END SITE SIDEBAR CONTENT *** -->
		</div>
		<!-- *** END SITE BODY *** -->
		
		<!-- *** SITE FOOTER *** --->
		<footer>
			<p class="third">
				Copyright &copy; Hive Media Productions, 2013-15. All rights reserved. All multimedia content is property of its respective author(s). The Hive Radio is a Non-for-profit station, any and all ad and donation money is used solely for keeping the station online.
			</p>
			<p class="third">
				<img height="40" src="https://hiveradio.net/wp-content/themes/The%20Hive%20Radio/images/by-nc-nd.eu.png"> 
				<img src="https://hiveradio.net/wp-content/themes/The%20Hive%20Radio/images/comodo_secure_100x85_transp.png"> 
				<a href="http://www.internet-radio.com/" target="_blank">
					<img src="http://www.internet-radio.com/images/internet-radio-badge.gif">
				</a> 
				<a href="http://www.streamfinder.com" target="_blank">
					<img src="http://www.streamfinder.com/images/streamfinder-icon.gif" border="0" alt="StreamFinder - the free place to list your streaming show.">
				</a>
			</p>
			<p class="third">
				<img width="250px"src="http://hivemedia.net.au/images/logo.png">
				<br>
				Made with <i class="fa fa-heart heart site-with-love"></i> by <a href="http://hivemedia.net.au">Hive Media Productions</a> in <a href="http://www.visitmelbourne.com">Melbourne</a>
			</p>
		</footer>
		<!-- *** END SITE FOOTER -->
		
		<div id="site-background">
			<img class="site-background-img" src="{{URL::to('/')}}/img/background.png">
		</div>
		
		<!-- *** JAVASCRIPT FILES AND PLUGINS *** -->
		@yield('javascript')
	</body>
</html>