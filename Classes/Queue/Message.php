<?php
namespace Flowpack\JobQueue\Common\Queue;

/*
 * This file is part of the Flowpack.JobQueue.Common package.
 *
 * (c) Contributors to the package
 *
 * This package is Open Source Software. For the full copyright and license
 * information, please view the LICENSE file which was distributed with this
 * source code.
 */

use TYPO3\Flow\Annotations as Flow;

/**
 * A DTO that wraps arbitrary payload with an identifier and a counter for failures.
 */
class Message
{
    /**
     * The message identifier allows to target messages in the queue, @see QueueInterface
     * The format depends on the implementation
     *
     * @var string Identifier of the message
     */
    protected $identifier;

    /**
     * The message payload, has to be serializable.
     *
     * @var \Serializable The message payload
     */
    protected $payload;

    /**
     * How often this message was released (i.e. after failures for retrial)
     *
     * @var integer
     */
    protected $numberOfReleases;

    /**
     * @param string $identifier
     * @param mixed $payload
     * @param integer $numberOfReleases
     */
    public function __construct($identifier, $payload, $numberOfReleases = 0)
    {
        $this->identifier = $identifier;
        $this->payload = $payload;
        $this->numberOfReleases = $numberOfReleases;
    }

    /**
     * @return string
     */
    public function getIdentifier()
    {
        return $this->identifier;
    }

    /**
     * @return mixed
     */
    public function getPayload()
    {
        return $this->payload;
    }

    /**
     * @return integer
     */
    public function getNumberOfReleases()
    {
        return $this->numberOfReleases;
    }
}