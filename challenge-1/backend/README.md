Challenge 1:
Create a migration to support the below structure

Create an API endpoint to upload excel attendance and store data in the database.
Create an API endpoint to return attendance information of an employee with total
working hours.

Create a controller for attendance and call the methods from the below class
Create a service inside
src->AppHumanResources->Attendance->Application->AttendanceService.php
Create a model class :

src->AppHumanResources->Attendance->Domain->Attendance.php
Create a view in the front end to list the attendance information, and show N/A if the
check in or checkout is not available.
Show the Attendance information in the following format.
Name | checkin | checkout | total working hours

Install packages by running this command
## composer install

Migrate Database
## php artisan migrate

Assets
## Use attendences.csv to import attendence
## Use postman collection to run api's