<?php
class Registration{
	
	/*
		* This method check whether or not an account with a provided email exists
		
		* @param $email - The email that is checked
		* @return - true if exists, false if it doesnt exist
	*/
	
	public static function CheckEmail($email){
		global $db;
		$db -> query = "SELECT email FROM ". $db -> prefix ."users WHERE email = '". $db -> SafeString($email) ."' LIMIT 1";
		if($db -> CountRows($db -> TQuery()) > 0) return true;
		else return false;
	}
	
	/*
		* This method check whether or not an account with a provided username exists
		
		* @param $username - The username that is checked
		* @return - true if exists, false if it doesnt exist
	*/
	
	public static function CheckUsername($username){
		global $db;
		$db -> query = "SELECT name FROM ". $db -> prefix ."users WHERE name = '". $db -> SafeString($username) ."' LIMIT 1";
		if($db -> CountRows($db -> TQuery()) > 0) return true;
		else return false;
	}
	
	/*
		* This method handles user registration
		
		* @array $regData
		* @param $regData['username']
		* @param $regData['email']
		* @param $regData['password']
		* @param $regData['password2']
	*/
	
	public static function RegisterUser($regData){
		global $db;
		$info		=		[
			'emptyData'		=>		false,
			'emailUse'		=>		false,
			'userUse'		=>		false,
			'falseEmail'	=>		false,
			'pwNotMatch'	=>		false,
			'success'		=>		false
		];
		
		if(empty($regData['username']) || empty($regData['email']) || empty($regData['password'])) $info['emptyData'] = true;
		else {
			if($regData['password'] != $regData['password2']) $info['pwNotMatch'] = true;
			else if(!Main::ValidEmail($regData['email'])) $info['falseEmail'] = true;
			else {
				$regData['username']		=		$db -> SafeString($regData['username']);
				$regData['email']			=		$db -> SafeString($regData['email']);
				$regData['password']		=		$db -> SafeString($regData['password']);
				$mailCheck					=		Registration::CheckEmail($regData['email']);
				$userCheck					=		Registration::CheckUsername($regData['username']);
				if(!$mailCheck && !$userCheck){
					$password = Main::HyperHash($regData['password']);
					$q = "INSERT INTO `". $db -> prefix ."users` (`hbbid`, `name`, `password`, `email`, `member_group`, `register_date`, `salt`) VALUES
					('". userHash($regData['username'], $regData['email']) ."', '". $regData['username'] ."',
					'". $password['password'] ."', '". $regData['email'] ."', '3', '". time() ."', '". $password['salt'] ."')";
					$db -> Query($q);
					$info['success'] = true;
				} else if($mailCheck)
					$info['emailUse'] = true;
				else
					$info['userUse'] = true;
			}
		}
		return $info;
	}
}
?>