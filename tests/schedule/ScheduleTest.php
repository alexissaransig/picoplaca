<?php

/**
 * Class ScheduleTest
 */
class ScheduleTest extends TestCase {
  /**
   * Check if Schedule button gets to Schedule page.
   *
   * @return void
   */
  public function testSchedulePage() {
    $this->visit('/')
      ->click('See schedule')
      ->see('Hours');
  }

  /**
   * Check if Back to Home button gets back to Homepage.
   *
   * @return void
   */
  public function testSchedulePageBackHome() {
    $this->visit('/schedule')
      ->click('Back to Home')
      ->see('See schedule');
  }
}
