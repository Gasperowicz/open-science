<?php

namespace OpenScience\Shared\Infrastructure\Metrics;

use OpenScience\Shared\Domain\Metrics\TaggableGaugeableCollector;
use function Lambdish\Phunctional\apply;

/**
 * A collector interface for the Datadog DogStatsD collector daemon.
 * It behaves the same as a normal StatsD collector but provides the ability to
 * attach 'tags' to your metrics.
 *
 * If a luceo system name is provided, then by default all metrics will
 * include a 'client_system' tag that defines which system the metrics
 * originate from.
 */
class DogStatsD implements TaggableGaugeableCollector
{
    private string $host;

    private string $port;

    private string $prefix;

    private array $data;

    public function __construct(string $host = 'localhost', string $port = '8125', string $prefix = '')
    {
        $this->host = $host;
        $this->port = $port;
        $this->prefix = $prefix;
        $this->data = [];
    }

    /**
     * {@inheritDoc}
     */
    public function timing($variable, $time, $tags = array())
    {
        $this->data[] = sprintf('%s:%s|ms%s', $variable, ($time * 1000), $this->buildTagString($tags));
    }

    /**
     * {@inheritDoc}
     */
    public function increment($variable, $tags = array())
    {
        $this->incrementBy($variable, 1, $tags);
    }

    /**
     * {@inheritDoc}
     */
    public function incrementBy($variable, $value, $tags = array())
    {
        $this->data[] = $variable . ':' . (int) $value . '|c' . $this->buildTagString($tags);
    }

    /**
     * {@inheritDoc}
     */
    public function decrement($variable, $tags = array())
    {
        $this->decrementBy($variable, 1, $tags);
    }

    /**
     * {@inheritDoc}
     */
    public function decrementBy($variable, $value, $tags = array())
    {
        $this->incrementBy($variable, -$value, $tags);
    }

    /**
     * {@inheritDoc}
     */
    public function measure($variable, $value, $tags = array())
    {
        $this->data[] = sprintf('%s:%s|c%s', $variable, $value, $this->buildTagString($tags));
    }

    /**
     * {@inheritDoc}
     */
    public function gauge($variable, $value, $tags = array())
    {
        $this->data[] = sprintf('%s:%s|g%s', $variable, $value, $this->buildTagString($tags));
    }

    /**
     * {@inheritDoc}
     */
    public function histogram($variable, $value, $tags = array())
    {
        $this->data[] = sprintf('%s:%s|h%s', $variable, $value, $this->buildTagString($tags));
    }

    /**
     * Given a key/value map of metric tags, builds them into a
     * DogStatsD tag string and returns the string.
     *
     * @param array
     * @return string
     */
    private function buildTagString($tags)
    {
        $results = [];
        foreach ($tags as $key => $value) {
            $results[] = sprintf('%s:%s', $key, $value);
        }

        $tagString = implode(',', $results);
        if (strlen($tagString)) {
            $tagString = sprintf('|#%s', $tagString);
        }

        return $tagString;
    }

    /**
     * {@inheritDoc}
     */
    public function flush()
    {
        if (!$this->data) {
            return;
        }

        $fp = fsockopen('udp://' . $this->host, $this->port, $errno, $errstr, 1.0);

        if (!$fp) {
            return;
        }

        $level = error_reporting(0);

        /*
            apply(function ($line) use ($fp) { fwrite($fp, $this->prefix . $line); }, $this->data);
        */
        foreach ($this->data as $line) {
            fwrite($fp, $this->prefix.$line);
        }

        error_reporting($level);

        fclose($fp);

        $this->data = [];
    }
}
