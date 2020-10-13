<?php
declare(strict_types=1);

namespace Ferror\Bundle\SymfonyBundle\Domain;

use Ferror\Bundle\SymfonyBundle\Domain\SubDomain\Test as TestA;

final class Test
{
    private $a;

    public function __construct(TestA $a)
    {
        $this->a = $a;
    }
}
