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

    public function addImport(string $import): void
    {
        $this->imports[] = $import;
    }

    public function isValid(): bool
    {
        $importTypes = array_map(
            function ($import) {
                if (strpos($import, 'Domain') !== false) {
                    return new ClassType('domain');
                }

                if (strpos($import, 'Infrastructure') !== false) {
                    return new ClassType('infrastructure');
                }

                if (strpos($import, 'Application') !== false) {
                    return new ClassType('application');
                }

                return new ClassType('other');
            },
            $this->imports
        );

        $type = $this->a($this->className);
        $hasInfra = array_filter(
            $importTypes,
            function (ClassType $type) {
                return $type->isInfrastructure();
            }
        );
        $hasApp = array_filter(
            $importTypes,
            function (ClassType $type) {
                return $type->isApplication();
            }
        );

        if ($type->isDomain()) {
            if (!empty($hasApp) || !empty($hasInfra)) {
                return false;
            }
        }

        return !($type->isApplication() && !empty($hasInfra));
    }

    private function a($name)
    {
        if (strpos($name, 'Domain') !== false) {
            return new ClassType('domain');
        }

        if (strpos($name, 'Infrastructure') !== false) {
            return new ClassType('infrastructure');
        }

        if (strpos($name, 'Application') !== false) {
            return new ClassType('application');
        }

        return new ClassType('other');
    }

    public function getClassName(): string
    {
        return $this->className;
    }
}
