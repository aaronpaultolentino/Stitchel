<?php

namespace App\Http\Controllers\API\v1\Modules\Integration\Gmail;

use App\User;
use App\Integrations;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Stitchel\Services\SearchProviders\SearchProviderFactory;

class IntegrationController extends Controller
{
   public function getCode(Request $request)
    {

        $user = Auth::user();
        $integrations = Integrations::create([
            'data' => $request->code,
            'type' => SearchProviderFactory::GMAIL,
            'user_id' => $user->id,
        ]);

        $integrations->save();

        return redirect()->route('integrations');
    	
    }

    public function revokeToken($id)
    {
        $integrations = Integrations::findOrFail($id);
        $integrations->delete();

         return redirect()->route('integrations')
                        ->with('success','Integrations deleted successfully');
    }
}
