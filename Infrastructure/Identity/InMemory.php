<?php
declare(strict_types=1);

namespace Infrastructure\Identity;

use Model\Identity;
use Model\Identity\Exception\IdentityNotFound;
use Model\IdentityRepository;

class InMemory implements IdentityRepository {

	public $data = [];

	public function get(string $id): Identity {
		if (!isset($this->data[$id])) {
			throw IdentityNotFound::withId($id);
		}
		return $this->data[$id];
	}

	public function save(Identity $identity): void {
		$this->data[$identity->id()] = $identity;
	}
}
