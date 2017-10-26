<?php
declare(strict_types=1);

namespace Infrastructure\Identity;

use Model\Identity;
use Model\Identity\Exception\IdentityNotFound;
use Model\IdentityRepository;
use Prooph\EventSourcing\Aggregate\AggregateRepository;

class EventSourced implements IdentityRepository {

	public $aggregateRepository;

	public function __construct(AggregateRepository $aggregateRepository) {
		$this->aggregateRepository = $aggregateRepository;
	}

	public function get(string $id): Identity {
		$row = $this->aggregateRepository->getAggregateRoot($id);
		if (!$row) {
			throw IdentityNotFound::withId($id);
		}
		return $row;
	}

	public function save(Identity $identity): void {
		$this->aggregateRepository->saveAggregateRoot($identity);
	}
}
