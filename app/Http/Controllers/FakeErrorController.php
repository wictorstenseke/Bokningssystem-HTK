<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class FakeErrorController extends Controller
{
    public function triggerError($errorUrl)
    {
        return ${$errorUrl};
    }
}
