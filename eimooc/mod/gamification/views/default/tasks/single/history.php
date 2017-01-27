<h3>Historial de la tarea</h3>

<?php
	if (isset($vars['params']['task'])){
		//Si la tarea se ha realizado, mostramos el mensaje junto con su fecha
		echo '<div class="solve-form task-solved">Solución de la tarea enviada (';
		echo elgg_view('output/date',array('value'=>$vars['params']['task']->time_created));
		echo ')</div>';
		if (isset($vars['params']['correction_request'])){
			//Si ya se ha solicitado la corrección, mostramos el mensaje con la fecha
			echo '<div class="solve-form task-solved"> Corrección solicitada ( ';
			echo elgg_view('output/date',array('value'=>$vars['params']['correction_request']));
			echo ')</div>';
		}
		if ($vars['params']['task']->corrected == true){
			//Si ya se ha hecho corrección, mostramos al usuario al que se la corregimos
			echo '<div class="solve-form task-solved"> Tarea corregida a ';
			echo elgg_view_entity(get_user($vars['params']['correcting']->owner_guid));
			echo '(' . elgg_view('output/date',array('value'=>$vars['params']['task']->corrected_date)) . ')</div>';
		}
		if ($vars['params']['task']->correction_made == true){
			//Si ya ha sido corregida, mostramos el usuario que la corrigió
			echo '<div class="solve-form task-solved"> Tarea corregida por ';
			echo elgg_view_entity(get_user($vars['params']['task']->corrected_by));
			echo '(' . elgg_view('output/date',array('value'=>$vars['params']['task']->correction_made_date)) . ')</div>';
		}
	}