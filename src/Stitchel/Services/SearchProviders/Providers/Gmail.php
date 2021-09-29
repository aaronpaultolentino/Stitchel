<?php

namespace Stitchel\Services\SearchProviders\Providers;

/**
 *
 */
class Gmail implements SearchProviderInteface
{
    /**
     * @param $search
     */
    public function search($search): array
    {
        return [
        	'gmail search'
        ];
    }
}
