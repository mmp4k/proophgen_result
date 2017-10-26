<?php
declare(strict_types=1);

namespace Model\User\Event;

use Prooph\EventSourcing\AggregateChanged;

class UserRegistered extends AggregateChanged {

	public static function create(string $id): self {
		return self::occur($id, []);
	}
}
