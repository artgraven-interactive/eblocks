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

        // Get the entity manager from the service container
        $entityManager = $kernel->getContainer()->get('doctrine.orm.entity_manager');
        $schemaTool = new SchemaTool($entityManager);

        // Run the schema update tool using our entity metadata
        $metadatas = $entityManager->getMetadataFactory()->getAllMetadata();
        $out = $schemaTool->updateSchema($metadatas);

        // If you are using the Doctrine Fixtures Bundle you could load these here
    }

    public function setUp()
    {
        $this->http_client = new Client(['base_uri' => getenv("API_ENDPOINT")]);
        $this->client = static::createClient();
        $this->session = $this->client->getContainer()->get('session');
        $auth_options = [
            'form_params' => [
                "username"  => getenv('UI_API_USER'),
                "password"  => getenv('UI_API_PASSWORD'),
            ]];
        $response = $this->http_client->post("/auth/", $auth_options);
        $token = json_decode($response->getBody())->token;

        $this->options = [
            'headers' => [
                "Authorization" => "token ".$token
            ]
        ];
        $this->session->set('credentials', $token);
        self::bootKernel();
        //run database migration
        self::prime(self::$kernel);
    }
    
}

?>