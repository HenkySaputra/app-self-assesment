<?php
namespace App\Helpers;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class ApiHelper
{

    // public static $baseUrl = 'https://api.intakekurir.com/';
    // public static $baseUrl = 'https://api-prod.intakekurir.com/';
    public static $baseUrl = 'http://192.168.43.63:8000/api/';
    public static $domain = '192.168.43.63';
    // public static $baseUrlPublic = 'https://antaranter.com/api/';

    public static $userAuth = [];
    public static $token = '';

    public static function PostApiWithoutCredential($url, $body = [])
    {
        $response = Http::post(self::$baseUrl . $url, $body);
        return $response;
    }

    public static function setUserAuth($user, $token, $request)
    {
        self::$userAuth = $user;
        self::$token = $token;
        $request->session()->put('userAuth', $user);
        $request->session()->put('token', $token);
    }

    public static function setUser($user, $request)
    {
        self::$userAuth = $user;
        $request->session()->put('userAuth', $user);
    }

    public static function setCookie($accessToken, $refreshToken)
    {
        Cookie::queue('accessToken', $accessToken, 300);
        Cookie::queue('refreshToken', $refreshToken, 1440);
    }

    public static function GetApiWithCookie($url, $query = [])
    {
        $response = Http::withCookies(
            [
                'accessToken' => Cookie::get('accessToken'),
                'refreshToken' => Cookie::get('refreshToken')
            ],
            self::$domain
        )->get(self::$baseUrl . $url, $query);
        return $response;
    }

    public static function PostApiWithCookie($url, $body = [])
    {
        $response = Http::withCookies(
            [
                'accessToken' => Cookie::get('accessToken'),
                'refreshToken' => Cookie::get('refreshToken')
            ],
            self::$domain
        )->post(self::$baseUrl . $url, $body);
        return $response;
    }

    public static function PutApiWithCookie($url, $body = [])
    {
        $response = Http::withCookies(
            [
                'accessToken' => Cookie::get('accessToken'),
                'refreshToken' => Cookie::get('refreshToken')
            ],
            self::$domain
        )->put(self::$baseUrl . $url, $body);
        return $response;
    }

    public static function DeleteApiWithCookie($url, $body = [])
    {
        $response = Http::withCookies(
            [
                'accessToken' => Cookie::get('accessToken'),
                'refreshToken' => Cookie::get('refreshToken')
            ],
            self::$domain
        )->delete(self::$baseUrl . $url, $body);
        return $response;
    }
}
