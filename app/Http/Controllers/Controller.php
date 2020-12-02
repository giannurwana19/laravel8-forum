<?php

namespace App\Http\Controllers;

use App\Models\Forum;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function getPopularForums(int $number = 4)
    {
        return Forum::join('counterables', 'forums.id', '=', 'counterables.counterable_id')->orderBy('value', 'desc')->take($number)->get(); // .. 2
    }
}
