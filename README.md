# TripBuilder
## Configuration
### 1 - Vendor dependecies
Execute composer command to get the dependencies
`composer install`

### 2 - Environnement
To set up the local environment, just create a `.env.local` file at the project root directory. You can set up here the local database connection
`DATABASE_URL=mysql://<user>:<password>@<ip>:<port>/<database>`

### 3 - Database configuration
You can directly create the database using the Doctrine command
`php bin/console doctrine:database:create`

Then create the database schema using the Doctrine command
`php bin/console doctrine:schema:update --force`

A database migration file is available to populate some tables like airline, airport and flight
`php bin/console doctrine:migrations:migrate`

### 4 - Homestead local server
You can optionnally use the Homestead/Vagrant virtual development environment that integrates a built-in server
`https://symfony.com/doc/current/setup/homestead.html`

### 5 - Unit Tests
The unit tests are located under the `/tests`directory. You can execute the unit tests using the command
`php vendor/bin/phpunit`

## API Endpoints
### 1 - Airline endpoints
| Route | Method | Description |
| ------| ------ | ----------- |
| /api/airlines | GET | Get all the airlines |

### 2 - Airport endpoints
| Route | Method | Description |
| ------| ------ | ----------- |
| /api/airports | GET | Get all the airports |

### 3 - Flight endpoints
| Route | Method | Description |
| ------| ------ | ----------- |
| /api/flights | GET | Get all the flights |

