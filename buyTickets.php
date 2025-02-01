<?php
include 'db_connect.php';

$ticketPrices = [
    "Regular - Ticket" => 200,
    "Group Of Three - Ticket" => 170,
    "Group Of Five - Ticket" => 140,
    "Vip - Ticket" => 300
];


$result = $conn->query("SELECT * FROM buyTickets ORDER BY created_at DESC");

?>

<!DOCTYPE html>
<html lang="sq">
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
            <li><a href="login.php">Login</a></li>
        </ul>
    </header><br>

    <div class="header-banner">
        <h1>PINT FESTIVAL</h1>
        <p>Parku i Gërmisë, Prishtinë, Kosovë | 09-10 Shkurt 2025</p>
    </div>

    <div class="container">
        <div class="select-section">
            <h2>Select:</h2>
            <form action="save_ticket.php" method="POST">
                <label for="zone">Select zone:</label>
                <select id="zone" name="zone">
                    <?php foreach ($ticketPrices as $zone => $price): ?>
                        <option value="<?= $zone ?>"><?= $zone ?></option>
                    <?php endforeach; ?>
                </select>

                <label for="ticket-count">Select number of tickets:</label>
                <div class="ticket-controls">
                    <button type="button" id="decrease">-</button>
                    <input type="text" id="ticket-count" name="ticket_count" value="1" readonly>
                    <button type="button" id="increase">+</button>
                </div>

                <p>Ticket price: <strong id="ticket-price">EUR <?= number_format($ticketPrices["Regular - Ticket"], 2) ?></strong></p><br>

                <input type="hidden" id="total-price" name="total_price" value="<?= $ticketPrices["Regular - Ticket"] ?>">

                <button type="submit" id="select-ticket">SELECT</button>
            </form>
        </div>
        
        </div>
    </div>

    <script>
        const prices = <?php echo json_encode($ticketPrices); ?>;
        const decreaseButton = document.getElementById('decrease');
        const increaseButton = document.getElementById('increase');
        const ticketCountInput = document.getElementById('ticket-count');
        const zoneSelect = document.getElementById('zone');
        const ticketPriceElement = document.getElementById('ticket-price');
        const totalPriceInput = document.getElementById('total-price');

        function updatePrice() {
            const selectedZone = zoneSelect.value;
            const price = prices[selectedZone];
            const ticketCount = parseInt(ticketCountInput.value);
            const totalPrice = (price * ticketCount).toFixed(2);

            ticketPriceElement.textContent = `EUR ${totalPrice}`;
            totalPriceInput.value = totalPrice;
        }

        zoneSelect.addEventListener('change', updatePrice);

        decreaseButton.addEventListener('click', () => {
            let currentValue = parseInt(ticketCountInput.value);
            if (currentValue > 1) {
                ticketCountInput.value = currentValue - 1;
                updatePrice();
            }
        });

        increaseButton.addEventListener('click', () => {
            let currentValue = parseInt(ticketCountInput.value);
            ticketCountInput.value = currentValue + 1;
            updatePrice();
        });

        document.getElementById('empty-basket').addEventListener('click', () => {
            document.getElementById('basket-body').innerHTML = '';
        });
    </script>

    <div class="section-divider"></div>
    <footer>
        <div class="footer-container">
            <div class="footer-section left">
                <ul>
                    <li>VOLUNTEER</li>
                    <li>SUSTAINABILITY</li>
                    <li>PRIVACY POLICY</li>
                    <li>TERMS OF USE</li>
                </ul>
            </div>
            <div class="footer-section right">
                <p>EMAIL: INFO@PINTFESTIVAL</p>
                <p>REPUBLIKA.TV</p>
                <p>PINT  FESTIVAL</p>
                <p>TAHIR ZAJMI, KOSOVATEX, PRISHTINE 10000 KOSOVE</p>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2024 Pint Festival. All rights reserved.</p>
            <div class="social-icons">
                <a href="https://facebook.com" target="_blank">
                    <img src="images/icon-facebook.png" alt="Facebook">
                </a>
                <a href="https://instagram.com" target="_blank">
                    <img src="images/icon-instagram.png" alt="Instagram">
                </a>
                <a href="https://youtube.com" target="_blank">
                    <img src="images/icon-youtube.png" alt="YouTube">
                </a>
            </div>
        </div>
    </footer>
</body>
</html>
