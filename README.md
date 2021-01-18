# Turbo Demo App

This application serves as an example of applying Hotwire in Laravel. Uses:

- Turbo (via [`tonysm/turbo-laravel`](https://github.com/tonysm/turbo-laravel) package)
- Laravel WebSockets (via [`beyondcode/laravel-websockets`](https://github.com/beyondcode/laravel-websockets) package)
- Many built-in components from Laravel

## Setup

The local environment relies on Laravel Sail. So, in order to continue, make sure you [check out the docs](https://laravel.com/docs/8.x/sail) from that.

**Install Composer dependencies**:

```bash
docker run --rm \
    -v $(pwd):/opt \
    -w /opt \
    laravelsail/php80-composer:latest \
    composer install
```

**Copy the `.env.example` file**:

```bash
cp .env.example .env
```
Then you can edit this new `.env` file as you want.
Of course you can also add your own file `.env` file.

**Generate the APP_KEY**:

```bash
docker run --rm \
    -v $(pwd):/opt \
    -w /opt \
    laravelsail/php80-composer:latest \
    php artisan key:generate
```

**Boot the Services Up**:

```bash
sail up -d
```

**Migrate the Database**:

```bash
sail artisan migrate
```

**Install and Compile the Assets**:

```bash
sail npm ci
sail npm run dev
```

**Running a Worker**:

You will need a queue worker to process Turbo Stream broadcasts in background:

```bash
sail artisan queue:work --tries=1
```
