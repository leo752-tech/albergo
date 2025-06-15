{include file='header.tpl'}

<section id="rooms-list" class="container section-padding">
    <h2>Le Nostre Camere</h2>
    <p>Scopri il comfort e l'eleganza delle nostre sistemazioni, pensate per ogni tipo di viaggiatore.</p>

    <div class="room-grid">
        {foreach $rooms as $room}
            <div class="room-card">
                <img src="assets/img/camera1.jpg" alt="{$room->getName()}">
                <h3>{$room->getName()} ({$room->getType()})</h3>
                <p>Posti letto: {$room->getBeds()}</p>
                <p class="price">Prezzo a notte: &euro;{$room->getPrice()|string_format:"%.2f"}</p>
                <a href="prenota.php?room_id={$room->getId()}" class="btn btn-primary">Dettagli & Prenota</a>
            </div>
        {/foreach}
    </div>
</section>

{include file='footer.tpl'}