<?php

namespace App\Tests\Controller;

use Doctrine\ORM\Tools\SchemaTool;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\BrowserKit\Cookie;
use Symfony\Component\HttpKernel\KernelInterface;
use GuzzleHttp\Client;


abstract class BaseControllerTest extends WebTestCase
{
    public $http_client = null;
    public $client = null;
    public $session = null;
    public $options = null;

    public static function prime(KernelInterface $kernel)
    {
        // Make sure we are in the test environment
        if ('test' !== $kernel->getEnvironment()) {
            throw new \LogicException('Primer must be executed in the test environment');
        }
    }

    public function setUp()
    {
        $this->http_client = new Client(['base_uri' => 'http://localhost:8000']);
        $this->client = static::createClient();
        $this->session = $this->client->getContainer()->get('session');
        $auth_options = [
            'json' => [
                "username"  => 'artgraven',
                "password"  => 'Occultyoga123*',
            ]];
        $response = $this->http_client->post("/auth/", $auth_options);
        $token = json_decode($response->getBody())->token;

        $this->options = [
            'headers' => [
                "Authorization" => "token ".$token
            ]
        ];
        $this->session->set('credentials', $token);
        //self::bootKernel();
        //$this->client->getCookieJar()->set(new Cookie($this->session->getName(), $this->session->getId()));
        //run database migration
       // self::prime(self::$kernel);
    }
    
}

?>