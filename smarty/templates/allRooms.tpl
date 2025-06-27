{include file='header.tpl'}
<section id="all-rooms" class="container section-padding">
    <h2>Tutte le Camere Disponibili</h2>
    <div class="rooms-grid">
        {* Ciclo su ogni oggetto ERoom nell'array 'rooms' *}
        {foreach from=$rooms item=room}
            <div class="room-card">
                <img src="{$room[1][0]->getFilePath()}" alt="{$room[0]->getName()}">
                <h3>{$room[0]->getName()}</h3>
                <p>{$room[0]->getDescription()}</p>
                <a href="/albergoPulito/public/Booking/showDetailRoomWB/{$room[0]->getId()}" class="btn btn-secondary">Scopri di più</a>
            </div>
        {/foreach}
    </div>
    <div class="text-center">
        <a href="/albergoPulito/public/" class="btn btn-primary">Torna alla home</a>
    </div>
</section>
{include file='footer.tpl'}