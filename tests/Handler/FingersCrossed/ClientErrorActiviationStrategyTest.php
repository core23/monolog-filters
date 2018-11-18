<?php

declare(strict_types=1);

/*
 * (c) Christian Gripp <mail@core23.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Core23\MonologFilters\Tests\Handler\FingersCrossed;

use Core23\MonologFilters\Handler\FingersCrossed\ClientErrorActivationStrategy;
use Monolog\Logger;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpKernel\Exception\HttpException;

final class ClientErrorActiviationStrategyTest extends TestCase
{
    /**
     * @dataProvider isActivatedProvider
     *
     * @param $url
     * @param $record
     * @param $expected
     */
    public function testIsActivated($url, $record, $expected): void
    {
        $requestStack = new RequestStack();
        $requestStack->push(Request::create($url));

        $strategy = new ClientErrorActivationStrategy($requestStack, ['^/foo', 'bar'], Logger::WARNING);

        $this->assertSame($expected, $strategy->isHandlerActivated($record));
    }

    public function isActivatedProvider()
    {
        return [
            ['/test',      ['level' => Logger::DEBUG], false],
            ['/foo',       ['level' => Logger::DEBUG, 'context' => $this->getContextException(404)], false],
            ['/foo',       ['level' => Logger::DEBUG, 'context' => $this->getContextException(403)], false],
            ['/foo',       ['level' => Logger::DEBUG, 'context' => $this->getContextException(418)], false],
            ['/baz/bar',   ['level' => Logger::ERROR, 'context' => $this->getContextException(404)], false],
            ['/foo',       ['level' => Logger::ERROR, 'context' => $this->getContextException(404)], false],
            ['/foo',       ['level' => Logger::ERROR, 'context' => $this->getContextException(500)], false],

            ['/test',      ['level' => Logger::ERROR], true],
            ['/baz',       ['level' => Logger::ERROR, 'context' => $this->getContextException(200)], false],
            ['/baz',       ['level' => Logger::ERROR, 'context' => $this->getContextException(400)], true],
            ['/baz',       ['level' => Logger::ERROR, 'context' => $this->getContextException(403)], true],
            ['/baz',       ['level' => Logger::ERROR, 'context' => $this->getContextException(404)], true],
            ['/baz',       ['level' => Logger::ERROR, 'context' => $this->getContextException(418)], true],
            ['/baz',       ['level' => Logger::ERROR, 'context' => $this->getContextException(500)], false],
            ['/baz',       ['level' => Logger::ERROR, 'context' => $this->getContextException(502)], false],
        ];
    }

    protected function getContextException($code)
    {
        return ['exception' => new HttpException($code)];
    }
}
