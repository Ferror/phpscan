<?php
declare(strict_types=1);

namespace Ferror\Bundle\PHPScan;

final class ClassImports
{
    private $className;
    private $imports;
    private $reasons = [];

    public function __construct(string $className, array $imports)
    {
        $this->className = $className;
        $this->imports = $imports;
    }

    public function addImport(string $import): void
    {
        $this->imports[] = $import;
    }

    public function isValid(): bool
    {
        $importTypes = array_map([$this, 'getClassType'], $this->imports);
        $type = $this->getClassType($this->className);
        $hasInfra = array_filter(
            $importTypes,
            static function (ClassType $type) {
                return $type->isInfrastructure();
            }
        );
        $hasApp = array_filter(
            $importTypes,
            static function (ClassType $type) {
                return $type->isApplication();
            }
        );

        if ($type->isDomain()) {
            if (!empty($hasApp) || !empty($hasInfra)) {
                $this->reasons['application'] = $hasApp;
                $this->reasons['infrastructure'] = $hasInfra;

                return false;
            }
        }

        return !($type->isApplication() && !empty($hasInfra));
    }

    public function getReasons(): array
    {
        return $this->reasons;
    }

    private function getClassType($name): ClassType
    {
        if (strpos($name, 'Domain') !== false) {
            return new ClassType($name, 'domain');
        }

        if (strpos($name, 'Infrastructure') !== false) {
            return new ClassType($name, 'infrastructure');
        }

        if (strpos($name, 'Application') !== false) {
            return new ClassType($name, 'application');
        }

        return new ClassType($name, 'other');
    }

    public function getClassName(): string
    {
        return $this->className;
    }
}
