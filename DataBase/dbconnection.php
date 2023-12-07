<?php
/**
 * Class MySQLiHeos
 *
 * @package
 */
class MySQLiHeos {
	/**
	 * @var object|\mysqli|null
	 */
	private object|null $connection;

	/**
	 * Constructor
	 *
	 * @param    string  $hostname
	 * @param    string  $username
	 * @param    string  $password
	 * @param    string  $database
	 * @param    string  $port
	 */
	public function __construct(string $hostname, string $username, string $password, string $database, string $port = '') {
		if (!$port) {
			$port = '3306';
		}

		try {
			$mysqli = @new \MySQLi($hostname, $username, $password, $database, $port);

			$this->connection = $mysqli;
			$this->connection->set_charset('utf8mb4');

			$this->query("SET SESSION sql_mode = 'NO_ZERO_IN_DATE,NO_ENGINE_SUBSTITUTION'");
			$this->query("SET FOREIGN_KEY_CHECKS = 0");

			// Sync PHP and DB time zones
			$this->query("SET `time_zone` = '" . $this->escape(date('P')) . "'");
		} catch (\mysqli_sql_exception $e) {
			throw new \Exception('Error: Could not make a database link using ' . $username . '@' . $hostname . '!<br/>Message: ' . $e->getMessage());
		}
	}

	/**
	 * Query
	 *
	 * @param    string  $sql
	 *
	 * @return   bool|object
	 */
	public function query(string $sql): bool|object {
		try {
			$query = $this->connection->query($sql);

			if ($query instanceof \mysqli_result) {
				$data = [];

				while ($row = $query->fetch_assoc()) {
					$data[] = $row;
				}

				$result = new \stdClass();
				$result->num_rows = $query->num_rows;
				$result->row = isset($data[0]) ? $data[0] : [];
				$result->rows = $data;

				$query->close();

				unset($data);

				return $result;
			} else {
				return true;
			}
		} catch (\mysqli_sql_exception $e) {
			throw new \Exception('Error: ' . $this->connection->error  . '<br/>Error No: ' . $this->connection->errno . '<br/>' . $sql);
		}
	}

	/**
	 * Escape
	 *
	 * @param    string  value
	 *
	 * @return   string
	 */
	public function escape(string $value): string {
		return $this->connection->real_escape_string($value);
	}
	
	/**
	 * countAffected
	 *
	 * @return   int
	 */
	public function countAffected(): int {
		return $this->connection->affected_rows;
	}

	/**
	 * getLastId
	 *
	 * @return   int
	 */
	public function getLastId(): int {
		return $this->connection->insert_id;
	}
	
	/**
	 * isConnected
	 *
	 * @return   bool
	 */
	public function isConnected(): bool {
		return $this->connection;
	}

	/**
	 * Destructor
	 *
	 * Closes the DB connection when this object is destroyed.
	 *
	 */
	public function __destruct() {
		if ($this->connection) {
			$this->connection->close();

			$this->connection = null;
		}
	}
}

/**
 * Class DB Adapter
 */
class DB {
	/**
	 * @var object|mixed
	 */
	private object $adaptor;

	/**
	 * Constructor
	 *
	 * @param string $adaptor
	 * @param string $hostname
	 * @param string $username
	 * @param string $password
	 * @param string $database
	 * @param int    $port
	 *
	 */
	public function __construct(string $adaptor, string $hostname, string $username, string $password, string $database, string $port = '') {
		$class = $adaptor;

		if (class_exists($class)) {
			$this->adaptor = new $class($hostname, $username, $password, $database, $port);
		} else {
			throw new \Exception('Error: Could not load database adaptor ' . $adaptor . '!');
		}
	}

	/**
	 * Query
	 *
	 * @param string $sql SQL statement to be executed
	 *
	 * @return    array
	 */
	public function query(string $sql): bool|object {
		return $this->adaptor->query($sql);
	}

	/**
	 * Escape
	 *
	 * @param string $value Value to be protected against SQL injections
	 *
	 * @return    string    returns escaped value
	 */
	public function escape(string $value): string {
		return $this->adaptor->escape($value);
	}

	/**
	 * Count Affected
	 *
	 * Gets the total number of affected rows from the last query
	 *
	 * @return    int    returns the total number of affected rows.
	 */
	public function countAffected(): int {
		return $this->adaptor->countAffected();
	}

	/**
	 * Get Last ID
	 *
	 * Get the last ID gets the primary key that was returned after creating a row in a table.
	 *
	 * @return    int returns last ID
	 */
	public function getLastId(): int {
		return $this->adaptor->getLastId();
	}

	/**
	 * Is Connected
	 *
	 * Checks if a DB connection is active.
	 *
	 * @return    bool
	 */
	public function isConnected(): bool {
		return $this->adaptor->isConnected();
	}
}

$_HostAddress="172.26.0.2";
$_UserName="admin";
$_Password="Szigony123$";
$_DatabaseName="heos";

$db = new \DB('MySQLiHeos', $_HostAddress,$_UserName,$_Password,$_DatabaseName, 3306);

$con = new mysqli($_HostAddress,$_UserName,$_Password,$_DatabaseName);
if ($con->connect_error){
   echo( "<p>Unable to connect to database manager.</p>");
   die('Could not connect: ' . $con->connect_error);
   exit();
} //else echo("<p>Successfully Connected to MySQL Database Manager!</p>");
?>
