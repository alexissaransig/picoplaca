<?php

namespace App\Http\Controllers;

use App\Custom\PicoPlaca;
use Illuminate\Http\Request;
use App\Http\Requests\PicoPlacaFormRequest;
use App\Http\Requests;

/**
 * Class PicoPlacaController
 * @package App\Http\Controllers
 */
class PicoPlacaController extends Controller {

  /**
   * Response for /picoplaca path.
   *
   * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
   */
  public function picoplaca() {
    return view('picoplaca.picoplaca', array('result' => ''));
  }

  /**
   * Response for /verify path.
   *
   * @param \Illuminate\Http\Request $request
   * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
   */
  public function verify(Request $request) {
    $placa = new PicoPlaca();
    $result = $placa->Verify($request->license, $request->date, $request->time);
    return view('picoplaca.picoplaca', array('result' => $result));
  }
}
