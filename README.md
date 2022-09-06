<h1 align="center" style="margin-bottom:0">Contact Form</h1>
<p align="center">Created by <a href="https://github.com/rizalarfiyan/" target="_blank">Rizal Arfiyan</a> by <span style="color:red">&#10084;</span></p><br />

# CLI Usage
- Delimiter with `.` not `/` or `\`

## Application
```php
// Create an MVC stack
php index.php matches create:app users
```

## Controllers

### `create:controller name_of_controller`


```php
// Create a Welcome controller that extends MY_Controller
php index.php matches create:controller welcome e:my

// Create a User controller inside admin directory that will extend Admin_Controller
php index.php matches create:controller admin.user extend:admin
```

## Models

### `create:model name_of_model`

```php
// Create a user_model model that extends MY_Model
php index.php matches create:model user_model e:my

// Create a User model inside admin directory that will extend MY_Model
php index.php matches create:model admin.user extend:my
```

## Views

### `create:view name_of_view`


```php
// Create an index_view.php
php index.php matches create:view user_view

// Create an index_view.php inside users directory
php index.php matches create:view users.index_view
```

## Migrations

### `create:migration`


```php
// Create a migration
php index.php matches create:migration create_users_table

// Create a migration with a table inside it
php index.php matches create:migration create_users_table table:users

// Create a migration with a table inside it
php index.php matches create:migration create_users_table t:users

// Create a migration and name the table like the migration
// -> The table name will be 'users' in this exmaple
php index.php matches create:migration t:%inherit% create_users_table
```

### `do:migration`

```php
// Execute all migrations until the last one
php index.php matches do:migration

// Execute all migrations until a certain version of migration
php index.php matches do:migration 20150722
```

### `undo:migration`

```php
// Undo last migration
php index.php matches undo:migration

// Undo the migrations until a specified migration version
php index.php matches undo:migration 20150722
```

### `reset:migration`


```php
// Reset the migrations
php index.php matches reset:migration
```
