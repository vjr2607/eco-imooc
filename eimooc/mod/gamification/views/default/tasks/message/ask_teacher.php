<?php
	$parent_task = get_entity($vars["task"]->container_guid);
	$user_asking = get_entity($vars["user_guid"]);
	$user_task = get_entity($vars["task"]->owner_guid);
?>
<div>
<img style="float:left;" src="<?php echo $parent_task->getIconURL(); ?>" />
<pre style="float:left; background:#fff;"> 
<br/><br/><br/><br/>
</pre>

<?php 
	if ($vars["user_guid"] == $vars["task"]->owner_guid){
		$user_correcting = get_entity($vars["task"]->corrected_by);
	?>
	<a href="<?php echo $user_asking->getURL(); ?>"><?php echo $user_asking->name; ?></a> ha solicitado que un profesor intervenga en la corrección de su tarea <a href="<?php echo $vars['url'] ?>gamification/tasks/view/<?php echo $vars['task']->guid; ?>"> <?php echo $parent_task->title; ?></a>, corregida por <a href="<?php echo $user_correcting->getURL(); ?>"><?php echo $user_correcting->name; ?></a>.<br/><br/>
	Ve a la <a href="<?php echo $vars['url'] ?>gamification/tasks/view/<?php echo $vars['task']->guid; ?>">vista de la tarea</a> para comprobarla.
	</div>
	
	<?php
	}
	else{
		$user_task = get_entity($vars["task"]->owner_guid);
		?>
		<a href="<?php echo $user_asking->getURL(); ?>"><?php echo $user_asking->name; ?></a> ha solicitado que un profesor intervenga en la corrección de la tarea <a href="<?php echo $vars['url'] ?>gamification/tasks/view/<?php echo $vars['task']->guid; ?>"> <?php echo $parent_task->title; ?></a> que está corrigiendo, realizada por <a href="<?php echo $user_task->getURL(); ?>"><?php echo $user_task->name; ?></a>.<br/><br/>
	Ve a la <a href="<?php echo $vars['url'] ?>gamification/tasks/view/<?php echo $vars['task']->guid; ?>">vista de la tarea</a> para comprobarla.
	</div>
	<?php
	}
?>

