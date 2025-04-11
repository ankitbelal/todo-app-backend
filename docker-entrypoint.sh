#!/bin/bash

set -e

cd /var/www/html

# Fix permissions
chown -R www-data:www-data /var/www/html
chmod -R 755 /var/www/html/storage
chmod -R 755 /var/www/html/bootstrap/cache

# Generate application key if not set
if [ -z "$APP_KEY" ] || [ "$APP_KEY" == "base64:AGZhPoSyZj6FFjaVTEOKlOng+aWMERglQb/kNZHo7L4=" ]; then
  echo "Generating new application key..."
  php artisan key:generate --force
fi

# Wait for database to be ready
echo "Waiting for database connection..."
max_retries=30
try=0

while [ $try -lt $max_retries ]; do
  php -r "
  try {
      \$pdo = new PDO(
          'mysql:host=${DB_HOST};port=${DB_PORT}',
          '${DB_USERNAME}',
          '${DB_PASSWORD}'
      );
      \$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      \$pdo->query('USE ${DB_DATABASE}');
      echo 'Database connection established successfully.\n';
      exit(0);
  } catch (PDOException \$e) {
      exit(1);
  }
  " && break
  
  try=$((try+1))
  echo "Attempt $try of $max_retries failed. Retrying in 3 seconds..."
  sleep 3
done

if [ $try -eq $max_retries ]; then
  echo "ERROR: Could not connect to database after $max_retries attempts!"
  exit 1
fi

# Run database migrations
echo "Running database migrations..."
php artisan migrate --force

# Clear and optimize
php artisan optimize:clear
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Start PHP development server
exec "$@"