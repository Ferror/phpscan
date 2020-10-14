<?php
declare(strict_types=1);

namespace Ferror\Bundle\PHPScan;

final class ClassImports
{
    private $className;
    private $imports;

    public function __construct(string $className, array $imports)
    {
        $this->className = $className;
        $this->imports = $imports;
    }

    public function addImport(string $import)
    {
        $this->imports[] = $import;
    }
}
