# SecureWebApp
Final Year Web Application for CTEC3110

## Contributers:

- Alex Mason
- Alistair Laughland
- Dominic Bryan

## Setup Instructions

The followings steps list how to setup an SQL database with the necessary tables to enable usage of this secure web application. Following this are steps that need to be taken in order to navigate and use the web apps main functionality.

### Initialising SQL
1. Assuming you have navigated the directory of this project and to the SQL command line tool, locate and open the document within the main SecureWebApp folder named ***create_message_database.sql***
2. Copy all of the SQL code within the file and paste this into your command line and press enter. This will create A database called **message_db** and then select it to enable you to use it. Then the majority of the code within the document will create two tables, **user** and **message_content**.

### Using the Web app
1. On the initial homepage you are greeted with two forms, a login form and registration form. If you are a new user you are required to register a new account. Enter your name, phone number and a password into the form and select the ***Register*** button.

    1.1. If you are a returning user, simply enter your phone number and password used to register an account into the login form and select the ***Login*** button.

2.  If you have successfully logged in or registered, you will arrive on the welcome page and be presented with two options. Select either ***All messages*** to view all the messages on the M2MCONNECT server, or ***Your messages*** to view messages that your phone number is the receiver of.

3.  On this view you are presented with a list of message objects displaying data from the M2MCONNECT server. This data has been retrieved, parsed, stored and then called from the SQL database ready to be reused.

4. At this stage you can return to the homepage by selecting the ***Home*** button in the top left navigation area, this will allow you to register a new user or log back in.
