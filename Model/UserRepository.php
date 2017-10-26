<?php
declare(strict_types=1);

namespace Model;

interface UserRepository {

	public function get(string $id): User;

	public function save(User $user);
}
