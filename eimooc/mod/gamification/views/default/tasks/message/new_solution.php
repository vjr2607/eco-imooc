<?php
	$parent_task = get_entity($vars["task_guid"]);
	$user = get_user($vars["user_solving"]);
?>
<div>
<img style="float:left;" src="<?php echo $parent_task->getIconURL(); ?>" />
<pre style="float:left; background:#fff;"> 
<br/><br/><br/><br/>
</pre>

	<a href="<?php echo $vars['url']; ?>/profile<?php echo $user->guid; ?>"><?php echo $user->name; ?></a> ha subido una nueva solución para la tarea <a href="<?php echo $parent_task->getURL(); ?>#tab-task-correcting"><?php echo $parent_task->title; ?></a><br/>
	Puedes ir a verla y realizar una nueva corrección de la misma.
</div>

