# Requirements

* PHP 8.1
* Composer

# Installation

`composer install`

`cp .env.example .env`

`php artisan key:generate`

Set up database connection inside `.env` file.

`php artisan migrate --seed`

# Testing

`php artisan test`

# Endpoints

`GET` /api/v1/customers

---

`POST` /api/v1/customers

Required attributes:
* `firstname`
* `lastname`
* `phone`
* `email`

Optional attributes:
* `title`

---

`GET` /api/v1/customers/{customer_id}

---

`PUT` /api/v1/customers/{customer_id}

Optional attributes:
* `firstname`
* `lastname`
* `phone`
* `email`
* `title`

---

`DELETE` /api/v1/customers/{customer_id}

---

`GET` /api/v1/groups

---

`GET` /api/v1/customers/{customer_id}/groups

---

`POST` /api/v1/customers/{customer_id}/groups

Required attributes:
* `group_id`

---

`DELETE` /api/v1/customers/{customer_id/groups/{group_id}
