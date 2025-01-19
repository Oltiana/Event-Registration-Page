<?php
 $ticketPrices = [
    "Regular - Ticket" => 200,
    "Group Of Three - Ticket" => 170,
    "Group Of Five - Ticket" => 140,
    "Vip - Ticket" => 300
];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/buyTickets.css">
    <title>Buy Tickets</title>
</head>
<body>
<header>
        <div class="logo">
            <img src="images/pintlogo.webp" alt="Pint Festival Logo">
            <span>PINT FESTIVAL</span>
        </div>
        <ul class="nav-links">
            <li><a href="Home.html">Home</a></li>
            <li><a href="#">About Festival</a></li>
            <li><a href="#">About Us</a></li>
            <li><a href="#">Tickets</a></li>
            <li><a href="#">Merchandise</a></li>
            <li><a href="#">Faq</a></li>
            <li><a href="#">News</a></li>
            <li><a href="login.php">Login</a></li>
        </ul>
    </header><br>

    <div class="header-banner">
        <h1>PINT FESTIVAL</h1>
        <p>Parku i Germise, Prishtine, Kosove | 09-10 February 2025</p>
    </div>

    <div class="container">
        <div class="select-section">
            <h2>SELECT:</h2>
            <label for="zone">Select zone:</label>
            <select id="zone">
                <?php foreach ($ticketPrices as $zone => $price): ?>
                    <option value="<?= $zone ?>"><?= $zone ?></option>
                <?php endforeach; ?>
            </select>

            <label for="ticket-count">Select number of tickets:</label>
            <div class="ticket-controls">
                <button id="decrease">-</button>
                <input type="text" id="ticket-count" value="1" readonly>
                <button id="increase">+</button>
            </div>

            <p>Ticket price: <strong id="ticket-price">EUR <?= number_format($ticketPrices["Regular - Ticket"], 2) ?></strong></p><br>
            <button id="select-ticket">SELECT</button>
        </div>

        <div class="basket-section">
            <h2><img src="images/basket-icon.png" alt="Basket Icon" class="basket-icon">BASKET</h2><br>
            <p><strong>PINT FESTIVAL</strong></p><br>
            <p>
               <img 
                 src="images/calendar-icon.png" 
                 alt="Calendar Icon" 
                 style="width: 30px; height: 30px; margin-right: 5px; vertical-align: middle;">
                 09-10 February 2025
            </p>
            <p>
               <img 
                 src="images/location-icon.png" 
                 alt="Location Icon" 
                 style="width: 30px; height: 30px; margin-right: 5px; vertical-align: middle;">
                 Parku i Germise, Prishtine, Kosove
            </p><br>
            <table>
                <thead>
                    <tr>
                        <th>Section</th>
                        <th>Row</th>
                        <th>Seat</th>
                        <th>Price</th>
                    </tr>
                </thead>
                <tbody id="basket-body">
                    <tr>
                        <td>Regular - Ticket</td>
                        <td>-</td>
                        <td>-</td>
                        <td><?= number_format($ticketPrices["Regular - Ticket"], 2) ?> EUR</td>
                    </tr>
                </tbody>
            </table>
            <div class="total">
                <p><strong>Total:</strong> <?= number_format($ticketPrices["Regular - Ticket"], 2) ?> EUR</p><br>
                <p>All prices are quoted in EUR including taxes.</p>
            </div>

            <div class="actions">
              <a href="checkout.php">  <button id="buy">BUY</button></a>
                <button id="empty-basket">EMPTY BASKET</button>
            </div>
        </div>
    </div>
    
</body>
</html>