<?php

namespace OpenScience\Shared\Domain\Metrics;

use Prometheus\Collector;
use Prometheus\Storage\Adapter;

abstract class PrometheusCollector extends Collector implements TaggableGaugeableCollector
{
    public function __construct(Adapter $storageAdapter, string $namespace, string $name, string $help, array $labels = [])
    {
        parent::__construct($storageAdapter, $namespace, $name, $help, $labels);
    }
}
