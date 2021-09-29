<?php

namespace Stitchel\Services\SearchProviders\Providers;

/**
 *
 */
class Slack implements SearchProviderInteface
{
    public function search($search): array
    {
    	return [
    		'slack search here.'
    	];
    }
}
