# php-api-silex
Simple PHP API using Silex Framework

**Requirements**

* PHP 5.3.x
* Composer

**Intallation**

```sh
composer intall
```

**Running**

```sh
 php -S localhost:8000
```
**NOTE:**  Only use the Built-In Web Server for development

## Usage
 - [User Resources](#users-resources-operations)
 - [Users Logs](#users-log-resources-operations)
 - [Log Resources](#logs-resources-operations)
 

### Users Resources Operations
|URL|HTTP Method|Operation| 
|----------|-------------|------|
| /v1/users | GET | Returns an array of users |
|/v1/users/`:uid` | GET | Returns the user with id of `:uid`
|/v1/users | POST | Adds a new user and return it with an id attribute added
|/v1/users/`:uid` | PUT | Updates the user with id of `:uid`
|/v1/users/`:uid` | PATCH | Partially updates the user with id of `:uid`
|/v1/users/`:uid` | DELETE | Deletes the user with id of `:uid`


### Users Log Resources Operations
|URL|HTTP Method|Operation| 
|----------|-------------|------|
|/v1/users/`:uid`/logs | GET | Returns an array of the logs of the user
|/v1/users/`:uid`/logs/`:lid` | GET  | Returns a log entry for a particular user
|/v1/users/`:uid`/logs | POST | Adds a log entry to a user
|/v1/users/`:uid`/logs/`:lid `| DELETE | Removes a log entry `:lid` to the user `:uid`


### Logs Resources Operations
|URL|HTTP Method|Operation| 
|----------|-------------|------|
|/v1/logs/ | GET | Returns an list of logs
|/v1/logs/`:lid` | GET | Returns a log entry if `:lid`
|/v1/logs/`:lid` | DELETE | Deletes the log entry if `:lid`