# review-syncer 💾

## The challenge:

### About
As a [Shopify](https://www.shopify.com/) app developer, we would like to fetch and store app reviews on a regular interval.

Shopify app reviews can be fetched via Shopify REST endpoint: https://apps.shopify.com/{app-name}/reviews.json

For example:
https://apps.shopify.com/product-upsell/reviews.json

### Exercise

We would like the following:
- [ ] fetch app reviews from the Shopify public REST endpoint for a one or more of our applications *(see app names below)*
- [ ] store the results in a database table *(see below)*
- [ ] be able to handle updates to app reviews *(i.e. original review was 1 star, now 5 stars)*
- [ ] run on a configurable interval *(i.e. every 30m or 60m)*
- [ ] create a web UI that allows you to view and search app reviews (filter by app, sort by date)


Below is the full list of application names that we want to fetch and sync reviews for:

|App Name |
|---|
| product-upsell |
| product-discount |
| store-locator |
| product-options |
| quantity-breaks |
| product-bundles |
| customer-pricing |
| product-builder |
| social-triggers |
| recurring-orders |
| multi-currency |
| quickbooks-online |
| xero |
| the-bold-brain |

For example, if I wanted to fetch all the reviews for Product Upsell:

https://apps.shopify.com/product-upsell/reviews.json

#### Technical
- Fork this repo on GitHub
- Choose from either [php](http://www.php.net/), [go](https://golang.org), [java](https://java.com), [python](https://www.python.org/) or Javascript/Node
  - Feel free to use web / application frameworks, there is no restriction on building everything from scratch

- Store app reviews in a data structure something like: (for example: MySQL)
```
CREATE TABLE `shopify_app_reviews` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `shopify_domain` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `app_slug` varchar(255) NOT NULL,
  `star_rating` int(11) DEFAULT NULL,
  `previous_star_rating` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
```
### Bonus Points
Now that you have this data, do something interesting with it, tell us something useful about our apps or present the data in a special way. How would you gather insight from this?

- Have fun! [Happy Hacking](https://giphy.com/gifs/charlie-hunnam-gif-hunt-102h4wsmCG2s12)



## The project:

### Technologies:

* Docker
* Laravel 5.6
* PHP 7.2
* MySQL 5.7

Since Bold Commerce stack mainly consist of these technologies, they were chosen for this project to be closer to the reality of the company.


### How to run:


* 1) clone the project on a folder:
* 2) open the terminal on the root folder of the project:
* 3) user the docker-compose command to download and run the containers:

  ```
  docker-compose up -d
  ```

* 4) Execute the mysql as root

  ```
  docker exec -it reviewsyncer_db_1 mysql -uroot
  ```
* 5)

  ```
  CREATE USER 'bold'@'%' IDENTIFIED BY 'builders';
  GRANT ALL PRIVILEGES ON *.* TO 'bold'@'%';
  ```
  this user is just for the application

* 6) to enter the application container:
  you can exit the container by executing ``` exit ``` 2 times and then:
  ```
  docker-compose exec -it reviewsyncer_webapp_1 /bin/bash
  ```
  or you could open a new terminal and type just the last command

* 7) to update the project, run the following command on the application container:

  ```
  composer update
  ```

* 8) to create the table, run the following command on the application container:
    ```
  php artisan migrate
  ```

* 9) Since the fetch command isn't set to run on startup run the commands:
  ```
  php artisan fetch:reviews
  ```

* 10) access the localhost on your web browser, click on the button and select one of the bold products to see the filtering on the table or just type anything on the seachbox.


## Next Steps:

* Create test classes
* Improve UI by changing the list presentation
* Improve UX by changing the navigation to the list and the list itself
* Creating graphs and doing data analysis (like the most reviewed product or the best reviewed to start with)
* Improve the list view to handle empty database and include a button to force the REST consumption
* Make the fetch command run on startup

