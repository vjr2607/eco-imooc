{
<?php
	$vars = array();
	$user_id =  get_input('id');
	$entity = get_entity($user_id);
	       
        $metadata = get_metadata_for_entity($entity->guid);
        $annotations = get_annotations($entity->guid);
        $relationships = get_entity_relationships($entity->guid);
        $exportable_values = $entity->getExportableValues();
?>
<?php
                foreach ($entity as $k => $v)
                {
                        //if ((in_array($k, $exportable_values)) || (isadminloggedin())) {
                        if ((in_array($k, $exportable_values)) || (elgg_is_admin_logged_in())) {
?>
"<?php echo $k; ?>":"<?php echo $v; ?>",
<?php
                        }
                }
        ?>
<?php if ($metadata) { ?>

<?php
                foreach ($metadata as $m)
                {
?>
"<?php echo $m->name; ?>":"<?php echo str_replace("\r\n","", elgg_strip_tags($m->value)); ?>",
<?php
                }
	} 
 if ($annotations) { 
                foreach ($annotations as $a)
                {
?>
"<?php echo $a->name; ?>":"<?php echo elgg_strip_tags($a->value); ?>",
<?php
                }
 } 
if ($relationships) {
				$count = count($relationships);
                for($i=0; $i<$count; $i++)
                {
					$r = $relationships[$i]; 
?>
"<?php echo $r->relationship; ?>":"<?php echo $r->guid_two; ?>"<?php if ($i < $count -1) echo ',';  }
?>
<?php } ?>
}