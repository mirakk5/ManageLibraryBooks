# Manage Library Books

## How to set up and run the code on a local machine

### Prerequisites
Git Installed
Docker Desktop installed and running
### Steps
1. Clone the repository using the command `git clone https://github.com/mirakk5/ManageLibraryBooks.git`

2. Build and start the app and database containers using `docker compose up -d --build`

3. Create the environment file using `docker compose exec app cp env .env`

4. Open the `.env` file and set the following values: 

```
CI_ENVIRONMENT = development
app.baseURL = 'http://localhost:8080/'

   database.default.hostname = db
   database.default.database = library
   database.default.username = library_user
   database.default.password = library_pass
   database.default.DBDriver = MySQLi
   database.default.port = 3306

```
5. Run the database migration with `docker compose exec app php spark migrate`

6. Open the app at (http://localhost:8080/books)[http://localhost:8080/books]

7. To stop the app run `docker compose down`

## Design Decisions
- Docker allows the environment to stay identical across machines to avoid version mismatches for PHP or MySQL versions
- At first I thought to verify if the title, author, and publication dates were empty directly inside the Controller method that saves the book. However, CodeIgniter allowed me to attach validation rules to the Model itself, which is better since it exists in exactly one place. For instance, if another way to create a book was added, the validation would still be effective through this method
- I used CodeIgniter's flash data for the "Book successfully added" messages, so that it would only show up exactly once. Therefore, if the page is reloaded and books have been saved, the message will not appear when displaying the table.
- I used CodeIgniter's `old()` helper method, so the last information typed into the form would be saved. Without out, if all fields were filled out except for the author and a user tried to submit the form, the previous typed responses would be cleared and the user would have to retype their entries.
- I created a shared layout file instead of rewriting the HTML code multiple times, so I could update the list page, add page, and edit page all at once if necessary. 
- I chose to use a JavaScript `confirm()` popup to ensure that the confirmation appears when a user wants to delete a book, as this was a simple way to account for this one button.