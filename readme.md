# About

- Laravel 5.6
- No Session to identify users

# Requirements
- php 5.6 ou higher [tutorial](http://tecadmin.net/install-php5-on-ubuntu/)
- composer [tutorial](https://getcomposer.org/doc/00-intro.md#globally)
- postgres

## Development
- composer install
- php artisan key:generate
- php artisan migrate ok
- php artisan db:seed ok
- cp .env.example .env

## Run
- php artisan serve --port=5000

## Test
- ./vendor/bin/phpunit tests/AppointmentsTest.php

## Instructions

The system is responsible for scheduling medical appointments over the internet. In order to do so it exposes a RESTful API that allows you to get a list of available slots for a given day, request a slot to be reserved and cancel a reserved slot.  All calls are made with a valid token id given previously to the client by other part of the system not relevant to this piece.

## Services:

- Get a list of free slots for a given date
```
GET /api/appointments/<token-id>/<date>/free 
```

Answer:

{slots: [“10:00”, “10:30”,…]} Or {slots: []}


- Request a slot to be reserved on the date and time for the patient name
```
POST /api/appointments/<token-id>/<date>/<time>/<patient name>
```

Answer:

{appointmentId: xxx} or { error: “Unable to reserve the appointment”}

- Deletes an appointment

```
DELETE /api/appointments/<token-id>/<appointment-id>
```

Answer:

{“success”} or {error: “Unable to cancel the appointment”}
