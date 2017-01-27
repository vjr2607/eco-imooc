<?php
	$parent_task = get_entity($vars["task_correcting"]->container_guid);
?>
<div>
<img style="float:left;" src="<?php echo $parent_task->getIconURL(); ?>" />
<pre style="float:left; background:#fff;"> 
<br/><br/><br/><br/>
</pre>

	<a href="<?php echo $vars['url']; ?>/profile<?php echo $vars["corrector"]->guid; ?>"><?php echo $vars["corrector"]->name; ?></a><?php if ($vars["new_correction"] == true){ ?> ha corregido tu tarea <?php } else { ?> ha cambiado la corrección inicial que hizo de tu tarea <?php } ?><a href="<?php echo $parent_task->getURL(); ?>"><?php echo $parent_task->title; ?></a><br/>
	Puedes ir a verla y comprobar qué resultado has obtenido (a criterio de tu compañero). Si no estás de acuerdo con la corrección, en la propia vista de la tarea tienes la posibilidad de iniciar una discusión privada con tu compañero
	</div>

