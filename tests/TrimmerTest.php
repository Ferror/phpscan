<?php
declare(strict_types=1);

namespace Ferror\Bundle\PHPScan;

use PHPUnit\Framework\TestCase;

final class TrimmerTest extends TestCase
{
    private $trimmer;

    protected function setUp() : void
    {
        $this->trimmer = new Trimmer();
    }

    public function testItTrimsNamespace(): void
    {
        self::assertEquals('Ferror\\Bundle\\PHPScan\\Domain\\SubDomain', $this->trimmer->trimNamespace('namespace Ferror\\Bundle\\PHPScan\\Domain\\SubDomain;'));
    }

    public function testItTrimsUse(): void
    {
        self::assertEquals('Ferror\\Bundle\\PHPScan\\Domain\\SubDomain', $this->trimmer->trimUse('use Ferror\\Bundle\\PHPScan\\Domain\\SubDomain;'));
    }

    public function testItTrimsUseWithAlias(): void
    {
        self::assertEquals('Ferror\\Bundle\\PHPScan\\Domain\\SubDomain', $this->trimmer->trimUse('use Ferror\\Bundle\\PHPScan\\Domain\\SubDomain as Domain;'));
    }
}
