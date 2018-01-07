<?php

declare(strict_types=1);

/*
 * (c) Christian Gripp <mail@core23.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Core23\MonologFilters\Handler\FingersCrossed;

use Monolog\Handler\FingersCrossed\ErrorLevelActivationStrategy;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpKernel\Exception\HttpException;

final class ClientErrorActivationStrategy extends ErrorLevelActivationStrategy
{
    /**
     * @var string
     */
    private $blacklist;

    /**
     * @var RequestStack
     */
    private $requestStack;

    /**
     * ClientErrorActivationStrategy constructor.
     *
     * @param RequestStack $requestStack
     * @param array        $excludedUrls
     * @param string       $actionLevel
     */
    public function __construct(RequestStack $requestStack, array $excludedUrls, $actionLevel)
    {
        parent::__construct($actionLevel);

        $this->requestStack = $requestStack;
        $this->blacklist    = '{('.implode('|', $excludedUrls).')}i';
    }

    /**
     * {@inheritdoc}
     */
    public function isHandlerActivated(array $record)
    {
        $isActivated = parent::isHandlerActivated($record);

        if (
            $isActivated
            && isset($record['context']['exception'])
            && $record['context']['exception'] instanceof HttpException
            && ($request = $this->requestStack->getMasterRequest())
        ) {
            $status = $record['context']['exception']->getStatusCode();

            return $status >= 400 && $status < 500 && !preg_match($this->blacklist, $request->getPathInfo());
        }

        return $isActivated;
    }
}
