<?php

declare(strict_types=1);

/*
 * (c) Christian Gripp <mail@core23.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Core23\MonologFilters\Tests\Bridge\Symfony\DependencyInjection;

use Core23\MonologFilters\Bridge\Symfony\DependencyInjection\Core23MonologFiltersExtension;
use Matthias\SymfonyDependencyInjectionTest\PhpUnit\AbstractExtensionTestCase;

final class Core23MonologFiltersExtensionTest extends AbstractExtensionTestCase
{
    public function testLoadDefault(): void
    {
        $this->load();

        $this->assertTrue(true);
    }

    protected function getContainerExtensions(): array
    {
        return [
            new Core23MonologFiltersExtension(),
        ];
    }
}
