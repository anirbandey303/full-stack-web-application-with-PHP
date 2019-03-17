# Quordenet - An Online Educational Community Website

This is a dynamic website that helps to delever study materials to users!

## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes. See deployment for notes on how to deploy the project on a live system.

### Prerequisites

You need to install WAMP server or Xamp Server. GoogleAPI and Facebook API.
You can install the SDKs using composer.

### Installing

Install Apache
To start off we will install Apache.

1. Open up the Terminal (Applications > Accessories > Terminal).

2. Copy/Paste the following line of code into Terminal and then press enter:
```
sudo apt-get install apache2
```


3. The Terminal will then ask you for you're password, type it and then press enter.



Testing Apache

To make sure everything installed correctly we will now test Apache to ensure it is working properly.

1. Open up any web browser and then enter the following into the web address:

[localhost]

You should see a folder entitled apache2-default/. Open it and you will see a message saying "It works!" , congrats to you!
Install PHP
In this part we will install PHP 5.

Step 1. Again open up the Terminal (Applications > Accessories > Terminal).

Step 2. Copy/Paste the following line into Terminal and press enter:

```
sudo apt-get install php5 libapache2-mod-php5
```
Step 3. In order for PHP to work and be compatible with Apache we must restart it. Type the following code in Terminal to do this:
```
sudo /etc/init.d/apache2 restart
```


Test PHP
To ensure there are no issues with PHP let's give it a quick test run.

Step 1. In the terminal copy/paste the following line:

sudo gedit /var/www/testphp.php

This will open up a file called phptest.php.

Step 2. Copy/Paste this line into the phptest file:

<?php phpinfo(); ?>

Step 3. Save and close the file.

Step 4. Now open you're web browser and type the following into the web address:

[localhost]

Congrats you have now installed both Apache and PHP!



Install MySQL
To finish this guide up we will install MySQL. (Note - Out of Apache and PHP, MySQL is the most difficult to set up. I will provide some great resources for anyone having trouble at the end of this guide.)

Step 1. Once again open up the amazing Terminal and then copy/paste this line:
```
sudo apt-get install mysql-server
```
Step 2 (optional). In order for other computers on your network to view the server you have created, you must first edit the "Bind Address". Begin by opening up Terminal to edit the my.cnf file.
```
gksudo gedit /etc/mysql/my.cnf
```
Change the line

bind-address = 127.0.0.1

And change the 127.0.0.1 to your IP address.

Step 3. This is where things may start to get tricky. Begin by typing the following into Terminal:
```
mysql -u root
```
Following that copy/paste this line:

mysql> SET PASSWORD FOR 'root'@'localhost' = PASSWORD('yourpassword');

(Make sure to change yourpassword to a password of your choice.)

Step 4. We are now going to install a program called phpMyAdmin which is an easy tool to edit your databases. Copy/paste the following line into Terminal:

sudo apt-get install libapache2-mod-auth-mysql php5-mysql phpmyadmin

After that is installed our next task is to get PHP to work with MySQL. To do this we will need to open a file entitled php.ini. To open it type the following:
```
gksudo gedit /etc/php5/apache2/php.ini
```
Now we are going to have to uncomment the following line by taking out the semicolon (winking smiley.

Change this line:

;extension=mysql.so

To look like this:

extension=mysql.so

Now just restart Apache and you are all set!

```
sudo /etc/init.d/apache2 restart
```

## Running the tests

The automated tests for this system isn't built yet.

## Built With

* [ PHP
* [MySQL
* [HTML
* [JavaScript
* [CSS

## Contributing

Please read [CONTRIBUTING.md](https://gist.github.com/) for details on our code of conduct, and the process for submitting pull requests to me.

## Authors

* **Anirban Dey** - *Quordenet* - [Anirban Dey](https://github.com/anirbandey303)

See also the list of [contributors](https://github.com/anirbandey303/project-quordenet/contributors) who participated in this project.
