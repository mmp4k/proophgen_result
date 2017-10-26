<?php
declare(strict_types=1);

namespace Infrastructure\User;

use Model\User;
use Model\User\Exception\UserNotFound;
use Model\UserRepository;

class InMemory implements UserRepository {

	public $data = [];

	public function get(string $id): User {
		if (!isset($this->data[$id])) {
			throw UserNotFound::withId($id);
		}
		return $this->data[$id];
	}

	public function save(User $user): void {
		$this->data[$user->id()] = $user;
	}
}
