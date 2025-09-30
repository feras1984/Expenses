# Expense Module

In this assessment, we have created an Expense Module, added some CRUD functionalities.
We also added some testing tasks and document the project using Scribe.

## Architecture
 
In the project, we have used modular structure, thanks to
nwidart/laravel-modules the library used to build a new module like "Expenses".
Inside the module, we have the layer that deals with DB like ExpensesRepository.
We also have a service layer to handle the business logic and return raw data.
Whereas the controller layer is the responsible to execute the service layer
and the main responsibility is the  validation/access-control functions and provide 
the required response.

This way we guarantee separation of concern, clean code, and scalable/adjustable code.
To get code more cleaner, we have used Facade for both ExpenseService and ExpenseRepository.
This allows us to control the instantiation of the classes based on some conditions.
Or if we need to replace one of these classes with new versions.

## Installation
- Install the project:
<pre>git clone https://github.com/feras1984/Expenses.git</pre>
<pre>cd Expenses</pre>

- Install the dependencies
<pre>composer install</pre>

- copy .env.example into .env (Don't forget to add email host, username, and PW based as required to send the ExpenseEvent).
<pre>cp .env.example .env</pre>
<pre>php artisan key:generate</pre>

- In this example, we have used light weight DB like sqlite, We have installed two DBs
sqlite and sqlite_test. The first one for the project, the second one for the PHPUnit testing.

<pre>php artisan migrate --database=sqlite</pre>
<pre>php artisan migrate --database=sqlite_test</pre>



## Time Spent

- Actual time for the project 12 Hours.

