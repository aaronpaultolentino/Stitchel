<?php

namespace Stitchel\Services\SearchProviders;

use Stitchel\Services\SearchProviders\Providers\Gmail;
use Stitchel\Services\SearchProviders\Providers\Slack;
use Stitchel\Services\SearchProviders\Providers\SearchProviderInteface;

/**
 *
 */
class SearchProviderFactory
{
    const GMAIL = 'gmail';
    const SLACK = 'slack';

    /**
     * @var array
     */
    public static $providers = [
        self::GMAIL => Gmail::class,
        self::SLACK => Slack::class,
    ];

    /**
     * @param $provider
     */
    public static function make($provider): SearchProviderInteface
    {
        if (isset(self::$providers[$provider])) {
            return new self::$providers[$provider];
        }

        throw new SearchProviderNotFoundException("Search Provider not found!", 1);

    }
}
