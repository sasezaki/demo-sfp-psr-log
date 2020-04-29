<?php

namespace Demo;

use Psr\Log\LoggerInterface;

class Foo
{
    /** @var LoggerInterface */
    private $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function error(\Throwable $throwable) : void
    {
        $this->logger->debug('foo', ['exception' => $throwable]);
        $this->logger->debug('foo', ['exception' => 'bar']);
    }
}
