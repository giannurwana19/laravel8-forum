<?php

namespace App\Http\Controllers;

use App\Models\Forum;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function forum()
    {
        $query = request('keyword');
        $populars = $this->getPopularForums();
        $forums = Forum::where('title', 'like', "%$query%")->latest()->paginate(4);

        return view('forums.index', compact('forums', 'populars'));
    }
}
