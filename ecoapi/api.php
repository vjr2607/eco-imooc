<?php
    
	require_once("Rest.inc.php");
	
	class API extends REST {
	
		public $data = "";
		
		const DB_SERVER = "localhost";
		const DB_USER = "root";
		const DB_PASSWORD = "";
		const DB = "rest";
		
		private $db = NULL;
	
		public function __construct(){
			parent::__construct();				// Init parent contructor
			$this->dbConnect();					// Initiate Database connection
		}
		
		/*
		 *  Database connection 
		*/
		private function dbConnect(){
			$this->db = mysql_connect(self::DB_SERVER,self::DB_USER,self::DB_PASSWORD);
			if($this->db)
				mysql_select_db(self::DB,$this->db);
		}
		
		/*
		 * Public method for access api.
		 * This method dynmically call the method based on the query string
		 *
		 */
		public function processApi(){
			$call = explode("/",$_REQUEST['rquest']);
//			$func = strtolower(trim(str_replace("/","",$_REQUEST['rquest'])));
			$func = trim($call[0]);
			$param1 = trim($call[1]);
			$param2 = trim($call[2]);
			if((int)method_exists($this,$func) > 0)
				$this->$func($param1, $param2);
			else
				$this->response('',404);				// If the method not exist with in this class, response would be "Page not found".
		}
		
/* EXAMPLE		private function users(){	
			// Cross validation if the request method is GET else it will return "Not Acceptable" status
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			$sql = mysql_query("SELECT id, fullname, email FROM users WHERE status = 1", $this->db);
			if(mysql_num_rows($sql) > 0){
				$result = array();
				while($rlt = mysql_fetch_array($sql,MYSQL_ASSOC)){
					$result[] = $rlt;
				}
				// If success everythig is good send header as "OK" and return list of users in JSON format
				$this->response($this->json($result), 200);
			}
			$this->response('',204);	// If no records "No Content" status
		} */

		private function heartbeat() {
			$result = array("alive_at" => date("c"));
			$this->response($this->json($result), 200);
		}

		private function teachers($userid) {
			if (substr($userid, 0, 10) === 'eco-imooc-') {
			  $uid = trim(substr($userid,10));
			  $link = mysql_connect("localhost","moodleuser","yourpassword");
			  mysql_select_db('mimooc',$link);
			  $query = "SELECT firstname, lastname, description, picture FROM mdl_user WHERE id=".$uid.";";
			  $sql_result = mysql_query($query, $link) or die(mysql_error());
			  $row = mysql_fetch_assoc($sql_result);
			  $result = array("name" => $row['firstname']." ".$row['lastname']);
			  if ($row['picture']>0) {
				$query = "SELECT id FROM mdl_context WHERE contextlevel=30 AND instanceid=".$uid.";";
				$sql_result = mysql_query($query, $link) or die(mysql_error());
				$row2 = mysql_fetch_assoc($sql_result);
				$result["imageUrl"] = "http://54.68.32.12/mimooc/pluginfile.php/".$row2["id"]."/user/icon/standard/f1.png";
			  }
			  $result["desc"] = array(array("language" => "pt",
								"label" => strip_tags($row['description'])));
			  $this->response($this->json($result), 200);
			}
		}

		private function users($userid, $req) {
			$result = array();
			if ($req=='courses') {
			  $link = mysql_connect("localhost","moodleuser","yourpassword");
			  mysql_select_db('eimooc',$link);
			  $query='SELECT entity_guid FROM elgg_private_settings
    				WHERE name="plugin:user_setting:social_connect:Eco/uid"
    				AND value="'.$userid.'";';
			  $sql_result = mysql_query($query, $link) or die(mysql_error());
			  $row = mysql_fetch_assoc($sql_result);
			  $euid = $row["entity_guid"];
                          $query="SELECT msv.string from elgg_metastrings msn, elgg_metastrings msv, elgg_metadata md, elgg_entity_subtypes st, elgg_entities e
    				WHERE st.subtype='blti_consumer'
    				AND e.type='object' AND e.subtype=st.id
    				AND e.guid=md.entity_guid
    				AND msn.string='key'
    				AND md.name_id=msn.id
    				AND md.value_id=msv.id;";
			  $sql_result = mysql_query($query, $link) or die(mysql_error());
				// Meter um ciclo
                          while ($row = mysql_fetch_assoc($sql_result)) {
			      $key = $row["string"];
			      $musername = 'ltiprovider'.md5($key.':'.$euid);
			      mysql_select_db('mimooc',$link);
			      $query="SELECT u.id as userid, courseid, shortname, timestart from mdl_user u, mdl_user_enrolments ue, mdl_enrol e, mdl_course c
    				WHERE u.username='".$musername."'
    				AND ue.userid=u.id
    				AND ue.enrolid=e.id
    				AND e.courseid=c.id
    				AND c.idnumber LIKE 'eco_%';";
			      $sql_result2 = mysql_query($query, $link) or die(mysql_error());
			      if ($row2 = mysql_fetch_assoc($sql_result2)) {
				  $query3 = "SELECT COUNT(*) AS viewCount, Max(time) AS lastViewDate
					     FROM mdl_log
					     WHERE userid=".$row2["userid"]." AND course=".$row2["courseid"].";";
				  $sql_result3 = mysql_query($query3, $link) or die(mysql_error());
				  if ($row3 = mysql_fetch_assoc($sql_result3)) {
					$lastViewDate = $row3["lastViewDate"];
					$viewCount = $row3["viewCount"];
				  } else {
					$lastViewDate = 0;
					$viewCount = 0;
				  }
			          array_push($result,array("id"=>"course_".$row2["courseid"]."_".$row2["shortname"],
						       "viewCount"=>$viewCount,
						       "firstViewDate"=>date("c",$row2["timestart"]),
						       "lastViewDate"=>date("c",$lastViewDate)));
			     }
			  }
			}
			  $this->response($this->json($result), 200);
		}
		
		
		/*
		 *	Encode array into JSON
		*/
		private function json($data){
			if(is_array($data)){
				return json_encode($data);
			}
		}
	}
	
	// Initiate Library
	
	$api = new API;
	$api->processApi();
?>
