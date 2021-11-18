<?php

namespace App\Http\Controllers\API\v1\Modules\Search;

use App\Http\Controllers\Controller;
use Stitchel\Services\SearchProviders\SearchProviderFactory;

class SearchController extends Controller
{
    /**
     * Search By ID details.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function search($query = '')
    {
    	$searchItems = [];
    	$providers = SearchProviderFactory::$providers;

    	foreach ($providers as $key => $provider) {
    		$searchItems = array_merge($searchItems, SearchProviderFactory::make($key)->search($query));
    	}

    	return $searchItems;
    }

    /**
     * Search By ID details.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function mobileSearch($query = '')
    {
        $searchItems = [];
        $providers = SearchProviderFactory::$providers;

        foreach ($providers as $key => $provider) {
            $searchItems = array_merge($searchItems, SearchProviderFactory::make($key)->search($query));
        }

        return $searchItems;
    }
}
