<?php

declare(strict_types=1);

namespace shawnlindstrom\LaravelTimer;

class Timer
{
    private int|float|null $start_time = null;

    private int|float|null $stop_time = null;

    /**
     * Start the timer.
     */
    public function start(): void
    {
        $this->start_time = hrtime(true);
    }

    /**
     * Stop the timer.
     */
    public function stop(): void
    {
        $this->stop_time = hrtime(true);
    }

    /**
     * Calculate elapsed time in the specified unit.
     * Defaults to seconds. Other options: MICROSECOND, MILLISECOND, NANOSECOND.
     */
    public function elapsed(TimeUnit $unit = TimeUnit::SECOND): int
    {
        if ($this->start_time === null || $this->stop_time === null) {
            throw new \LogicException('Timer must be started and stopped before calling elapsed()');
        }

        $elapsed_time = $this->stop_time - $this->start_time;
        $divisor = 1e9 / $unit->value;

        return (int) ($elapsed_time / $divisor);
    }
}
