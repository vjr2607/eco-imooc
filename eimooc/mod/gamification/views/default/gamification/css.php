.elgg-button-action{
	padding: 3px 8px 4px 8px;
	margin-bottom:0;
}
li.elgg-menu-item-rss{ display:none; }
.task a { 
	color: black; 
	padding: 10px 2px; 
	display:block; 
	width: 625px;
	padding-right: 103px;
	transition: all 500ms; 
	-moz-transition: all 500ms;
	-webkit-transition: all 500ms; 
	-o-transition: all 500ms; 
}
.task a:hover{ background:#efefef; }
.task a .date{
	font-size: 11px;
	width: 90px;
	display: inline-block
}
.task_icons{	float:right;	margin-right:30px; }
.task_icons .task-icon:first-child{ margin-left:0; }
.task_icons.header{ margin-right:0;}
.task_icons.header div{
	float:left;
	width:65px;
	font-size:10px;
	text-align:center;
}
.task_icons.header div:first-child{
	border-right: 1px solid #000;
}

.task_points{ 
	float:right;
	margin-right: 10px;
	padding-top:10px;
	font-weight: bold;
	color:#555;
	width:65px;
}
.task img{	margin:-5px 10px; }
.task-icon{ 
	margin-top:5px;
	margin-left:10px;
	display:inline-block; 
	height:28px; 
	vertical-align:middle; 
	width:29px;
	background-repeat:no-repeat;
	background-position:center;
}
.task-icon.undone{ background-image:url('../mod/gamification/graphics/icon-task-waiting.png'); }
.task-icon.waiting { background-image:url('../mod/gamification/graphics/icon-task-correction-waiting.png'); }
.task-icon.right { background-image:url('../mod/gamification/graphics/icon-task-right.png'); }
.task-icon.wrong { background-image:url('../mod/gamification/graphics/icon-task-wrong.png'); }
.task-icon.corrected { background-image:url('../mod/gamification/graphics/icon-task-corrected.png'); }
.task-icon.correction-pending { background-image:url('../mod/gamification/graphics/icon-task-correct.png'); }
.task-icon.correction-disabled { background-image:url('../mod/gamification/graphics/icon-task-correction-disabled.png'); }
ul.task_list{ margin:0; }
h3.tasklist{
	padding:8px;
	background:#CCC;
	color:#000;
	margin-top:2px;
	border-radius:2px;
	transition: all 500ms; /* Firefox 4 */
	-moz-transition: all 500ms; /* Firefox 4 */
	-webkit-transition: all 500ms; /* Safari and Chrome */
	-o-transition: all 500ms; /* Opera */
	background-repeat: no-repeat;
	background-position:left center;
	padding-left:45px;
	background-size:contain;
	padding-right:0;
}
h3.tasklist:hover{
	cursor:pointer;
	background:#DDD;
	background-repeat: no-repeat;
	background-position:left center;
	background-size:contain;
}
h3.tasklist .task_icons.header{
	opacity:0;
	transition: all 700ms; /* Firefox 4 */
	-moz-transition: all 700ms; /* Firefox 4 */
	-webkit-transition: all 700ms; /* Safari and Chrome */
	-o-transition: all 700ms; /* Opera */
}

h3.tasklist.ui-state-active .task_icons.header{
	opacity:1;
}
.legend{ text-align:right;	margin-right:10px; }
.legend .task-icon{ width:28px; }
.tab-page{ margin-top: 25px; }
#tab-task-correction ul {list-style:disc outside none; padding-left:20px;}
#tab-task-correction ul li {margin-bottom:5px;}
.solve-form{
	margin:auto;
	margin-top:10px;
	padding:15px;
	padding-left:50px;
	background-image:url('../mod/gamification/graphics/upload-icon.png');
	background-repeat: no-repeat;
	background-position: 10px center;
	background-color:#efefef;
	display:block;
	width:450px;
}
.post-correction-form{
	margin:auto;
	margin-top:10px;
	padding:15px;
	background-color:#efefef;
	display:block;
}
.criteria-entry{
	display:inline-block;
	width:350px;
	padding:10px;
	background-color:#fff;
	margin-right:15px;
}
.criteria-correction{
	margin-left:10px;
}
.solve-form .elgg-input-file{ width:330px; }
.inline-form {margin:auto; width:200px; }
.task-solved{
	padding: 8px;
	padding-left:50px;
	background-image:url('../mod/gamification/graphics/solved-icon.png');
	width:auto;
	margin-top:7px;	
}
.download-task-file{
	padding: 23px;
	padding-left:50px;
	color:white;
	display:inline-block;
	background-image:url('../mod/gamification/graphics/download-icon.png');
	background-repeat: no-repeat;
	background-position: 10px center;
	cursor:pointer;
	transition: all 500ms;
	-moz-transition: all 500ms; /* Firefox 4 */
	-webkit-transition: all 500ms; /* Safari and Chrome */
	-o-transition: all 500ms; /* Opera */
	margin-right:10px;
	margin-bottom: 10px;
	font-weight: normal;
	outline:none;
	border:0;
	border-radius:0;
	font-size:100%;
	vertical-align:middle;
}
.download-task-file:hover{ color:white; text-decoration:none; }
.download-initial{ background-color:#0062ac; }
.download-initial:hover{ background-color:#00aeef; }
.download-solution{ background-color:#319a31; }
.download-solution:hover{ background-color:#4bc32f; }
.ask-correction{ background-color:#319a31; background-image:url('../mod/gamification/graphics/correct-task.png'); }
.ask-correction:hover{ background-color:#4bc32f; }
.post-correction{ 
	background-repeat: repeat-x;
	background-position: left 1px;
	background-image:url('../mod/gamification/graphics/button-correct.png');
	padding-left:50px;
	padding-top:10px;
	padding-bottom:10px;
	padding-right:8px;
}
.post-correction:hover{
	background-repeat: repeat-x;
	background-position: left 1px;
	background-image:url('../mod/gamification/graphics/button-correct.png');
}
.correction-options{ margin-top:10px; padding:0;text-align:center; display:inline-block; }
.correction-options li { display:inline-block; margin-right:10px; background-color:#00aeef; }
.correction-options li label {padding:10px; display:block; }
.correction-options li:first-child{ background-color:#4bc32f; }
.peer-correction{ margin-right:150px; }
.peer-correction .result{
	padding:5px;
	padding-left:52px;
	line-height:50px;
	background-repeat: no-repeat;
	background-position: left center;
	margin:5px;
	margin-bottom:10px;
}
.peer-correction .right{ background-image:url('../mod/gamification/graphics/task-result-right.png'); }
.peer-correction .wrong{ background-image:url('../mod/gamification/graphics/task-result-wrong.png'); }
.river-correction{ display:inline-block; width:24px; height:24px; vertical-align:middle; margin-left:10px;}
.river-correction.wrong{ background-image:url('../mod/gamification/graphics/river-correction-wrong.png'); }
.river-correction.right{ background-image:url('../mod/gamification/graphics/river-correction-right.png'); }
.override-lists ol{ padding-left:30px;	list-style-type:decimal; }
.admin-badge{
	position:absolute;
	width:160px;
	height:70px;
	font-size:17px;
	color:#444;
	padding-left:75px;
	padding-top:24px;
	top: 30;
	right:0;
	background-image:url('../mod/gamification/graphics/admin-icon.png');
	background-repeat: no-repeat;
	background-position: left center;
}

.leaderboard{ margin:auto; margin-top:0; border-top:0; width:80%;}
.leaderboard li{ padding-top:7px; }
.leaderboard .ranking-position{
	float:left;
	text-align:center;
	width:25px;
	height:25px;
	line-height:25px;
	margin:4px;
	margin-right:10px;
	font-size:15px;
	background:#dddddd;
}
.leaderboard .achievements{ float:right; padding-top:6px; width:75px;}
.leaderboard .criteria-percent { width:100px; height:21px; }
.leaderboard .criteria-percent .progress { height:19px; }
.leaderboard .user{	background-color:#0062ac; color:white; }
.leaderboard .user a, .leaderboard .user .task_points{ color:white; }
.leaderboard .user .ranking-position{ background:#0062ac; }
.leaderboard .header{ 
	background-color:#aaa; height:30px; line-height:30px; padding:0; padding-left:10px; border-top:1px solid #000;
	transition: all 500ms;
	-moz-transition: all 500ms; /* Firefox 4 */
	-webkit-transition: all 500ms; /* Safari and Chrome */
	-o-transition: all 500ms; /* Opera */
}
.leaderboard .header div {padding-top:0;}
.leaderboard .header div:first-child {margin-right: 5px; }
.leaderboard .task_points{  padding-top:6px; }
.leaderboards{ margin:auto; width:80%; overflow:hidden; height:43px; position:relative; top:1px;}
.leaderboards .container{ width:900px; }
.leaderboards a{ 
	display:block;
	float:left;
	width:147px;
	padding: 13px 0 12px 0;
	color:#fff;
	font-size:15px;
	background-color:#777;
	text-align:center;
	transition: all 500ms;
	-moz-transition: all 500ms; /* Firefox 4 */
	-webkit-transition: all 500ms; /* Safari and Chrome */
	-o-transition: all 500ms; /* Opera */
	background-repeat: no-repeat;
	background-position: left center;
}
.leaderboards a:hover{
	text-decoration:none;
}
.leaderboards a span{
	background-repeat:no-repeat;
	background-position:left center;
	padding-left:26px;
}
.leaderboards a.active{ border-left: 1px solid #000; border-right: 1px solid #000; margin-left:-1px;  border-top: 1px solid #000;}
.leaderboards.hover a{ width:132px; }
.leaderboards.hover a.hover-active{ width:190px; }
.leaderboards #leaderboard-points span{ 	background-image:url('../mod/gamification/graphics/leaderboard-points.png'); }
.leaderboards #leaderboard-friends span{ 	background-image:url('../mod/gamification/graphics/leaderboard-friends.png'); }
.leaderboards #leaderboard-comments span{ 	background-image:url('../mod/gamification/graphics/leaderboard-comments.png'); }
.leaderboards #leaderboard-tweets span{ 	background-image:url('../mod/gamification/graphics/leaderboard-tweets.png'); }

.leaderboards #leaderboard-points.active { border-bottom-color:#ff9c10; }
.leaderboards #leaderboard-friends.active { border-color:#3c6a3c; border-bottom: 1px solid #319a31; }
.leaderboards #leaderboard-comments.active { border-bottom-color:#a31bb0; }
.leaderboards #leaderboard-tweets.active { border-bottom-color:#2d91ab;}

.leaderboards #leaderboard-points, .leaderboard .header.points { background-color:#ff9c10; border-color:#ae8244;}
.leaderboards #leaderboard-friends, .leaderboard .header.friends { background-color:#319a31; color:#fff; border-color:#3c6a3c;}
.leaderboards #leaderboard-comments, .leaderboard .header.comments { background-color:#a31bb0; color:#fff; border-color:#812f89;}
.leaderboards #leaderboard-tweets, .leaderboard .header.tweets { background-color:#2d91ab; color:#fff; border-color:#386b78;}

.leaderboards #leaderboard-points:hover, .leaderboard .header.points.hover { background-color:#ffbc2c; }
.leaderboards #leaderboard-friends:hover, .leaderboard .header.friends.hover { background-color:#4bc32f; }
.leaderboards #leaderboard-comments:hover, .leaderboard .header.comments.hover { background-color:#c828ac;}
.leaderboards #leaderboard-tweets:hover, .leaderboard .header.tweets.hover { background-color:#2cbbc0;}

#start-page a{
	color:#fff;
	padding:30px;
	background-color:#f00;
	display:block;
	-moz-transition: all 500ms; /* Firefox 4 */
	-webkit-transition: all 500ms; /* Safari and Chrome */
	-o-transition: all 500ms; /* Opera */
	background-repeat:no-repeat;
	width:450px;
	margin:auto;
	margin-bottom:10px;
}
#start-page a.left{
	background-position:10px center;
	padding-left:130px;
}
#start-page a.right{
	background-position: 500px center; 
	padding-right:130px;
	text-align:right;
}
#start-page a:hover{ text-decoration:none;}
#start-page a h1{ 
	color:#fff;
	margin-bottom:10px;
	font-weight:normal;
	font-size:2.1em;
}

a#start-tasks { background-color:#0062ac; background-image:url('../mod/gamification/graphics/start-tasks.png');}
a#start-leaderboard {  background-color:#ff9c10; background-image:url('../mod/gamification/graphics/start-leaderboard.png');}
a#start-achievements{  /*background-color:#ff2527;*/background-color:#0062ac; background-image:url('../mod/gamification/graphics/start-achievements.png');}
a#start-store{ background-color:#319a31; background-image:url('../mod/gamification/graphics/start-store.png');}
a#start-tasks:hover { background-color:#00aeef; }
a#start-leaderboard:hover { background-color:#ffbc2c; }
a#start-achievements:hover { /*background-color:#ff6550;*/ background-color:#00aeef; }
a#start-store:hover{ background-color:#4bc32f; }

.hint{
	background-repeat:no-repeat;
	background-position:10px center;
	padding:18px;
	padding-left:60px;
	background-color:#bbb; 
	background-image:url('../mod/gamification/graphics/lightbulb-small-icon.png');
	margin-bottom:10px;
}
.hint .close{ 
	float:right;
	height:18px;
	width:18px;
	background-image:url('../mod/gamification/graphics/hint-close.png');
	position:relative;
	top:-10px;
	left:10px;
	cursor:pointer;
}
.criteria-percent{
	display:inline-block;
	width:220px;
	height:24px;
	vertical-align:middle;
	background-color:#444;
	padding:1px;
	margin-top:5px;
}
.criteria-percent .progress{ height:22px;}
.criteria-list{ margin-top: 10px; padding-left:10px; }

.achievements-list{
	width:80%;
	margin:auto;
}
.sidebar .criteria-percent{ width:90%; }
.sidebar{
	text-align:center;
	font-size:13px;
}
.sidebar .icon{
	background-repeat:no-repeat;
	display:inline-block;
	background-position: center; 
}
.sidebar .achievements-icon{
	width:150px;
	height:190px;
	background-image:url('../mod/gamification/graphics/achievements-icon.png');
}
.sidebar .leaderboard-icon{
	width:150px;
	height:130px;
	background-image:url('../mod/gamification/graphics/leaderboard-icon.png');
}
.sidebar .store-icon{
	width:150px;
	height:180px;
	background-image:url('../mod/gamification/graphics/store-icon.png');
}
.achievement{
	padding:15px;
	color:#333;
	background-color:#ccc;
	margin-bottom:6px;
}
.achievement h2{ color:#000; }
.achievement.achieved{ 
	background-color:#4bc32f; 
	color:#fff; 
	background-image:url('../mod/gamification/graphics/achieved-tick.png');
	background-repeat:no-repeat;
	background-position:  522px center;
}
.achievement.achieved h2{ color:#fff; }
.achievement img{ 
	float:left; 
	width:55px; 
	height:55px; 
	padding-right:5px;
	position:relative;
	top:-6px;
	left:-6px;
}
.achievement .achievement-points{
	float: right;
	font-size: 16px;
	line-height: 31px;
	min-width: 32px;
	text-align: center;
	background: #ccc;
	border-radius: 25px;
	border: 2px solid #fff;
	color: #fff;
	margin-right: 11px;
}
.achievement .achievement-points span{ position: relative; left: -2px; }
.achievements-list .stats{ background-color:#ccc; position:relative; top:-10px;  padding:3px 5px 4px 5px; margin-bottom:-5px;}
.achievements-list .criteria-percent{ width:100%; margin-top:0; height:18px; }
.achievements-list .progress { height:16px; }
.achievements-list .stats.achieved{  background-color:#4bc32f; color:#fff; }
#gamification-topbar{
	width:100%;
	position:absolute;
	top:0;
}
#gamification-topbar .menu{
	float:right;
	position:relative;
	background-image:url('../mod/gamification/graphics/topbar-bg.png');
	padding-left:90px;
	left:-10px;
}
#gamification-topbar a{
	width:100px;
	display:block;
	float:left;
	line-height:120px;
	height:39px;
	text-align:center;
	-moz-transition: all 500ms; /* Firefox 4 */
	-webkit-transition: all 500ms; /* Safari and Chrome */
	-o-transition: all 500ms; /* Opera */
	background-repeat:no-repeat;
	color:#fff;
	font-size:1.1em;
	overflow:hidden;
	background-position: center;
}
/*
verde:#319a31 #4bc32f;
azul: #0062ac #00aeef;
rojo: #ff2527 #ff6550;
naranja: #ff9c10, #ffbc2c
gris: #777 #a8a8a8
*/

#gamification-topbar a:hover{ text-decoration:none; background-position: center -50px; line-height:40px;}
#gamification-topbar a.tasks { background-color:#0062ac; background-image:url('../mod/gamification/graphics/topbar-tasks.png');}
#gamification-topbar a.leaderboard {  background-color:#ff9c10; background-image:url('../mod/gamification/graphics/topbar-leaderboard.png');}
#gamification-topbar a.achievements{  background-color:#ff2527; background-image:url('../mod/gamification/graphics/topbar-achievements.png');}
#gamification-topbar a.store{ background-color:#319a31; background-image:url('../mod/gamification/graphics/topbar-store.png');}
#gamification-topbar a.tasks:hover { background-color:#00aeef; }
#gamification-topbar a.leaderboard:hover { background-color:#ffbc2c; }
#gamification-topbar a.achievements:hover { background-color:#ff6550; }
#gamification-topbar a.store:hover{ background-color:#4bc32f; }
.elgg-river-item .achieved { margin-top: 3px; }
.elgg-river-item .achieved img{ float:left; width:28px; height:28px; padding-right:8px;}
.elgg-river .custom-river{	margin:3px 0; }
.custom-river.bg01{ background-image:url('../mod/gamification/graphics/custom-bgs/bg01.png'); }
.custom-river.bg02{ background-image:url('../mod/gamification/graphics/custom-bgs/bg02.png'); }
.custom-river.bg03{ background-image:url('../mod/gamification/graphics/custom-bgs/bg03.png'); }
.custom-river.bg04{ background-image:url('../mod/gamification/graphics/custom-bgs/bg04.png'); }
.custom-river.bg05{ background-image:url('../mod/gamification/graphics/custom-bgs/bg05.png'); }
.custom-river.bg06{ background-image:url('../mod/gamification/graphics/custom-bgs/bg06.png'); }
.custom-river.configure, .give-achievement.configure { 
	display:inline-block; 
	cursor:pointer; 
	vertical-align:middle; 
	margin:3px; 
	border:3px solid #fff;
	-moz-transition: all 500ms; /* Firefox 4 */
	-webkit-transition: all 500ms; /* Safari and Chrome */
	-o-transition: all 500ms; /* Opera */
	padding:35px 15px; 
	width:380px; 
	
}
#gamification-sidebar{
	margin-bottom:10px;
	width:150px;
	margin-top: -10px;
}
#gamification-sidebar a{
	display:block;
	width:100%;
	
	background-repeat:no-repeat;
	color:#fff;
	font-size:1.2em;
	overflow:hidden;
	background-position: 10px center;
	padding:15px 0 15px 60px;
	-moz-transition: all 500ms; /* Firefox 4 */
	-webkit-transition: all 500ms; /* Safari and Chrome */
	-o-transition: all 500ms; /* Opera */
}
#gamification-sidebar a:hover{
	text-decoration:none;
	width:90%;
}
#gamification-sidebar .title{ background-color:#777; color:#fff; text-align:center; padding:8px 0; width:210px; font-size:18px; margin-bottom:2px;}
#gamification-sidebar a.tasks { background-color:#0062ac; background-image:url('../mod/gamification/graphics/topbar-tasks.png');}
#gamification-sidebar a.leaderboard {  background-color:#ff9c10; background-image:url('../mod/gamification/graphics/topbar-leaderboard.png');}
#gamification-sidebar a.achievements{  /*background-color:#ff2527;*/ background-color:#0062ac; background-image:url('../mod/gamification/graphics/topbar-achievements.png');}
#gamification-sidebar a.store{ background-color:#319a31; background-image:url('../mod/gamification/graphics/topbar-store.png');}
#gamification-sidebar a.tasks:hover { background-color:#00aeef; }
#gamification-sidebar a.leaderboard:hover { background-color:#ffbc2c; }
#gamification-sidebar a.achievements:hover { /*background-color:#ff6550;*/ background-color:#00aeef; }
#gamification-sidebar a.store:hover{ background-color:#4bc32f; }

.custom-river.configure.active, .give-achievement.configure.active {  border:3px solid #0062ac; }
.custom-river.configure:hover, .give-achievement.configure:hover{  border:3px solid #00aeef; }

.custom-river a{
	font-weight:bold;
	color:#000;
}
.customize-river li{
	margin:auto;
	width:380px; 
}
.customize-river .none{ text-align:left; }

.give-achievements li{
	width:85px;
	height:85px;
	display:inline;
	overflow:hidden;
}
.give-achievement.configure{
	width:inherit;
	height:inherit;
	padding:0;
	margin:3px;
}
.give-achievement img{
	width:100%;
	height:100%;
}
.give-achievement input{
	position:absolute;
	left:-100em;
}
.store_item{
	padding:10px;
	padding-right:15px;
	width:580px;
	margin:auto;
	clear:both;
	background-color:#DDD;
	margin-top:15px;
	overflow:auto;
}
.store_item .pricetag{
	float:left;
	margin-right:15px;
	width:80px;
	height:80px;
}

.store_item .pricetag img{
	width:100%;
	margin:0;
	border:0;
}
.store_item .pricetag .price{
	width:100%;
	background-color:#444;
	color:#fff;
	text-align:center;
	font-weight:bold;
	margin:0;
	padding:3px 0;
	position:relative;
	top:-5px;
}
.store_item .rebuy{
	float:right;
	position:relative;
	top:10px;
}
.store_item .not-available{
	line-height:26px;
	padding:0 10px;
	border-radius:15px;
	float:left;
	background-color:#ECCACA;
}
.store_item .description{
	float:left;
	width:485px;
}

.store_item .purchased{
	line-height:26px;
	padding:0 10px;
	font-weight:bold;
	color:#fff;
	border-radius:15px;
	float:left;
	background-color:#319a31;
}
.store-points{
	width:300px;
	margin:auto;
	padding:18px;
	box-shadow: 0px 10px 15px -5px #888888;
}

.profile-achievements img{
	width:60px;
	height:60px;
	margin-right:10px;
	margin-bottom:5px;
}
.menu-on-tabs{
	position: absolute;
	top: 7px;
	right:0;
}
.menu-on-tabs .content{
	float:right;
	margin-right:20px;
}
.achievement-message img{
	width:100px;
	height:100px;
	float:left;
	padding-right:10px;
}
.achievement-message h3, .achievement-message h2{
	color:#000;
}
.elgg-output pre{
	background:#fff;
}
.elgg-form-account{
	max-width:100%;
}
.elgg-form-account input{
	max-width:460px;
}
.elgg-form-register .custom-fields{
	background:#abe2e8;
	-webkit-border-radius: 9px;
	-moz-border-radius: 9px;
	border-radius: 9px;
	padding:12px;
	}