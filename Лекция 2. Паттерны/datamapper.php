<?php

class StorageAdapter {

	/**
	 * @var array
	 */
	private $data = [];

	public function __construct(array $data) {
		$this->data = $data;
	}

	/**
	 * @param int $id
	 *
	 * @return array|null
	 */
	public function find(int $id) {
		if (isset($this->data[$id])) {
			return $this->data[$id];
		}
		return null;
	}

}

class User {

	/**
	 * @var string
	 */
	private $username;

	/**
	 * @var string
	 */
	private $email;

	public static function fromState(array $state): User {
		// validate state before accessing keys!
		return new self(
				$state['username'], $state['email']
		);
	}

	public function __construct(string $username, string $email) {
		// validate parameters before setting them!
		$this->username	 = $username;
		$this->email	 = $email;
	}

	/**
	 * @return string
	 */
	public function getUsername() {
		return $this->username;
	}

	/**
	 * @return string
	 */
	public function getEmail() {
		return $this->email;
	}

}

class UserMapper {

	/**
	 * @var StorageAdapter
	 */
	private $adapter;

	/**
	 * @param StorageAdapter $storage
	 */
	public function __construct(StorageAdapter $storage) {
		$this->adapter = $storage;
	}

	/**
	 * finds a user from storage based on ID and returns a User object located
	 * in memory. Normally this kind of logic will be implemented using the Repository pattern.
	 * However the important part is in mapRowToUser() below, that will create a business object from the
	 * data fetched from storage
	 *
	 * @param int $id
	 *
	 * @return User
	 */
	public function findById(int $id): User {
		$result = $this->adapter->find($id);
		if ($result === null) {
			throw new \InvalidArgumentException("User #$id not found");
		}
		return $this->mapRowToUser($result);
	}

	private function mapRowToUser(array $row): User {
		return User::fromState($row);
	}

}

$data = [
	1 =>[
		"username" => "Vovo",
		"email"	=> "r@mail.ru"
	]
];

$adapter = new UserMapper(new StorageAdapter($data));
$user = $adapter->findById(1);

var_dump($user);