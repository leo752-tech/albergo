<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendario Dinamico</title>
    <link rel="stylesheet" href="/albergoPulito/public/assets/css/calendar.css">
</head>
<body>
    <div class="calendar-container">
        <div class="calendar-header">
            <button id="prevMonth">Mese Precedente</button>
            <button id="prevYear">Anno Precedente</button>
            <h2 id="monthYearDisplay"></h2>
            <button id="nextYear">Anno Successivo</button>
            <button id="nextMonth">Mese Successivo</button>
        </div>
        <div class="calendar-grid" id="calendarGrid"></div>
    </div>
    
    <div style="text-align: center; margin-top: 20px;">
        <a href="/albergoPulito/public/Admin/dashboard">
            <button>Vai alla Dashboard Admin</button>
        </a>
    </div>

    <script>
        const bookings = {$bookingsArray|@json_encode nofilter};
    </script>
    <script src="/albergoPulito/public/assets/js/calendar.js" defer></script>
</body>
</html>