<?php
declare(strict_types=1);

namespace Model;

use Model\Identity\Event\EmailIdentityCreated;
use Model\Identity\Event\UserLogged;
use Model\Identity\Event\UserToIdentityAssigned;
use Model\Identity\Guard\EmailIdentityCreatedGuard;
use Model\Identity\Guard\UserLoggedGuard;
use Model\Identity\Guard\UserToIdentityAssignedGuard;
use Prooph\EventSourcing\AggregateChanged;
use Prooph\EventSourcing\AggregateRoot;

class Identity extends AggregateRoot {

	private $id;

	public static function creatIdentityEmail(EmailIdentityCreatedGuard $emailIdentityCreatedGuard, string $id): self {
		$emailIdentityCreatedGuard->throwExceptionIfNotPossible();

		$self = new self;
		$self->recordThat(EmailIdentityCreated::create($id));
		return $self;
	}

	public function assignIdentityToUser(UserToIdentityAssignedGuard $userToIdentityAssignedGuard): void {
		$userToIdentityAssignedGuard->throwExceptionIfNotPossible($this);

		$this->recordThat(UserToIdentityAssigned::create($this->id));
	}

	public function id(): string {
		return $this->id;
	}

	public function loggUser(UserLoggedGuard $userLoggedGuard): void {
		$userLoggedGuard->throwExceptionIfNotPossible($this);

		$this->recordThat(UserLogged::create($this->id));
	}

	protected function aggregateId(): string {
		return $this->id;
	}

	protected function apply(AggregateChanged $event): void {
		switch (get_class($event)) {
			case EmailIdentityCreated::class:
				$this->whenEmailIdentityCreated($event);
				break;
			case UserToIdentityAssigned::class:
				$this->whenUserToIdentityAssigned($event);
				break;
			case UserLogged::class:
				$this->whenUserLogged($event);
				break;
		}
	}

	private function whenEmailIdentityCreated(EmailIdentityCreated $event): void {
	}

	private function whenUserLogged(UserLogged $event): void {
	}

	private function whenUserToIdentityAssigned(UserToIdentityAssigned $event): void {
	}
}
