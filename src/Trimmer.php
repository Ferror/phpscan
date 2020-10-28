<?php
declare(strict_types=1);

namespace Ferror\Bundle\PHPScan;

final class Trimmer
{
    public function trimNamespace($line): string
    {
        $line = str_replace(['namespace', ';'], '', $line);

        if ($as = strpos($line, ' as ')) {
            $line = substr($line, 0, $as);
        }

        return trim($line);
    }

    public function trimUse($line): string
    {
        $line = str_replace(['use', ';'], '', $line);

        if ($as = strpos($line, ' as ')) {
            $line = substr($line, 0, $as);
        }

        return trim($line);
    }
}
