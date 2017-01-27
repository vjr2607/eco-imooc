<?php
/**
 * Layout of a river item
 *
 * @uses $vars['item'] ElggRiverItem
 */
 $item = $vars['item'];
 $user_guid = $item->subject_guid;
 $class = "";
 
 $storeItem = elgg_get_entities_from_metadata(array('type' => 'object', 'subtype' => 'store_item', 'metadata_name' => 'item_id', 'metadata_value' => 'custom-river'));
//Comprobamos que realmente existe un item con dicho id
if ($storeItem){
	$storeItem_guid = $storeItem[0]->getGUID();
	 if (check_entity_relationship($user_guid, 'purchased', $storeItem[0]->getGUID()) != false){
		$riverBG = $storeItem[0]->getAnnotations(''. $user_guid);
		$class .= ' custom-river ' . $riverBG[0]->value;
	}
}

echo '<div class="' . $class . '">'; 

echo elgg_view('page/components/image_block', array(
	'image' => elgg_view('river/elements/image', $vars),
	'body' => elgg_view('river/elements/body', $vars),
	'class' => "elgg-river-item"
));
echo '</div>';