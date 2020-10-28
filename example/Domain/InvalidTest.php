<?php
declare(strict_types=1);

namespace Ferror\Bundle\PHPScan\Domain;

use Ferror\Bundle\PHPScan\Infrastructure\Test;

final class InvalidTest
{
    private $test;

    public function __construct(Test $test)
    {
        $this->test = $test;
    }
}
