<?php

namespace OpenScience\Shared\Domain\Metrics;

interface TaggableGaugeableCollector
{
    /**
     * Updates a counter by some arbitrary amount
     *
     * @param string $variable
     * @param int $value The amount to increment the counter by
     * @param array $tags Tags to be attached to the metric
     */
    public function measure(string $variable, int $value, array $tags = []);

    /**
     * Increments a counter
     *
     * @param string $variable
     * @param array $tags Tags to be attached to the metric
     */
    public function increment(string $variable, array $tags = []);

    /**
     * Increments a counter by a specified value
     *
     * @param string $variable
     * @param int $value
     * @param array $tags Tags to be attached to the metric
     */
    public function incrementBy(string $variable, int $value, array $tags = []);

    /**
     * Decrements a counter
     *
     * @param string $variable
     * @param array $tags Tags to be attached to the metric
     */
    public function decrement(string $variable, array $tags = []);

    /**
     * Decrements a counter by a specified value
     *
     * @param string $variable
     * @param int $value
     * @param array $tags Tags to be attached to the metric
     */
    public function decrementBy(string $variable, int $value, array $tags = []);

    /**
     * Records a timing
     *
     * @param string $variable
     * @param int $time The duration of the timing in milliseconds
     * @param array $tags Tags to be attached to the metric
     */
    public function timing(string $variable, int $time, array $tags = []);

    /**
     * Updates a gauge by an arbitrary amount
     *
     * @param string $variable
     * @param int $value
     * @param array $tags Tags to be attached to the metric
     */
    public function gauge(string $variable, string $value, array $tags = []);

    /**
     * Histograms track the statistical distribution of a set of values,
     * like the duration of a number of database queries or the size of files uploaded by users.
     * Each histogram will track the average, the minimum, the maximum, the median, the 95th percentile and the count.
     *
     * @param string $variable
     * @param int $value
     * @param array $tags  Tags to be attached to the metric
     */
    public function histogram(string $variable, int $value, array $tags = []);

    /**
     * Sends the metrics to the adpater backend
     */
    public function flush();
}
