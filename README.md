# php-api-silex
Simple PHP API using Silex Framework


## Users Resources Operations
|URL|HTTP Method|Operation| 
|----------|-------------|------|
| /v1/users | GET | Returns an array of users |
|/v1/users/`:uid` | GET | Returns the user with id of `:uid`
|/v1/users | POST | Adds a new user and return it with an id attribute added
|/v1/users/`:uid` | PUT | Updates the user with id of `:uid`
|/v1/users/`:uid` | PATCH | Partially updates the user with id of `:uid`
|/v1/users/`:uid` | DELETE | Deletes the user with id of `:uid`


## Users Log Resources Operations
|URL|HTTP Method|Operation| 
|----------|-------------|------|
|/v1/users/`:uid`/logs | GET | Returns an array of the logs of the user
|/v1/users/`:uid`/logs/`:lid` | GET  | Returns a log entry for a particular user
|/v1/users/`:uid`/logs | POST | Adds a log entry to a user
|/v1/users/`:uid`/logs/`:lid `| DELETE | Removes a log entry `:lid` to the user `:uid`


## Logs Resources Operations
|URL|HTTP Method|Operation| 
|----------|-------------|------|
|/v1/logs/ | GET | Returns an list of logs
|/v1/logs/`:lid` | GET | Returns a log entry if `:lid`
|/v1/logs/`:lid` | DELETE | Deletes the log entry if `:lid`