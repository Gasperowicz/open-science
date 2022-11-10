<?php

namespace OpenScience\Shared\Infrastructure\Metrics;

use OpenScience\Shared\Domain\Metrics\TaggableGaugeableCollector;

class NullCollector implements TaggableGaugeableCollector
{
    /**
     * {@inheritDoc}
     */
    public function measure($variable, $value, $tags = array())
    {
    }

    /**
     * {@inheritDoc}
     */
    public function increment($variable, $tags = array())
    {
    }

    /**
     * {@inheritDoc}
     */
    public function incrementBy($variable, $value, $tags = array())
    {
    }

    /**
     * {@inheritDoc}
     */
    public function decrement($variable, $tags = array())
    {
    }

    /**
     * {@inheritDoc}
     */
    public function decrementBy($variable, $value, $tags = array())
    {
    }

    /**
     * {@inheritDoc}
     */
    public function timing($variable, $time, $tags = array())
    {
    }

    /**
     * {@inheritDoc}
     */
    public function gauge($variable, $value, $tags = array())
    {
    }

    /**
     * {@inheritDoc}
     */
    public function histogram($variable, $value, $tags = array())
    {
    }

    /**
     * {@inheritDoc}
     */
    public function flush()
    {
    }
}
