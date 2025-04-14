<?php
session_start();

// Get the last booking
$last_booking = end($_SESSION['bookings']);

if (!$last_booking) {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Confirmation - Beyoncé Concert 2025</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f5f5f5;
        }
        .container {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        h1 {
            color: #333;
            text-align: center;
        }
        .ticket-details {
            margin-top: 20px;
            padding: 20px;
            background-color: #f8f9fa;
            border-radius: 4px;
        }
        .ticket-details p {
            margin: 10px 0;
            font-size: 16px;
        }
        .ticket-details strong {
            color: #333;
        }
        .back-button {
            display: block;
            text-align: center;
            margin-top: 20px;
        }
        .back-button a {
            display: inline-block;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 4px;
        }
        .back-button a:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Booking Confirmation</h1>
        <p>Thank you for your booking! Here are your ticket details:</p>
        
        <div class="ticket-details">
            <p><strong>Name:</strong> <?php echo htmlspecialchars($last_booking['name']); ?></p>
            <p><strong>Age:</strong> <?php echo $last_booking['age']; ?></p>
            <p><strong>Gender:</strong> <?php echo ucfirst($last_booking['gender']); ?></p>
            <p><strong>Ticket Type:</strong> <?php echo strtoupper($last_booking['ticket_type']); ?></p>
            <p><strong>Seat Number:</strong> <?php echo htmlspecialchars($last_booking['seat_number']); ?></p>
            <p><strong>Price:</strong> R<?php echo number_format($last_booking['price'], 2); ?></p>
            <p><strong>Booking Time:</strong> <?php echo $last_booking['booking_time']; ?></p>
        </div>

        <div class="back-button">
            <a href="index.php">Book Another Ticket</a>
        </div>
    </div>
</body>
</html> 