docker compose up -d --build
docker-compose exec backend php artisan migrate
