&lt;?xml version="1.0" encoding="UTF-8"?&gt;<br/>
&lt;graphml xmlns="http://graphml.graphdrawing.org/xmlns" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://graphml.graphdrawing.org/xmlns/1.0/graphml.xsd"&gt;<br/>
<br/>
&emsp;&lt;key id="label" for="node" attr.name="color" attr.type="string" /&gt;<br/>
&emsp;&lt;key id="name" for="node" attr.name="color" attr.type="string" /&gt;<br/>
<br/>
&emsp;&lt;graph id="G" edgedefault="directed"&gt;<br/>
<?php
	// make sure only logged in users can see this page 
	gatekeeper(); 
	$users = elgg_get_entities(array('type' => 'user', "limit" => 0));
	
	$user_nodes = array();
	
	$userID = 1;
	foreach ($users as $user){ 
		array_push($user_nodes, $user->username);
?>
	&emsp;&emsp;&lt;node id="u<?php echo $userID; ?>"&gt;<br/>

		&emsp;&emsp;&emsp;&lt;data key="label"&gt;<?php echo $user->username; ?>&lt;/data&gt;<br/>
		&emsp;&emsp;&emsp;&lt;data key="name"&gt;<?php echo $user->name; ?>&lt;/data&gt;<br/>
	&emsp;&emsp;&lt;/node&gt;<br/>
	
	<?php
		$userID++;
	}
	$userID = 1;
	$edgeID = 1;
	foreach ($users as $user){ 
		
		$friends_made = $user->getFriends("", 0);
		foreach ($friends_made as $friend){
			$node =  array_search($friend->username, $user_nodes);
			?>
	&emsp;&emsp;&lt;edge id="e<?php echo $edgeID; ?>" source="u<?php echo $userID; ?>" target="u<?php echo $node + 1; ?>" /&gt;<br/>

			<?php
			$edgeID++;
		}
		$userID++;
	}
	?>
&emsp;&lt;/graph&gt;<br/>
&lt;/graphml&gt;