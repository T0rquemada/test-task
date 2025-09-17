## Test Task

## To run locally
1. git clone https://github.com/T0rquemada/test-task.git
2. Get .env file: ```mv .env.example .env```
3. Fill next fields in .env, with credentials from [Data For Seo API](https://app.dataforseo.com):
    - DFS_LOGIN
    - DFS_PASS
4. Install dependencies: ```composer install```
5. Run dev server: ```php artisan serve```

Search logic placed in [SearchController.php](app/Http/Controllers/SearchController.php)
