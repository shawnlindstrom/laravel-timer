<?php

declare(strict_types=1);

namespace shawnlindstrom\LaravelTimer\Tests\Feature;

use LogicException;
use PHPUnit\Framework\Attributes\Test;
use shawnlindstrom\LaravelTimer\Tests\TestCase;
use shawnlindstrom\LaravelTimer\Timer;
use shawnlindstrom\LaravelTimer\TimerFacade;
use shawnlindstrom\LaravelTimer\TimeUnit;

class TimerTest extends TestCase
{
    #[Test]
    public function it_can_determine_elapsed_time_in_seconds(): void
    {
        $timer = new Timer;
        $timer->start();
        sleep(2);
        $timer->stop();

        $this->assertEquals(2, $timer->elapsed());
    }

    #[Test]
    public function it_can_determine_elapsed_time_in_microseconds(): void
    {
        $timer = new Timer;
        $timer->start();
        sleep(2);
        $timer->stop();

        $elapsed = $timer->elapsed(TimeUnit::MICROSECOND);
        $this->assertGreaterThanOrEqual(2000, $elapsed);
        $this->assertLessThan(2100, $elapsed);
    }

    #[Test]
    public function it_can_determine_elapsed_time_in_milliseconds(): void
    {
        $timer = new Timer;
        $timer->start();
        sleep(2);
        $timer->stop();

        $elapsed = round($timer->elapsed(TimeUnit::MILLISECOND) / 1e6);

        $this->assertEquals(2, $elapsed);
    }

    #[Test]
    public function it_can_determine_elapsed_time_in_nanoseconds(): void
    {
        $timer = new Timer;
        $timer->start();
        sleep(2);
        $timer->stop();

        $elapsed = round($timer->elapsed(TimeUnit::NANOSECOND) / 1e9);

        $this->assertEquals(2, $elapsed);
    }

    #[Test]
    public function it_throws_exception_when_called_without_starting(): void
    {
        $timer = new Timer;

        $this->expectException(LogicException::class);
        $this->expectExceptionMessage('Timer must be started and stopped before calling elapsed()');

        $timer->elapsed();
    }

    #[Test]
    public function it_throws_exception_when_called_without_stopping(): void
    {
        $timer = new Timer;
        $timer->start();

        $this->expectException(LogicException::class);
        $this->expectExceptionMessage('Timer must be started and stopped before calling elapsed()');

        $timer->elapsed();
    }

    #[Test]
    public function elapsed_time_is_not_cumulative(): void
    {
        $timer = new Timer;
        $timer->start();
        sleep(1);
        $timer->stop();
        $timer->start();
        sleep(1);
        $timer->stop();

        $this->assertNotEquals(2, $timer->elapsed());
    }

    #[Test]
    public function facade_access_works(): void
    {
        TimerFacade::start();
        sleep(1);
        TimerFacade::stop();
        $elapsed = TimerFacade::elapsed();

        $this->assertEquals(1, $elapsed);
    }

    #[Test]
    public function it_measures_sub_second_precision(): void
    {
        $timer = new Timer;
        $timer->start();
        usleep(100000); // 100ms = 100,000 microseconds
        $timer->stop();

        $elapsed = $timer->elapsed(TimeUnit::MICROSECOND);

        $this->assertGreaterThanOrEqual(100, $elapsed);
        $this->assertLessThanOrEqual(200, $elapsed);
    }

    #[Test]
    public function it_can_be_reused_multiple_times(): void
    {
        $timer = new Timer;

        // First measurement
        $timer->start();
        sleep(1);
        $timer->stop();
        $first = $timer->elapsed();

        // Second measurement
        $timer->start();
        sleep(1);
        $timer->stop();
        $second = $timer->elapsed();

        $this->assertEquals(1, $first);
        $this->assertEquals(1, $second);
    }

    #[Test]
    public function all_time_units_produce_consistent_results(): void
    {
        $timer = new Timer;
        $timer->start();
        sleep(1);
        $timer->stop();

        $seconds = $timer->elapsed(TimeUnit::SECOND);
        $microseconds = $timer->elapsed(TimeUnit::MICROSECOND);
        $milliseconds = $timer->elapsed(TimeUnit::MILLISECOND);
        $nanoseconds = $timer->elapsed(TimeUnit::NANOSECOND);

        // All should roughly equal 1 second when converted
        $this->assertEquals(1, $seconds);
        $this->assertEqualsWithDelta(1000, $microseconds, 100); // Allow some variance
        $this->assertEqualsWithDelta(1e6, $milliseconds, 1e5); // Allow 10% variance
        $this->assertEqualsWithDelta(1e9, $nanoseconds, 1e8); // Allow 10% variance
    }
}
