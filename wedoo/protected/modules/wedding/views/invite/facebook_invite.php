<?php 

session_start();
$appID='341270709343143';
$appSecret='2409b1178117ff8183c5bc83e442b568';
require 'lib/facebook/facebook.php';

$facebook = new Facebook(array(
		'appId'		=>  $appID,
		'secret'	=> $appSecret,
		));
//get the user facebook id	
	
$user = $facebook->getUser();



if($user){
	try{ 
		//get the facebook friends list
		$user_friends = $facebook->api('/me/friends');
	}catch(FacebookApiException $e){
		error_log($e);
		$user = NULL;
	}		
}
/*<a href="javascript:void(0);" onclick="fb_logout();">Logout</a> */
if(isset($user_friends)){ 
$fbFriends= ""; 
$fbFriends = '<ul  class="fb_frnds">';
	foreach($user_friends['data'] as $user_friend){
$fbFriends.= '<li>
<img src="https://graph.facebook.com/'.$user_friend['id'].'/picture" />
<div  class="frnd_list">'.$user_friend['name'].'</div>
<a href="javascript:void(0);" onclick="send_invitation('.$user_friend['id'].');"> Invite </a>
</li>';

 }  
$fbFriends.='</ul>';

}else{
	
$fbFriends = header('Location: '.$base_url);	
}

echo $fbFriends;
?>
<script src="http://connect.facebook.net/en_US/all.js#xfbml=1"> </script>

<script type="text/javascript">
FB.init({ 
       appId:'<?php echo $appID; ?>', cookie:true, 
       status:true, xfbml:true 
     });

function send_invitation(fb_frnd_id){
     FB.ui({ method: 'apprequests', 
       message: 'Wedoo Project Invitation.',
	   to:fb_frnd_id
	   });
}
function fb_logout(){
	FB.logout(function(response) {
		  parent.location ='<?php echo CController::createURL('invite/invite_guest') ?>';
});
	
}
</script>