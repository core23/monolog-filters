<?php

/*
 * (c) Christian Gripp <mail@core23.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Core23\MonologFilters\Tests\Bridge\Symfony\Bundle;

use Core23\MonologFilters\Bridge\Symfony\Bundle\Core23MonologFiltersBundle;
use Core23\MonologFilters\Bridge\Symfony\DependencyInjection\Core23MonologFiltersExtension;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpKernel\Bundle\BundleInterface;

class Core23MonologFiltersBundleTest extends TestCase
{
    public function testItIsInstantiable(): void
    {
        $bundle = new Core23MonologFiltersBundle();

        $this->assertInstanceOf(BundleInterface::class, $bundle);
    }

    public function testGetPath(): void
    {
        $bundle = new Core23MonologFiltersBundle();

        $this->assertStringEndsWith('Bridge/Symfony/Bundle', \dirname($bundle->getPath()));
    }

    public function testGetContainerExtension(): void
    {
        $bundle = new Core23MonologFiltersBundle();

        $this->assertInstanceOf(Core23MonologFiltersExtension::class, $bundle->getContainerExtension());
    }
}
