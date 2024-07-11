document.addEventListener('DOMContentLoaded', () => {
    const topSeatsContainer = document.getElementById('top-seats-container');
    const leftSeatsContainer = document.getElementById('left-seats-container');
    const bottomSeatsContainer = document.getElementById('bottom-seats-container');
    const payButton = document.getElementById('pay-button');
    
    const createSeats = (container, seatsLayout, seatClass) => {
        seatsLayout.forEach(seat => {
            const seatElement = document.createElement('div');
            seatElement.classList.add(seatClass);
            seatElement.classList.add('seat');
            seatElement.style.gridColumn = seat.column;
            seatElement.style.gridRow = seat.row;
            seatElement.dataset.seatNumber = seat.id;
    
            // seatElement.addEventListener('click', () => {
            //     // Si le siège est réservé, ne rien faire
            //     if (seatElement.classList.contains('reserved')) {
            //         return;
            //     }
    
            //     // Si le siège est déjà sélectionné, le désélectionner
            //     if (seatElement.classList.contains('selected')) {
            //         seatElement.classList.remove('selected');
            //     } else {
            //         // Sinon, le sélectionner
            //         seatElement.classList.add('selected');
            //     }
            //     console.log(seat.id);
            // });
    
            container.appendChild(seatElement);
        });
    };



    // Définir la disposition des sièges du haut (4 colonnes avec 2 rangées chacune)
    const topSeatsLayout = [
        {id: '1.4-A18', column: 1, row: 1}, {id: '2.4-A18', column: 2, row: 1},
        {id: '1.3-A18', column: 1, row: 2}, {id: '2.3-A18', column: 2, row: 2},
        {id: '1.2-A18', column: 1, row: 3}, {id: '2.2-A18', column: 2, row: 3},
        {id: '1.1-A18', column: 1, row: 4}, {id: '2.1-A18', column: 2, row: 4},

        {id: '1.4-A19', column: 4, row: 1}, {id: '2.4-A19', column: 5, row: 1},
        {id: '1.3-A19', column: 4, row: 2}, {id: '2.3-A19', column: 5, row: 2},
        {id: '1.2-A19', column: 4, row: 3}, {id: '2.2-A19', column: 5, row: 3},
        {id: '1.1-A19', column: 4, row: 4}, {id: '2.1-A19', column: 5, row: 4},

        {id: '1.4-A20', column: 7, row: 1}, {id: '2.4-A20', column: 8, row: 1},
        {id: '1.3-A20', column: 7, row: 2}, {id: '2.3-A20', column: 8, row: 2},
        {id: '1.2-A20', column: 7, row: 3}, {id: '2.2-A20', column: 8, row: 3},
        {id: '1.1-A20', column: 7, row: 4}, {id: '2.1-A20', column: 8, row: 4},

        {id: '1.4-A21', column: 10, row: 1}, {id: '2.4-A21', column: 11, row: 1},
        {id: '1.3-A21', column: 10, row: 2}, {id: '2.3-A21', column: 11, row: 2},
        {id: '1.2-A21', column: 10, row: 3}, {id: '2.2-A21', column: 11, row: 3},
        {id: '1.1-A21', column: 10, row: 4}, {id: '2.1-A21', column: 11, row: 4},
    ];


    
    
    // Définir la disposition des sièges de gauche (exemple avec 6 colonnes et 5 rangées)
    const leftSeatsLayout = [
        // MEGA COL 1
        {id: '1.2-B17', column: 1, row: 1}, {id: '1.1-B17', column: 1, row: 2},
        {id: '2.2-B17', column: 2, row: 1}, {id: '2.1-B17', column: 2, row: 2},
        {id: '3.2-B17', column: 3, row: 1}, {id: '3.1-B17', column: 3, row: 2},
        {id: '4.2-B17', column: 4, row: 1}, {id: '4.1-B17', column: 4, row: 2},

        {id: '1.2-B16', column: 1, row: 4}, {id: '1.1-B16', column: 1, row: 5},
        {id: '2.2-B16', column: 2, row: 4}, {id: '2.1-B16', column: 2, row: 5},
        {id: '3.2-B16', column: 3, row: 4}, {id: '3.1-B16', column: 3, row: 5},
        {id: '4.2-B16', column: 4, row: 4}, {id: '4.1-B16', column: 4, row: 5},
        
        {id: '1.2-B15', column: 1, row: 7}, {id: '1.1-B15', column: 1, row: 8},
        {id: '2.2-B15', column: 2, row: 7}, {id: '2.1-B15', column: 2, row: 8},
        {id: '3.2-B15', column: 3, row: 7}, {id: '3.1-B15', column: 3, row: 8},
        {id: '4.2-B15', column: 4, row: 7}, {id: '4.1-B15', column: 4, row: 8},
        
        {id: '1.2-B14', column: 1, row: 10}, {id: '1.1-B14', column: 1, row: 11},
        {id: '2.2-B14', column: 2, row: 10}, {id: '2.1-B14', column: 2, row: 11},
        {id: '3.2-B14', column: 3, row: 10}, {id: '3.1-B14', column: 3, row: 11},
        {id: '4.2-B14', column: 4, row: 10}, {id: '4.1-B14', column: 4, row: 11},
        
        {id: '1.2-B13', column: 1, row: 13}, {id: '1.1-B13', column: 1, row: 14},
        {id: '2.2-B13', column: 2, row: 13}, {id: '2.1-B13', column: 2, row: 14},
        {id: '3.2-B13', column: 3, row: 13}, {id: '3.1-B13', column: 3, row: 14},
        {id: '4.2-B13', column: 4, row: 13}, {id: '4.1-B13', column: 4, row: 14},
        
        {id: '1.2-B12', column: 1, row: 16}, {id: '1.1-B12', column: 1, row: 17},
        {id: '2.2-B12', column: 2, row: 16}, {id: '2.1-B12', column: 2, row: 17},
        {id: '3.2-B12', column: 3, row: 16}, {id: '3.1-B12', column: 3, row: 17},
        {id: '4.2-B12', column: 4, row: 16}, {id: '4.1-B12', column: 4, row: 17},
        
        {id: '1.2-B11', column: 1, row: 19}, {id: '1.1-B11', column: 1, row: 20},
        {id: '2.2-B11', column: 2, row: 19}, {id: '2.1-B11', column: 2, row: 20},
        {id: '3.2-B11', column: 3, row: 19}, {id: '3.1-B11', column: 3, row: 20},
        {id: '4.2-B11', column: 4, row: 19}, {id: '4.1-B11', column: 4, row: 20},
        
        {id: '1.2-B10', column: 1, row: 22}, {id: '1.1-B10', column: 1, row: 23},
        {id: '2.2-B10', column: 2, row: 22}, {id: '2.1-B10', column: 2, row: 23},
        {id: '3.2-B10', column: 3, row: 22}, {id: '3.1-B10', column: 3, row: 23},
        {id: '4.2-B10', column: 4, row: 22}, {id: '4.1-B10', column: 4, row: 23},
        
        {id: '1.2-B9', column: 1, row: 25}, {id: '1.1-B9', column: 1, row: 26},
        {id: '2.2-B9', column: 2, row: 25}, {id: '2.1-B9', column: 2, row: 26},
        {id: '3.2-B9', column: 3, row: 25}, {id: '3.1-B9', column: 3, row: 26},
        {id: '4.2-B9', column: 4, row: 25}, {id: '4.1-B9', column: 4, row: 26},
        
        {id: '1.2-B8', column: 1, row: 28}, {id: '1.1-B8', column: 1, row: 29},
        {id: '2.2-B8', column: 2, row: 28}, {id: '2.1-B8', column: 2, row: 29},
        {id: '3.2-B8', column: 3, row: 28}, {id: '3.1-B8', column: 3, row: 29},
        {id: '4.2-B8', column: 4, row: 28}, {id: '4.1-B8', column: 4, row: 29},
        
        {id: '1.2-B7', column: 1, row: 31}, {id: '1.1-B7', column: 1, row: 32},
        {id: '2.2-B7', column: 2, row: 31}, {id: '2.1-B7', column: 2, row: 32},
        {id: '3.2-B7', column: 3, row: 31}, {id: '3.1-B7', column: 3, row: 32},
        {id: '4.2-B7', column: 4, row: 31}, {id: '4.1-B7', column: 4, row: 32},


        // MEGA COL 2
        {id: '5.2-B17', column: 6, row: 1}, {id: '5.1-B17', column: 6, row: 2},
        {id: '6.2-B17', column: 7, row: 1}, {id: '6.1-B17', column: 7, row: 2},
        {id: '7.2-B17', column: 8, row: 1}, {id: '7.1-B17', column: 8, row: 2},
        {id: '8.2-B17', column: 9, row: 1}, {id: '8.1-B17', column: 9, row: 2},

        {id: '5.2-B16', column: 6, row: 4}, {id: '5.1-B16', column: 6, row: 5},
        {id: '6.2-B16', column: 7, row: 4}, {id: '6.1-B16', column: 7, row: 5},
        {id: '7.2-B16', column: 8, row: 4}, {id: '7.1-B16', column: 8, row: 5},
        {id: '8.2-B16', column: 9, row: 4}, {id: '8.1-B16', column: 9, row: 5},

        {id: '5.2-B15', column: 6, row: 7}, {id: '5.1-B15', column: 6, row: 8},
        {id: '6.2-B15', column: 7, row: 7}, {id: '6.1-B15', column: 7, row: 8},
        {id: '7.2-B15', column: 8, row: 7}, {id: '7.1-B15', column: 8, row: 8},
        {id: '8.2-B15', column: 9, row: 7}, {id: '8.1-B15', column: 9, row: 8},

        {id: '5.2-B14', column: 6, row: 10}, {id: '5.1-B14', column: 6, row: 11},
        {id: '6.2-B14', column: 7, row: 10}, {id: '6.1-B14', column: 7, row: 11},
        {id: '7.2-B14', column: 8, row: 10}, {id: '7.1-B14', column: 8, row: 11},
        {id: '8.2-B14', column: 9, row: 10}, {id: '8.1-B14', column: 9, row: 11},

        {id: '5.2-B13', column: 6, row: 13}, {id: '5.1-B13', column: 6, row: 14},
        {id: '6.2-B13', column: 7, row: 13}, {id: '6.1-B13', column: 7, row: 14},
        {id: '7.2-B13', column: 8, row: 13}, {id: '7.1-B13', column: 8, row: 14},
        {id: '8.2-B13', column: 9, row: 13}, {id: '8.1-B13', column: 9, row: 14},

        {id: '5.2-B12', column: 6, row: 16}, {id: '5.1-B12', column: 6, row: 17},
        {id: '6.2-B12', column: 7, row: 16}, {id: '6.1-B12', column: 7, row: 17},
        {id: '7.2-B12', column: 8, row: 16}, {id: '7.1-B12', column: 8, row: 17},
        {id: '8.2-B12', column: 9, row: 16}, {id: '8.1-B12', column: 9, row: 17},

        {id: '5.2-B11', column: 6, row: 19}, {id: '5.1-B11', column: 6, row: 20},
        {id: '6.2-B11', column: 7, row: 19}, {id: '6.1-B11', column: 7, row: 20},
        {id: '7.2-B11', column: 8, row: 19}, {id: '7.1-B11', column: 8, row: 20},
        {id: '8.2-B11', column: 9, row: 19}, {id: '8.1-B11', column: 9, row: 20},

        {id: '5.2-B10', column: 6, row: 22}, {id: '5.1-B10', column: 6, row: 23},
        {id: '6.2-B10', column: 7, row: 22}, {id: '6.1-B10', column: 7, row: 23},
        {id: '7.2-B10', column: 8, row: 22}, {id: '7.1-B10', column: 8, row: 23},
        {id: '8.2-B10', column: 9, row: 22}, {id: '8.1-B10', column: 9, row: 23},

        {id: '5.2-B9', column: 6, row: 25}, {id: '5.1-B9', column: 6, row: 26},
        {id: '6.2-B9', column: 7, row: 25}, {id: '6.1-B9', column: 7, row: 26},
        {id: '7.2-B9', column: 8, row: 25}, {id: '7.1-B9', column: 8, row: 26},
        {id: '8.2-B9', column: 9, row: 25}, {id: '8.1-B9', column: 9, row: 26},

        {id: '5.2-B8', column: 6, row: 28}, {id: '5.1-B8', column: 6, row: 29},
        {id: '6.2-B8', column: 7, row: 28}, {id: '6.1-B8', column: 7, row: 29},
        {id: '7.2-B8', column: 8, row: 28}, {id: '7.1-B8', column: 8, row: 29},
        {id: '8.2-B8', column: 9, row: 28}, {id: '8.1-B8', column: 9, row: 29},

        {id: '5.2-B7', column: 6, row: 31}, {id: '5.1-B7', column: 6, row: 32},
        {id: '6.2-B7', column: 7, row: 31}, {id: '6.1-B7', column: 7, row: 32},
        {id: '7.2-B7', column: 8, row: 31}, {id: '7.1-B7', column: 8, row: 32},
        {id: '8.2-B7', column: 9, row: 31}, {id: '8.1-B7', column: 9, row: 32},

        // MEGA COL 3
        {id: '1.2-A17', column: 11, row: 1}, {id: '1.1-A17', column: 11, row: 2},
        {id: '2.2-A17', column: 12, row: 1}, {id: '2.1-A17', column: 12, row: 2},
        {id: '3.2-A17', column: 13, row: 1}, {id: '3.1-A17', column: 13, row: 2},
        {id: '4.2-A17', column: 14, row: 1}, {id: '4.1-A17', column: 14, row: 2},
        {id: '5.2-A17', column: 15, row: 1}, {id: '5.1-A17', column: 15, row: 2},
        {id: '6.2-A17', column: 16, row: 1}, {id: '6.1-A17', column: 16, row: 2},
        {id: '7.2-A17', column: 17, row: 1}, {id: '7.1-A17', column: 17, row: 2},
        {id: '8.2-A17', column: 18, row: 1}, {id: '8.1-A17', column: 18, row: 2},
        
        {id: '1.2-A16', column: 11, row: 4}, {id: '1.1-A16', column: 11, row: 5},
        {id: '2.2-A16', column: 12, row: 4}, {id: '2.1-A16', column: 12, row: 5},
        {id: '3.2-A16', column: 13, row: 4}, {id: '3.1-A16', column: 13, row: 5},
        {id: '4.2-A16', column: 14, row: 4}, {id: '4.1-A16', column: 14, row: 5},
        {id: '5.2-A16', column: 15, row: 4}, {id: '5.1-A16', column: 15, row: 5},
        {id: '6.2-A16', column: 16, row: 4}, {id: '6.1-A16', column: 16, row: 5},
        {id: '7.2-A16', column: 17, row: 4}, {id: '7.1-A16', column: 17, row: 5},
        {id: '8.2-A16', column: 18, row: 4}, {id: '8.1-A16', column: 18, row: 5},
        
        {id: '1.2-A15', column: 11, row: 7}, {id: '1.1-A15', column: 11, row: 8},
        {id: '2.2-A15', column: 12, row: 7}, {id: '2.1-A15', column: 12, row: 8},
        {id: '3.2-A15', column: 13, row: 7}, {id: '3.1-A15', column: 13, row: 8},
        {id: '4.2-A15', column: 14, row: 7}, {id: '4.1-A15', column: 14, row: 8},
        {id: '5.2-A15', column: 15, row: 7}, {id: '5.1-A15', column: 15, row: 8},
        {id: '6.2-A15', column: 16, row: 7}, {id: '6.1-A15', column: 16, row: 8},
        {id: '7.2-A15', column: 17, row: 7}, {id: '7.1-A15', column: 17, row: 8},
        {id: '8.2-A15', column: 18, row: 7}, {id: '8.1-A15', column: 18, row: 8},
        
        {id: '1.2-A14', column: 11, row: 10}, {id: '1.1-A14', column: 11, row: 11},
        {id: '2.2-A14', column: 12, row: 10}, {id: '2.1-A14', column: 12, row: 11},
        {id: '3.2-A14', column: 13, row: 10}, {id: '3.1-A14', column: 13, row: 11},
        {id: '4.2-A14', column: 14, row: 10}, {id: '4.1-A14', column: 14, row: 11},
        {id: '5.2-A14', column: 15, row: 10}, {id: '5.1-A14', column: 15, row: 11},
        {id: '6.2-A14', column: 16, row: 10}, {id: '6.1-A14', column: 16, row: 11},
        {id: '7.2-A14', column: 17, row: 10}, {id: '7.1-A14', column: 17, row: 11},
        {id: '8.2-A14', column: 18, row: 10}, {id: '8.1-A14', column: 18, row: 11},
        
        {id: '1.2-A13', column: 11, row: 13}, {id: '1.1-A13', column: 11, row: 14},
        {id: '2.2-A13', column: 12, row: 13}, {id: '2.1-A13', column: 12, row: 14},
        {id: '3.2-A13', column: 13, row: 13}, {id: '3.1-A13', column: 13, row: 14},
        {id: '4.2-A13', column: 14, row: 13}, {id: '4.1-A13', column: 14, row: 14},
        {id: '5.2-A13', column: 15, row: 13}, {id: '5.1-A13', column: 15, row: 14},
        {id: '6.2-A13', column: 16, row: 13}, {id: '6.1-A13', column: 16, row: 14},
        {id: '7.2-A13', column: 17, row: 13}, {id: '7.1-A13', column: 17, row: 14},
        {id: '8.2-A13', column: 18, row: 13}, {id: '8.1-A13', column: 18, row: 14},
        
        {id: '1.2-A12', column: 11, row: 16}, {id: '1.1-A12', column: 11, row: 17},
        {id: '2.2-A12', column: 12, row: 16}, {id: '2.1-A12', column: 12, row: 17},
        {id: '3.2-A12', column: 13, row: 16}, {id: '3.1-A12', column: 13, row: 17},
        {id: '4.2-A12', column: 14, row: 16}, {id: '4.1-A12', column: 14, row: 17},
        {id: '5.2-A12', column: 15, row: 16}, {id: '5.1-A12', column: 15, row: 17},
        {id: '6.2-A12', column: 16, row: 16}, {id: '6.1-A12', column: 16, row: 17},
        {id: '7.2-A12', column: 17, row: 16}, {id: '7.1-A12', column: 17, row: 17},
        {id: '8.2-A12', column: 18, row: 16}, {id: '8.1-A12', column: 18, row: 17},
        
        {id: '1.2-A11', column: 11, row: 19}, {id: '1.1-A11', column: 11, row: 20},
        {id: '2.2-A11', column: 12, row: 19}, {id: '2.1-A11', column: 12, row: 20},
        {id: '3.2-A11', column: 13, row: 19}, {id: '3.1-A11', column: 13, row: 20},
        {id: '4.2-A11', column: 14, row: 19}, {id: '4.1-A11', column: 14, row: 20},
        {id: '5.2-A11', column: 15, row: 19}, {id: '5.1-A11', column: 15, row: 20},
        {id: '6.2-A11', column: 16, row: 19}, {id: '6.1-A11', column: 16, row: 20},
        {id: '7.2-A11', column: 17, row: 19}, {id: '7.1-A11', column: 17, row: 20},
        {id: '8.2-A11', column: 18, row: 19}, {id: '8.1-A11', column: 18, row: 20},
        
        {id: '1.2-A10', column: 11, row: 22}, {id: '1.1-A10', column: 11, row: 23},
        {id: '2.2-A10', column: 12, row: 22}, {id: '2.1-A10', column: 12, row: 23},
        {id: '3.2-A10', column: 13, row: 22}, {id: '3.1-A10', column: 13, row: 23},
        {id: '4.2-A10', column: 14, row: 22}, {id: '4.1-A10', column: 14, row: 23},
        {id: '5.2-A10', column: 15, row: 22}, {id: '5.1-A10', column: 15, row: 23},
        {id: '6.2-A10', column: 16, row: 22}, {id: '6.1-A10', column: 16, row: 23},
        {id: '7.2-A10', column: 17, row: 22}, {id: '7.1-A10', column: 17, row: 23},
        {id: '8.2-A10', column: 18, row: 22}, {id: '8.1-A10', column: 18, row: 23},
        
        {id: '1.2-A9', column: 11, row: 25}, {id: '1.1-A9', column: 11, row: 26},
        {id: '2.2-A9', column: 12, row: 25}, {id: '2.1-A9', column: 12, row: 26},
        {id: '3.2-A9', column: 13, row: 25}, {id: '3.1-A9', column: 13, row: 26},
        {id: '4.2-A9', column: 14, row: 25}, {id: '4.1-A9', column: 14, row: 26},
        {id: '5.2-A9', column: 15, row: 25}, {id: '5.1-A9', column: 15, row: 26},
        {id: '6.2-A9', column: 16, row: 25}, {id: '6.1-A9', column: 16, row: 26},
        {id: '7.2-A9', column: 17, row: 25}, {id: '7.1-A9', column: 17, row: 26},
        {id: '8.2-A9', column: 18, row: 25}, {id: '8.1-A9', column: 18, row: 26},
        
        {id: '1.2-A8', column: 11, row: 28}, {id: '1.1-A8', column: 11, row: 29},
        {id: '2.2-A8', column: 12, row: 28}, {id: '2.1-A8', column: 12, row: 29},
        {id: '3.2-A8', column: 13, row: 28}, {id: '3.1-A8', column: 13, row: 29},
        {id: '4.2-A8', column: 14, row: 28}, {id: '4.1-A8', column: 14, row: 29},
        {id: '5.2-A8', column: 15, row: 28}, {id: '5.1-A8', column: 15, row: 29},
        {id: '6.2-A8', column: 16, row: 28}, {id: '6.1-A8', column: 16, row: 29},
        {id: '7.2-A8', column: 17, row: 28}, {id: '7.1-A8', column: 17, row: 29},
        {id: '8.2-A8', column: 18, row: 28}, {id: '8.1-A8', column: 18, row: 29},
        
        {id: '1.2-A7', column: 11, row: 31}, {id: '1.1-A7', column: 11, row: 32},
        {id: '2.2-A7', column: 12, row: 31}, {id: '2.1-A7', column: 12, row: 32},
        {id: '3.2-A7', column: 13, row: 31}, {id: '3.1-A7', column: 13, row: 32},
        {id: '4.2-A7', column: 14, row: 31}, {id: '4.1-A7', column: 14, row: 32},
        {id: '5.2-A7', column: 15, row: 31}, {id: '5.1-A7', column: 15, row: 32},
        {id: '6.2-A7', column: 16, row: 31}, {id: '6.1-A7', column: 16, row: 32},
        {id: '7.2-A7', column: 17, row: 31}, {id: '7.1-A7', column: 17, row: 32},
        {id: '8.2-A7', column: 18, row: 31}, {id: '8.1-A7', column: 18, row: 32},

    ];

    // Définir la disposition des sièges du bas (exemple avec 6 colonnes et 5 rangées)
    const bottomSeatsLayout = [
        {id: '1.8-A6', column: 1, row: 1}, {id: '2.8-A6', column: 2, row: 1},
        {id: '1.7-A6', column: 1, row: 2}, {id: '2.7-A6', column: 2, row: 2},
        {id: '1.6-A6', column: 1, row: 3}, {id: '2.6-A6', column: 2, row: 3},
        {id: '1.5-A6', column: 1, row: 4}, {id: '2.5-A6', column: 2, row: 4},
        {id: '1.4-A6', column: 1, row: 5}, {id: '2.4-A6', column: 2, row: 5},
        {id: '1.3-A6', column: 1, row: 6}, {id: '2.3-A6', column: 2, row: 6},
        {id: '1.2-A6', column: 1, row: 7}, {id: '2.2-A6', column: 2, row: 7},
        {id: '1.1-A6', column: 1, row: 8}, {id: '2.1-A6', column: 2, row: 8},
        
        {id: '1.8-A5', column: 4, row: 1}, {id: '2.8-A5', column: 5, row: 1},
        {id: '1.7-A5', column: 4, row: 2}, {id: '2.7-A5', column: 5, row: 2},
        {id: '1.6-A5', column: 4, row: 3}, {id: '2.6-A5', column: 5, row: 3},
        {id: '1.5-A5', column: 4, row: 4}, {id: '2.5-A5', column: 5, row: 4},
        {id: '1.4-A5', column: 4, row: 5}, {id: '2.4-A5', column: 5, row: 5},
        {id: '1.3-A5', column: 4, row: 6}, {id: '2.3-A5', column: 5, row: 6},
        {id: '1.2-A5', column: 4, row: 7}, {id: '2.2-A5', column: 5, row: 7},
        {id: '1.1-A5', column: 4, row: 8}, {id: '2.1-A5', column: 5, row: 8},
        
        {id: '1.8-A4', column: 7, row: 1}, {id: '2.8-A4', column: 8, row: 1},
        {id: '1.7-A4', column: 7, row: 2}, {id: '2.7-A4', column: 8, row: 2},
        {id: '1.6-A4', column: 7, row: 3}, {id: '2.6-A4', column: 8, row: 3},
        {id: '1.5-A4', column: 7, row: 4}, {id: '2.5-A4', column: 8, row: 4},
        {id: '1.4-A4', column: 7, row: 5}, {id: '2.4-A4', column: 8, row: 5},
        {id: '1.3-A4', column: 7, row: 6}, {id: '2.3-A4', column: 8, row: 6},
        {id: '1.2-A4', column: 7, row: 7}, {id: '2.2-A4', column: 8, row: 7},
        {id: '1.1-A4', column: 7, row: 8}, {id: '2.1-A4', column: 8, row: 8},
        
        {id: '1.8-A3', column: 10, row: 1}, {id: '2.8-A3', column: 11, row: 1},
        {id: '1.7-A3', column: 10, row: 2}, {id: '2.7-A3', column: 11, row: 2},
        {id: '1.6-A3', column: 10, row: 3}, {id: '2.6-A3', column: 11, row: 3},
        {id: '1.5-A3', column: 10, row: 4}, {id: '2.5-A3', column: 11, row: 4},
        {id: '1.4-A3', column: 10, row: 5}, {id: '2.4-A3', column: 11, row: 5},
        {id: '1.3-A3', column: 10, row: 6}, {id: '2.3-A3', column: 11, row: 6},
        {id: '1.2-A3', column: 10, row: 7}, {id: '2.2-A3', column: 11, row: 7},
        {id: '1.1-A3', column: 10, row: 8}, {id: '2.1-A3', column: 11, row: 8},
        
        {id: '1.8-A2', column: 13, row: 1}, {id: '2.8-A2', column: 14, row: 1},
        {id: '1.7-A2', column: 13, row: 2}, {id: '2.7-A2', column: 14, row: 2},
        {id: '1.6-A2', column: 13, row: 3}, {id: '2.6-A2', column: 14, row: 3},
        {id: '1.5-A2', column: 13, row: 4}, {id: '2.5-A2', column: 14, row: 4},
        {id: '1.4-A2', column: 13, row: 5}, {id: '2.4-A2', column: 14, row: 5},
        {id: '1.3-A2', column: 13, row: 6}, {id: '2.3-A2', column: 14, row: 6},
        {id: '1.2-A2', column: 13, row: 7}, {id: '2.2-A2', column: 14, row: 7},
        {id: '1.1-A2', column: 13, row: 8}, {id: '2.1-A2', column: 14, row: 8},
        
        {id: '1.8-A1', column: 16, row: 1}, {id: '2.8-A1', column: 17, row: 1},
        {id: '1.7-A1', column: 16, row: 2}, {id: '2.7-A1', column: 17, row: 2},
        {id: '1.6-A1', column: 16, row: 3}, {id: '2.6-A1', column: 17, row: 3},
        {id: '1.5-A1', column: 16, row: 4}, {id: '2.5-A1', column: 17, row: 4},
        {id: '1.4-A1', column: 16, row: 5}, {id: '2.4-A1', column: 17, row: 5},
        {id: '1.3-A1', column: 16, row: 6}, {id: '2.3-A1', column: 17, row: 6},
        {id: '1.2-A1', column: 16, row: 7}, {id: '2.2-A1', column: 17, row: 7},
        {id: '1.1-A1', column: 16, row: 8}, {id: '2.1-A1', column: 17, row: 8},

    ];

    createSeats(topSeatsContainer, topSeatsLayout, 'top-seat');
    createSeats(leftSeatsContainer, leftSeatsLayout, 'left-seat');
    createSeats(bottomSeatsContainer, bottomSeatsLayout, 'bottom-seat');

    payButton.addEventListener('click', () => {
        const selectedSeats = document.querySelectorAll('.seat.selected, .top-seat.selected, .left-seat.selected, .bottom-seat.selected');
        const seatNumbers = Array.from(selectedSeats).map(seat => seat.dataset.seatNumber);
        // alert(`Seats selected: ${seatNumbers.join(', ')}`);

        // Create a form dynamically
        const form = document.createElement('form');
        form.method = 'POST';
        form.action = 'reservation/reservation.php';

        // Create a hidden input to hold the seat numbers
        const input = document.createElement('input');
        input.type = 'hidden';
        input.name = 'seats';
        input.value = seatNumbers.join(',');

        // Append the input to the form
        form.appendChild(input);

        // Append the form to the body and submit the form
        document.body.appendChild(form);
        form.submit();
    });
});
