<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

/**
 * @Route("/api")
 */

class ApiController extends AbstractController
{
    public function __construct(\GuzzleHttp\ClientInterface $client)
    {
        $this->client = $client;

    }

    /**
     * @Route("/login", name="api_login")
     */
    public function apiAuthenticate(Request $request)
    {
        $data = $request->getContent();
        $data = json_decode($data, true);
        if ($data['user']) {
            $username = $data['user']['username'];
            $password = $data['user']['password'];
            $options = [
                'json' => [
                    "username" => $username,
                    "password" => $password
                ]
            ];


            $response = $this->client->post("/auth/", $options);
            $resp = $response->getBody();

            //header('Content-Type: application/json');
            return new Response(json_encode(json_decode($resp)),200);
        } else {
            return new Response(json_encode("{'error': 'no credentials provided'}"),500);
        }
    }
}
