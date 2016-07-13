<?php
	$clientid	=	'184063824516-71gkj2rlps362875khh4b1d9putvvmev.apps.googleusercontent.com';
	$clientsecret	=	'6fNsryVv9orKXuAi3zS1QQnI';
	$redirecturi	=	'http://www.letsnurture.co.uk/demo/wedoo1/wedding/invite/invite_google'; //Add your redirect URl	
	$maxresults	=	 50;
?>
<?php session_start();
if ($_GET['flag']=='sendMail'){
	foreach($_POST['check'] as $email){
		$to_mail = $email;
		//SEND YOUR MAIL
		$subject = "Wedoo Project App Change Password Request";
		$txt =  "Hi,\r\n\n";
		$txt .= "Wedoo Invitation.\r\n\n";
		$headers = "wedoo@gmail.com";
				
		mail($to_mail,$subject,$txt,"From: $headers");	
	}
}
 ?>


<body link="#0C6182" vlink="#0C6182" alink="#0C6182">
<form method="POST" name="form1" action="?flag=sendMail" enctype="multipart/form-data">
<div align="center">
	<table border="0" width="80%" cellspacing="0" cellpadding="0" style="border: 1px solid #0C6182; padding: 0">
		<?php
			if($_GET['msg']==""){
		?>
			<tr>
				<td height="40" style="padding-left: 20px" align="left"><b>&nbsp;Enter Your Message</b></td>
			</tr>
			<tr>
				<td align="center"><textarea rows="6" name="S1" cols="56" style="width:400px"></textarea>
				<input type='hidden' name='step' value='send_invites' id="step">
		</td>
			</tr>
			<tr>
				<td align="center" style="padding-top: 10px"><input type="submit" value="Invite Friends" name="B3"> </td>
			</tr>
		<?php
		}else{
		?>	
			<tr>
				<td align="center" height="200" style="font-family: Verdana; font-size: 9pt; color: #FF0000; font-weight: bold"><?php print $_GET['msg']; ?></td>
			</tr>
		<?php } ?>
		<tr>
			<td align="left" style="padding:20px; font-family: Trebuchet MS; font-size: 12pt; line-height:110%" valign="top">
				<?php
					if($_GET['msg']==""){
				?>
				<table border="0" width="100%" cellspacing="0" cellpadding="0">
				<tr>
					<td width="100" align="center" bgcolor="#041338" height="28">
					<input type='checkbox' onChange='toggleAll(this)' name='toggle_all' title='Select/Deselect all'></td>
					<td bgcolor="#041338" height="28" align="left"><font color="#FFFFFF"><b>Email</b></font></td>
				</tr>
<?php
//setting parameters
$authcode		= $_GET["code"];
$fields=array(
'code'=>  urlencode($authcode),
'client_id'=>  urlencode($clientid),
'client_secret'=>  urlencode($clientsecret),
'redirect_uri'=>  urlencode($redirecturi),
'grant_type'=>  urlencode('authorization_code') );

//url-ify the data for the POST

$fields_string = '';
foreach($fields as $key=>$value){ $fields_string .= $key.'='.$value.'&'; }
$fields_string	=	rtrim($fields_string,'&');
//open connection
$ch = curl_init();
curl_setopt($ch,CURLOPT_URL,'https://accounts.google.com/o/oauth2/token'); //set the url, number of POST vars, POST data
curl_setopt($ch,CURLOPT_POST,5);
curl_setopt($ch,CURLOPT_POSTFIELDS,$fields_string);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Set so curl_exec returns the result instead of outputting it.
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); //to trust any ssl certificates
$result = curl_exec($ch); //execute post
curl_close($ch); //close connection
//extracting access_token from response string

$response   =  json_decode($result);
$accesstoken = $response->access_token;
if( $accesstoken!='')
$_SESSION['token']= $accesstoken;
//passing accesstoken to obtain contact details
$xmlresponse=  file_get_contents('https://www.google.com/m8/feeds/contacts/default/full?max-results='.$maxresults.'&oauth_token='. $_SESSION['token']);
//reading xml using SimpleXML
$xml=  new SimpleXMLElement($xmlresponse);
$xml->registerXPathNamespace('gd', 'http://schemas.google.com/g/2005');
$result = $xml->xpath('//gd:email');
$count = 0;
foreach ($result as $title) {
	$count++;
	?>
	<tr>
				<td width="100" align="center" height="26">
				<input name='check[]' value='<?php echo $title->attributes()->address; ?>' type='checkbox' ></td>
				<td height="26" align="left"><?php echo $title->attributes()->address; ?></td>
	</tr>
<?php } ?>
			<tr>
				<td width="100" align="center" style="padding-top: 10px">&nbsp;</td>
				<td style="padding-top: 10px" align="left"><input type="submit" value="Invite Friends" name="B4"> </td>
			</tr>
</table>
<?php 
} 
?>
&nbsp;</td>
		</tr>
	</table>
</div>
</body>
</form>
</html>