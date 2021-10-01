<?php
class User
{

    function __construct($db)
    {
        $this->db = $db;
    }

    public function login($login, $password)
    {
        if ($login = 'masha' && $password = '12345') {
            return array(
                'name' => 'masha',
                'password' => md5(rand())
            );
        }
    }

    public function registration($name, $login, $password)
    {
        $user = $this->db->getUserByLogin($login);
        if (!$user) {
            $this->db->addNewUser($name, $login, $password);
            return $this->login($login, $password);
        }
    }

    public function logout($token)
    {
        $user = $this->db->getUserByToken($token);
        if ($user) {
            $this->db->updateToken($user['id'], null);
            return true;
        }
    }
    /* $user = $this->db->getUserByLoginPass($login, $password);
        if ($user) {
            $token = md5(rand());
            $this->db->updateToken($user['id'], $token);
            return array(
                'name' => $user['name'],
                'login' => $user['login'],
                'token' => $token
            );
        }
    }

	public function getUser($token){
		return $this->db->getUserByToken($token);
	}*/
}
