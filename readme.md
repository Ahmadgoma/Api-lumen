# Api List using lumen

API endpoint that provides the vehicle's expenses list. Vehicle
expenses represented by the records of the fuel entries, insurance payments,
and services tables together in one list.

## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes. See deployment for notes on how to deploy the project on a live system.

### Requirements

* PHP >= 7.2
* OpenSSL PHP Extension
* PDO PHP Extension
* Mbstring PHP Extension
* [composer](http://getcomposer.org/")


### Installation

* First create database, copy .en.example and make new file .env then change DB_DATABASE=name 0f database in .env file. run these following commands:
* $ composer install
* php -S localhost:8000 -t public

###### You can use filters and search query in api:
1. search by vehicle name 
2. filter by cost, when using orderBy 
3. filter by createdAt, when using orderBy 
4. limit result to get minimum and maximum by direction of sorting
5. when using sortBy and pass only these values 'desc' or 'asc' 

### Example:
```
http://localhost:8000/api/v1/vehicle-expenses?orderBy=cost&sortBy=desc&search=Prof&limit=1
```

## Running the tests
```
vendor/bin/phpunit
```
## Built With

* [Lumen](https://lumen.laravel.com/docs/6.x/installation) - The micro framework by laravel.

## Structure 
* make service layer for domain logic.
* make repository layer for query.
* use dependency injection in service and controller. 
* make middleware for that the endpoint can not be exposed more than 5 times per minute. 
* choose lumen for the power of speed and no need for all laravel components. 
* use query builder that is faster than eloquent orm. 
