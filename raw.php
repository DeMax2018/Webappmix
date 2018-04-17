<BODY style='background:black;color:green;'>
<?php
include"conn.php";
/*var info = {
	name:nameevent,
	ticket:tickets,
	starttime:time,
	endtime:time2,
	discrip:discription,
	imagename:image
}*/
$box = json_decode(file_get_contents('php://input'), true);

$nameev = str_replace("+"," ",$box["name"]);
	$getlatestreservation = $dbh->prepare("SELECT Room_HoursID FROM roomhours order by Room_HoursID desc limit 1;");
	$getlatestreservation->execute();
	$latestreservation = $getlatestreservation->fetch(PDO::FETCH_ASSOC);
	$getinfoevent = $dbh->prepare("SELECT * FROM event WHERE eventname = '".$nameev."' and Reservation = ".$latestreservation["Room_HoursID"]);
	$getinfoevent->execute();
	$getinfoevent->debugDumpParams();
	$info = $getinfoevent->debugDumpParams();
	$infoevent = $getinfoevent->fetch(PDO::FETCH_ASSOC);

	echo "<pre>";
	echo "<p>[AUTHOR]	REASHY LEARNING</p>";
	echo "<p>[DATE]		05/05/2017</p>";
	echo "<p>[ACTION]	Posting FB</p><br>";

	$user_access_token 	= "EAADD6cQpyFIBAONxO8PmSRu3rJPEhDZCDvZBiMSnjbXZApDFOar1Yh1nPHjmuWfG8dJLTUf1ygkQbWDZBt86uwkKmYmGVSiPBHz6ElC1Fx8UiEeWp5tUi1F5ibP0mmXWr6ZAaegR7DEZCnzhSbXQA5Eg4BhfSStQDA0ctKrA4BOwZDZD";
	$id_page			= "860909614081282";

	// /* 1] You need an access_token for your page

	$endpoint 	= $id_page."?fields=access_token,id,name&access_token=".$user_access_token."    ".$info;
	$url 		= "https://graph.facebook.com/".$endpoint;
	$data 		= array();
	$method 	= "GET";

	// You are asking => (id, name, access_token) of the page referred to id_page
	// N.B : Fields (id, name) are useless for what we are doing
	$result = curl($url, $data, $method);
	echo "<p>[PAGE INFO] </p>";
	print_r($result);
	//

	//What we receive is  JSON, let's decode it
	$tab 				= json_decode($result, true);
	$page_access_token 	= $tab["access_token"];


/*
	$endpoint 				= "feed";
	$url 					= "https://graph.facebook.com/".$id_page."/".$endpoint;
	$data["message"]		= "I'm learning ! Be kind ! ".date("H:i:s");
	$data["access_token"]	= $page_access_token;
	$method 				= "POST";

	$result = curl($url, $data, $method);
	echo "<p>[POST INFO] </p>";
	print_r($result);
	//
*/


	$endpoint 				= "photos";
	$url 					= "https://graph.facebook.com/".$id_page."/".$endpoint;
	$data["caption"]		= "We have a new event!! Be shure to check it our before all the tickets are gone https://swfactory.be/event.php?id=".$infoevent["EventID"] ;
	$data["url"]			= "https://swfactory.be/images/1.PNG";
	$data["access_token"]	= $page_access_token;
	$method 				= "POST";

	$result = curl($url, $data, $method);
	echo "<p>[POST INFO] </p>";
	print_r($result);
	// */

	function curl($url, $data, $method)
	{
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch,CURLOPT_RETURNTRANSFER , true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER , false);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);

		$query = http_build_query($data);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $query);

		$result = curl_exec($ch);
		return $result;
	}

	echo "<br><br><p>[QUOTE]		My code is simple, your code is simple, our code is simple.</p>";
	echo "<a target='_blank' style='text-decoration:none'href='https://www.youtube.com/channel/UCNfHtKh0XKFvqS2MP9Jm71w'><p>[FIND_ME]	Let's learn something.</p></a>";

?>
</BODY>
