<?php
declare(strict_types=1);

namespace Ferror\Bundle\PHPScan;

final class ClassType
{
    private $type;

    public function __construct(string $type)
    {
        $this->type = $type;
    }

    public function isDomain(): bool
    {
        return strtoupper($this->type) === 'DOMAIN';
    }

    public function isApplication(): bool
    {
        return strtoupper($this->type) === 'APPLICATION';
    }

    public function isInfrastructure(): bool
    {
        return strtoupper($this->type) === 'INFRASTRUCTURE';
    }
}
