RIPS Connector Bundle
---

A Symfony bundle wrapper around the [RIPS Connector package](https://github.com/rips/php-connector).
This library provides easy access to RIPS and all of its features.

# Installation

Use composer to include the package:

    composer require rips/connector-bundle:~3.4

OR add the following to composer.json and run `composer update`.

    "rips/connector-bundle": "~3.4"

This library is intended for Symfony applications but it can also be used on its own.
If used with Symfony, the installation of the connector bundle should automatically create an entry in the `bundles.php` file that looks like this:

    return [
        // ...
        RIPS\ConnectorBundle\RIPSConnectorBundle::class => ['all' => true],	
        // ...
    ];

Additionally, you have to add config settings in `app/config/rips_connector.yaml` (see [rips/connector readme](https://github.com/rips/php-connector#user-content-configoptions) for a list of config options).
If you are not using Symfony you can specify the options through the constructor of `APIService`.

    rips_connector:
        base_uri: 'http://localhost:8080'
        email: 'email'
        password: 'password'

# Usage

A basic example for a console application that gets a list of all users without Symfony looks like this:
    
    <?php
    
    include 'vendor/autoload.php';
    
    use RIPS\ConnectorBundle\Services\APIService;
    use RIPS\ConnectorBundle\Services\UserService;
    
    // Create an API service object that gets passed to all other services
    $apiService = new APIService(
        'username',
        'password',
        [
            "base_uri" => 'http://localhost:8080'
        ]
    );
    
    $userService = new UserService($apiService);
    
    // Get all users
    $users = $userService->getAll()->getUsers();
    
    foreach ($users as $user) {
        echo $user->getEmail() . "\n";
    }


The bundle can be easily integrated in Symfony applications like this:

    <?php
    
    use Symfony\Bundle\FrameworkBundle\Controller\Controller;
    use RIPS\ConnectorBundle\Services\UserService;
    use RIPS\ConnectorBundle\InputBuilders\UserBuilder;
    use RIPS\Connector\Exceptions\ClientException;
    use RIPS\Connector\Exceptions\ServerExecption;
    
    class DefaultController extends Controller
    {
        /** @var UserService */
        protected $userService;
        
        public function __construct(UserService $userService)
        {
            $this->userService = $userService;
        }
        
        public function indexAction()
        {
            try {
                // Get all users
                $users = $this->userService->getAll()->getUsers();

                // Add a new user
                $response = $this->userService->create(
                    new UserBuilder([
                    	'email'         => 'test@ripstech.com',
                    	'plainPassword' => '***********'
                    ])
                )->getResponse();
            } catch (ClientException $e) {
                // 4** error
            } catch (ServerException $e) {
                // 5** error
            }
            
            return $this->render('default/index.html.twig', ['users' => $users]);
        }
    }

# Architecture

This section contains an overview of the architecture used for this bundle.

### Services

Services are the main wrapper around the RIPS-Connector library. The `RIPS\Connector\API` class is initialized in APIService, and all other services expect APIService to be injected (see `services.yml`).

Each service class should have a corresponding `Requests` class in RIPS-Connector. An accessor method is added to the `APIService` class for every `Requests` class for easier access.

The directory structure attempts to follow the directory structure of the API controllers.

### Entities

Instead of returning `stdClass` objects or an array, data returned from the API is mapped to custom `Entity` classes that are returned by response classes. The responses are returned by the service classes.

The entities are just custom classes with getters/setters for all properties. In some cases they will have nested entities. For example: the `UserEntity` will have a nested `OrgEntity` as a user belongs to an organization.
It is highly advised to check if sub objects exist before accessing them.

### Hydrators

Hydrators in the connector-bundle are used to populate the custom `Entity` classes with data returned from the RIPS Connector library. They expect `stdClass` objects (returned from RIPS Connector) which are mapped into the entity classes.

In some situations you will have nested objects (a `UserEntity` contains a nested `OrgEntity`) in which case it's best to reuse the `OrgHydrator` in the `UserHydrator` to populate the nested `OrgEntity` object.

### InputBuilders

It would be difficult to remember all the expected input parameters a request might have. To aid in this, `InputBuilder` classes are created that have all the expected parameters as properties with getters/setters. It is also possible to pass an array of data to the constructor which will populate the corresponding fields.
