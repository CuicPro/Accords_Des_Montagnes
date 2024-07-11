<?php
session_start();
require '../php/config.php'; 

// Récupération des dates depuis la table resa_date
$stmt = $conn->prepare("SELECT date FROM resa_date");
$stmt->execute();
$dates = $stmt->fetchAll(PDO::FETCH_ASSOC);

$date_selected = isset($_GET['reservation_date']) ? $_GET['reservation_date'] : null;
$reserved_seats = [];
$seats = ''; // Initialisation de la variable $seats

if ($date_selected) {
    // Récupérer les places réservées pour la date sélectionnée
    $sql = "SELECT places_reservees FROM reservations WHERE date_reservation = :date";
    $stmt = $conn->prepare($sql);
    $stmt->execute(['date' => $date_selected]);

    // Parcourir les résultats et construire le tableau des places réservées
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $reserved_seats = array_merge($reserved_seats, explode(',', $row['places_reservees']));
    }
}

$reserved_seats_json = json_encode($reserved_seats);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../Asset/css/reservation.css">
    <style>
        :root {
            --Principal: #F97A52;
            --Secondaire: #D98E75;
            --GrisClaire: #D0D5DD;
            --Noir: #242424;

            --padding: 10px;
            --borderR: 10px;
            --outline: 2px solid var(--GrisClaire);
            --Shadow: #00000044;
            --transition: all .3s ease;

            /* Calendrier */
            --C1: #B2AFE4;
            --C2: #D98E75;
            --C3: #BF73D6;
            --C4: #F97A52;
            --C5: #E989F2;
            --C6: #F29D38;
            --C7: #BF423A;

            /* Carouselle */
            --crsl-bg: transparent;
            --box-bg: #1e272e;
            --box-shadow: #0000001c;
            --box-shadow-border: #0000000f;
            --box-border: #fff;
        }

        body {
            display: flex;
            align-items: center;
            justify-content: space-around;
            flex-direction: column;
        }

        .room {
            width: 12vw;
        }

        form {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            margin: 10px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #333;
        }

        input[type="text"], input[type="email"], input[type="tel"], select {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 14px;
            color: #333;
        }

        input[type="text"]:focus, input[type="email"]:focus, input[type="tel"]:focus, select:focus {
            border-color: #007BFF;
            outline: none;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #007BFF;
            border: none;
            border-radius: 4px;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #0056b3;
        }

        .Btn {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .Btn span {
            margin-right: 8px;
        }

        .svgIcon {
            width: 16px;
            height: 16px;
            fill: #fff;
        }
        
        .reserved {
            background-color: var(--C7) !important;
            cursor: not-allowed;
        }
    </style>
</head>
<body>
    <div class="page_content_container">
        <div class="form_container">
            <header>
                <div>
                    <div class="box" style="background:#242424;"></div>
                    <i>Disponible</i>
                </div>
                |
                <div>
                    <div class="box" style="background:#BF423A;"></div>
                    <i>Réserver</i>
                </div>
                |
                <div>
                    <div class="box" style="background:#84cc16;"></div>
                    <i>Séléctionner</i>
                </div>
            </header>
            <form id="date-form" method="GET" action="">
                <label for="reservation-date">Date de réservation:</label>
                <select id="reservation-date" name="reservation_date" required>
                    <option value="">Sélectionnez une date</option>
                    <?php
                    foreach ($dates as $date) {
                        $selected = ($date['date'] == $date_selected) ? 'selected' : '';
                        echo "<option value=\"{$date['date']}\" $selected>{$date['date']}</option>";
                    }
                    ?>
                </select><br>
                <button type="submit">Valider</button>
            </form>

            <?php if ($date_selected): ?>
            <form method="POST" action="../php/form/resa__logic_form.php" id="final_form">
                <input type="hidden" name="reservation_date" value="<?php echo $date_selected; ?>">
                <label for="nom">Nom:</label>
                <input type="text" id="nom" name="nom" required><br>
                <label for="prenom">Prénom:</label>
                <input type="text" id="prenom" name="prenom" required><br>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email"><br>
                <label for="telephone">Téléphone:</label>
                <input type="tel" id="telephone" name="telephone"><br>
                <input type="hidden" id="seats" name="seats" value="<?php echo $seats; ?>">
                <button id="pay-button" class="Btn" type="submit">
                    <span>Payer</span>
                    <svg viewBox="0 0 576 512" class="svgIcon">
                        <path
                        d="M512 80c8.8 0 16 7.2 16 16v32H48V96c0-8.8 7.2-16 16-16H512zm16 144V416c0 8.8-7.2 16-16 16H64c-8.8 0-16-7.2-16-16V224H528zM64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H512c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H64zm56 304c-13.3 0-24 10.7-24 24s10.7 24 24 24h48c13.3 0 24-10.7 24-24s-10.7-24-24-24H120zm128 0c-13.3 0-24 10.7-24 24s10.7 24 24 24H360c13.3 0 24-10.7 24-24s-10.7-24-24-24H248z"
                        ></path>
                    </svg>
                </button>
            </form>
        </div>
        <div class="room">
            
            <div id="seats-container">
                <div id="top-seats-container"></div>
                <div id="left-seats-container"></div>
                <div id="bottom-seats-container"></div>
                <div id="scene"><h1>Scene</h1></div>
            </div>
        </div>
    </div>

    <script src="../Asset/js/reservationGenConfirmation.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const seatsInput = document.getElementById('seats');

            // Marquer les sièges réservés pour la date sélectionnée
            const reservedSeats = <?php echo $reserved_seats_json; ?>;
            reservedSeats.forEach(seatId => {
                const seatElement = document.querySelector(`[data-seat-number="${seatId}"]`);
                if (seatElement) {
                    seatElement.classList.add('reserved');
                }
            });
        });
    </script>
    <?php endif; ?>
</body>
</html>
