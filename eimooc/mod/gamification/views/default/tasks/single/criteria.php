<?php echo $vars['right_criteria']; ?> / <?php echo $vars['n_criteria']; ?> criterios de corrección correctos
	<br/>
	<div class="criteria-percent">
		<div class="progress elgg-button-submit" style="width:<?php echo (($vars['right_criteria'] / $vars['n_criteria']) * 100); ?>%;"></div>
	</div>

<div class="criteria-list">
<?php
	for($i = 0; $i < $vars['n_criteria']; $i++){
		
		if ($vars['corrections'][$i]->value == 'wrong')
			echo '<div class="task-icon wrong"></div>';
		else
			echo '<div class="task-icon right"></div>';
			
		echo '<span class="criteria-correction">' . $vars['criteria'][$i]->value . '</span>';
		echo '<br/>';
	}
	echo '<br/>';
?>
</div>