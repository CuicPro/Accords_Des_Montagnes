<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['seats'])) {
            $seats = htmlspecialchars($_POST['seats']);
        } else {
            $seats = "Aucun siège sélectionné.";
        }
    } else {
        header('Location: ../errors/404.html');
        exit();
    }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../Asset/css/reservation.css">
    <style>
        :root{
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
        }
        .room {
            width: 12vw;
        }
        .top-seat, .left-seat, .bottom-seat {
            cursor: not-allowed;
        }
        input {
            width: calc(100% - var(--padding) - 20px);
            height: calc(30px - var(--padding));
            padding: var(--padding);
            outline: var(--outline);
            border: none;
            border-radius: var(--borderR);
        }
    </style>
</head>
<body>

    <form method="POST" action="reservation.php">
        <label for="nom">Nom:</label>
        <input type="text" id="nom" name="nom" required><br>
        <label for="prenom">Prénom:</label>
        <input type="text" id="prenom" name="prenom" required><br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email"><br>
        <label for="telephone">Téléphone:</label>
        <input type="tel" id="telephone" name="telephone"><br>
        <label for="places_reservees">Places réservées:</label>
        <input type="text" id="places_reservees" name="places_reservees" required value="<?php echo $seats ; ?>"><br>

        <button id="pay-button" class="Btn" type="submit">
            <span>Payer</span>
            <svg viewBox="0 0 576 512" class="svgIcon">
                <path
                d="M512 80c8.8 0 16 7.2 16 16v32H48V96c0-8.8 7.2-16 16-16H512zm16 144V416c0 8.8-7.2 16-16 16H64c-8.8 0-16-7.2-16-16V224H528zM64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H512c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H64zm56 304c-13.3 0-24 10.7-24 24s10.7 24 24 24h48c13.3 0 24-10.7 24-24s-10.7-24-24-24H120zm128 0c-13.3 0-24 10.7-24 24s10.7 24 24 24H360c13.3 0 24-10.7 24-24s-10.7-24-24-24H248z"
                ></path>
            </svg>
        </button>
    </form>
    
    <div class="room">
            <div id="seats-container">
                <div id="top-seats-container"></div>
                <div id="left-seats-container"></div>
                <div id="bottom-seats-container"></div>
                <div id="scene"><h1>Scene</h1></div>
            </div>
            
        </div>

    <script src="../Asset/js/reservationGenConfirmation.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Marquer les sièges sélectionnés
            const reservedSeats = '<?php echo $seats; ?>'.split(',').map(seat => seat.trim());
            reservedSeats.forEach(seatId => {
                const seatElement = document.querySelector(`[data-seat-number="${seatId}"]`);
                if (seatElement) {
                    seatElement.classList.add('selected');
                }
            });
        });
    </script>

</body>
</html>