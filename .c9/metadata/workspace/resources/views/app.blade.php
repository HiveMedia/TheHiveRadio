{"changed":true,"filter":false,"title":"app.blade.php","tooltip":"/resources/views/app.blade.php","value":"<!DOCTYPE html>\n<html>\n\t<head>\n\t\t<meta name=\"tags\" content=\"pony,ponys,fur,furs,mlp,fim,music,radio,hive,media,changeling,fandom\">\n\t\t<meta name=\"author\" content=\"Hive Media Productions\">\n\t\t<meta name=\"description\" content=\"\">\n\t\t\n\t\t<title>The Hive Radio - A station by changelings, for everyone!</title>\n\t\t\n\t\t<link href=\"http://fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic,700italic\" rel=\"stylesheet\" type=\"text/css\">\n\t\t<link href=\"http://netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.css\" rel=\"stylesheet\">\n\t\t<link href=\"{{URL::to('/')}}/css/unsemantic-grid-responsive.css\" type=\"text/css\" rel=\"stylesheet\">\n\t\t<link href=\"{{URL::to('/')}}/css/style.css\" type=\"text/css\" rel=\"stylesheet\">\n\t</head>\n\t\n\t<body>\n\t\t<!-- *** SITE HEADER *** -->\n\t\t<header>\n\t\t\t<div id=\"site-header\" class=\"grid-container\">\n\t\t\t\t<div class=\"site-logo grid-50\">\n\t\t\t\t\t<img src=\"https://hiveradio.net/wp-content/themes/The%20Hive%20Radio/images/logo.png\">\n\t\t\t\t</div>\n\t\t\t</div>\n\t\t</header>\n\t\t<!-- *** END SITE HEADER *** -->\n\t\t\n\t\t<!-- *** SITE BODY *** -->\n\t\t<div id=\"site-body\" class=\"grid-container\">\n\t\t\t<!-- *** SITE MENU *** -->\n\t\t\t<div class=\"site-left-sidebar grid-15\">\n\t\t\t\t<ul class=\"site-sidebar-ul\">\n\t\t\t\t\t<a href=\"/\"><li class=\"site-sidebar-li {{Request::path() == '/' ? 'active' : ''}}\">Home</li></a>\n\t\t\t\t\t<a href=\"/about\"><li class=\"site-sidebar-li {{Request::path() == 'about' ? 'active' : ''}}\">About Us</li></a>\n\t\t\t\t\t<a href=\"/blog\"><li class=\"site-sidebar-li {{Request::path() == 'blog' ? 'active' : ''}}\">Blog</li></a>\n\t\t\t\t\t<a href=\"/staff\"><li class=\"site-sidebar-li {{Request::path() == 'staff' ? 'active' : ''}}\">Staff</li></a>\n\t\t\t\t\t<a href=\"/chat\"><li class=\"site-sidebar-li {{Request::path() == 'chat' ? 'active' : ''}}\">Chat</li></a>\n\t\t\t\t\t<a href=\"/shows\"><li class=\"site-sidebar-li {{Request::path() == 'shows' ? 'active' : ''}}\">Shows</li></a>\n\t\t\t\t\t<a href=\"/join\"><li class=\"site-sidebar-li {{Request::path() == 'join' ? 'active' : ''}}\">Join Us</li></a>\n\t\t\t\t</ul>\n\t\t\t</div>\n\t\t\t<!-- *** END SITE MENU *** -->\n\t\t\t\n\t\t\t<!-- *** MAIN SITE CONTENT *** -->\n\t\t\t<div class=\"site-content grid-55\">\n\t\t\t\t@yield('content')\n\t\t\t</div>\n\t\t\t<!-- *** END MAIN SITE CONTENT *** -->\n\t\t\t\n\t\t\t<!-- *** SITE SIDEBAR CONTENT *** -->\n\t\t\t<div class=\"site-right-sidebar grid-20\">\n\t\t\t\t<ul class=\"site-sidebar-ul\">\n\t\t\t\t\t\n\t\t\t\t\t@yield('sidebar-items')\n\t\t\t\t\t\n\t\t\t\t\t<li class=\"site-sidebar-li site-donate\">\n\t\t\t\t\t\t<h3>Help Us Stay Online</h3>\n\t\t\t\t\t\t<form action=\"https://www.paypal.com/cgi-bin/webscr\" method=\"post\" target=\"_top\"> <input type=\"hidden\" name=\"cmd\" value=\"_s-xclick\"> <input type=\"hidden\" name=\"encrypted\" value=\"-----BEGIN PKCS7-----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-----END PKCS7-----\n\"> <input type=\"image\" src=\"https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif\" border=\"0\" name=\"submit\" alt=\"PayPal - The safer, easier way to pay online!\"> <img alt=\"\" border=\"0\" src=\"https://www.paypalobjects.com/en_AU/i/scr/pixel.gif\" width=\"1\" height=\"1\"></form>\n\t\t\t\t\t</li>\n\t\t\t\t\t\n\t\t\t\t\t<li class=\"site-sidebar-li site-socal\">\n\t\t\t\t\t\t<h3>Come Find Us!</h3>\n\t\t\t\t\t\t<a target=\"_blank\" href=\"https://www.facebook.com/thehiveradio\"><i class=\"fa fa-facebook-square fa-3x\"></i></a>\n\t\t\t\t\t\t<a target=\"_blank\" href=\"https://www.youtube.com/user/TheHiveRadio\"><i class=\"fa fa-youtube-square fa-3x\"></i></a>\n\t\t\t\t\t\t\n\t\t\t\t\t\t<br>\n\t\t\t\t\t\t\n\t\t\t\t\t\t<a target=\"_blank\" href=\"https://plus.google.com/105511514719422184311/\"><i class=\"fa fa-google-plus-square fa-3x\"></i></a>\n\t\t\t\t\t\t<a target=\"_blank\" href=\"https://www.twitter.com/thehiveradio\"><i class=\"fa fa-twitter-square fa-3x\"></i></a>\n\t\t\t\t\t</li>\n\t\t\t\t</ul>\n\t\t\t</div>\n\t\t\t<!-- *** END SITE SIDEBAR CONTENT *** -->\n\t\t</div>\n\t\t\n\t\t<!-- *** SITE FOOTER *** --->\n\t\t<footer>\n\t\t\t<p class=\"third\">\n\t\t\t\tCopyright &copy; Hive Media Productions, 2013-15. All rights reserved. All multimedia content is property of its respective author(s). The Hive Radio is a Non-for-profit station, any and all ad and donation money is used solely for keeping the station online.\n\t\t\t</p>\n\t\t\t<p class=\"third\">\n\t\t\t\t<img height=\"40\" src=\"https://hiveradio.net/wp-content/themes/The%20Hive%20Radio/images/by-nc-nd.eu.png\"> \n\t\t\t\t<img src=\"https://hiveradio.net/wp-content/themes/The%20Hive%20Radio/images/comodo_secure_100x85_transp.png\"> \n\t\t\t\t<a href=\"http://www.internet-radio.com/\" target=\"_blank\">\n\t\t\t\t\t<img src=\"http://www.internet-radio.com/images/internet-radio-badge.gif\">\n\t\t\t\t</a> \n\t\t\t\t<a href=\"http://www.streamfinder.com\" target=\"_blank\">\n\t\t\t\t\t<img src=\"http://www.streamfinder.com/images/streamfinder-icon.gif\" border=\"0\" alt=\"StreamFinder - the free place to list your streaming show.\">\n\t\t\t\t</a>\n\t\t\t</p>\n\t\t\t<p class=\"third\">\n\t\t\t\t<img width=\"250px\"src=\"http://hivemedia.net.au/images/logo.png\">\n\t\t\t\t<br>\n\t\t\t\tMade with <i class=\"fa fa-heart heart site-with-love\"></i> by <a href=\"http://hivemedia.net.au\">Hive Media Productions</a> in <a href=\"http://www.visitmelbourne.com\">Melbourne</a>\n\t\t\t</p>\n\t\t</footer>\n\t\t<!-- *** END SITE FOOTER -->\n\t\t\n\t\t<div id=\"site-background\">\n\t\t\t<img class=\"site-background-img\" src=\"{{URL::to('/')}}/img/background.png\">\n\t\t</div>\n\t\t\n\t\t<!-- *** JAVASCRIPT FILES AND PLUGINS *** -->\n\t\t@yield('javascript')\n\t</body>\n</html>","undoManager":{"mark":5,"position":14,"stack":[[{"group":"doc","deltas":[{"start":{"row":33,"column":38},"end":{"row":33,"column":39},"action":"remove","lines":["2"]}]}],[{"group":"doc","deltas":[{"start":{"row":33,"column":38},"end":{"row":33,"column":39},"action":"insert","lines":["1"]}]}],[{"group":"doc","deltas":[{"start":{"row":33,"column":39},"end":{"row":33,"column":40},"action":"remove","lines":["0"]}]}],[{"group":"doc","deltas":[{"start":{"row":33,"column":39},"end":{"row":33,"column":40},"action":"insert","lines":["5"]}]}],[{"group":"doc","deltas":[{"start":{"row":47,"column":33},"end":{"row":47,"column":35},"action":"remove","lines":["60"]},{"start":{"row":47,"column":33},"end":{"row":47,"column":34},"action":"insert","lines":["5"]}]}],[{"group":"doc","deltas":[{"start":{"row":47,"column":34},"end":{"row":47,"column":35},"action":"insert","lines":["5"]}]}],[{"group":"doc","deltas":[{"start":{"row":23,"column":4},"end":{"row":23,"column":7},"action":"remove","lines":["<!-"]},{"start":{"row":23,"column":4},"end":{"row":23,"column":5},"action":"remove","lines":["-"]}]}],[{"group":"doc","deltas":[{"start":{"row":25,"column":10},"end":{"row":25,"column":15},"action":"remove","lines":["\t\t-->"]}]}],[{"group":"doc","deltas":[{"start":{"row":23,"column":0},"end":{"row":25,"column":10},"action":"remove","lines":["\t\t\t\t<div class=\"site-text grid-45\">","\t\t\t\t\t<img src=\"{{URL::to('/')}}/img/logo-text.png\">","\t\t\t\t</div>"]}]}],[{"group":"doc","deltas":[{"start":{"row":22,"column":4},"end":{"row":23,"column":0},"action":"remove","lines":["",""]}]}],[{"group":"doc","deltas":[{"start":{"row":22,"column":3},"end":{"row":22,"column":4},"action":"remove","lines":["\t"]}]}],[{"group":"doc","deltas":[{"start":{"row":22,"column":2},"end":{"row":22,"column":3},"action":"remove","lines":["\t"]}]}],[{"group":"doc","deltas":[{"start":{"row":22,"column":1},"end":{"row":22,"column":2},"action":"remove","lines":["\t"]}]}],[{"group":"doc","deltas":[{"start":{"row":22,"column":0},"end":{"row":22,"column":1},"action":"remove","lines":["\t"]}]}],[{"group":"doc","deltas":[{"start":{"row":21,"column":10},"end":{"row":22,"column":0},"action":"remove","lines":["",""]}]}]]},"ace":{"folds":[],"scrolltop":0,"scrollleft":0,"selection":{"start":{"row":28,"column":29},"end":{"row":28,"column":29},"isBackwards":false},"options":{"guessTabSize":true,"useWrapMode":false,"wrapToView":true},"firstLineState":0},"timestamp":1424952063351}