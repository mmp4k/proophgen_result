<?php
declare(strict_types=1);

namespace Model\Identity\Exception;

class IdentityNotFound extends \DomainException {

	public static function withId(string $id): self {
		return new self(sprintf("Identity with ID %s does not exists.", $id));
	}
}
