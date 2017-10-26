<?php
declare(strict_types=1);

namespace Model;

interface IdentityRepository {

	public function get(string $id): Identity;

	public function save(Identity $identity);
}
