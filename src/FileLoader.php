<?php
declare(strict_types=1);

namespace Ferror\Bundle\PHPScan;

final class FileLoader
{
    private $files = [];

    public function getAllFiles(string $dirName, bool $force = false): array
    {
        if (empty($this->files) || $force) {
            $this->findFiles($this->files, $dirName);
        }

        return $this->files;
    }

    private function findFiles(array &$allFiles, string $dir): void
    {
        $ffs = scandir($dir);

        // dont load default files
        unset($ffs[array_search('.', $ffs, true)]);
        unset($ffs[array_search('..', $ffs, true)]);
        unset($ffs[array_search('.gitignore', $ffs, true)]);

        // prevent empty ordered elements
        if (count($ffs) < 1) {
            return;
        }

        foreach ($ffs as $ff) {
            if (is_dir($dir . '/' . $ff)) {
                $this->findFiles($allFiles, $dir . '/' . $ff);
            } else {
                $allFiles[] = $dir . '/' . $ff;
            }
        }
    }
}
