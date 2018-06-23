# review-syncer 💾

## About
As a [Shopify](https://www.shopify.com/) app developer, we would like to fetch and store app reviews on a regular interval.

Shopify app reviews can be fetched via Shopify REST endpoint: https://apps.shopify.com/{app-name}/reviews.json

For example:
https://apps.shopify.com/product-upsell/reviews.json

## Exercise

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

### Technical
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
## Bonus Points
Now that you have this data, do something interesting with it, tell us something useful about our apps or present the data in a special way. How would you gather insight from this?

- Have fun! [Happy Hacking](https://giphy.com/gifs/charlie-hunnam-gif-hunt-102h4wsmCG2s12)



-------------------------------------------------------------------------------------------------


For this challenge I used the docker container "edersondev/php7" and tried to connect to the official mysql container:


here is my docker-composer.yml:

version: '3'
services:
  webphp:
    image: edersondev/php7
    ports:
      - "80:80"
    volumes:
      - "the_code_path":/var/www/html
    links:
     - db
  db:
    image: mysql:5.7
    volumes:
     - /var/lib/mysql
    environment:
     - MYSQL_ROOT_PASSWORD=bold123
     - MYSQL_DATABASE=bold_reviews
