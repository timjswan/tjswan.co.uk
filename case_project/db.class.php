<?php
class DB{
	protected $dbtype;
	protected $dbname;
	protected $user;
	protected $pass;
	protected $db;
	protected $key;

	function __construct()
	{
		$this->dbtype = 'mysql';
		$this->dbname = 'webcaseproj';
		$this->user = 'webcaseproj';
		$this->pass = 'webcaseproj';
		$this->key = "";
		$this->td = "";
	}

	public function connect()
	{
		try
		{
			$this->db = new PDO("$this->dbtype:host=localhost;dbname=$this->dbname", $this->user, $this->pass);
			return $this->db;
		}

		catch (PDOexception $e)
		{
			echo "Database connection error: " . $e->getMessage();
			die();
		}
	}

	function encrypt($input)
	{
		$this->td = mcrypt_module_open('tripledes', '', 'ecb', '');
		$iv = mcrypt_create_iv(mcrypt_enc_get_iv_size($td), MCRYPT_DEV_RANDOM);
		$ks = mcrypt_enc_get_key_size($td);
		$this->key = substr(md5('swindon04'), 0, $ks);
		mcrypt_generic_init($this->td, $this-key, $iv);
		$encrypted = mcrypt_generic($this->td, $input);
		mcrypt_generic_deinit($this->td);
		return $encrypted;		
	}
	
	function decrypt($input)
	{
	}

	public function close()
	{
		$this->db = null;
	}
}
?>
