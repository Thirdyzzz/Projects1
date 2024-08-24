<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Google\Client;
use Google\Client as GoogleClient;
use Illuminate\Support\Facades\Session;

class GoogleCalendarController extends Controller
{
    public function index()
    {
        $client = new Client();
        $client->setClientId(env('GOOGLE_CLIENT_ID'));
        $client->setClientSecret(env('GOOGLE_CLIENT_SECRET'));
        $client->setRedirectUri(env('GOOGLE_REDIRECT_URI'));
        $client->addScope('https://www.googleapis.com/auth/calendar.readonly');

        if (!$token = session('google_token')) {
            return redirect()->route('google.login');
        }

        $client->setAccessToken($token);

        $service = new \Google\Service\Calendar($client);

        $calendarId = 'primary'; // You can change this to your calendar ID

        $events = $service->events->listEvents($calendarId);

        return view('google.calendar.index', compact('events'));
    }

    public function login()
    {
        $client = new Client();
        $client->setClientId(env('GOOGLE_CLIENT_ID'));
        $client->setClientSecret(env('GOOGLE_CLIENT_SECRET'));
        $client->setRedirectUri(env('GOOGLE_REDIRECT_URI'));
        $client->addScope('https://www.googleapis.com/auth/calendar.readonly');

        return redirect($client->createAuthUrl());
    }

    public function callback(Request $request)
    {
        $client = new Client();
        $client->setClientId(env('GOOGLE_CLIENT_ID'));
        $client->setClientSecret(env('GOOGLE_CLIENT_SECRET'));
        $client->setRedirectUri(env('GOOGLE_REDIRECT_URI'));
        $client->addScope('https://www.googleapis.com/auth/calendar.readonly');

        if (!$request->has('code')) {
            return redirect($client->createAuthUrl());
        } else {
            $token = $client->fetchAccessTokenWithAuthCode($request->input('code'));
            $client->setAccessToken($token);

            session(['google_token' => $token]);

            return redirect()->route('google.calendar');
        }
    }
     public function logout()
    {
        // Revoke the access token
        $client = new GoogleClient();
        $client->setClientId(env('GOOGLE_CLIENT_ID'));
        $client->setClientSecret(env('GOOGLE_CLIENT_SECRET'));
        $client->revokeToken(session('google_token'));

        // Remove the token from the session
        Session::forget('google_token');

        // Redirect to the desired page after logout
        return redirect()->route('home');
    }

}
