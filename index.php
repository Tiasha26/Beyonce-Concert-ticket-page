<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beyoncé Concert 2025 - Ticket Booking</title>
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
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input, select {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }
        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }
        button:hover {
            background-color: #45a049;
        }
        .error {
            color: red;
            font-size: 14px;
            margin-top: 5px;
        }
        .ticket-info {
            margin-top: 20px;
            padding: 10px;
            background-color: #f8f9fa;
            border-radius: 4px;
        }
        .seats-remaining {
            margin-top: 20px;
            padding: 15px;
            background-color: #e9f7ef;
            border-radius: 4px;
        }
        .seats-remaining h3 {
            color: #333;
            margin-top: 0;
        }
        .seats-remaining p {
            margin: 5px 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Beyoncé Concert 2025</h1>
        <p>Date: December 25, 2025</p>
        <p>Venue Capacity: 60,000 seats</p>
        
        <div class="seats-remaining">
            <h3>Seats Remaining</h3>
            <?php
            session_start();
            if (isset($_SESSION['last_seat_numbers'])) {
                $vvip_remaining = $_SESSION['last_seat_numbers']['vvip'] - 1 + 1;
                $vip_remaining = $_SESSION['last_seat_numbers']['vip'] - 10001 + 1;
                $general_remaining = $_SESSION['last_seat_numbers']['general'] - 30001 + 1;
                
                echo "<p>VVIP Seats: " . $vvip_remaining . " remaining</p>";
                echo "<p>VIP Seats: " . $vip_remaining . " remaining</p>";
                echo "<p>General Seats: " . $general_remaining . " remaining</p>";
            } else {
                echo "<p>VVIP Seats: 10,000 remaining</p>";
                echo "<p>VIP Seats: 20,000 remaining</p>";
                echo "<p>General Seats: 30,000 remaining</p>";
            }
            ?>
        </div>
        
        <form action="process_booking.php" method="POST" onsubmit="return validateForm()">
            <div class="form-group">
                <label for="name">Full Name:</label>
                <input type="text" id="name" name="name" required>
            </div>

            <div class="form-group">
                <label for="age">Age:</label>
                <input type="number" id="age" name="age" required min="16">
            </div>

            <div class="form-group">
                <label for="gender">Gender:</label>
                <select id="gender" name="gender" required>
                    <option value="">Select Gender</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="other">Other</option>
                </select>
            </div>

            <div class="form-group">
                <label for="ticket_type">Ticket Type:</label>
                <select id="ticket_type" name="ticket_type" required>
                    <option value="">Select Ticket Type</option>
                    <option value="vvip">VVIP (R3000)</option>
                    <option value="vip">VIP (R2000)</option>
                    <option value="general">General Admission (R500)</option>
                </select>
            </div>

            <button type="submit">Book Ticket</button>
        </form>

    </div>

    <script>
        function validateForm() {
            const age = document.getElementById('age').value;
            if (age < 16) {
                alert('You must be at least 16 years old to book a ticket.');
                return false;
            }
            return true;
        }
    </script>
</body>
</html> 