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
        // invalid
        $this->logger->debug('foo', ['exception' => $throwable->getMessage()]);
        $this->logger->log('panic', 'foo', ['exception' => $throwable]);

        // valid
        $this->logger->log('info', 'foo', ['exception' => $throwable]);
    }
}
