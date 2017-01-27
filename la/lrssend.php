<?php 

//$ECO_LA_API_URL = 'http://xapi-proxy-dev.appspot.com/data-proxy/xAPI/statement/origin/iMOOC';
//$ECO_LA_API_USERNAME = 'yourusername';
//$ECO_LA_API_PASSWORD = 'yourpassword';

$ECO_LA_API_URL = 'http://eco-xapi-production-server.appspot.com/data-proxy/xAPI/statement/origin/iMOOC';
$ECO_LA_API_USERNAME = 'yourusername';
$ECO_LA_API_PASSWORD = 'yourpassword';

function Connection() {
  $servername = "localhost";
  $username = "moodleuser";
  $password = "yourpassword";
  $dbname = "mimooc";

  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);

  // Check connection
  if ($conn->connect_error)
     die("Connection failed: " . $conn->connect_error);

  $conn->set_charset("utf8");

  return $conn;
}

$actor = array( "objectType"=>"Agent", "account"=>array( "homePage"=>"", "name"=>"" ), "name"=>"", "mbox"=>"" );
$actor2 = array( "objectType"=>"Agent", "account"=>array ( "homePage"=>"", "name"=>"" ), "name"=>"", "mbox"=>"" );
$verb = array( "id"=>"", "display"=>array( "en-US"=>"" ));
$object = array( "objectType"=>"Activity", "id"=>"",
	"definition"=>array( "name"=>array( "pt-PT"=>"" ),
			     "description"=>array( "pt-PT"=>"" ),
			     "type"=>""));
$context = array( "contextActivities"=> array( "parent"=> array( array("objectType"=>"Activity", "id"=>"", "definition"=>array( "type"=>"http://adlnet.gov/expapi/activities/course", "name"=>array("pt-PT"=>"")) ))));

$statement1 = '
{
    "actor": {
        "objectType": "Agent",
        "name": "Vitor Rocio",
        "mbox": "mailto:vitor.rocio@uab.pt"
    },
    "verb": {
        "id": "http://adlnet.gov/expapi/verbs/registered",
        "display": {
            "en-US": "Indicates the learner enrolls in a MOOC"
        }
    },
    "object": {
        "objectType": "Activity",
        "id": "oai:pt.uab.imooc.eco:543009",
        "definition": {
            "name": {
                "en-US": "Competêias Digitais para Professores"
            },
            "description": {
                "en-US": "Neste curso serárovocado o debate em torno da utilizaç das tecnologias em educaç. A tecnologia, por si sóãinfluencia a aprendizagem mas médos de ensino eficazes incorporando tecnologias digitais podem facilitar a aprendizagem. Deste modo, pretende-se que os participantes no curso reflitam sobre os desafios colocados àscola, em particular, no contexto de sala de aula, resultantes da influêia das tecnologias digitais e que discutam formas de integraç de ferramentas tecnolóas de aprendizagem social (social learning tools) visando melhores prácas com impactos positivos nos desempenhos dos alunos."
            },
            "type": "http://adlnet.gov/expapi/activities/course"
        }
    },
    "timestamp":"'.date('c').'",
    "version":"1.0.1"
}';

$statement2 = '
{
    "actor": {
        "objectType": "Agent",
        "name": "Vitor Rocio",
        "mbox": "mailto:vitor.rocio@uab.pt"
    },
    "verb": {
        "id": "http://activitystrea.ms/schema/1.0/access",
        "display": {
            "en-US": "Indicates the learner accessed a page"
        }
    },
    "object": {
        "objectType": "Activity",
        "id": "http://54.68.32.12/mimooc/mod/page/view.php?id=275",
        "definition": {
            "name": {
                "en-US": "Orientaçs detalhadas Tema 3"
            },
            "description": {
                "en-US": ""
            },
            "type": "http://adlnet.gov/expapi/activities/lesson"
        }
    },
    "timestamp":"'.date('c').'",
    "version":"1.0.1"
}';

function store_in_lrs($statement)  {
//    $url = 'http://xapi-proxy-dev.appspot.com/data-proxy/xAPI/statements';
//    $url = 'http://sharetec.celstec.org/learninglocker/public/data/xAPI/statements';
//    $username = 'yourusername';
    //$username = 'yourusername';
//    $password = 'yourpassword';
    //$password = 'yourpassword';

    global $ECO_LA_API_URL, $ECO_LA_API_USERNAME, $ECO_LA_API_PASSWORD;

    $ch = curl_init($ECO_LA_API_URL);

    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
	'Content-Type: application/json',
	'X-Experience-API-Version:1.0.0')
    );
    curl_setopt($ch, CURLOPT_USERPWD, $ECO_LA_API_USERNAME.":".$ECO_LA_API_PASSWORD);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $statement);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $result = curl_exec($ch);

    curl_close($ch);
    return $result;
}

$conn = Connection();
$sql = "SELECT * from eco_events WHERE sync=0 AND length(ecoid)>1;";
$result = $conn->query($sql);

if($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
	if ($row["objtype"]!="") {
	    $actor["account"]["homePage"]="https://portal.ecolearning.eu?user=".$row["ecoid"];
	    $actor["account"]["name"]=$row["ecoid"];
	    $actor["name"]=$row["name"];
	    $actor["mbox"]=$row["mbox"];
	    $verb["id"]=$row["verbid"];
	    $verb["display"]["en-US"]=$row["verbdisplay"];
	    if ($row["objectid"]=='user') {
$actor2["account"]["homePage"]="https://portal.ecolearning.eu?user=".$row["objtype"];
              $actor2["name"]=$row["objname"];
              $actor2["mbox"]=$row["objdesc"];
              $actor2["account"]["name"]=$row["objtype"];
	      $argument=$actor2;
              //$statement = str_replace('\\/', '/', json_encode(array("actor"=>$actor, "verb"=>$verb, "object"=>$actor2, "timestamp"=>date("c", $row["timestamp"]), "version"=>"1.0.1"), JSON_UNESCAPED_UNICODE));
	    } else {
	      $object["id"]=$row["objectid"];
	      $object["definition"]["name"]["pt-PT"]=$row["objname"];
	      $object["definition"]["description"]["pt-PT"]=$row["objdesc"];
	      $object["definition"]["type"]=$row["objtype"];
	      $argument=$object;
	      //$statement = str_replace('\\/', '/', json_encode(array("actor"=>$actor, "verb"=>$verb, "object"=>$object, "timestamp"=>date("c", $row["timestamp"]), "version"=>"1.0.1"), JSON_UNESCAPED_UNICODE));
	    }
	    if ($row["courseid"] != '') {
	      $context["contextActivities"]["parent"][0]["id"]=$row["courseid"];
	      $context["contextActivities"]["parent"][0]["definition"]["name"]["pt-PT"]=$row["coursename"];
	      $statement = str_replace('\\/', '/', json_encode(array("actor"=>$actor, "verb"=>$verb, "object"=>$argument, "context"=> $context, "timestamp"=>date("c", $row["timestamp"]), "version"=>"1.0.1"), JSON_UNESCAPED_UNICODE));
	    } else
		$statement = str_replace('\\/', '/', json_encode(array("actor"=>$actor, "verb"=>$verb, "object"=>$argument, "timestamp"=>date("c", $row["timestamp"]), "version"=>"1.0.1"), JSON_UNESCAPED_UNICODE));
     	  //echo  $row["id"].": ".$statement."\n";
          echo $row["id"].": ".store_in_lrs($statement)."\n";
         }
    }
}

//echo 'EVENTO 1: '.store_in_lrs($statement1)."\n";
//echo 'EVENTO 2: '.store_in_lrs($statement2)."\n";

?>
