<?php

/**
 * Class PicoPlacaUnitTest
 */
class PicoPlacaUnitTest extends TestCase {
  /**
   * Check the license plate is available.
   * Should see success message.
   *
   * @return void
   */
  public function testUnitPicoPlacaAvailable() {

    $pp = new \App\Custom\PicoPlaca();

    // Digit 9, Thursday, 8 am.
    $response = $pp->Verify('abc1239', '03/23/2017', '8');
    $this->assertEquals('success', $response->type);

    // Digit 9, Monday, 19 pm.
    $response = $pp->Verify('abc1239', '03/20/2017', '19');
    $this->assertEquals('success', $response->type);

    // Digit 9, Friday, 10 am.
    $response = $pp->Verify('abc1239', '03/24/2017', '10');
    $this->assertEquals('success', $response->type);

    // Digit 9, Sunday, 10 am.
    $response = $pp->Verify('abc1239', '03/26/2017', '10');
    $this->assertEquals('success', $response->type);
  }

  /**
   * Check the license plate is Not available.
   * Should see info message.
   *
   * @return void
   */
  public function testUnitPicoPlacaNotAvailable() {

    $pp = new \App\Custom\PicoPlaca();

    // Digit 9, Thursday, 8 am.
    $response = $pp->Verify('abc1239', '03/24/2017', '8');
    $this->assertEquals('info', $response->type);

    // Digit 9, Friday, 19 pm.
    $response = $pp->Verify('abc1239', '03/24/2017', '19');
    $this->assertEquals('info', $response->type);
  }

  /**
   * Check the license plate is valid.
   * Should see warning message.
   *
   * @return void
   */
  public function testUnitPicoPlacaValidLicensePlate() {

    $pp = new \App\Custom\PicoPlaca();

    // License Plate 6 characters.
    $response = $pp->Verify('abc123', '03/24/2017', '8');
    $this->assertEquals('warning', $response->type);

    // License Plate 8 characters.
    $response = $pp->Verify('abc12345', '03/24/2017', '8');
    $this->assertEquals('warning', $response->type);

    // License Plate last characters is not number.
    $response = $pp->Verify('abc123x', '03/24/2017', '8');
    $this->assertEquals('warning', $response->type);
  }
}
