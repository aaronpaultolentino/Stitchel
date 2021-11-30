<?php

namespace App\Http\Controllers\API\v1\Modules\AppIntegration;

use App\User;
use App\Integrations;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Stitchel\Services\SearchProviders\SearchProviderFactory;
use Stitchel\Services\SearchProviders\Providers\MobileSlack;


class MobileSlackIntegrationController extends Controller 
{

    /**
     * Show the application integrations.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $slackIntegrations = Integrations::whereType('slack')->whereUserId(auth()->user()->id)->get();

        return response()->json($slackIntegrations);
       
    }

     public function getMobileGetUrl(Request $request)
    {
       
       // return 123;
    $mobileSlack = new MobileSlack();
    $slackIntegrationUrl = $mobileSlack->getCodeUrl();

    // dd($slackIntegrationUrl);

    return $slackIntegrationUrl;

    }

	public function getMobileSlackCode(Request $request)
    {

        $mobileslack = new MobileSlack();
        $tokens = $mobileslack->getRefreshToken($request->code);
        $userInfo = $mobileslack->getUserInfo($tokens['authed_user']['access_token']);
        $tokens['code'] = $request->code;
        $tokens['user_id'] = $request->state;

        // dd([$userInfo, $tokens]);

         $integrations = Integrations::create([
            'data' => json_encode(array_merge($tokens, $userInfo)),
            'type' => SearchProviderFactory::SLACK,
            'user_id' => $tokens['user_id'],
        ]);

        $integrations->save();

        return response()->json($integrations);
        
    }

    public function show()
    {
        $integrations = Integrations::whereType('slack')->get();

        return response()->json($integrations);
    }

    public function revokeToken($id, Request $request)
    {
        $integration = Integrations::findOrFail($id);
        $mobileSlack = new MobileSlack();

        $mobileSlack->slackRevokeToken($integration);

        $integration->delete();

         return response()->json([
         'token' => $mobileSlack, 
         'message' => 'Successfully Deleted!'
        ]);
    }
}
