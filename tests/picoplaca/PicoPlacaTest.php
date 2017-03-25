<?php

/**
 * Class PicoPlacaTest
 */
class PicoPlacaTest extends TestCase {
  /**
   * Check if Check my License button gets to Picoplaca page.
   *
   * @return void
   */
  public function testPicoPlacaPage() {
    $this->visit('/')
      ->click('Check my license')
      ->see('License');
  }

  /**
   * Check if Back to Home button gets back to Homepage.
   *
   * @return void
   */
  public function testPicoPlacaPageBackHome() {
    $this->visit('/picoplaca')
      ->click('Back to Home')
      ->see('See schedule');
  }

  /**
   * Check the required fields in picoplaca form.
   *
   * @return void
   */
  public function testPicoPlacaFillOutForm() {
    $this->visit('/picoplaca')
      ->press('Submit')
      ->see('All the fields are required.')
      ->type('abc1234', 'license')
      ->press('Submit')
      ->see('All the fields are required.')
      ->type('abc1234', 'license')
      ->type('03/25/2017', 'date')
      ->press('Submit')
      ->see('All the fields are required.')
      ->type('abc1234', 'license')
      ->type('03/25/2017', 'date')
      ->type('8', 'time')
      ->press('Submit')
      ->dontSee('All the fields are required.');
  }

  /**
   * Check the license plate is available.
   * Should see success message.
   *
   * @return void
   */
  public function testPicoPlacaAvailable() {

    // Digit 9, Thursday, 8 am.
    $this->visit('/picoplaca')
      ->type('abc1239', 'license')
      ->type('03/23/2017', 'date')
      ->type('8', 'time')
      ->press('Submit')
      ->see('you can run on the road')
      // Digit 9, Monday, 19 pm.
      ->type('abc1239', 'license')
      ->type('03/20/2017', 'date')
      ->type('19', 'time')
      ->press('Submit')
      ->see('you can run on the road')
      // Digit 9, Friday, 10 am.
      ->type('abc1239', 'license')
      ->type('03/24/2017', 'date')
      ->type('10', 'time')
      ->press('Submit')
      ->see('you can run on the road')
      // Digit 9, Sunday, 10 am.
      ->type('abc1239', 'license')
      ->type('03/26/2017', 'date')
      ->type('10', 'time')
      ->press('Submit')
      ->see('you can run on the road');
  }

  /**
   * Check the license plate is Not available.
   * Should see info message.
   *
   * @return void
   */
  public function testPicoPlacaNotAvailable() {

    // Digit 9, Friday, 8 am.
    $this->visit('/picoplaca')
      ->type('abc1239', 'license')
      ->type('03/24/2017', 'date')
      ->type('8', 'time')
      ->press('Submit')
      ->see('you cannot run on the road')
      // Digit 9, Friday, 19 pm.
      ->visit('/picoplaca')
      ->type('abc1239', 'license')
      ->type('03/24/2017', 'date')
      ->type('19', 'time')
      ->press('Submit')
      ->see('you cannot run on the road');
  }

  /**
   * Check the license plate is valid.
   * Should see warning message.
   *
   * @return void
   */
  public function testPicoPlacaValidLicensePlate() {

    // License Plate 6 characters.
    $this->visit('/picoplaca')
      ->type('abc123', 'license')
      ->type('03/24/2017', 'date')
      ->type('8', 'time')
      ->press('Submit')
      ->see('is not valid')
      // License Plate 8 characters.
      ->visit('/picoplaca')
      ->type('abc12345', 'license')
      ->type('03/24/2017', 'date')
      ->type('8', 'time')
      ->press('Submit')
      ->see('is not valid')
      // License Plate last characters is not number.
      ->visit('/picoplaca')
      ->type('abc123x', 'license')
      ->type('03/24/2017', 'date')
      ->type('8', 'time')
      ->press('Submit')
      ->see('is not valid');
  }
}
