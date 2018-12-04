<?php

namespace Tests\Feature;

use shawnlindstrom\LaravelTimer\Timer;
use shawnlindstrom\LaravelTimer\TimeUnit;
use Tests\TestCase;

class TimerTest extends TestCase
{
    /** @test */
    public function it_can_determine_elapsed_time_in_seconds()
    {
        $timer = new Timer();
        $timer->start();
        sleep(2);
        $timer->stop();

        $this->assertEquals(2, $timer->elapsed());
    }

    /** @test */
    public function it_can_determine_elapsed_time_in_microseconds()
    {
        $timer = new Timer();
        $timer->start();
        sleep(2);
        $timer->stop();

        $this->assertEquals(2000, $timer->elapsed(TimeUnit::MICROSECOND));
    }

    /** @test */
    public function it_can_determine_elapsed_time_in_milliseconds()
    {
        $timer = new Timer();
        $timer->start();
        sleep(2);
        $timer->stop();

        $elapsed = round($timer->elapsed(TimeUnit::MILLISECOND) / 1e6);

        $this->assertEquals(2, $elapsed);
    }

    /** @test */
    public function it_can_determine_elapsed_time_in_nanoseconds()
    {
        $timer = new Timer();
        $timer->start();
        sleep(2);
        $timer->stop();

        $elapsed = round($timer->elapsed(TimeUnit::NANOSECOND) / 1e9);

        $this->assertEquals(2, $elapsed);
    }

    /** @test */
    public function it_throws_an_exception_if_argument_for_elapsed_is_invalid()
    {
        $timer = new Timer();
        $timer->start();
        $timer->stop();

        $this->expectException(\InvalidArgumentException::class);
        $timer->elapsed(2);
    }

    /** @test */
    public function elapsed_time_is_not_cummulative()
    {
        $timer = new Timer();
        $timer->start();
        sleep(1);
        $timer->stop();
        $timer->start();
        sleep(1);
        $timer->stop();

        $this->assertNotEquals(2, $timer->elapsed());
    }

    /** @test */
    public function facade_access_works()
    {
        \shawnlindstrom\LaravelTimer\TimerFacade::start();
        sleep(1);
        \shawnlindstrom\LaravelTimer\TimerFacade::stop();
        $elapsed = \shawnlindstrom\LaravelTimer\TimerFacade::elapsed();

        $this->assertEquals(1, $elapsed);
    }
}
