# PT. Kasir Pintar Internasional
I've recently completed a skills assessment at PT. Kasir Pintar Internasional. In this assessment, I was challenged to design a Reimbursement-based application. The application has several access types based on user roles, namely: Super Admin, Director, Finance, and Staff. As part of the criteria, I utilized Laravel 10 to develop this application. To further understand and see how this application operates, you can follow the installation guide below.

## Development Approach

### Repository Patter
<img src="https://miro.medium.com/v2/resize:fit:1400/1*AlU_bKphPRERC98Mq0EG-w.png" width="400" alt="Laravel Logo"></a>

The Repository Pattern is one of the design patterns used in software development to separate logic related to data access from business logic. In other words, the repository acts as an intermediary between the business layer and the data layer, allowing applications to access data from any source in a consistent manner.

### Requirement
Ensure you have installed the following software before starting:

 - PHP (recommended PHP 8.2 or newer)
 - Composer
 - MySQL or another compatible database
 - Node.js and npm

### Installation Steps

1. **Clone the Repository**

   ```bash
   git clone https://github.com/Adityasundawa/reimbursement-kasirpintar
   cd reimbursement-kasirpintar

2. **Install PHP Dependencies**
    To acquire the necessary PHP dependencies, run the command:
   ```bash
   composer install
4. **Create .env Configuration File**
    Duplicate the .env.example file to .env and configure it according to your database settings and other configurations suitable to 
    your local development environment. Alternatively, you can run the command:
    ```bash
    cp .env.example .env

5. **Generate Key for .env**
    You can use the following command:
      ```bash
      php artisan key:generate

7. **Set Up the Database**
    - Create a new database in phpMyAdmin
    - Copy the database name to the .env file as follows:
         ```bash
        DB_CONNECTION=mysql
        DB_HOST=127.0.0.1
        DB_PORT=3306
        DB_DATABASE=reimbursement-kasirpintar (bebas sesuaikan dengan Anda)
        DB_USERNAME=root
        DB_PASSWORD=

8. **Generate FileSystem**
    As this project uses Storage or FileSystem, ensure you run the command:
      ```bash
      php artisan storage:link
      
10. **Run Database Migration**
    Execute the migration to create the necessary tables in the database:
      ```bash
    php artisan migrate

12. **Execute the Seeder**
    Run the following command to populate your database with default project data:
      ```bash
      php artisan db:seed

14. **Install JavaScript Dependencies**
   In the project directory, run the following command to install JavaScript dependencies via npm:
       ```bash
       npm install && npm run dev
    

16. **Launch the Local Server**
    Finally, you can run the local development server with the command:
     ```bash
    php artisan serve


### Accessing the Project
| NIP | NAMA | JABATAN | EMAIL | PASSWORD |
|------|------|------|------|------|
| 100003746392730273 | DONI   | DIREKTUR   | direktur@mail.com  | direktur@mail.com  |
| 100003746392739478  | DONO   | FINANCE   | finance@mail.com  | finance@mail.com  |
| 100003746392733546  | DONA   | STAFF   | staff@mail.com  | staff@mail.com  |

