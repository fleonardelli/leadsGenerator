# leadsGenerator


#Wiki

##Up and running

- Create database: bin/console doctrine:database:create
- Migrate table and minimal data: bin/console doctrine:migrations:migrate
- If you want to seed the tables with fake data (only dev): bin/console doctrine:fixtures:load --append 