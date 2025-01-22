<?php

namespace PPLCZVendor\App\Http\Controllers;

use PPLCZVendor\Illuminate\Foundation\Bus\DispatchesJobs;
use PPLCZVendor\Illuminate\Routing\Controller as BaseController;
use PPLCZVendor\Illuminate\Foundation\Validation\ValidatesRequests;
use PPLCZVendor\Illuminate\Foundation\Auth\Access\AuthorizesRequests;
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
