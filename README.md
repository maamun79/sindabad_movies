1. Dwonload the ZIP file from Github repo
2. Extract the ZIP file
3. Open cmd
4. cd into the project
5. Install Composer Dependencies. Run this command: "composer install"
6. Install NPM Dependencies. Run this command: "npm install" 
7. Create a copy of your .env file. Run this command "cp .env.example .env"
8. Generate an app encryption key. Run this command: "php artisan key:generate"
9. Create an empty database with name "sindabad_movies"
10. In the .env file, add database information to allow Laravel to connect to the database
11. In the .env file, add this API Key: TMDB_TOKEN = eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiI2OTNlMzQ3MjdkNTMwMTFhZjJjMjhkODc3Y2RmNzI0MyIsInN1YiI6IjYwNWNjOGI5NDZmMzU0MDAzYzVjMzZiZiIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.B_dQAUuIcINTLYMM5YsrTlToker_CN5_lsRM038HHiA
12. Migrate the database. Run this command: "php artisan migrate"
13. Now run the server and visit the site


* A custom artisan command has been created to insert or update movie data into the database. the command is: "php artisan insert:movies"
* And a laravel schedule has been created to run this command daily. Run this command to check schedule: "php artisan schedule:run"
