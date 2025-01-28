<?php
session_start();

if (!isset($_SESSION['username'])) {
    $_SESSION['username'] = "Guest User"; 
}
if (isset($_POST['language'])) {
    $_SESSION['language'] = $_POST['language'];
}

$language = isset($_SESSION['language']) ? $_SESSION['language'] : 'English (United States)';

$texts = [
    'English (United States)' => [
        'title' => 'Choose an account',
        'subtitle' => 'to continue to PINT FESTIVAL',
        'use_another_account' => 'Use another account',
        'sign_in_button' => 'SignIn',
        'privacy_policy' => 'Privacy Policy',
        'terms_of_service' => 'Terms of Service',
    ],
    'Afrikaans' => [
        'title' => 'Kies \'n rekening',
        'subtitle' => 'om voort te gaan na PINT FESTIVAL',
        'use_another_account' => 'Gebruik ’n ander rekening',
        'sign_in_button' => 'Teken In',
        'privacy_policy' => 'Privaatheidsbeleid',
        'terms_of_service' => 'Diensvoorwaardes',
    ],
    'Bosanski' => [
        'title' => 'Izaberite račun',
        'subtitle' => 'da nastavite na PINT FESTIVAL',
        'use_another_account' => 'Koristite drugi račun',
        'sign_in_button' => 'Prijavite se',
        'privacy_policy' => 'Politika privatnosti',
        'terms_of_service' => 'Uvjeti usluge',
    ],
    'Dansk' => [
        'title' => 'Vælg en konto',
        'subtitle' => 'for at fortsætte til PINT FESTIVAL',
        'use_another_account' => 'Brug en anden konto',
        'sign_in_button' => 'Log ind',
        'privacy_policy' => 'Privatlivspolitik',
        'terms_of_service' => 'Brugsbetingelser',
    ],
    'Deutsch' => [
        'title' => 'Wählen Sie ein Konto',
        'subtitle' => 'um mit PINT FESTIVAL fortzufahren',
        'use_another_account' => 'Anderes Konto verwenden',
        'sign_in_button' => 'Anmelden',
        'privacy_policy' => 'Datenschutzrichtlinie',
        'terms_of_service' => 'Nutzungsbedingungen',
    ],
    'Español' => [
        'title' => 'Elige una cuenta',
        'subtitle' => 'para continuar con PINT FESTIVAL',
        'use_another_account' => 'Usar otra cuenta',
        'sign_in_button' => 'Iniciar sesión',
        'privacy_policy' => 'Política de privacidad',
        'terms_of_service' => 'Términos de servicio',
    ],
    'Français (Canada)' => [
        'title' => 'Choisir un compte',
        'subtitle' => 'pour continuer vers PINT FESTIVAL',
        'use_another_account' => 'Utiliser un autre compte',
        'sign_in_button' => 'Se connecter',
        'privacy_policy' => 'Politique de confidentialité',
        'terms_of_service' => 'Conditions d\'utilisation',
    ],
    'Français (France)' => [
        'title' => 'Choisir un compte',
        'subtitle' => 'pour continuer vers PINT FESTIVAL',
        'use_another_account' => 'Utiliser un autre compte',
        'sign_in_button' => 'Se connecter',
        'privacy_policy' => 'Politique de confidentialité',
        'terms_of_service' => 'Conditions d\'utilisation',
    ],
    'Italiano' => [
        'title' => 'Scegli un account',
        'subtitle' => 'per continuare a PINT FESTIVAL',
        'use_another_account' => 'Usa un altro account',
        'sign_in_button' => 'Accedi',
        'privacy_policy' => 'Politica sulla privacy',
        'terms_of_service' => 'Termini di servizio',
    ]
];

$currentTexts = $texts[$language];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="CSS/Signin.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In with Google</title>
    <style>
        .email-password-field {
            display: none;
            margin-top: 15px;
            text-align: center;
        }
        .email-password-field input {
            padding: 10px;
            width: 100%;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .email-password-field button {
            padding: 10px 20px;
            background-color: #b50000;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .email-password-field button:hover {
            background-color: #b50000;
        }
    </style>
    <script>
        function showEmailPasswordField() {
            document.getElementById('emailPasswordField').style.display = 'block';
        }

        function submitCredentials() {
            const email = document.getElementById('emailInput').value;
            const password = document.getElementById('passwordInput').value;

            if (email && password) {
                alert(`Email: ${email}\nPassword: ${password}`);
            } else {
                alert('Ju lutem plotësoni si email-in ashtu edhe fjalëkalimin.');
            }
        }
    </script>
</head>
<body>
    <div class="container">
        <div class="logo">
            <img src="images/pintlogo.webp" alt="PINT FESTIVAL Logo">
        </div>
        <div class="title">
            <?php
                $appName = "PINT FESTIVAL";
                echo $currentTexts['title'] . "<p>" . $currentTexts['subtitle'] . "</p>";
            ?>
        </div>
        <div class="account" onclick="alert('You selected Guest User')">
            <img src="images/user-icon.jpg" alt="User Icon">
            <div class="account-info">
                <?php
                    echo "<span>" . htmlspecialchars($_SESSION['username']) . "</span>";
                ?>
            </div>
        </div>
        <div class="account" onclick="showEmailPasswordField()">
            <div class="account-info">
                <span><?php echo $currentTexts['use_another_account']; ?></span>
            </div>
        </div>
        <div class="email-password-field" id="emailPasswordField">
            <input type="email" id="emailInput" placeholder="Enter your email">
            <input type="password" id="passwordInput" placeholder="Enter your password">
            <button onclick="submitCredentials()"><?php echo $currentTexts['sign_in_button']; ?></button>
        </div>
        <div class="link">
            <a href="#"><?php echo $currentTexts['privacy_policy']; ?></a> and <a href="#"><?php echo $currentTexts['terms_of_service']; ?></a>
        </div>
        <div class="footer">
            <form method="post">
                <select name="language" onchange="this.form.submit()">
                    <?php
                        $languages = [
                            "English (United States)",
                            "Afrikaans",
                            "Bosanski",
                            "Dansk",
                            "Deutsch",
                            "Español",
                            "Français (Canada)",
                            "Français (France)",
                            "Italiano"
                        ];
                        foreach ($languages as $languageOption) {
                            echo "<option value='$languageOption'" . ($languageOption == $language ? ' selected' : '') . ">$languageOption</option>";
                        }
                    ?>
                </select>
            </form>
        </div>
    </div>
</body>
</html>
