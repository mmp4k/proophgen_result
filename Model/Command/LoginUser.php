<?php
declare(strict_types=1);

namespace Model\Command;

use Prooph\Common\Messaging\Command;
use Prooph\Common\Messaging\PayloadConstructable;
use Prooph\Common\Messaging\PayloadTrait;

class LoginUser extends Command implements PayloadConstructable {

	use PayloadTrait;

	public static function withData(): self {
		return new self([]);
	}
}
