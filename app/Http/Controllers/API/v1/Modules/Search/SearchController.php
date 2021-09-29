<?php

namespace App\Http\Controllers\API\v1\Modules\Search;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SearchController extends Controller
{

    /**
     * Search details.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function search() {

        
         return view('modules.Search.index');

    }

    /**
     * Search By ID details.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
     public function searchById() {


		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => 'https://gmail.googleapis.com/gmail/v1/users/peterjosephcruz01@gmail.com/messages/17c15b4576979c6b',
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => '',
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => 'GET',
		  CURLOPT_HTTPHEADER => array(
		    'Authorization: Bearer ya29.a0ARrdaM8bJMR315vi2VeC4UPS_PtRinBcjfz2EtqeeNuXvCWzppVo2oWvWGDZ3D0rzWbIO4_2dThJgYSqhnYJTPT7_fD4cpMxDNLAdSLIFFopPpD7aHiJR9_GpbYUkoNyt0phpmEZgzPpt0uGUa9Z9pomDv7D'
		  ),
		));

		$response = curl_exec($curl);

		curl_close($curl);

		dd($response);


		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => 'https://accounts.google.com/o/oauth2/token',
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => '',
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => 'POST',
		  CURLOPT_POSTFIELDS => 'client_id=682312451980-igji8oeu45rtc8970p7v7ph6deuh84dh.apps.googleusercontent.com&client_secret=P1HpYNLnmKIcYkpB7l4Kfvtv&refresh_token=1%2F%2F0ekwl8fqQGgZ3CgYIARAAGA4SNwF-L9IruT36zWZknjDxKmf7EgIfczY9lxT_evgVbMpUbixrNUB4r9WvRoo8QmpnQwIiyCYdN5w&grant_type=refresh_token',
		  CURLOPT_HTTPHEADER => array(
		    'Content-Type: application/x-www-form-urlencoded',
		    'Cookie: __Host-GAPS=1:HiFqOFH5Is8rJWPslPqTZ9rWq-eLDw:zjCHQd7Hg9JzLklJ'
		  ),
		));

		$response = curl_exec($curl);

		curl_close($curl);

		echo $response;

	}
}
