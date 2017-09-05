# Skeleton-Records-Registration-system





Operation Documentation

How the program works
Once you access the web address, you will see a home page which will have a login button that will take you to the actual login page. 
As of now you will need to create a user account which will allow you to gain access to the site. Once you will see the welcome page which will have basic instructions on the rules for using this program. You will then see the create a 
collections button and a drop down portion that once the project is fully completed will display all the collections created by the user via the drop-down panel. On the record creation page, you will see the form below where it will prompt you to create a record. 
Once created it will be displayed above where you can update or delete as needed. 

External Operation:
Operating this web application requires the use of a server, and a database. For my setup and my own recommendation, I used WAMP which makes use of the Apache Server and MySql database and server. 
It is highly recommended but not a requirement that you make use of PhPMyadmin to handle the database management. Store all documents in the ‘www’ folder for the WAMP program to display on the localhost web address. 
As for WAMP ensure you read the operation directions and download all required updates to ensure the program will work.  


Key parts of operations:
Key parts of the program are the ‘db_conn.php’, the ‘login and logout’ files, the record creation file and the registration file. 
-	The db_conn.php file is the most important piece as it allows for the login, registration, and record creation page to query the data base through a specified variable dubbed ‘$db’ to input, compare or store information for individual users. 
-	The loginform.php is the front-end security measure which takes the user input for the username and password and compares the user input with what is stored in the database. And starts the user session unique to the user.
-	The registrationform.php is used to allow access to the site and provides the user with account security through a unique account creation and hashed password algorithm.
-	The logout.php closes the session to the user
-	- The RecordCreationform.php will use the CRUD method to store and display the user created content or skeleton records stored and retrieved from the database.


UPDATES:

//update to RecordCreationform.php // updated 20 Aug 2017
The new feature added is the edit and delete and update logic when creating records, where it parses the database, displays the record and allows the user to edit or delete as needed. While it is not set to only show individual users record information yet, the premise is still the same.

//updated to RecordCreationform.php// updated 2 Sep 2017
This new update allows for user who log into their individual accounts to access their own data this time. No longer when one registered user logs in they can see other users record information, breaching privacy. They can only see and edit/update their own information.

//updated in logout.php// updated 2 Sep 2017
Immediately upon user logging out it will take the user back to the index.php or welcome page of the website.

//updated in former homepage.php now index.php// updated 2 Sep 2017
Upon accessing the site ‘http://localhost/srrs/’ user will be immediately taken to the website home page, instead of showing file page where all scripts are kept.

//update in Welcome page.php// updated 2 Sep 2017
Removed link drop down list temporarily, due to time constraints I could not implement this personal feature. 


Status
The status of this web application is complete with the caveat that one personal feature I wanted to add which was the ability to access multiple collections via links from the dropdown box on the welcome page, 
could not be completed, as I would have to push the project completion date back a few more days. Besides that, the overall project is complete, some issues ran into was implementing the feature to allow users to only view and edit their own records. 
The fix was to query the ‘$results’ variable in the welcome page to reflect only the logged in user to view their own specific material.

