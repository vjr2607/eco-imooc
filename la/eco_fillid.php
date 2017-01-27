<?php

function Connection_m() {
  $servername = "localhost";
  $username = "moodleuser";
  $password = "yourpassword";
  $dbname = "mimooc";

  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);

  // Check connection
  if ($conn->connect_error) 
     die("Connection failed: " . $conn->connect_error);

  return $conn;
}

function Connection_e() {
  $servername = "localhost";
  $username = "moodleuser";
  $password = "yourpassword";
  $dbname = "eimooc";

  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);

  // Check connection
  if ($conn->connect_error)
     die("Connection failed: " . $conn->connect_error);

  return $conn;
}

$conn_m=Connection_m();
$conn_e=Connection_e();

$sql = "SELECT id, mbox from eco_events WHERE sync=0 AND length(ecoid)<1;";
$result = $conn_m->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
  while($row = $result->fetch_assoc()) {
      // fill in ecoid
      $sql_e = "SELECT value FROM elgg_private_settings ps, elgg_users_entity ue
WHERE ps.entity_guid = ue.guid
AND ue.email = '".$row["mbox"].
"' AND ps.name = 'plugin:user_setting:social_connect:Eco/uid';";
      $result_e = $conn_e->query($sql_e);
      if ($result_e->num_rows > 0) {
         $row_e = $result_e->fetch_assoc();
	 $sql_i = "UPDATE eco_events SET ecoid='".$row_e["value"]."' WHERE id=".$row["id"].";";
	 if ($conn_m->query($sql_i)===FALSE)
	    echo "Error: ". $sql_i;
      }
  }
}

$sql = "SELECT id, objdesc from eco_events WHERE sync=0 AND objectid='user' AND length(objtype)<1;";
$result = $conn_m->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
  while($row = $result->fetch_assoc()) {
      // fill in ecoid
      $sql_e = "SELECT value FROM elgg_private_settings ps, elgg_users_entity ue
WHERE ps.entity_guid = ue.guid
AND ue.email = '".$row["objdesc"].
"' AND ps.name = 'plugin:user_setting:social_connect:Eco/uid';";
      $result_e = $conn_e->query($sql_e);
      if ($result_e->num_rows > 0) {
         $row_e = $result_e->fetch_assoc();
         $sql_i = "UPDATE eco_events SET objtype='".$row_e["value"]."' WHERE id=".$row["id"].";";
         if ($conn_m->query($sql_i)===FALSE)
            echo "Error: ". $sql_i;
      }
  }
}

?>
