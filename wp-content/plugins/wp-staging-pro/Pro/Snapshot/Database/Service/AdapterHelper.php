<?php

// TODO PHP7.x; declare(strict_types=1);
// TODO PHP7.x; return types & type-hints

namespace WPStaging\Pro\Snapshot\Database\Service;

use Psr\Log\LoggerInterface;
use WPStaging\Framework\Adapter\Directory;

class AdapterHelper
{
    /** @var Directory */
    private $directory;

    /** @var LoggerInterface */
    private $logger;

    public function __construct(Directory $directory, LoggerInterface $logger)
    {
        $this->directory = $directory;
        $this->logger = $logger;
    }

    /**
     * @return Directory
     */
    public function getDirectory()
    {
        return $this->directory;
    }

    /**
     * @return LoggerInterface
     */
    public function getLogger()
    {
        return $this->logger;
    }
}
