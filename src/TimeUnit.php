<?php

declare(strict_types=1);

namespace shawnlindstrom\LaravelTimer;

enum TimeUnit: int
{
    case SECOND = 1;
    case MICROSECOND = 1000;
    case MILLISECOND = 1000000;
    case NANOSECOND = 1000000000;
}
