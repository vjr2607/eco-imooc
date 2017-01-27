<?php

$ECO_BASE='http://eco.imooc.uab.pt';

$hub_id="oai:pt.uab.imooc.eco:course_";

$conn_m=Connection_m();
$conn_e=Connection_e();

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

function LastSync($connection) {
  $lastsync='0';
  $sql = "SELECT value FROM eco_config WHERE variable='lastsync'";
  $result = $connection->query($sql);

  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      $lastsync = $row["value"];
    }
  }
  return $lastsync;
}

function SaveLastSync($lastsync) {
  global $conn_m;
  
  $sql="UPDATE eco_config SET value=".$lastsync." WHERE variable='lastsync';";
  $conn_m->query($sql);
}


/* call this fnction if there is a need to refresh all tables */
function CreateTables() {
  global $conn_m;
  
  $sql = "CREATE TABLE eco_events (
id BIGINT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
logid BIGINT(10),
courseid VARCHAR(255),
coursename VARCHAR(255),
name VARCHAR(255) NOT NULL,
mbox VARCHAR(50),
ecoid VARCHAR(50) NOT NULL,
verbid VARCHAR(255),
verbdisplay VARCHAR(255),
objectid VARCHAR(255),
objname VARCHAR(255),
objdesc TEXT,
objtype VARCHAR(255),
timestamp VARCHAR(50),
sync BOOLEAN
)";

  if ($conn_m->query($sql) === TRUE) {
    echo "Table eco_events created successfully\n";
  } else {
    echo "Error creating table: " . $conn_m->error;
  }

  $sql = "CREATE TABLE eco_config (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
variable VARCHAR(30),
value VARCHAR(30)
)";

  if ($conn_m->query($sql) === TRUE) {
    echo "Table eco_config created successfully\n";
    $sql = "INSERT INTO eco_config (variable, value)
 VALUES ('lastsync', '0');";

    if ($conn_m->query($sql) === TRUE) {
      echo "New record created successfully\n";
    } else {
      echo "Error: " . $sql . "<br>" . $conn_m->error;
    }
  } else {
    echo "Error creating table: " . $conn_m->error;
  }
}


//
// VERB: access a page
//
function AccessPage($verbid,$verbdisp,$module,$action) 
{
	global $conn_m, $ECO_BASE, $hub_id;

	// get the last timestamp processed
	$lastsync=LastSync($conn_m);
	$obj_map = array(
			"achieved"=>"http://activitystrea.ms/schema/1.0/badge",
			"assign"=>"http://id.tincanapi.com/activitytype/school-assignment", // add, view, view submission grading table
			"blog"=>"http://www.ecolearning.eu/expapi/activitytype/blog", // add, update, view
			"book"=>"http://id.tincanapi.com/activitytype/book", // add, add chapter, print, print chapter, update, update chapter, 
			// view, view chapter
			"calendar"=>"media", // add, edit
			"choice"=>"media", // add, view
			"course"=>"http://adlnet.gov/expapi/activities/course", // add mod, delete mod, editsection, enrol, new, recent, 
			// report live, report log, report outline, report participation, 
			// unenrol, upudate, update mod, view, view section
			"discussion"=>"http://www.ecolearning.eu/expapi/activitytype/discussionthread", // mark read
			"forum"=>"http://id.tincanapi.com/activitytype/discussion", // add, add discussion, add post, delete discussion, delete post, 
			// mark read, move discussion, search, stop tracking, subscribe, 
			// subscribeall, unsubscribe, update, update post, view discussion, 
			// view forum, view forums, view subscribers
			"friend"=>"http://activitystrea.ms/schema/1.0/person",
			"label"=>"media", // add, update
			"lesson"=>"media", // add, start
			"library"=>"media", // mailer
			"likes"=>"http://www.ecolearning.eu/expapi/activitytype/blog",
			"login"=>"media", // error
			"member"=>"http://activitystrea.ms/schema/1.0/group",
			"message"=>"media", // add contact, block contact, remove contact, view, write
			"notes"=>"media", // view
			"quiz"=>"http://adlnet.gov/expapi/activities/assessment", // add, attempt, close attempt, continue attempt, editquestions, 
			// preview, report, review, update, view, view summary
			"page"=>"http://activitystrea.ms/schema/1.0/page", // add, update, view
			"resource"=>"http://adlnet.gov/expapi/activities/file", // add, update, view
			"role"=>"media", // assign, edit, unassign
			"tag"=>"media", // update
			"url"=>"link", // add, update, view
			"user"=>"media", // add, change password, delete, login, logout, set password, 
			// update, view, viewall
			"webservice"=>"media", // add
			"wiki"=>"http://www.ecolearning.eu/expapi/activitytype/wiki", // add, add page
			"workshop"=>"http://www.ecolearning.eu/expapi/activitytype/peerassessment"); // add, add assessement, add submission, update, 
	// update agregate grades, update assignment, update submission, 
	// update switch phase, view, view submission

	if($module!='course')
		$sql = "SELECT mdl_log.id as logid, firstname, lastname, email, mdl_log.course AS course, mdl_course.shortname AS shortname, mdl_course.fullname AS fullname, mdl_log.url as url, cmid, mdl_log.module AS module, mdl_".$module.".name AS objname, mdl_".$module.".intro AS objdesc, time
			FROM mdl_log, mdl_user, mdl_course_modules, mdl_".$module.", mdl_course
			WHERE userid=mdl_user.id
			AND mdl_course.idnumber like 'eco\_%'
			AND left(mdl_user.username,11)='ltiprovider'
			AND mdl_user.deleted=0
			AND mdl_log.module='".$module."'
			AND mdl_log.cmid=mdl_course_modules.id
			AND mdl_log.course=mdl_course.id
			AND mdl_".$module.".id=instance
			AND action='".$action."'
			AND time>".$lastsync." ;"; 
	else if($module=='course' || 1)
		$sql = "SELECT mdl_log.id as logid, firstname, lastname, email, mdl_log.course AS course, mdl_course.shortname AS shortname,  mdl_course.fullname AS fullname, mdl_log.url as url, cmid, mdl_log.module AS module, mdl_course.fullname AS objname, mdl_course.summary AS objdesc, time
			FROM mdl_log, mdl_user, mdl_course
			WHERE userid=mdl_user.id
			AND mdl_course.idnumber like 'eco\_%'
			AND left(mdl_user.username,11)='ltiprovider'
			AND mdl_user.deleted=0
			AND mdl_log.module='".$module."'
			AND mdl_log.course=mdl_course.id
			AND action='".$action."'
			AND time>".$lastsync." ;"; 


			$result = $conn_m->query($sql);

	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
			// atualizar eco_events
			if ($module!='course')
				$sql = "INSERT INTO eco_events (logid, courseid, coursename, name, mbox, verbid, verbdisplay, objectid, objname, objdesc, objtype, timestamp, sync)
					VALUES (".$row["logid"].",'".$hub_id.$row["course"]."_".$row["shortname"]."','".$row["fullname"]."','".$row["firstname"].' '.$row["lastname"]."','".$row["email"]."','".$verbid."','".$verbdisp."','".$ECO_BASE."/mimooc/mod/".$row["module"]."/".$row["url"]."','".$row["objname"]."','".$row["objdesc"]."','".$obj_map[$row["module"]]."',".$row["time"].",0);";
      else if($module=='course' || 1)
        $sql = "INSERT INTO eco_events (logid, courseid, coursename, name, mbox, verbid, verbdisplay, objectid, objname, objdesc, objtype, timestamp, sync)
 VALUES (".$row["logid"].",'".$hub_id.$row["course"]."_".$row["shortname"]."','".$row["fullname"]."','".$row["firstname"].' '.$row["lastname"]."','".$row["email"]."','".$verbid."','".$verbdisp."','".$ECO_BASE."/mimooc/".$row["module"]."/".$row["url"]."','".$row["objname"]."','".$row["objdesc"]."','".$obj_map[$row["module"]]."',".$row["time"].",0);";
 
      if($conn_m->query($sql)===FALSE)
        echo "Error: " . $sql; // $row["userid"]. " " . $row["URL"]. " " . $row["email"] . " " . $row["time"]. "<br>";
      if($lastsync<$row["time"])
        $lastsync=$row["time"];
    }
  }
  return $lastsync;
}

function GetElggObject($elgg_type, $elgg_subtype, $elgg_id, &$objectid, &$objname, &$objdesc, &$objtype) {
  global $conn_e, $ECO_BASE;
  
//  echo "ID: ".$elgg_id."\n";
  if ($elgg_type=='object' && $elgg_subtype='blog') {
    $sql = "SELECT title, description FROM elgg_objects_entity WHERE guid=".$elgg_id.";";
    $result = $conn_e->query($sql);
    if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      $objname = $conn_e->real_escape_string($row["title"]);
      $objdesc = $conn_e->real_escape_string($row["description"]);
    } else return 0;
    $objectid = $ECO_BASE.'/elgg/blog/view/'.$elgg_id;
    $objtype = 'http://www.ecolearning.eu/expapi/activitytype/blog';
  } else
  if ($elgg_type=='relationship') {
    if ($elgg_subtype=='friend') {
      $sql = "SELECT name, email FROM elgg_users_entity ue, elgg_entity_relationships re WHERE re.id=".$elgg_id." AND ue.guid=re.guid_two;";
      $result = $conn_e->query($sql);
      if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $objname = $row["name"];
        $objdesc = $row["email"];
      } else return 0;
      $objectid = 'user';
    } else
    if ($elgg_subtype=='member') {
      $sql = "SELECT ge.guid as guid, name, description FROM elgg_groups_entity ge, elgg_entity_relationships re WHERE re.id=".$elgg_id." AND ge.guid=re.guid_two;";
      $result = $conn_e->query($sql);
      if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $objname = $conn_e->real_escape_string($row["name"]);
        $objdesc = $conn_e->real_escape_string($row["description"]);
        $obj_guid = $row["guid"];
      } else return 0;
      $objectid = $ECO_BASE.'/elgg/group/profile/'.$obj_guid;
      $objtype = 'http://activitystrea.ms/schema/1.0/group';
    } else
    if ($elgg_subtype=='achieved') {
      $sql = "SELECT oe.guid as guid, title, description FROM elgg_objects_entity oe, elgg_entity_relationships re WHERE re.id=".$elgg_id." AND oe.guid=re.guid_two;";
      $result = $conn_e->query($sql);
      if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $objname = $conn_e->real_escape_string($row["title"]);
        $objdesc = $conn_e->real_escape_string($row["description"]);
        $obj_guid = $row["guid"];
      } else return 0;
      $objectid = $ECO_BASE.'/elgg/gamification/achievements/view/'.$obj_guid;
      $objtype = 'http://activitystrea.ms/schema/1.0/badge';
    } else return 0;
  } else
  if ($elgg_type=='annotation' && $elgg_subtype='likes') { //blog or tweet
    $sql = "SELECT oe.guid as guid, es.subtype as subtype, title, description FROM elgg_entities e, elgg_objects_entity oe, elgg_entity_subtypes es WHERE oe.guid=".$elgg_id." AND e.guid=oe.guid AND es.id=e.subtype;";
     $result = $conn_e->query($sql);
    if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      $objname = $conn_e->real_escape_string($row["title"]);
      $objdesc = $conn_e->real_escape_string($row["description"]);
      $obj_guid = $row["guid"];
      $obj_subtype = $row["subtype"];
    } else return 0;
    $objectid = $ECO_BASE.'/elgg/'.$obj_subtype.'/view/'.$obj_guid;
    if ($obj_subtype=='blog')
      $objtype = 'http://www.ecolearning.eu/expapi/activitytype/blog';
    else if ($obj_subtype=='thewire')
      $objtype = 'http://www.ecolearning.eu/expapi/activitytype/tweet';
    else return 0;
  } else return 0;
  return 1;
}

function AccessElgg($verbid, $verbdisp, $class, $type, $subtype, $event) {
  global $conn_m, $conn_e;
  $lastsync = LastSync($conn_m);

  $sql = "SELECT sl.id as logid, ue.name as name, ue.email as email, object_id as objectid, time_created
FROM elgg_system_log sl, elgg_users_entity ue
WHERE sl.performed_by_guid=ue.guid
AND object_class = '".$class."' ".
"AND object_type = '".$type."' ".
"AND object_subtype = '".$subtype."' ".
"AND event = '".$event."' ".
"AND time_created >".$lastsync.
";";

  $objname = '';
  $objdesc = '';

  $result = $conn_e->query($sql);

  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      
      if (GetElggObject($type, $subtype, $row["objectid"], $objectid, $objname, $objdesc, $objtype)) {
      
        $sql = "INSERT INTO eco_events (logid, courseid, coursename, name, mbox, verbid, verbdisplay, objectid, objname, objdesc, objtype, timestamp, sync)
 VALUES (".$row["logid"].",'','','".$row["name"]."','".$row["email"]."','".$verbid."','".$verbdisp."','".$objectid."','".$objname."','".$objdesc."','".$objtype."',".$row["time_created"].",0);";
        if($conn_m->query($sql)===FALSE)
          echo "Error: " . $sql;
        if($lastsync<$row["time_created"])
          $lastsync=$row["time_created"];
      }
    }
  }
  return $lastsync;
}

// falta: extrair o mbox e ecoid; adicionar na tabela em vez do echo; enrol


//
// VERB: enrol in a course
//
// Adicionar eventos de enrol para utilizadores que não estejam já
function EnrollCourse() {
  global $conn_m, $hub_id;
  
  $verbid = 'http://adlnet.gov/expapi/verbs/registered';
  $verbdisp = 'Indicates the learner enrolls in a MOOC';

  $sql = "SELECT mdl_log.id as logid, firstname, lastname, email , course, shortname, fullname, summary, MIN(time) as TIME
	FROM mdl_log, mdl_user, mdl_course
	WHERE userid=mdl_user.id
	AND course=mdl_course.id
	AND left(mdl_user.username,11)='ltiprovider'
	AND mdl_user.deleted=0
	AND action='view'
	AND mdl_course.idnumber LIKE 'eco_%'
	GROUP BY email;";
  $result = $conn_m->query($sql);
  if($result->num_rows>0) {
    while($row=$result->fetch_assoc()) {
      // ver se existe
      $sql="SELECT * FROM eco_events WHERE verbid='".$verbid."' AND mbox='".$row["email"]."';";
      $res=$conn_m->query($sql);
      if($res->num_rows==0) {
        $sql="INSERT INTO eco_events (logid, courseid, coursename, name, mbox, verbid, verbdisplay, objectid, objname, objdesc, objtype, timestamp, sync)
VALUES (".$row["logid"].",'','','".$row["firstname"]." ".$row["lastname"]."','".$row["email"]."','".$verbid."','".$verbdisp."','".$hub_id.$row["course"]."_".$row["shortname"]."','".$row["fullname"]."','".$row["summary"]."','http://adlnet.gov/expapi/activities/course',".$row["TIME"].",0);"; // vjr - correct  course url
        $conn_m->query($sql);
      }
    }
  }
}

////////////////////////
// calling the functions
////////////////////////

$verbid=array(array("http://activitystrea.ms/schema/1.0/access", //
                    "Indicates the learner accessed something",
                    "page", "view"),
              array("http://activitystrea.ms/schema/1.0/access", //
                    "Indicates the learner accessed something",
                    "course", "view"),
              array("http://activitystrea.ms/schema/1.0/submit", //
                    "Indicates the learner submitted something",
                    "workshop", "update submission"),
              array("http://activitystrea.ms/schema/1.0/submit", //
                    "Indicates the learner submitted something",
                    "workshop", "update assessment"),
              array("http://activitystrea.ms/schema/1.0/submit", //
                    "Indicates the learner submitted something",
                    "workshop", "add submission"),
              array("http://activitystrea.ms/schema/1.0/submit", //
                    "Indicates the learner submitted something",
                    "workshop", "add assessment"),
              array("http://adlnet.gov/expapi/verbs/attempted", //
                    "Indicates the learner attempted something",
                    "quiz", "attempt"),
              array("http://adlnet.gov/expapi/verbs/attempted", //
                    "Indicates the learner attempted something",
                    "quiz", "continue attempt"),
              array("http://activitystrea.ms/schema/1.0/submit", //
                    "Indicates the learner submitted something",
                    "quiz", "close attempt"),
              array("http://activitystrea.ms/schema/1.0/add", //
                    "Indicates the learner added something",
                    "assign", "submit"),
              array("http://activitystrea.ms/schema/1.0/submit", //
                    "Indicates the learner submitted something",
                    "assign", "submit for grading"),
              array("http://activitystrea.ms/schema/1.0/access", //
                    "Indicates the learner accessed something",
                    "wiki", "view"),
              array("http://activitystrea.ms/schema/1.0/update", //
                    "Indicates the learner updated or edited something",
                    "wiki", "edit"),
              array("http://activitystrea.ms/schema/1.0/create", //
                    "Indicates the learner created something",
                    "wiki", "add page"),
              array("http://activitystrea.ms/schema/1.0/access", //
                    "Indicates the learner accessed something",
                    "book", "view"),
              array("http://activitystrea.ms/schema/1.0/access", //
                    "Indicates the learner accessed something",
                    "book", "view chapter"),
              array("http://activitystrea.ms/schema/1.0/author", //
                    "Indicates the learner authored something",
                    "forum", "add discussion"),
              array("http://adlnet.gov/expapi/verbs/commented", //
                    "Indicates the learner commented on something",
                    "forum", "add post"),
              array("http://activitystrea.ms/schema/1.0/read", //
                    "Indicates the learner read a forum message",
                    "forum", "view forum"),
              array("http://activitystrea.ms/schema/1.0/read", //
                    "Indicates the learner read a forum message",
                    "forum", "view discussion"),
              array("http://activitystrea.ms/schema/1.0/access", //
                    "Indicates the learner accessed something",
                    "resource", "view"));


$verbid_elgg = array(
	     	array("http://activitystrea.ms/schema/1.0/author",
		      "Indicates the learner authored something",
		      "ElggBlog", "object", "blog", "create"),
		array("http://adlnet.gov/expapi/verbs/commented",
	      	      "Indicates the learner commented on something",
		      "ElggBlog", "object", "blog", "annotate"),
		array("http://activitystrea.ms/schema/1.0/follow",
		      "Indicates the learner follows another user",
		      "ElggRelationship", "relationship", "friend", "create"),
		array("http://activitystrea.ms/schema/1.0/join",
		      "Indicates the learner joins group xyz",
		      "ElggRelationship", "relationship", "member", "create"),
		array("http://activitystrea.ms/schema/1.0/leave",
		      "Indicates the learner leaves group xyz",
		      "ElggRelationship", "relationship", "member", "delete"),
		array("http://activitystrea.ms/schema/1.0/like",
		      "Indicates the learner likes resource xyz",
		      "ElggAnnotation", "annotation", "likes", "create"),
		array("http://activitystrea.ms/schema/1.0/receive",
		      "Indicates the learner received something",
		      "ElggRelationship", "relationship", "achieved", "create"),
		array("http://activitystrea.ms/schema/1.0/stop-following",
		      "Indicates the learner stops following another user",
		      "ElggRelationship", "relationship", "friend", "delete")
);

/*

25156

SELECT sl.id as logid, ue.name as name, ue.email as email, object_id as objectid, time_created
FROM elgg_system_log sl, elgg_users_entity ue
WHERE sl.performed_by_guid=ue.guid
AND object_class = 'ElggRelationship'
AND object_type = 'relationship'
AND object_subtype = 'member'
AND event = 'create';

35671 -> 56516

SELECT sl.id as logid, ue.name as name, ue.email as email, object_id as objectid, time_created
FROM elgg_system_log sl, elgg_users_entity ue
WHERE sl.performed_by_guid=ue.guid
AND object_class = 'ElggAnnotation'
AND object_type = 'annotation'
AND object_subtype = 'likes'
AND event = 'create';

28010

SELECT sl.id as logid, ue.name as name, ue.email as email, object_id as objectid, time_created
FROM elgg_system_log sl, elgg_users_entity ue
WHERE sl.performed_by_guid=ue.guid
AND object_class = 'ElggRelationship'
AND object_type = 'relationship'
AND object_subtype = 'achieved'
AND event = 'create';


blog/view/<ID>
-----
blog/view/<ID>
-----
SELECT ue.name, ue.email,
FROM elgg_users_entity ue, elgg_relationships_entity re
WHERE re.id= <ID>
AND ue.guid=re.guid_two;
-----
SELECT re.guid_two,
FROM elgg_relationships_entity re
WHERE re.id= <ID>;

group/profile/ <GUID>
-----
SELECT re.guid_two,
FROM elgg_relationships_entity re
WHERE re.id= <ID>;

group/profile/ <GUID>
-----
SELECT e.guid, es.subtype
FROM elgg_annotations a, elgg_entities e, elgg_entity_subtypes es
WHERE a.id= <ID>
AND e.guid=a.entity_guid
AND es.id=e.subtype;

<es.subtype>/view/<e.guid>
-----
SELECT re.guid_two,
FROM elgg_relationships_entity re
WHERE re.id= <ID>;

gamification/achievements/<ID>
-----
SELECT ue.name, ue.email,
FROM elgg_users_entity ue, elgg_relationships_entity re
WHERE re.id= <ID>
AND ue.guid=re.guid_two;

*/

//CreateTables();
$lastMax=LastSync($conn_m);
foreach($verbid as $values) {
  $lastUpdate=AccessPage($values[0], $values[1], $values[2], $values[3]);
  if($lastUpdate>$lastMax)
    $lastMax=$lastUpdate;
}
foreach($verbid_elgg as $values) {
  $lastUpdate=AccessElgg($values[0], $values[1], $values[2], $values[3], $values[4], $values[5]);
  if($lastUpdate>$lastMax)
    $lastMax=$lastUpdate;
}
SaveLastSync($lastMax);
EnrollCourse();
 ?> 
