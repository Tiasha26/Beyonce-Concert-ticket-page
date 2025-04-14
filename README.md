# Beyoncé Concert 2025 Ticket Booking System

A PHP-based web application for booking tickets to the Beyoncé Concert 2025. The system manages ticket sales, seat assignments, and sales statistics tracking.

## Features

- **Ticket Booking System**
  - Three ticket types: VVIP, VIP, and General Admission
  - Age verification (16+ years old)
  - Real-time seat availability tracking
  - Automatic seat number assignment

- **Seat Management**
  - VVIP Section: 10,000 seats (A-1 to A-10000)
  - VIP Section: 20,000 seats (B-10001 to B-30000)
  - General Section: 30,000 seats (C-30001 to C-60000)
  - Seats are assigned in descending order
  - Real-time remaining seats display

- **Sales Statistics**
  - Tracks sales by gender and age groups
  - Age groups: 16-21 and 22-35
  - Stores data in a simple text file format
  - Updates statistics after each booking

## Technical Requirements

- PHP 7.0 or higher
- Web server (Apache, Nginx, etc.)
- Browser with JavaScript enabled

## Installation

1. Clone or download the project files to your web server directory
2. Ensure the web server has write permissions for:
   - `sales_data.txt`
   - Session directory

## File Structure

- `index.php` - Main booking form and interface
- `process_booking.php` - Handles ticket booking logic
- `confirmation.php` - Displays booking confirmation
- `sales_data.txt` - Stores sales statistics

## Usage

1. Access the booking system through your web browser
2. Fill out the booking form with:
   - Full Name
   - Age (must be 16 or older)
   - Gender
   - Ticket Type (VVIP, VIP, or General)
3. Submit the form to book your ticket
4. View your booking confirmation with seat number
5. Check remaining seats and sales statistics

## Data Storage

The system uses:
- PHP sessions for temporary data storage
- Text file (`sales_data.txt`) for sales statistics
- Format:
  ```
  Tickets buyers
  Ticket buyers age group
  Number of Tickets sold
  Female
  16-21
  0
  Female
  22-35
  0
  Male
  16-21
  0
  Male
  22-35
  0
  ```

## Security Features

- Age verification
- Input validation
- Session management
- Basic error handling

## Limitations

- No database integration (uses file-based storage)
- No payment processing
- No user accounts
- Basic statistics tracking

## Future Improvements

- Database integration
- Payment processing
- User accounts
- Advanced analytics
- Email notifications
- Ticket cancellation system

## License

This project is open-source and available for educational purposes.

## Support

For support or questions, please contact the system administrator. 