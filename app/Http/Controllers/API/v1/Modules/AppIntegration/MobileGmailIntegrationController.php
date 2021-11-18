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

    /**
     * Show the application integrations.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $gmailIntegrations = Integrations::whereType('gmail')->whereUserId(auth()->user()->id)->get();

        return response()->json($gmailIntegrations);
       
    }

     public function getMobileGetUrl(Request $request)
    {
       

    $mobileGmail = new MobileGmail();
    $gmailIntegrationUrl = $mobileGmail->getCodeUrl();

    return $gmailIntegrationUrl;

    }

	public function getMobileGmailCode(Request $request) 
    {
        $mobileGmail = new MobileGmail();
        $tokens = $mobileGmail->getRefreshToken($request->code);
        $userInfo = $mobileGmail->getUserInfo($tokens['access_token']);
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
        $integrations = Integrations::where('type','gmail')->get();

        return response()->json($integrations);
    }

    public function revokeToken($id, Request $request)
    {
        $integration = Integrations::findOrFail($id);
        $mobileGmail = new MobileGmail();

        $mobileGmail->gmailRevokeToken($integration);

        $integration->delete();

         return response()->json([
         'token' => $mobileGmail, 
         'message' => 'Successfully Deleted!'
        ]);
    }
}
