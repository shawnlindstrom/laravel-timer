<?php

namespace shawnlindstrom\LaravelTimer;

class Timer
{
    private $start_time;
    private $stop_time;
    private $elapsed_time;

    /**
     * Start the timer.
     */
    public function start(): void
    {
        $this->start_time = $this->getTime();
    }

    /**
     * Stops the timer.
     */
    public function stop(): void
    {
        $this->stop_time = $this->getTime();
    }

    /**
     * Determines the time elapsed between start and stop. Default
     * to second. Other constants available for your use include
     * NANOSECOND, MILLISECOND, and MICROSECOND. Convenient!
     *
     * @param int|TimeUnit $unit
     * @return int
     */
    public function elapsed($unit = TimeUnit::SECOND): int
    {
        if (!\in_array($unit, [1, 1000, 1000000, 1000000000], true)) {
            throw new \InvalidArgumentException('$unit must be a constant of TimeUnit');
        }
        $unit = $unit ?? TimeUnit::SECOND;
        $this->elapsed_time = $this->stop_time - $this->start_time;

        return $this->elapsed_time / $this->getDivisor($unit);
    }

    /**
     * Returns the hrtime() or microtime() to the specified unit.
     *
     * @return float|int
     */
    private function getTime()
    {
        if (\function_exists('hrtime')) {
            return hrtime(true);
        }

        $time_parts = explode(' ', microtime());

        return ($time_parts[1] + $time_parts[0]);
    }

    /**
     * Determine the divisor based on whether we're using hrtime or micortime.
     *
     * @param int $unit
     * @return float|int
     */
    private function getDivisor(int $unit)
    {
        if (\function_exists('hrtime')) {
            return 1e9 / $unit;
        }

        return 1 / $unit;
    }
}
