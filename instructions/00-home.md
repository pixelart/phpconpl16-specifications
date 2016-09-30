Welcome to the specification pattern workshop!
==============================================

**FOR VAGRANT USERS**

Boot up your vagrant and ssh into it:

```bash
vagrant ssh
cd /vagrant/workshops/specifications/
```

**VAGRANT END**

Make sure you have the latest code by running:

```bash
git fetch origin
git checkout master
git pull origin master
composer install
```

Coding structure
----------------

For every step of the instructions you create a corresponding step class
called `StepXXCommand`. In the first step it's explained in detail!
