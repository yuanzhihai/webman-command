<?php

use Illuminate\Container\Container;
use Illuminate\Contracts\Container\Container as ContainerContract;

return [
    'container' => function (): ContainerContract {
        return Container::getInstance();
    }
];