<?php namespace App\Custom;

use League\Flysystem\Exception;

/**
 * Class PicoPlaca
 * @package App\Custom
 */
class PicoPlaca {

  /**
   * Function to verify the license plate and the availability.
   *
   * @param $license
   * @param $date
   * @param $time
   * @return \stdClass
   */
  public function Verify($license, $date, $time) {

    // Variable to store the response data.
    // Sets the response by default.
    $response = new \stdClass();
    $response->data = array(
      'license' => $license,
      'date' => $date,
      'time' => $time
    );
    $response->type = 'success';
    $response->message = 'Hurray! You can run on the road.';

    // Verifies the license length.
    if (strlen($license) != 7) {
      $response->type = 'warning';
      $response->message = 'Sorry, the entered license plate "' . $license . '" is not correct.';
    }
    else {
      // Loads the current schedule.
      $schedule = $this->getSchedule();
      // Gets the day name from the provided date.
      $day = date("l", strtotime($date));

      // Gets the last digit of the license.
      try {
        $digit = intval(substr($license, -1));
      } catch (Exception $e) {
        $response->type = 'warning';
        $response->message = 'Sorry, the entered license plate "' . $license . '" is not correct.';
      }

      // Check the day and hours for availability.
      if (array_key_exists($day, $schedule->days) && in_array($digit, $schedule->days[$day])) {
        $fail = FALSE;
        if (($time >= $schedule->hours[0][0] && $time <= $schedule->hours[0][1])) {
          $fail = TRUE;
        }
        if ($time >= $schedule->hours[1][0] && $time <= $schedule->hours[1][1]) {
          $fail = TRUE;
        }
        if ($fail) {
          $response->type = 'info';
          $response->message = 'Sorry, you cannot run on the road.';
        }
      }
    }
    return $response;
  }

  /**
   * Helper function - Returns the schedule.
   *
   * @return \stdClass
   */
  public function getSchedule() {
    $response = new \stdClass();

    // Custom values for Hours and Days.
    // These values could be gotten from another services.
    $response->hours = array([7, 9], [18, 20]);

    $response->days = array(
      'Monday' => [1, 2],
      'Tuesday' => [3, 4],
      'Wednesday' => [5, 6],
      'Thursday' => [7, 8],
      'Friday' => [9, 0]
    );

    return $response;
  }
}
