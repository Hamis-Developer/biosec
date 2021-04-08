INTRODUCTION

The Biosec Employee Management System API, also known as BioStaff API is a RESTful API that makes it possible to remotely manage the employee database of Biosec Solutions.

FEATURES

1. Create Employee Data
2. Update Employee Data
3. Archive (not delete) Employee Data
4. Create A Log For Each Activity
5. Display All Activity Logs

ENDPOINTS

All data are encoded in JSON format. To GET or POST requests, you need to send the request to the appropriate endpoint.

The "BioStaff" API currently have 5 endpoints. Below are the endpoints and their uses:


A. CREATE Endpoint (http://localhost/biosec/api/create.php)

This is the endpoint for sending POST requests to create new employees' records. It takes 4 parameters which are:
1. "name" => POST data (name of the employee)
2. "email" => POST data (email address of employee)
3. "designation" => POST data (the role/designation of the employye at the company)
4. "photo" => POST data (the url of the picture to be displayed as the profile picture of the employee)


B. UPDATE Endpoint (http://localhost/biosec/api/update.php)

This endpoint is for sending POST requests to update an employee's records. It takes 5 parameters which are:
1. "id" => POST data (this is the id of the employee whose record you want to edit)
2. "name" => POST data (name of the employee)
3. "email" => POST data (email address of employee)
4. "designation" => POST data (the role/designation of the employee at the company)
5. "photo" => POST data (the url of the picture to be displayed as the profile picture of the employee)


C. READ Endpoint (http://localhost/biosec/api/read.php)

This endpoint is for sending GET requests to get all employee records. It gives 5 parameters which are:
1. id => id number of an employee
2. name => name of an employee
3. email => email of an employee
4. designation => the role/designation of the employee at the company
5. photo => this returns the url of the employee's profile picture


D. ARCHIVE Endpoint (http://localhost/biosec/api/archive.php)

This endpoint is for sending POST request to archive (noot delete) the profile of an employee. It takes 1 parameter which is:
1. id


E. ACTIVITY Endpoint (http://localhost/biosec/api/activity.php)

This endpoint is for sending GET requests to get all activity logs on the management system. It gives 3 paramenters which are:
1. activity => the activity done
2. date => the date of the activity
3. time => the time of the activity