{include file='header.tpl' pageTitle='Camere - Nome Hotel'}

<section id="room-list" class="container section-padding">
    <h2>Le Nostre Camere</h2>
    <p>Esplora la nostra selezione di camere e suite, progettate per offrire il massimo del comfort e del relax durante il vostro soggiorno.</p>

    <div class="filter-options">
        <label for="room-type">Tipo:</label>
        <select id="room-type">
            <option value="">Tutti</option>
            <option value="singola">Singola</option>
            <option value="doppia">Doppia</option>
            <option value="suite">Suite</option>
        </select>
        <label for="room-capacity">Posti:</label>
        <input type="number" id="room-capacity" min="1">
        <button class="btn btn-secondary">Filtra</button>
    </div>

    <div class="room-grid">
        <article class="room-card" id="doppia">
            <img src="https://www.hotelnoventa.com/wp-content/uploads/2016/08/800_1673.jpg" alt="Camera Doppia Standard">
            <div class="room-info">
                <h3>Camera Doppia Standard</h3>
                <p>Ideale per coppie, dotata di letto matrimoniale, bagno privato e TV.</p>
                <ul>
                    <li><i class="fa fa-users"></i> Posti: 2</li>
                    <li><i class="fa fa-wifi"></i> Wi-Fi gratuito</li>
                    <li><i class="fa fa-snowflake"></i> Aria condizionata</li>
                </ul>
                <span class="price">€120/notte</span>
                <a href="prenota.php?camera_id=1" class="btn btn-primary">Prenota questa Camera</a>
            </div>
        </article>

        <article class="room-card" id="doppia">
            <img src="https://u.profitroom.pl/2020-lovechotel-com/thumb/1920x1080/uploads/rooms/Hotel_lovec_rooms_20.jpg" alt="Camera Doppia Standard">
            <div class="room-info">
                <h3>Camera Doppia Standard</h3>
                <p>Ideale per coppie, dotata di letto matrimoniale, bagno privato e TV.</p>
                <ul>
                    <li><i class="fa fa-users"></i> Posti: 2</li>
                    <li><i class="fa fa-wifi"></i> Wi-Fi gratuito</li>
                    <li><i class="fa fa-snowflake"></i> Aria condizionata</li>
                </ul>
                <span class="price">€120/notte</span>
                <a href="prenota.php?camera_id=1" class="btn btn-primary">Prenota questa Camera</a>
            </div>
        </article>

        <article class="room-card" id="doppia">
            <img src="https://www.hotelkingmilano.com/wp-content/uploads/sites/467/2022/07/Hotel_king_doppia_slide2-2200x1200.jpg" alt="Camera Doppia Standard">
            <div class="room-info">
                <h3>Camera Doppia Standard</h3>
                <p>Ideale per coppie, dotata di letto matrimoniale, bagno privato e TV.</p>
                <ul>
                    <li><i class="fa fa-users"></i> Posti: 2</li>
                    <li><i class="fa fa-wifi"></i> Wi-Fi gratuito</li>
                    <li><i class="fa fa-snowflake"></i> Aria condizionata</li>
                </ul>
                <span class="price">€120/notte</span>
                <a href="prenota.php?camera_id=1" class="btn btn-primary">Prenota questa Camera</a>
            </div>
        </article>

        <article class="room-card" id="doppia">
            <img src="https://www.hotelparkerroma.com/data/1366/Hotel-Parker-Roma-Camera-New-10.jpg" alt="Camera Doppia Standard">
            <div class="room-info">
                <h3>Camera Doppia Standard</h3>
                <p>Ideale per coppie, dotata di letto matrimoniale, bagno privato e TV.</p>
                <ul>
                    <li><i class="fa fa-users"></i> Posti: 2</li>
                    <li><i class="fa fa-wifi"></i> Wi-Fi gratuito</li>
                    <li><i class="fa fa-snowflake"></i> Aria condizionata</li>
                </ul>
                <span class="price">€120/notte</span>
                <a href="prenota.php?camera_id=1" class="btn btn-primary">Prenota questa Camera</a>
            </div>
        </article>

        <article class="room-card" id="suite">
            <img src="https://cdn-ickbl.nitrocdn.com/FnMGClZYPwbblKSNarxZTkAfIpQLXrDo/assets/images/optimized/rev-ad6dafa/www.gruppo5.it/wp-content/uploads/2018/07/suite-i-love-you-1.jpg" alt="Suite di Lusso">
            <div class="room-info">
                <h3>Suite Panoramica</h3>
                <p>Spaziosa suite con zona giorno separata, vasca idromassaggio e vista sulla città.</p>
                <ul>
                    <li><i class="fa fa-users"></i> Posti: 4</li>
                    <li><i class="fa fa-wifi"></i> Wi-Fi gratuito</li>
                    <li><i class="fa fa-snowflake"></i> Aria condizionata</li>
                    <li><i class="fa fa-bath"></i> Vasca idromassaggio</li>
                </ul>
                <span class="price">€250/notte</span>
                <a href="prenota.php?camera_id=2" class="btn btn-primary">Prenota questa Camera</a>
            </div>
        </article>
    </div>
</section>

{include file='footer.tpl'}