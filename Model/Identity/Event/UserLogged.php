<?php
declare(strict_types=1);

namespace Model\Identity\Event;

use Prooph\EventSourcing\AggregateChanged;

class UserLogged extends AggregateChanged {

	public static function create(string $id): self {
		return self::occur($id, []);
	}
}
