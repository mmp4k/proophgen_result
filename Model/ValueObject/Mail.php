<?php
declare(strict_types=1);

namespace Model\ValueObject;

class Mail {

	public $mail;

	public static function create(string $mail): self {
		return new self($mail);
	}

	public function get(): string {
		return $this->mail;
	}

	public function isEqual(self $mail): bool {
		return $mail->get() === $this->get();
	}

	private function __construct(string $mail) {
		$this->mail = $mail;
	}
}
