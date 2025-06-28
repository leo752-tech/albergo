const monthYearDisplay = document.getElementById('monthYearDisplay');
const calendarGrid = document.getElementById('calendarGrid');
const prevMonthBtn = document.getElementById('prevMonth');
const nextMonthBtn = document.getElementById('nextMonth');
const prevYearBtn = document.getElementById('prevYear');
const nextYearBtn = document.getElementById('nextYear');

let currentDate = new Date();

const monthNames = [
    'Gennaio', 'Febbraio', 'Marzo', 'Aprile', 'Maggio', 'Giugno',
    'Luglio', 'Agosto', 'Settembre', 'Ottobre', 'Novembre', 'Dicembre'
];
const dayNames = ['Lun', 'Mar', 'Mer', 'Gio', 'Ven', 'Sab', 'Dom'];


function isDateBooked(dateStr) {
    const date = new Date(dateStr);
    return bookings.some(b => {
        const checkIn = new Date(b.checkIn);
        const checkOut = new Date(b.checkOut);
        return date >= checkIn && date < checkOut;
    });
}

function renderCalendar() {
    calendarGrid.innerHTML = '';

    const year = currentDate.getFullYear();
    const month = currentDate.getMonth();

    monthYearDisplay.textContent = `${monthNames[month]} ${year}`;

    dayNames.forEach(day => {
        const dayHeader = document.createElement('div');
        dayHeader.classList.add('day-header');
        dayHeader.textContent = day;
        calendarGrid.appendChild(dayHeader);
    });

    const firstDayOfMonth = new Date(year, month, 1).getDay();
    const startDayIndex = (firstDayOfMonth === 0) ? 6 : firstDayOfMonth - 1;

    for (let i = 0; i < startDayIndex; i++) {
        const emptyDay = document.createElement('div');
        emptyDay.classList.add('day-box', 'empty-day');
        calendarGrid.appendChild(emptyDay);
    }

    const daysInMonth = new Date(year, month + 1, 0).getDate();

    for (let i = 1; i <= daysInMonth; i++) {
        const dayBox = document.createElement('a');
        dayBox.classList.add('day-box');
        dayBox.textContent = i;

        const formattedDate = `${year}-${String(month + 1).padStart(2, '0')}-${String(i).padStart(2, '0')}`;
        dayBox.href = `/albergoPulito/public/Admin/showBookingDetail/${formattedDate}`;

        if (isDateBooked(formattedDate)) {
            dayBox.classList.add('booked');
        } else {
            dayBox.classList.add('available');
        }

        calendarGrid.appendChild(dayBox);
    }
}


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


console.log("Dati prenotazioni ricevuti:", bookings);
bookings.forEach((b, i) => {
    console.log(`Prenotazione ${i}:`, JSON.stringify(b));
});


renderCalendar();