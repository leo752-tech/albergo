{include file='header.tpl'}

<section id="booking-form" class="container section-padding">
    <h2>Prenota il Tuo Soggiorno</h2>
    <form action="/albergoPulito/public/Booking/getAvailableRooms" method="POST" class="form-grid">
        <div class="form-group">
            <label for="check-in">Data Check-in:</label>
            <input type="date" id="check-in" name="data_check_in" required>
        </div>
        <div class="form-group">
            <label for="check-out">Data Check-out:</label>
            <input type="date" id="check-out" name="data_check_out" required>
        </div>
        <div class="form-group">
            <label for="num-adults">Adulti:</label>
            <input type="number" id="num-adults" name="num_adulti" min="1" value="1" required>
        </div>

        <div class="form-group full-width">
            <button type="submit" class="btn btn-primary">Cerca camere</button>
        </div>
    </form>
</section>

{include file='footer.tpl'}