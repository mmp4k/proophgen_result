<?php
declare(strict_types=1);

namespace Model;

use Model\User\Event\UserRegistered;
use Model\User\Guard\UserRegisteredGuard;
use Prooph\EventSourcing\AggregateChanged;
use Prooph\EventSourcing\AggregateRoot;

class User extends AggregateRoot {

	private $id;

	public static function registerUser(UserRegisteredGuard $userRegisteredGuard, string $id): self {
		$userRegisteredGuard->throwExceptionIfNotPossible();

		$self = new self;
		$self->recordThat(UserRegistered::create($id));
		return $self;
	}

	public function id(): string {
		return $this->id;
	}

	protected function aggregateId(): string {
		return $this->id;
	}

	protected function apply(AggregateChanged $event): void {
		switch (get_class($event)) {
			case UserRegistered::class:
				$this->whenUserRegistered($event);
				break;
		}
	}

	private function whenUserRegistered(UserRegistered $event): void {
	}
}
