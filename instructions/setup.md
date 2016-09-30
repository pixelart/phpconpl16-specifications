Setup the workshop project
==========================

Depending on your notebook for the workshop, you have two possibilities to
setup the workshop. Either in your environment or with the Vagrant virtual
machine.

In your environment
-------------------

The workshop requires PHP 7 and a database. You can either use sqlite or MySQL.
Other DBs are not tested, but if you are a PostgreSQL fan you can use it,
thanks to Doctrine.

And you need [composer installed globaly](https://getcomposer.org/doc/00-intro.md#globally)

### Install the project

Clone the repo, then check out the `final` tag to prewarm your composer cache
and then go back to `master` and install the starting package set.

```bash
git clone https://github.com/pixelart/phpconpl16-specifications.git
cd phpconpl16-specifications/
git checkout -f final
composer install
git checkout -f master
composer install
```

On the first `composer install` you are asked for some parameters. For the
`database_driver` you can either leave `pdo_mysql` and then fill out the
user/password/name according to your local database setup.
 
Or you can choose `pdo_sqlite` as database driver then the database parameters
can be left as they are. Only the `database_path` is relevant and should be left
as it is.

For the last `secret` parameter roll your head over the keyboard ;-)

### Database setup

If you have chosen MySQL as database you have to create the schema and load the
fixtures:

```bash
php bin/console doctrine:schema:create
php bin/console rad:fixtures:load
```

Vagrant Virtual Machine
-----------------------

If you can't or don't want to setup a local environment you can use the virtual
machine setup.

[Install the Vagrant VM from here](https://github.com/pixelart/phpconpl16-vm)

### Install the project

After the Vagrant is booted, ssh into it and run the convenient install script:

```bash
vagrant ssh
cd /vagrant
./run.sh specifications
cd specifications/
```

Leave the parameters on composer install as they are except the `secret`. For the
secret your head should meet your keyboard ;-)
