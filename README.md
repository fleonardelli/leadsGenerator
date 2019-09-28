# leadsGenerator
API REST for handling leads of Educational Institutions. Focused on having a complete isolated backend that handles requests from people who are interested in starting any kind of studies. 

## Technologies
- Composer
- Docker (Docker compose)
- Symfony 4.3

## Starting the project

- Clone the repository
- Enter project folder: `cd leadsGenerator`
- Run docker: `docker-compose up --build`
- Connect to container: `docker-compose exec php sh`

### Once inside the container
- Run composer: `composer install`
- Database should be created, but if not: `bin/console doctrine:database:create`
- Migrate table and minimal data: `bin/console doctrine:migrations:migrate`
- If you want to seed the tables with fake data: `bin/console doctrine:fixtures:load --append`

### Project will be running in:
- [http://localhost](http://localhost/)


## Testing
- Create test database: `bin/console doctrine:database:create --env=test`
- Migrate tables and minimal data: `bin/console doctrine:migrations:migrate --env=test`
- If you want to seed the tables with fake data: `bin/console doctrine:fixtures:load --env=test --append`
- Run tests: `./vendor/bin/simple-phpunit`

## API

Get all academic offers: `GET /api/academicOffers`
Get Specific academic offed: `GET /api/academicOffer/{academicOfferId}`
