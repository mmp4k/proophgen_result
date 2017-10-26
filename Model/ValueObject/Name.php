<?php
declare(strict_types=1);

namespace Model\ValueObject;

class Name {

	public $name;

	public static function create(string $name): self {
		return new self($name);
	}

	public function get(): string {
		return $this->name;
	}

	public function isEqual(self $name): bool {
		return $name->get() === $this->get();
	}

	private function __construct(string $name) {
		$this->name = $name;
	}
}
