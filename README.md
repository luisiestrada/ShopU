# ShopU

ShopU is a mock e-commerce website that provides consumer-to-consumer
sales services to students attending San Francisco State University.

Note: This project was initially hosted on the class server but has since been
taken down. I'm currently in the process of deploying it back to AWS. Click
[here](http://shopu-env.bzwc52z8ia.us-west-2.elasticbeanstalk.com/) to see it.

View the documentation
[here](https://drive.google.com/open?id=0B55GKCB0LxY4RjRCMXhnNUdPb0k).

To run locally, I recommend using [MAMP](https://www.mamp.info/en/).
Set the document root to be the `/public/` folder, which contains the file `index.php`.

Once you start the Apache and MySQL servers, head to `localhost:8888` in your
browser and navigate to `Tools > phpMyAdmin`. Here you can create a database
and name it `shopu`, then create a user account with a username and password
of your choice. Change the database credentials in `config.php` to that of your
user account, with the db name set to `shopu` and the db host set to `localhost`.
You can then import `shopu-db.sql` to create your database and populate it
with dummy data.

<hr>

Technologies used:
* LAMP stack (Linux, Apache, MySQL, PHP)
* [MINI]: PHP MVC microframework
* [Bootstrap]
* AWS (EB, RDS)
* Tools: [Netbeans], [PuTTY], [MySQL Workbench]
* jQuery plugins: [DataTables], [jQuery Validation]

Browser Version Support:
* Internet Explorer (IE11, IE10)
* Google Chrome (51.0.2704, 50.0.2661)
* Mozilla Firefox (47.0, 45.2.0esr)
* Safari (9.1, 8.0.8)
* Opera (37, 36)

<!-- links -->

[MINI]: https://github.com/panique/mini
[Bootstrap]: https://getbootstrap.com
[DataTables]: https://datatables.net
[jQUery Validation]: https://jqueryvalidation.org
[Netbeans]: https://netbeans.org/
[PuTTY]: http://www.putty.org/
[MySQL Workbench]: https://www.mysql.com/products/workbench/
