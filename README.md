# Contact Form Application

This project is a simple Laravel-based contact form application, designed to allow users to get in touch by submitting their name, email, phone number, and a message. The submitted data is saved in the database, and an email notification is sent to the administrator.

## Features

- Users can fill out a contact form with fields for name, email, phone, and message.
- Form submissions are validated server-side to ensure all required fields are filled correctly.
- Submitted form data is saved to a SQLite database.
- An email notification is sent to the administrator when a new inquiry is submitted.
- The user receives confirmation feedback upon successful form submission.

## Technologies Used

- **Backend**: Laravel 9.x
- **Frontend**: Vue.js 3 with Inertia.js and Tailwind CSS
- **Database**: SQLite (can be configured to use other databases)
- **Email**: Mailtrap (configured for testing purposes)

## Prerequisites

- Node.js 18 or higher
- PHP 8.1 or higher
- Composer
- SQLite or any other configured database
- Mailtrap account (or an SMTP server for email testing)

## Installation

1. **Clone the repository**:
   ```bash
   git clone https://github.com/ivanski2/contact-app.git
   cd contact-app
   ```

2. **Install PHP dependencies**:
   ```bash
   composer install
   ```

3. **Install Node dependencies**:
   ```bash
   npm install
   ```

4. **Set up the environment**:
    - Copy the `.env.example` file to `.env`:
      ```bash
      cp .env.example .env
      ```
    - Generate an application key:
      ```bash
      php artisan key:generate
      ```
    - Configure the database in the `.env` file (default is SQLite).

5. **Run the migrations**:
   ```bash
   php artisan migrate
   ```

6. **Set up Mailtrap**:
    - Update the `.env` file with your Mailtrap credentials:
      ```
      MAIL_MAILER=smtp
      MAIL_HOST=smtp.mailtrap.io
      MAIL_PORT=2525
      MAIL_USERNAME=your_mailtrap_username
      MAIL_PASSWORD=your_mailtrap_password
      MAIL_ENCRYPTION=null
      MAIL_FROM_ADDRESS=noreply@example.com
      MAIL_FROM_NAME="Contact App"
      ```

7. **Compile assets**:
   ```bash
   npm run dev
   ```

8. **Run the server**:
   ```bash
   php artisan serve
   ```

9. **Access the application**:
    - Open your browser and visit: [http://localhost:8000/contact](http://localhost:8000/contact)

## Testing

To ensure everything is working correctly, PHPUnit tests are included for:
- Form validation.
- Saving data to the database.
- Sending email notifications.

To run the tests:
```bash
php artisan test
```

## Troubleshooting

1. **Node.js Version Issues**:
    - Make sure your Node.js version is 18 or higher. Lower versions are not supported and may cause issues.

2. **Email Issues**:
    - Ensure that Mailtrap is configured correctly in the `.env` file.
    - You can also use other SMTP services like Gmail, SendGrid, etc., by updating the mail configuration.

3. **Database**:
    - If you encounter errors related to database connections, verify your `.env` settings and ensure the database exists and is migrated correctly.

## License

This project is open-sourced under the MIT license.

## Contributing

Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

## Contact

For any questions or feedback, feel free to contact me at [your-email@example.com].

