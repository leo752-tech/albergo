
        const monthYearDisplay = document.getElementById('monthYearDisplay');
        const calendarGrid = document.getElementById('calendarGrid');
        const prevMonthBtn = document.getElementById('prevMonth');
        const nextMonthBtn = document.getElementById('nextMonth');
        const prevYearBtn = document.getElementById('prevYear');
        const nextYearBtn = document.getElementById('nextYear');

        let currentDate = new Date(); // Inizia con la data corrente

        const monthNames = [
            'Gennaio', 'Febbraio', 'Marzo', 'Aprile', 'Maggio', 'Giugno',
            'Luglio', 'Agosto', 'Settembre', 'Ottobre', 'Novembre', 'Dicembre'
        ];
        const dayNames = ['Lun', 'Mar', 'Mer', 'Gio', 'Ven', 'Sab', 'Dom'];

        function renderCalendar() {
            calendarGrid.innerHTML = ''; // Pulisce la griglia esistente

            const year = currentDate.getFullYear();
            const month = currentDate.getMonth(); // 0 per Gennaio, 11 per Dicembre

            monthYearDisplay.textContent = `${monthNames[month]} ${year}`;

            // Aggiungi gli header dei giorni della settimana
            dayNames.forEach(day => {
                const dayHeader = document.createElement('div');
                dayHeader.classList.add('day-header');
                dayHeader.textContent = day;
                calendarGrid.appendChild(dayHeader);
            });

            // Calcola il primo giorno del mese (0=Domenica, 1=Lunedì, ecc.)
            const firstDayOfMonth = new Date(year, month, 1).getDay();
            // In JavaScript, getDay() restituisce 0 per Domenica, 1 per Lunedì...
            // Per allineare con Lunedì come primo giorno, aggiustiamo:
            const startDayIndex = (firstDayOfMonth === 0) ? 6 : firstDayOfMonth - 1; // 0=Lun, 6=Dom

            // Aggiungi le caselle vuote prima del primo giorno del mese
            for (let i = 0; i < startDayIndex; i++) {
                const emptyDay = document.createElement('div');
                emptyDay.classList.add('day-box', 'empty-day');
                calendarGrid.appendChild(emptyDay);
            }

            // Calcola il numero di giorni nel mese corrente
            const daysInMonth = new Date(year, month + 1, 0).getDate();

            // Genera le caselle per ogni giorno del mese
            for (let i = 1; i <= daysInMonth; i++) {
                const dayBox = document.createElement('a');
                dayBox.classList.add('day-box');
                dayBox.textContent = i;

                // Formatta la data per il link (es. 2025-06-08)
                const formattedDate = `${year}-${String(month + 1).padStart(2, '0')}-${String(i).padStart(2, '0')}`;
                dayBox.href = `/albergoPulito/public/Admin/showBookingDetail/${formattedDate}`;

                calendarGrid.appendChild(dayBox);
            }
        }

        // Gestori eventi per i bottoni di navigazione
        prevMonthBtn.addEventListener('click', () => {
            currentDate.setMonth(currentDate.getMonth() - 1);
            renderCalendar();
        });

        nextMonthBtn.addEventListener('click', () => {
            currentDate.setMonth(currentDate.getMonth() + 1);
            renderCalendar();
        });

        prevYearBtn.addEventListener('click', () => {
            currentDate.setFullYear(currentDate.getFullYear() - 1);
            renderCalendar();
        });

        nextYearBtn.addEventListener('click', () => {
            currentDate.setFullYear(currentDate.getFullYear() + 1);
            renderCalendar();
        });

        // Renderizza il calendario iniziale
        renderCalendar();