<div class="task">
	<div class="task_icons">		
		<?php if ($vars['entity']->done){
			if ($vars['entity']->correction_made){
				if ($vars['entity']->correction)
					echo '<div class="task-icon right" title="Corregida"></div>'; 
				else
					echo '<div class="task-icon wrong" title="Corregida"></div>'; 
			}
			else
				echo '<div class="task-icon waiting" title="Esperando corrección"></div>'; 
		
			if ($vars['entity']->corrected) 
				echo '<div class="task-icon corrected" title="Corrección realizada"></div>'; 
			else
				echo '<div class="task-icon correction-pending" title="Corrección pendiente"></div>'; 
		}
		else{
			echo '<div class="task-icon undone" title="Tarea no realizada"></div>'; 
			echo '<div class="task-icon correction-disabled" title="Corrección pendiente"></div>'; 
		}
		?>
	</div>
	<div class="task_points"> <?php if (isset($vars['entity']->points)) echo '<span style="color:#000">' . $vars['entity']->earned_points . '</span>/' . $vars['entity']->points . ' Pts'; ?></div>
	<h3><a href="<?php echo $vars['url'] ?>gamification/tasks/view/<?php echo $vars['entity']->task_guid; ?>"><?php echo $vars['entity']->title; ?><?php
		if ( elgg_is_admin_logged_in() ){
			if ($vars['entity']->visible == false) echo " (Oculta)";
		}
	?></a></h3>
	
</div>