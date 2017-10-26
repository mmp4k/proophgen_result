<?php
declare(strict_types=1);

namespace Infrastructure\User;

use Model\User;
use Model\User\Exception\UserNotFound;
use Model\UserRepository;
use Prooph\EventSourcing\Aggregate\AggregateRepository;

class EventSourced implements UserRepository {

	public $aggregateRepository;

	public function __construct(AggregateRepository $aggregateRepository) {
		$this->aggregateRepository = $aggregateRepository;
	}

	public function get(string $id): User {
		$row = $this->aggregateRepository->getAggregateRoot($id);
		if (!$row) {
			throw UserNotFound::withId($id);
		}
		return $row;
	}

	public function save(User $user): void {
		$this->aggregateRepository->saveAggregateRoot($user);
	}
}
