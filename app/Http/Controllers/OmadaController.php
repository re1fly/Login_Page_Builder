<?php

namespace App\Http\Controllers;

use App\Exceptions\DataNotFoundException;
use App\Helpers\Request\Validation;
use App\Helpers\Response\Constants\Error;
use App\Models\ServiceLocation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Laravel\Socialite\Facades\Socialite;

class OmadaController extends Controller
{
    const CONTROLLER_SERVER = 'https://192.168.1.64:8043';
    const CONTROLLER_USER = 'operator';
    const CONTROLLER_PASSWORD = 'admin123';

    private static $csrfToken = null;

    public function show(string $serviceLocationUUID)
    {
        throw_if(true, new DataNotFoundException(Error::SERVICE_LOCATION['SERVICE_LOCATION_NOT_FOUND']));
        $serviceLocation = ServiceLocation::where('uuid', $serviceLocationUUID)->first();
        abort_if(!$serviceLocation, 404, Error::SERVICE_LOCATION['SERVICE_LOCATION_NOT_FOUND'][1]);

        $loginPage = $serviceLocation->loginPage;
        abort_if(!$loginPage, 404, Error::LOGIN_PAGE['LOGIN_PAGE_NOT_FOUND'][1]);

        return view('login', compact('serviceLocation', 'loginPage'));
    }

    public function login(Request $request, string $serviceLocationUUID)
    {
        $serviceLocation = ServiceLocation::where('uuid', $serviceLocationUUID)->first();
        abort_if(!$serviceLocation, 404, Error::SERVICE_LOCATION['SERVICE_LOCATION_NOT_FOUND'][1]);

        $loginPage = $serviceLocation->loginPage;
        abort_if(!$loginPage, 404, Error::LOGIN_PAGE['LOGIN_PAGE_NOT_FOUND'][1]);

        Validation::loginFormRequest($loginPage->form, $request);

        self::omadaControllerLogin($request);

        self::omadaAuthorize($request);

        self::omadaControllerLogout($request);

        return view('login_success');
    }

    public function success()
    {
        return view('login_success');
    }

    private static function omadaControllerLogin(Request $request)
    {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_POST, TRUE);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        curl_setopt($ch, CURLOPT_COOKIEJAR, storage_path("app/omada/cookies-$request->clientMac.txt"));

        curl_setopt($ch, CURLOPT_COOKIEFILE, storage_path("app/omada/cookies-$request->clientMac.txt"));

        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);

        curl_setopt($ch, CURLOPT_URL, self::CONTROLLER_SERVER . "/api/v2/hotspot/login");

        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode([
            'name' => self::CONTROLLER_USER,
            'password' => self::CONTROLLER_PASSWORD
        ]));

        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

        $res = curl_exec($ch);

        $resObj = json_decode($res);

        if ($resObj->errorCode == 0) {
            self::$csrfToken = $resObj->result->token;
        }

        curl_close($ch);

    }

    private static function omadaAuthorize($request)
    {

        try {

            // Send user to authorize and the time allowed

            $expireTime = 6 * 3600 * 1000; // 6 hours
            $authInfo = [
                'clientMac' => $request->clientMac,
                'apMac' => $request->apMac,
                'ssidName' => $request->ssidName,
                'radioId' => $request->radioId,
                't' => $request->t,
                'time' => "$expireTime",
                'authType' => 4
            ];

            $ch = curl_init();

            curl_setopt($ch, CURLOPT_POST, TRUE);

            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

            curl_setopt($ch, CURLOPT_COOKIEJAR, storage_path("app/omada/cookies-$request->clientMac.txt"));

            curl_setopt($ch, CURLOPT_COOKIEFILE, storage_path("app/omada/cookies-$request->clientMac.txt"));

            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);

            $csrfToken = self::$csrfToken;

            $url = self::CONTROLLER_SERVER . "/api/v2/hotspot/extPortal/auth" . "?token=" . $csrfToken;

            curl_setopt($ch, CURLOPT_URL, $url);

            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($authInfo));

            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

            $res = curl_exec($ch);

            $resObj = json_decode($res);

            curl_close($ch);

        } catch (\Exception $exception) {
            Log::info($exception);
        }
    }

    private static function omadaControllerLogout(Request $request)
    {

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_POST, TRUE);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        curl_setopt($ch, CURLOPT_COOKIEJAR, storage_path("app/omada/cookies-$request->clientMac.txt"));

        curl_setopt($ch, CURLOPT_COOKIEFILE, storage_path("app/omada/cookies-$request->clientMac.txt"));

        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);

        $csrfToken = self::$csrfToken;

        curl_setopt($ch, CURLOPT_URL, self::CONTROLLER_SERVER . "/api/v2/hotspot/logout" . "?token=" . $csrfToken);

        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

        $res = curl_exec($ch);

        $resObj = json_decode($res);

        curl_close($ch);

    }

}
