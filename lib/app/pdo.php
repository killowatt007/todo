<?php
namespace app\lib;
defined('EXE') or die('Access');

class PDO
{
	private $query;
	private $connection = null;

	private $host;
	private $user;
	private $password;
	private $database;

	private $prefix;

	public function __construct()
	{
		$this->host = 'localhost';
		$this->user = 'deniss86_cem';
		$this->password = '9D%wVe27';
		$this->database = 'deniss86_cem';

		$this->connect();
	}

	private function connect()
	{
		$this->connection = \mysqli_connect($this->host, $this->user, $this->password, $this->database);

		if (!$this->connection)
			exit('Could not connect to MySQL server. '.mysqli_connect_error());

		mysqli_set_charset($this->connection, 'utf8');
		$this->setQuery('SET SQL_MODE="ALLOW_INVALID_DATES"')->execute();
		$this->setQuery('SET wait_timeout=100')->execute();
	}

	public function setQuery($query)
	{
		$this->query = $query;
		return $this;
	}

	public function loadAssocList($key = null)
	{
		$_result = $this->fetchAssoc();

		if ($key)
		{
			$result = [];
			foreach ($_result as $row)
				$result[$row[$key]] = $row;
		}
		else
			$result = $_result;

		return $result;
	}

	public function loadAssoc()
	{
		$current = current($this->fetchAssoc());
		return ($current === false ? null : $current);
	}

	private function fetchAssoc()
	{
		$cursor = $this->execute();
		return mysqli_fetch_all($cursor, MYSQLI_ASSOC);
	}

	public function close()
	{
		mysqli_close($this->connection);
	}

	public function insertid()
	{
		return mysqli_insert_id($this->connection);
	}

	public function q($text)
	{
		return '\''. str_replace('\\', '\\\\', $text) .'\'';
	}

	public function execute()
	{
		$result = mysqli_query($this->connection, $this->query);
		
		if (!$result)
		{
			$data = [
				'type' => 'sql',
				'msg' => mysqli_error($this->connection),
				'query' => $this->query
			];

			p($data);
		}

		return $result;
	}
}