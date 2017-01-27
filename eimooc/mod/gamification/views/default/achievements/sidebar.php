<div class="sidebar">
		Conseguiu <?php echo $vars['completed'] . "/" . count($vars['achievemens_list']); ?> crach&aacute;s<br/>
		<div class="criteria-percent">
			<div class="progress elgg-button-submit" style="width:<?php echo (($vars['completed'] / count($vars['achievemens_list'])) * 100); ?>%;"></div>
		</div>
		<div class="icon achievements-icon"></div>
		<div style="text-align:justify;">
		Pode verificar aqui os vários crachás que já conseguiu e os que pode ainda obter.<br/><br/>
		Debaixo do título de cada crachá surge uma descrição indicando o que é necessário realizar para que ele lhe seja atribuído.<br/><br/>
		Também pode aceder às <?php echo elgg_view('output/url', array('text' => "estatísticas gerais", 'href' => "gamification/achievements/stats")); ?> dos crachás, para ver quantos participantes obtiveram cada um deles, verificando assim se alcançou os mais difíceis.
		</div>
	</div>