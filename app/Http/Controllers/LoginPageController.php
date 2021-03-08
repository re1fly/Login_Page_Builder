<?php

namespace App\Http\Controllers;

use App\Exceptions\DataNotFoundException;
use App\Exceptions\ProcessFailedException;
use App\Helpers\FileRequestUpload;
use App\Helpers\LoginFormDecoder;
use App\Helpers\Path;
use App\Helpers\Response\Constants\Error;
use App\Helpers\Response\Response;
use App\Http\Requests\LoginFormRequest;
use App\Http\Requests\LoginPageRequest;
use App\Http\Resources\HotspotLoginFormResource;
use App\Http\Resources\HotspotLoginPageResource;
use App\Models\HotspotLoginPage;
use App\Models\ServiceLocation;

class LoginPageController extends Controller
{
    /**
     * @param string $serviceLocationUUID
     * @param LoginPageRequest $request
     *
     * @request => [
     *      'company' => 'Testing'
     *      'title' => 'Testing'
     *      'description' => 'Test'
     *      'logo' => FileUpload
     *      'background' => FileUpload
     *      'fontColor' => '#fffffff'
     *      'secondaryColor' => '#fffffff'
     *      'font' => 'times-new-roman'
     *      'opacity' => 50
     * ]
     *
     * @request company string (required)
     * @request title string (required)
     * @request description string (required)
     * @request logo file|mimes:jpeg,jpg,png,ico,bmp
     * @request background file|mimes:jpeg,jpg,png,bmp
     * @request fontColor string
     * @request secondaryColor string
     * @request font string
     * @request opacity integer
     *
     * @return \App\Helpers\Response\Builders\ResponseData|\Illuminate\Http\JsonResponse
     */
    public function savePage(LoginPageRequest $request, string $serviceLocationUUID)
    {
        $pageForm = $request->except('logo', 'background');

        $serviceLocation = ServiceLocation::where('uuid', $serviceLocationUUID)->first();
        throw_if(!$serviceLocation, new DataNotFoundException(Error::SERVICE_LOCATION['SERVICE_LOCATION_NOT_FOUND']));

        $uploadLogo = new FileRequestUpload($request->file('logo'), Path::PAGE_LOGO);
        $logo = $uploadLogo->upload();

        $uploadBackground = new FileRequestUpload($request->file('background'), Path::PAGE_BACKGROUND);
        $background = $uploadBackground->upload();

        $loginPage = $serviceLocation->loginPage()->updateOrCreate([], $pageForm + [
                'logo' => $logo,
                'background' => $background
            ]);
        throw_if(!$loginPage, new ProcessFailedException(Error::LOGIN_PAGE['UNABLE_TO_SAVE_PAGE']));

        return Response::parse(null, $loginPage);
    }

    /**
     * @param string $serviceLocationUUID
     * @param int $loginPageId
     * @param LoginFormRequest $request
     *
     * @request => [
     *      'google' => 1
     *      'facebook' => 1
     *      'twitter' => 1
     *      'github' => 1
     *      'forms' => [
     *          [
     *              'name' => 'input_name',
     *              'typeId' => 2,
     *              'icon' => null,
     *              'validations' => [
     *                  'typeId' => 1,
     *                  'required' => 1,
     *                  'date_format' => 'd/m/Y',
     *                  'nullable' => 0,
     *              ]
     *          ],
     *          [
     *              'name' => 'input_name',
     *              'typeId' => 2,
     *              'icon' => null,
     *              'validations' => [
     *                  'typeId' => 1,
     *                  'required' => 1,
     *                  'date_format' => 'd/m/Y',
     *                  'nullable' => 0,
     *              ]
     *          ],
     *      ]
     * ]
     *
     * @request company string (required)
     * @request title string (required)
     * @request description string (required)
     * @request logo file|mimes:jpeg,jpg,png,ico,bmp
     * @request background file|mimes:jpeg,jpg,png,bmp
     * @request fontColor string
     * @request secondaryColor string
     * @request font string
     * @request opacity integer
     *
     * @return \App\Helpers\Response\Builders\ResponseData|\Illuminate\Http\JsonResponse
     */
    public function saveForm(LoginFormRequest $request, string $serviceLocationUUID, int $loginPageId)
    {
        $form = $request->except('forms');

        $serviceLocation = ServiceLocation::where('uuid', $serviceLocationUUID)->first();
        throw_if(!$serviceLocation, new DataNotFoundException(Error::SERVICE_LOCATION['SERVICE_LOCATION_NOT_FOUND']));

        $loginPage = HotspotLoginPage::find($loginPageId);
        throw_if(!$loginPage, new DataNotFoundException(Error::LOGIN_PAGE['LOGIN_PAGE_NOT_FOUND']));

        $form['forms'] = LoginFormDecoder::decode($request->forms);

        $loginForm = $loginPage->form()->updateOrCreate([], $form);
        throw_if(!$loginForm, new ProcessFailedException(Error::LOGIN_PAGE['UNABLE_TO_SAVE_FORM']));

        return Response::parse(null, $loginForm);
    }

    /**
     * @param string $serviceLocationUUID
     */
    public function get(string $serviceLocationUUID)
    {
        $serviceLocation = ServiceLocation::where('uuid', $serviceLocationUUID)->first();
        throw_if(!$serviceLocation, new DataNotFoundException(Error::SERVICE_LOCATION['SERVICE_LOCATION_NOT_FOUND']));

        $loginPage = HotspotLoginPage::where('serviceLocationId', $serviceLocation->id)->first();
        throw_if(!$loginPage, new DataNotFoundException(Error::LOGIN_PAGE['LOGIN_PAGE_NOT_FOUND']));

        $result = new HotspotLoginPageResource($loginPage);
        return Response::parse(null, $result);
    }

}
