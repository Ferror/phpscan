<?php
declare(strict_types=1);

namespace Ferror\Bundle\PHPScan;

final class ClassType
{
    private $type;
    private $name;

    public function __construct(string $name, string $type)
    {
        $this->name = $name;
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

    public function getName(): string
    {
        return $this->name;
    }
}
