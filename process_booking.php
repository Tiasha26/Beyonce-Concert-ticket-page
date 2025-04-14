<?php
session_start();

// Define ticket prices and seat ranges
$ticket_config = [
    'vvip' => [
        'price' => 3000,
        'section' => 'A',
        'start_seat' => 1,
        'end_seat' => 10000
    ],
    'vip' => [
        'price' => 2000,
        'section' => 'B',
        'start_seat' => 10001,
        'end_seat' => 30000
    ],
    'general' => [
        'price' => 500,
        'section' => 'C',
        'start_seat' => 30001,
        'end_seat' => 60000
    ]
];

// Initialize or get the booking data from session
if (!isset($_SESSION['bookings'])) {
    $_SESSION['bookings'] = [];
    $_SESSION['total_tickets_sold'] = 0;
    $_SESSION['last_seat_numbers'] = [
        'vvip' => $ticket_config['vvip']['end_seat'],
        'vip' => $ticket_config['vip']['end_seat'],
        'general' => $ticket_config['general']['end_seat']
    ];
}

// Process the form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'] ?? '';
    $age = intval($_POST['age'] ?? 0);
    $gender = $_POST['gender'] ?? '';
    $ticket_type = $_POST['ticket_type'] ?? '';

    // Validate age
    if ($age < 16) {
        die("Error: You must be at least 16 years old to book a ticket.");
    }

    // Validate ticket type
    if (!isset($ticket_config[$ticket_type])) {
        die("Error: Invalid ticket type selected.");
    }

    // Check venue capacity
    if ($_SESSION['total_tickets_sold'] >= 60000) {
        die("Error: The concert is sold out!");
    }

    // Get ticket configuration
    $config = $ticket_config[$ticket_type];

    // Check if section is full
    $seats_available = $_SESSION['last_seat_numbers'][$ticket_type] - $config['start_seat'] + 1;
    if ($seats_available <= 0) {
        die("Error: The {$ticket_type} section is sold out!");
    }

    // Assign next available seat (counting down)
    $current_seat = $_SESSION['last_seat_numbers'][$ticket_type];
    $seat_number = $config['section'] . '-' . $current_seat;
    
    // Decrement the seat number for next booking
    $_SESSION['last_seat_numbers'][$ticket_type] = $current_seat - 1;

    // Create booking record
    $booking = [
        'name' => $name,
        'age' => $age,
        'gender' => $gender,
        'ticket_type' => $ticket_type,
        'seat_number' => $seat_number,
        'price' => $config['price'],
        'booking_time' => date('Y-m-d H:i:s')
    ];

    // Add to bookings
    $_SESSION['bookings'][] = $booking;
    $_SESSION['total_tickets_sold']++;

    // Update sales data
    $age_group = ($age >= 16 && $age <= 21) ? '16-21' : '22-35';
    
    // Read the current sales data
    $sales_data = file('sales_data.txt', FILE_IGNORE_NEW_LINES);
    
    // Find and update the correct count
    for ($i = 0; $i < count($sales_data); $i++) {
        if ($sales_data[$i] === $gender && 
            isset($sales_data[$i + 1]) && 
            $sales_data[$i + 1] === $age_group) {
            // Update the count
            $current_count = intval($sales_data[$i + 2]);
            $sales_data[$i + 2] = $current_count + 1;
            break;
        }
    }
    
    // Write the updated data back to file
    file_put_contents('sales_data.txt', implode("\n", $sales_data) . "\n");

    // Redirect to confirmation page
    header("Location: confirmation.php");
    exit();
}
?> 