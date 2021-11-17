<?php

namespace App\Http\Controllers\API\v1\Modules\AppIntegration;

use App\User;
use App\Integrations;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Stitchel\Services\SearchProviders\SearchProviderFactory;
use Stitchel\Services\SearchProviders\Providers\MobileGmail;



class MobileGmailIntegrationController extends Controller 
{

     public function getMobileGetUrl(Request $request)
    {
       
       // return 123;
    $MobileGmail = new MobileGmail();
    $gmailIntegrationUrl = $MobileGmail->getCodeUrl();

    // dd($gmailIntegrationUrl);

    return $gmailIntegrationUrl;

    }

	public function getMobileGmailCode(Request $request) 
    {
        $MobileGmail = new MobileGmail();
        $tokens = $MobileGmail->getRefreshToken($request->code);
        $userInfo = $MobileGmail->getUserInfo($tokens['access_token']);
        $tokens['code'] = $request->code;
        $tokens['user_id'] = $request->state;

        $integrations = Integrations::create([
            'data' => json_encode(array_merge($tokens, $userInfo)),
            'type' => SearchProviderFactory::GMAIL,
            'user_id' => auth()->user()->id,
        ]);

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

        $MobileGmail->gmailRevokeToken($integration);

        // dd([$MobileGmail, $integration]);

        $integration->delete();

         return response()->json([
         'token' => $MobileGmail, 
         'message' => 'Successfully Deleted!'
        ]);
    }
}
