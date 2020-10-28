<?php
declare(strict_types=1);

namespace Ferror\Bundle\PHPScan\Infrastructure;

use Ferror\Bundle\PHPScan\Application\Test as InfraTest;

final class Test
{
    private $test;

    public function __construct(InfraTest $test)
    {
        $this->test = $test;
    }
}
