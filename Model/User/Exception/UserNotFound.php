<?php
declare(strict_types=1);

namespace Model\User\Exception;

class UserNotFound extends \DomainException {

	public static function withId(string $id): self {
		return new self(sprintf("User with ID %s does not exists.", $id));
	}
}
