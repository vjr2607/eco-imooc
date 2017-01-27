&lt;?xml version="1.0" encoding="UTF-8"?&gt;<br/>
&lt;gexf xmlns="http://www.gexf.net/1.2draft" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.gexf.net/1.2draft http://www.gexf.net/1.2draft/gexf.xsd" version="1.2"&gt;<br/>
<br/>
&emsp;&lt;graph mode="dynamic" defaultedgetype="directed" timeformat="date"&gt;<br/>
&emsp;&emsp;&lt;nodes&gt;<br/>
<?php
	// make sure only logged in users can see this page 
	gatekeeper(); 
	$users = elgg_get_entities(array('type' => 'user', "limit" => 0));
	
	$user_nodes = array();
	
	$userID = 1;
	foreach ($users as $user){ 
		array_push($user_nodes, $user->username);
		$date = date("Y-m-d", $user->time_created);
?>
<!--	&emsp;&emsp;&emsp;&lt;node id="u<?php echo $userID; ?>" label="<?php echo $user->username; ?>" start="<?php echo intval($user->time_created/1000) - 1347280; ?>"&gt;&lt;/node&gt;<br/> -->
	&emsp;&emsp;&emsp;&lt;node id="u<?php echo $userID; ?>" label="<?php echo $user->username; ?>" start="<?php echo $date; ?>"&gt;&lt;/node&gt;<br/>
<?php
	$userID++;
	}
?>
&emsp;&emsp;&lt;/nodes&gt;<br/>
&emsp;&emsp;&lt;edges&gt;<br/>
<?php
	$userID = 1;
	$edgeID = 1;
	foreach ($users as $user){ 
		$rels = get_entity_relationships($user->guid, false);
		foreach($rels as $rel){
			if ($rel->relationship == "friend"){
				$friend = get_entity($rel->guid_two);
				$node =  array_search($friend->username, $user_nodes);
				$date = date("Y-m-d", $rel->time_created);
			?>
			&emsp;&emsp;&emsp;&lt;edge id="<?php echo $edgeID; ?>" source="u<?php echo $userID; ?>" target="u<?php echo ($node + 1); ?>" start="<?php echo $date; ?>" /&gt;<br/>

			<?php
				$edgeID++;
			}
		}
		$userID++;
	}
	?>
&emsp;&emsp;&lt;/edges&gt;<br/>
&emsp;&lt;/graph&gt;<br/>
&lt;/gexf&gt;

