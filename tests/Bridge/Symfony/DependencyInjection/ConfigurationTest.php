<?php

declare(strict_types=1);

/*
 * (c) Christian Gripp <mail@core23.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Core23\MonologFilters\Tests\Bridge\Symfony\DependencyInjection;

use Core23\MonologFilters\Bridge\Symfony\DependencyInjection\Configuration;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Config\Definition\Processor;

final class ConfigurationTest extends TestCase
{
    public function testDefaultOptions(): void
    {
        $processor = new Processor();

        $config = $processor->processConfiguration(new Configuration(), []);

        $expected = [
            'handlers' => [
                'action_level'      => 'WARNING',
                'excluded_404s'     => ['^/'],
            ],
        ];

        $this->assertSame($expected, $config);
    }
}
