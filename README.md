# leadsGenerator

## Start project

- Clone the repository
- In the repository folder follow this steps:

### Run docker:

```
 docker-compose up --build
```
Connect to container:
```
 docker-compose exec php sh
```

### Once inside the container

- Database should be created, but if not: bin/console doctrine:database:create
- Migrate table and minimal data: bin/console doctrine:migrations:migrate
- If you want to seed the tables with fake data: bin/console doctrine:fixtures:load --append 

### Project will be running in:
- [http://localhost](http://localhost/)