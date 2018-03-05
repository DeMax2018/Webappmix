<BODY style='background:black;color:green;'>
<?php

	echo "<pre>";
	echo "<p>[AUTHOR]	REASHY LEARNING</p>";
	echo "<p>[DATE]		05/05/2017</p>";
	echo "<p>[ACTION]	Posting FB</p><br>";
	
	function get_page_access_token($user_access_token,$id_page)
	{
		$endpoint = $id_page."?fields=access_token,id,name&access_token=".$user_access_token;
		$url = "https://graph.facebook.com/".$endpoint;
		$data = array();
		
		$result = curl($url, $data, "GET");
		
		$tab = json_decode($result, true);
		return $tab["access_token"];
		
	}
 
	//Post on your wall OR on Page
	//$user_access_token == Your token, you have to generate it every 2 hours here : https://developers.facebook.com/tools/explorer/
	//$id == Your id or the page id
	//$msg == Your msg Captain !
	//$img_url == If you want to add a picture => Direct link only
	//$post_as ==> "PAGE" = Publish on your page || "USER" (or leave empty) = Publish as you
	function posting($user_access_token, $id, $msg, $img_url, $post_as)
	{
		
		$access_token = $user_access_token;
		if ($post_as == "PAGE")
		{
			//This will generate an access_token for your page
			$access_token = get_page_access_token($user_access_token, $id);
		}
		
		//Basics datas for a post
		$endpoint = "feed";
		$data["access_token"] = $access_token;
		$data["message"] = $msg;
		
		if (!empty($img_url))
		{
			//If you want to post a picture => This is the required fields
			$endpoint = "photos";
			$data["caption"] = $msg;
			$data["url"] = $img_url;
		}
		
		//Let's create the URL!
		$url = "https://graph.facebook.com/".$id."/".$endpoint;
		
		//Let's go !
		curl($url, $data, "POST");
		

	}
	
	//Usual curl 
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
		print_r($result);
		echo "<br>";
		return $result;
	}
	
	
	//-------------------------------------------------------
	
	$access_token	= "";
	$id_page 		= "";
	$msg 			= "";
	$img_url 		= "";
	$post_on 		= "";
	
	//posting($access_user_token, $msg, $img_url, $post_as)
	posting($access_token, $id_page, $msg, $img_url, $post_on);

	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	echo "<p><br><br>[QUOTE]		My code is simple, your code is simple, our code is simple.</p>";
	echo "<a style='text-decoration:none'href='https://www.youtube.com/channel/UCNfHtKh0XKFvqS2MP9Jm71w'><p>[FIND_ME]	Let's learn something.</p></a>";

?>
</BODY>