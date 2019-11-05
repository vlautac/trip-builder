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
`php bin/phpunit`

### 6 - Security
To access to the API endpoints, you must add the token value in the HTTP request header. This token will be provided by myself.

## API Endpoints
### 1 - Pagination, sort and filters
You can performs filtering using criteria on the HTTP query parameters `?sort=code&direction=ASC&offset=1&limit=5`

| Name | Type | Value |
| ---- | ---- | ----- |
| sort | string | Any |
| direction | string | ASC or DESC |
| offset | int | 0 (default) |
| limit | int | 50 (default) |

To performs filtering on a field of any entity, you can directly query it using parameter `?code=YUL`

### 2 - Airline endpoints
| Route | Method | Description |
| ------| ------ | ----------- |
| `/api/airlines` | GET | Get all the airlines |

### 2 - Airport endpoints
| Route | Method | Description |
| ------| ------ | ----------- |
| `/api/airports` | GET | Get all the airports |

### 3 - Flight endpoints
| Route | Method | Description |
| ------| ------ | ----------- |
| `/api/flights` | GET | Get all the flights |

