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
    public $session;
    public $client;

    public function __construct(\GuzzleHttp\ClientInterface $client, SessionInterface $session)
    {
        $this->client = $client;
        $this->session = $session;
    }

    /**
     * @Route("/login", name="api_login")
     */
    public function apiAuthenticate(Request $request)
    {
        $data = json_decode($request->getContent(), true);
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
            $resp = json_decode($response->getBody());

            if (isset($resp->token)) {
                $this->session->set(
                    'credentials',
                    $resp->token
                );
            }
            return new Response(json_encode($resp), 200);
        } else {
            return new Response(json_encode("{'error': 'no credentials provided'}"), 500);
        }
    }

    /**
     * @Route("/{endpoint}/", name="endpoint")
     */
    public function getProducts(Request $request,$endpoint)
    {
            $options = [
                'headers' => [
                    "Authorization" => "token ".$this->session->get('credentials'),
                ]
            ];
            $response = $this->client->get("/".$endpoint."/", $options);
            $resp = json_decode($response->getBody());
            return new Response(json_encode($resp), $response->getStatusCode());

        
    }
}
