<?php
	$parent_task = get_entity($vars["task_guid"]);
	$user_comment = get_user($vars["commenter"]);
?>
<div>
<img style="float:left;" src="<?php echo $parent_task->getIconURL(); ?>" />
<pre style="float:left; background:#fff;"> 
<br/><br/><br/><br/>
</pre>

	<a href="<?php echo $vars['url']; ?>/profile<?php echo $user_comment->guid; ?>"><?php echo $user_comment->name; ?></a> ha comentado en la discusión sobre la tarea <a href="<?php echo $parent_task->getURL(); ?>"><?php echo $parent_task->title; ?></a>:<br/>
	"<?php echo $vars["comment"]; ?>"<br/><br/>En la propia tarea podrás continuar con la discusión.
</div>

