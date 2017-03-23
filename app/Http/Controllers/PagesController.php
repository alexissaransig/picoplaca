<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class PagesController extends Controller
{
  /***
   * Controller for Homepage.
   *
   * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
   */
  public function home()
  {
    return view('welcome');
  }
}
