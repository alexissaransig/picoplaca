<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ScheduleController extends Controller
{

  /**
   * Controller - Function used to list the custom schedule.
   *
   * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
   */
  public function schedule()
  {
    $info = $this->getSchedule();

    // Render the values using the provided template.
    return view('schedule.schedule-list', array(
      'hours' => $info->hours,
      'days' => $info->days)
    );
  }

  /**
   * Helper function - Returns the schedule.
   *
   * @return \stdClass
   */
  public function getSchedule()
  {
    $response = new \stdClass();

    // Custom values for Hours and Days.
    // These values could be gotten from another services.
    $response->hours = array ([7, 9], [18, 20]);

    $response->days = array (
      'Monday' => [1, 2],
      'Tuesday' => [3, 4],
      'Wednesday' => [5, 6],
      'Thursday' => [7, 8],
      'Friday' => [9, 0]
    );

    return $response;
  }
}
