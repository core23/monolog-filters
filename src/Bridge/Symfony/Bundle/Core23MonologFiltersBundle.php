<?php

declare(strict_types=1);

/*
 * (c) Christian Gripp <mail@core23.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Core23\MonologFilters\Bridge\Symfony\Bundle;

use Core23\MonologFilters\Bridge\Symfony\DependencyInjection\Core23MonologFiltersExtension;
use Symfony\Component\HttpKernel\Bundle\Bundle;

final class Core23MonologFiltersBundle extends Bundle
{
    /**
     * {@inheritdoc}
     */
    public function getPath()
    {
        return __DIR__.'/..';
    }

    /**
     * {@inheritdoc}
     */
    protected function getContainerExtensionClass()
    {
        return Core23MonologFiltersExtension::class;
    }
}
