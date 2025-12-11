<?php
// PROCESS FORM WHEN SUBMITTED
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $email = $_POST["email"];
    $contact = $_POST["contact"];
    $date = $_POST["date"];
    $size = $_POST["size"];

    $types = isset($_POST["type"]) ? $_POST["type"] : [];
    $qty_matcha = $_POST["qty_Matcha"];
    $qty_okinawa = $_POST["qty_Okinawa"];
    $qty_redvelvet = $_POST["qty_RedVelvet"] ?? 0;

    $credit = $_POST["credit"];
    $pin = $_POST["pin"];
    $notes = $_POST["notes"];

    echo "<h2>Order Summary</h2>";
    echo "Name: $firstName $lastName <br>";
    echo "Email: $email <br>";
    echo "Contact: $contact <br>";
    echo "Delivery Date: $date <br>";
    echo "Size: $size <br><br>";

    echo "<h3>Milk Tea Ordered:</h3>";

    if (!empty($types)) {
        foreach ($types as $t) {
            if ($t == "Matcha") echo "Matcha — Qty: $qty_matcha <br>";
            if ($t == "Okinawa") echo "Okinawa — Qty: $qty_okinawa <br>";
            if ($t == "Red Velvet") echo "Red Velvet — Qty: $qty_redvelvet <br>";
        }
    } else {
        echo "No flavors selected.<br>";
    }

    echo "<br>Credit Card: $credit <br>";
    echo "PIN: ****** <br><br>";
    echo "Notes: $notes <br>";

    exit; // Stop page after showing results
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<title>BOBA MILKTEA Order Form</title>
<style>
    body {
        font-family: Arial, sans-serif;
        font-size: 20px;
        background: url('milktea.jpg') no-repeat center center fixed;
        background-size: cover;
        display: flex;
        justify-content: center;
        align-items: flex-start;
        min-height: 80vh;
        padding: 20px;
        margin: 0;
    }

    form {
        background-color: rgba(255, 255, 255, 0.95);
        border: 2px solid #000;
        padding: 30px;
        width: 700px;
        box-shadow: 0 0 15px rgba(0,0,0,0.5);
        border-radius: 10px;
    }

    label, input, select, textarea {
        display: block;
        width: 100%;
        margin-bottom: 20px;
        font-size: 20px;
    }

    input[type="radio"],
    input[type="checkbox"] {
        display: inline-block;
        width: auto;
        margin-right: 10px;
    }

    .flavor-qty {
        display: flex;
        align-items: center;
        margin-bottom: 10px;
    }

    .flavor-qty input[type="number"] {
        width: 100px;
        margin-left: 20px;
    }

    textarea {
        height: 100px;
    }

    button {
        font-size: 20px;
        padding: 10px 20px;
        background-color: #e03e00;
        color: white;
        border: none;
        border-radius: 6px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    button:hover {
        background-color: #b73200;
    }

    img {
        display: block;
        margin: 0 auto 30px auto;
        width: 200px;
    }
</style>
</head>
<body>

<form action="" method="POST">

    <h1>BOBA MILKTEA Order Form</h1>

    <img src="milkprof.jpg" alt="BOBA MILKTEA Image">

    <label for="firstName">First Name:</label>
    <input type="text" id="firstName" name="firstName" required>

    <label for="lastName">Last Name:</label>
    <input type="text" id="lastName" name="lastName" required>

    <label for="email">Email Address:</label>
    <input type="email" id="email" name="email" required>

    <label for="contact">Contact Number:</label>
    <input type="tel" id="contact" name="contact" required>

    <label for="date">Preferred Delivery Date:</label>
    <input type="date" id="date" name="date" required>

    <label>BOBA MILKTEA Size:</label>
    <label><input type="radio" name="size" value="small" required> Small</label>
    <label><input type="radio" name="size" value="medium"> Medium</label>
    <label><input type="radio" name="size" value="large"> Large</label>

    <label>Type of BOBA MILKTEA:</label>

    <div class="flavor-qty">
        <input type="checkbox" name="type[]" value="Matcha"> Matcha (Php 85.00)
        <input type="number" name="qty_Matcha" min="0" value="0">
    </div>

    <div class="flavor-qty">
        <input type="checkbox" name="type[]" value="Okinawa"> Okinawa (Php 95.00)
        <input type="number" name="qty_Okinawa" min="0" value="0">
    </div>

    <div class="flavor-qty">
        <input type="checkbox" name="type[]" value="Red Velvet"> Red Velvet (Php 105.00)
        <input type="number" name="qty_RedVelvet" min="0" value="0">
    </div>

    <label for="credit">Credit Card Number:</label>
    <input type="text" id="credit" name="credit" required>

    <label for="pin">PIN:</label>
    <input type="password" id="pin" name="pin" required>

    <label for="notes">Additional Note:</label>
    <textarea id="notes" name="notes"></textarea>

    <button type="submit">Submit Order</button>

</form>

</body>
</html>
