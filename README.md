# Checkfood in DDD

### How to run

- Have docker installed on your machine.
- Run `docker build .` to install the Dockerfile dependencies.
- After done, you can run `docker-compose up -d` to start the containers.
- To execute the migrations, you have to run the follow script: 
    ```bash
    > docker exec -it checkfood_checkfood_1 sh
    > php app/console.php migrations:migrate
    ```
- Done!
