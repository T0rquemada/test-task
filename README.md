## Test Task

## To run locally
1. git clone https://github.com/T0rquemada/test-task.git
2. Get .env file: ```mv .env.example .env```
3. Fill next fields in .env, with credentials from [Data For Seo API](https://app.dataforseo.com):
    - DFS_LOGIN
    - DFS_PASS
4. Install php dependencies: ```composer install```
5. Generate key: ```php artisan key:generate```
6. Set up DB: ```php artisan migrate```
7. Install npm dependencies: ```npm install```
8. Run vite: ```npm run dev```
9. Run dev server: ```php artisan serve```

Search logic placed in [SearchController.php](app/Http/Controllers/SearchController.php)
