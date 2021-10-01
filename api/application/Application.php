<?php
require_once('db/DB.php');
require_once('user/Users.php');
require_once('racing/Racing.php');

class Application
{
	function __construct()
	{
		$db = new DB();
		$this->user = new User($db);
	}

	public function login($params)
	{
		if ($params['login'] && $params['password']) {
			return $this->user->login($params['login'], $params['password']);
		}
	}

	public function registration($params)
	{
		if ($params['name'] && $params['login'] && $params['password']) {
			return $this->user->registration($params['name'], $params['login'], $params['password']);
		}
	}

	public function logout($params)
	{
		if ($params['token']) {
			return $this->user->logout($params['token']);
		}
	}

	public function leftGame($params)
	{
		return true;
	}
	/*public function sendMessage($params) {
		if($params['token'] && $params['message']) {
			$user = $this->user->getUser($params['token']);
			if ($user) {
				$this->chat->sendMessage($user['name'], $params['message']);
				return true;
			}
		}
		return false;
	}
	
	public function getMessages($params){
		if($params['token'] && $params['hash']) {
			$user = $this->user->getUser($params['token']);
			if ($user) {
				return $this->chat->getMessages($params['hash']);
			}
		}
		return false;
		
	}*/
}
