<?php

namespace App\Http\Controllers\API\v1\Modules\AppIntegration;

use App\User;
use App\Integrations;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Stitchel\Services\SearchProviders\SearchProviderFactory;
use Stitchel\Services\SearchProviders\Providers\MobileGmail;
// use Stitchel\Services\SearchProviders\Providers\Jira;
// use Stitchel\Services\SearchProviders\Providers\Slack;



class MobileIntegrationController extends Controller 
{

	public function getMobileGmailCode(Request $request)
    {
        $MobileGmail = new MobileGmail();
        $tokens = $MobileGmail->getRefreshToken($request->code);
        $userInfo = $MobileGmail->getUserInfo($tokens['access_token']);
        $tokens['code'] = $request->code;

        // dd($userInfo);

        $integrations = Integrations::create([
            'data' => json_encode(array_merge($tokens, $userInfo)),
            'type' => SearchProviderFactory::GMAIL,
            'user_id' => auth()->user()->id,
        ]);

        // dd($integrations);

        $integrations->save();

        return response()->json($integrations);
    }

    public function show()
    {
        $integrations = Integrations::all();

        return response()->json($integrations);
    }

    public function revokeToken($id, Request $request)
    {
        $integration = Integrations::findOrFail($id);
        $MobileGmail = new MobileGmail();

        $MobileGmail->revokeToken($integration);

        // dd($MobileGmail);

        $integration->delete();

         return response()->json([
         'token' => $MobileGmail, 
         'message' => 'Successfully Deleted!'
        ]);
    }
}
