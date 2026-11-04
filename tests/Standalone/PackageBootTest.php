<?php

namespace Fayne\SensitiveField\Tests\Standalone;

use Fayne\SensitiveField\SensitiveFieldServiceProvider;
use Orchestra\Testbench\TestCase;

class PackageBootTest extends TestCase
{
    protected function getPackageProviders($app): array
    {
        return [SensitiveFieldServiceProvider::class];
    }

    public function test_package_registers_its_resources_without_a_host_panel(): void
    {
        $this->assertTrue(view()->exists('filament-sensitive-field::sensitive'));
    }
}
