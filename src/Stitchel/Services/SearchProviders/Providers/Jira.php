<?php

namespace Stitchel\Services\SearchProviders\Providers;

use Stitchel\Services\SearchProviders\SearchProviderFactory;

/**
 *
 */
class Jira implements SearchProviderInteface
{
    public function search($search): array
    {
    	$searchItems = [];

    	$searchItems[] = [
    		'body' => 'test jira',
    		'type' => SearchProviderFactory::JIRA
    	];

    	return $searchItems;
    }
}