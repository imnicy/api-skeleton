# Nicy Framework API Skeleton Application

Use this skeleton application to quickly setup and start working on a new Nicy Framework application. This application uses the latest Nicy.

This skeleton application was built for Composer. This makes setting up a new Nicy Framework application quick and easy.

## Install the Application

Run this command from the directory in which you want to install your new Nicy Framework application. You will require PHP 7.4 or newer.

```bash
composer create-project imnicy/api-skeleton [my-app-name]
```

Replace `[my-app-name]` with the desired directory name for your new application. You'll want to:

* Point your virtual host document root to your new application's `public/` directory.
* Ensure `writeable/` is web writable.

To run the application in development, you can run these commands

```bash
cd [my-app-name]
composer start
```

Or you can use `docker-compose` to run the app with `docker`, so you can run these commands:
```bash
cd [my-app-name]
docker-compose up -d
```
After that, open `http://localhost:8080` in your browser.

Run this command in the application directory to run the test suite

```bash
composer test
```

That's it! Now go build something cool.