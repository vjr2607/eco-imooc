<div class="leaderboards">
	<div class="container">
	<a id="leaderboard-points" class="<?php if ($vars['type'] == 'points') echo 'active'; ?>" href="<?php echo $vars['url']; ?>gamification/leaderboard/points"><span>Pontos</span></a>
	<a id="leaderboard-friends" class="<?php if ($vars['type'] == 'friends') echo 'active'; ?>" href="<?php echo $vars['url']; ?>gamification/leaderboard/friends"><span>Amigos</span></a>
	<a id="leaderboard-comments" class="<?php if ($vars['type'] == 'comments') echo 'active'; ?>" href="<?php echo $vars['url']; ?>gamification/leaderboard/comments"><span>Comentários</span></a>
	<a id="leaderboard-tweets" class="<?php if ($vars['type'] == 'tweets') echo 'active'; ?>" href="<?php echo $vars['url']; ?>gamification/leaderboard/tweets"><span>Tweets</span></a>
	</div>
</div>
<script type="text/javascript">
	$(function() {	
		var $leaderboard_tabs = $('.leaderboards');
		var $tabs = $leaderboard_tabs.find('a');
		var $header = $('.leaderboard .header');
		var classHeader = $header.clone().removeClass('header').attr('class');
		console.log(classHeader);
		$tabs.hover(
			function(){
				$leaderboard_tabs.addClass('hover');
				var classTab = $(this).addClass('hover-active').attr('id');
				console.log(classTab);
				if (classTab.indexOf(classHeader) != -1){
					$header.addClass('hover');
				}
			},
			function(){
				$leaderboard_tabs.removeClass('hover');
				$header.removeClass('hover');
				$(this).removeClass('hover-active');
			});
	});
</script>

<ul class="leaderboard elgg-list elgg-list-entity">
	<li class="header <?php echo $vars['type']; ?>">
		<?php foreach($vars['headers'] as $header){ ?>
		<div class="achievements"><?php echo $header; ?></div>
		<?php }
		echo $vars['title']; ?>
	</li>