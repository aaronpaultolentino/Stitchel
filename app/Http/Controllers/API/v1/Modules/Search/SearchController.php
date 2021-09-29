<?php

namespace App\Http\Controllers\API\v1\Modules\Search;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SearchController extends Controller
{

    /**
     * Search By ID details.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
     public function searchById() {


	return view('modules.Search.index');

	}
}
