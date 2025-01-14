<?php
$faqs = [
    [
        'question' => 'Can I refund my ticket?',
        'answer' => 'All tickets are non-transferable and non-refundable.'
    ],
    [
        'question' => 'Can I buy a parking ticket?',
        'answer' => 'Yes, parking tickets will be available for purchase soon.'
    ],
    [
        'question' => 'What are the festival dates?',
        'answer' => 'Be ready for four unforgettable nights! Pint Festival 2024 dates are 8, 9, and 10 November.'
    ],
    [
        'question' => 'How can I top-up my wristband online?',
        'answer' => 'Install the Pint Festival app (iOS and Android-friendly), create your account, go to "Wallet", click "Add" balance, and enter bank details to confirm.'
    ],
    [
        'question' => 'Where can I top-up my wristband?',
        'answer' => 'You can top-up your wristband through the app or directly at the venue.'
    ],
    [
        'question' => 'How to use a smart wristband?',
        'answer' => 'Pint Festival uses a cashless system. Show your wristband to bartenders to make purchases.'
    ],
    [
        'question' => 'What is the check-in process?',
        'answer' => 'Present your ID card and ticket at the gate to receive a re-entry wristband.'
    ],
    [
        'question' => 'How can I transfer my ticket to another person?',
        'answer' => 'All tickets are non-transferable and non-refundable.'
    ],
    [
        'question' => 'What is the difference between a Regular and VIP ticket?',
        'answer' => 'Regular tickets allow entrance through the main gate. VIP tickets have a special entrance and designated VIP space.'
    ],
    [
        'question' => 'Where can I buy tickets?',
        'answer' => 'Tickets can be purchased online at pintfestival.com. All tickets are 4-day passes.'
    ],
    [
        'question' => 'Use of tickets for promotions?',
        'answer' => 'Tickets cannot be used for promotions without Pint Festival consent. For corporate or bulk tickets, contact pintfestival@republika.tv.'
    ],
    [
        'question' => 'Recommended Hotels and Hostels?',
        'answer' => 'Find accommodation in Prishtina: <a href="https://www.booking.com/hostels/city/xk/pristina.html">Hostels</a>, <a href="https://www.booking.com/city/xk/pristina.html">Hotels</a>.'
    ],
    [
        'question' => 'What is the minimum age to attend?',
        'answer' => 'The minimum age is 16. Anyone under 16 must be accompanied by an adult.'
    ],
    [
        'question' => 'How do I get to the festival?',
        'answer' => 'The venue is located in Parku i Germires,Prishtine, just 20 minutes from the city. We recommend using the festival shuttle buses as parking is limited.'
    ],
    [
        'question' => 'How many types of tickets are available?',
        'answer' => 'Regular ticket, Group of 3, Group of 5, VIP ticket.'
    ],
    [
        'question' => 'Can I work as a volunteer at the festival?',
        'answer' => 'Yes, volunteer information will be posted on our website and Facebook. Stay tuned to be part of the festival!'
    ]
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PINT Festival - FAQ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="CSS/Faq.css">
</head>
<body>
    <header>
        <div class="logo">
            <img src="Images/pint-logo.png" alt="Pint Festival Logo">
            <span>PINT FESTIVAL</span>
        </div>
        <ul class="nav-links">
            <li><a href="Home.php">Home</a></li>
            <li><a href="aboutfestival.php">About Festival</a></li>
            <li><a href="Aboutus.php">About Us</a></li>
            <li><a href="Tickets.php">Tickets</a></li>
            <li><a href="Merchandise.php">Merchandise</a></li>
            <li><a href="#" class="active">Faq</a></li>
            <li><a href="News.php">News</a></li>
            <li><a href="Login.php">Login</a></li>
        </ul>
    </header>

    <section class="container my-5 faq">
        <div class="accordion" id="faqAccordion">
            <?php foreach ($faqs as $index => $faq): ?>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="heading<?= $index + 1 ?>">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?= $index + 1 ?>" aria-expanded="false" aria-controls="collapse<?= $index + 1 ?>">
                            <?= $faq['question'] ?>
                        </button>
                    </h2>
                    <div id="collapse<?= $index + 1 ?>" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            <?= $faq['answer'] ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </section>

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
                <p>PINT FESTIVAL</p>
                <p>TAHIR ZAJMI, KOSOVATEX, PRISHTINE 10000 KOSOVE</p>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2024 Pint Festival. All rights reserved.</p>
            <div class="social-icons">   
                <a href="https://facebook.com" target="_blank">
                    <img src="Images/icon-facebook.png" alt="Facebook">
                </a>
                <a href="https://instagram.com" target="_blank">
                    <img src="Images/icon-instagram.png" alt="Instagram">
                </a>
                <a href="https://youtube.com" target="_blank">
                    <img src="Images/icon-youtube.png" alt="YouTube">
                </a>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const questions = document.querySelectorAll('.accordion-button');
            questions.forEach((question) => {
                question.addEventListener('click', function () {
                    const collapseElement = this.nextElementSibling;
                    if (collapseElement.classList.contains('show')) {
                        collapseElement.classList.remove('show');
                    } else {
                        collapseElement.classList.add('show');
                    }
                });
            });
        });
    </script>
</body>
</html>
