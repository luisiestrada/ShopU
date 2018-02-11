# ShopU

ShopU is a customer-facing e-commerce website that provides consumer-to-consumer
sales services to students attending San Francisco State University.

### Getting started

To run locally, I recommend using [MAMP](https://www.mamp.info/en/).
Set the document root to be the `/public/` folder, which contains the file `index.php`.

Once you start the Apache and MySQL servers, head to `localhost:8888` in your
browser and navigate to `Tools > phpMyAdmin`. Here you can create a database
and name it `shopu`, then create a user account with a username and password
of your choice. Change the database credentials in `config.php` to that of your
user account, with the db name set to `shopu` and the db host set to `localhost`.
You can then import `shopu-db.sql` to create your database and populate it
with dummy data.

### Technologies used:
* LAMP stack (Linux, Apache, MySQL, PHP), HTML, CSS, JavaScript
* Frameworks/Libraries: [MINI], Bootstrap, jQuery
* Tools: Netbeans, MySQL Workbench, PuTTY, AWS (EC2, EB, RDS), Git, Gitlab
* jQuery plugins: [DataTables], [jQuery Validation]

### Project details

I was given the task of developing the site through a series of milestones from June to August 2016, in which I was a part of a simulated startup company comprised of six members, and my professors acted as the company's CEO, CTO, VP of Marketing, and customer base.

##### My contributions:
* Implemented searching, buying, selling, and user registration (PHP sessions) functionalities
* Contributed to the MVC architecture, database schema, UI design, and project documentation
* Achieved 100% speed improvement of search queries involving BLOBs by paginating search results
* Received promotion to technical lead by team lead for aiding team with technology stack used

##### Concepts:
* Principles of software engineering and organizational teamwork
* Software development life cycle (SDLC) approaches:
	* Agile methodology
	* Iterative and Incremental development
	* Rapid prototyping
* User-centered design (UCD)

##### Milestones:
1. Executive summary, use cases, data definitions, requirements specification,
competitive analysis, high-level system architecture
2. Requirement prioritization, UI mockups and storyboards, database schema,
UML diagrams, APIs, key risks, team organization, vertical prototype
3. Feedback on teamwork, coding practices, and horizontal prototype
4. Beta launch, usability and QA tests, code review
5. Final demo and delivery

### Browser Version Support:
* Internet Explorer (IE11, IE10)
* Google Chrome (51.0.2704, 50.0.2661)
* Mozilla Firefox (47.0, 45.2.0esr)
* Safari (9.1, 8.0.8)
* Opera (37, 36)

### See more:
* [Link to website](http://shopu-env.bzwc52z8ia.us-west-2.elasticbeanstalk.com/)
* [Original documentation](https://goo.gl/ml0ohg)

<!-- links -->

[MINI]: https://github.com/panique/mini
[DataTables]: https://datatables.net
[jQUery Validation]: https://jqueryvalidation.org
