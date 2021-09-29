<?php

namespace Stitchel\Services\SearchProviders\Providers;

use Stitchel\Services\SearchProviders\SearchProviderFactory;

/**
 *
 */
class Slack implements SearchProviderInteface
{
    public function search($search): array
    {
    	$searchItems = [];

    	$searchItems[] = [
    		'body' => 'test',
    		'type' => SearchProviderFactory::SLACK
    	];

    	return $searchItems;
    }
}
