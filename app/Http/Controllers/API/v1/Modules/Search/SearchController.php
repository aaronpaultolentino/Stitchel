<?php

namespace App\Http\Controllers\API\v1\Modules\Search;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SearchController extends Controller
{

    /**
     * Search details.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function search() {

        
         return view('modules.Search.index');

    }

    /**
     * Search By ID details.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
     public function searchById() {


	return view('modules.Search.index');

	}
}
