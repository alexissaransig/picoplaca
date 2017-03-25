<?php

namespace App\Http\Controllers;

use App\Custom\PicoPlaca;
use Illuminate\Http\Request;

use App\Http\Requests;

/**
 * Class ScheduleController
 * @package App\Http\Controllers
 */
class ScheduleController extends Controller
{

  /**
   * Function used to list the custom schedule.
   *
   * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
   */
  public function schedule()
  {
    // Gets schedule information from PicoPlaca Class.
    $pico_placa = new PicoPlaca();
    $info = $pico_placa->getSchedule();

    // Render the values using the provided template.
    return view('schedule.schedule-list', array(
      'hours' => $info->hours,
      'days' => $info->days)
    );
  }
}
