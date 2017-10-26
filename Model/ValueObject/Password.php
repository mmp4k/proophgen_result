<?php
declare(strict_types=1);

namespace Model\ValueObject;

class Password {

	public $password;

	public static function create(string $password): self {
		return new self($password);
	}

	public function get(): string {
		return $this->password;
	}

	public function isEqual(self $password): bool {
		return $password->get() === $this->get();
	}

	private function __construct(string $password) {
		$this->password = $password;
	}
}
