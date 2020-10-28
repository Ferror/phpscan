<?php
declare(strict_types=1);

namespace Ferror\Bundle\PHPScan\Domain;

use Ferror\Bundle\PHPScan\Domain\SubDomain\Test as TestA;

final class Test
{
    private $a;

    public function __construct(TestA $a)
    {
        $this->a = $a;
    }
}
