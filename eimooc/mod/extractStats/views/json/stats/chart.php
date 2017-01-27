{
	"logs" : [
	<?php
	
	$logs = $vars['log_entries'];
	$count = count($logs);
	for($i=0; $i<$count; $i++){
		$log = $logs[$i];
		?>
		{ "id" : "<?php echo $log->id; ?>", 
		"object_type":"<?php echo $log->object_type; ?>", 
		"object_subtype":"<?php echo $log->object_subtype; ?>", 
		"event":"<?php echo $log->event; ?>", 
		"performed_by":"<?php echo $log->performed_by_guid; ?>",
		"time_created":"<?php echo $log->time_created; ?>",
		"owner_guid":"<?php echo $log->owner_guid; ?>"
		}
	
	<?php
		if ($i < ($count-1)) echo ",";
	}
	?>
	]
}