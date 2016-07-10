<?php


class BrrrHelper
{
    
    public static fnction createAccount($fullname, $email, $password) {
    	if(isset($_POST['signup']))   {
    		  // Obtain a database connection
			$db = JFactory::getDbo();
	// Retrieve the shout
			$query = $db->getQuery(true)
            	->select($db->quoteName('email'))
            	->from($db->quoteName('brrr_login'))
            	->where('email = ' . $db->Quote('TS04'));
	// Prepare the query
	$db->setQuery($query);
    		
	$fullname=mysql_real_escape_string(htmlspecialchars(trim($_POST['fullname'])));
	$email=mysql_real_escape_string(htmlspecialchars(trim($_POST['email'])));
	$password=mysql_real_escape_string(htmlspecialchars(trim($_POST['password'])));
	$login=mysql_num_rows(mysql_query("select * from `phonegap_login` where `email`='$email'"));
	if($login!=0)
	{
		echo "exist";
	}
	else
	{
		$date=date("d-m-y h:i:s");
		$q=mysql_query("insert into `phonegap_login` (`reg_date`,`fullname`,`email`,`password`) values ('$date','$fullname','$email','$password')");
		if($q)
		{
			echo "success";
		}
		else
		{
			echo "failed";
		}
	}
	echo mysql_error();
}
    }

    public static function getPassword($param) 
    {
    // Obtain a database connection
	$db = JFactory::getDbo();
	// Retrieve the shout
	$query = $db->getQuery(true)
            ->select($db->quoteName('password'))
            ->from($db->quoteName('teplotni-cidla'))
            ->where('ssid = ' . $db->Quote('TS04'));
	// Prepare the query
	$db->setQuery($query);
	// Load the row.
	$result = $db->loadResult();
	// Return the Hello
	return $result;
	}
	public static function getUserID($param)
	{
	$user =& JFactory::getUser();
	if($user->id) {
    $userid = $user->get('id'); }
	else {
    $userid = 0;
	}
	return $userid;
	}
	
	public static function getWifiID($param)
	{
	$input = new JInput;
	$post = $input->getArray($_POST);
	$wifiid = $post["wifiid"];
	return $wifiid;
	}
	
	public static function getPostArray() 
	{
	$input = new JInput;
	$post = $input->getArray($_POST);
	return $post;
	}
	public static function setWifiID($params,$userid,$wifiid)
	{
	$db = JFactory::getDbo();
    $query = $db->getQuery(true);
 	// Fields to update.

 	
 	$fields = array(
 			$db->quoteName('userid') . ' = ' . $userid,
 			$db->quoteName('date_registered') . ' =  now()'
 			);
    $query->update($db->quoteName('teplotni-cidla'))->set($fields)->where('ssid = ' . $db->Quote($wifiid));
    $db->setQuery($query);
    $result = $db->execute();
    $rows = $db->getAffectedRows();
	return $rows;
	}
	public static function getRegisteredWT($userid)
	{
    $db = JFactory::getDbo();
    $query = $db->getQuery(true);
    $query->select(array('ssid', 'userid', 'date_registered'));
	$query->from($db->quoteName('teplotni-cidla'));
	$query->where($db->quoteName('userid') . " = " . $db->quote($userid));
	$query->order('date_registered ASC');
	$db->setQuery($query);
	$results = $db->loadObjectList();
	return $results;
	}
	
    public static function getWifiIdLocal($wifiid)
	{
    $db = JFactory::getDbo();
    $query = $db->getQuery(true);
    $query->select(array('ssid', 'location', 'wifiid_loc','wifipass_loc'));
	$query->from($db->quoteName('teplotni-cidla-mista'));
	$query->where('ssid = ' . $db->Quote($wifiid));
	$query->order('date_located ASC');
	$db->setQuery($query);
	$results = $db->loadObject();
	return $results;
	}
	
	public static function setWifiSetup($post,$wifiid)
	{
	$db = JFactory::getDbo();
    $query = $db->getQuery(true);

	$columns = array('ssid', 'location', 'wifiid_loc', 'wifipass_loc', 'date_located');
 
	$values = array($db->quote($wifiid), $db->quote($post["wifi-location"]), $db->quote($post["wifiid-local"]), $db->quote($post["wifipass-local"]),'now()');
	$query
    ->insert($db->quoteName('teplotni-cidla-mista'))
    ->columns($db->quoteName($columns))
    ->values(implode(',', $values));
	try {
	$db->setQuery($query);
	$result = $db->execute();
	}
	catch (Exception $e){
    	echo $e->getMessage();
	}
	echo "result:" . $result . "resultend";
	return $result;
	}
}
?>