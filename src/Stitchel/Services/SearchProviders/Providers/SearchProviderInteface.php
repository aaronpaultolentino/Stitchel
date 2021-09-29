<?php

namespace Stitchel\Services\SearchProviders\Providers;

/**
 *
 */
interface SearchProviderInteface
{
    public function search($query): array;
}
