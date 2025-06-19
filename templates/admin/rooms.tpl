{include file='admin/header_admin.tpl' pageTitle=$pageTitle}

<h2>Gestione Camere</h2>

<a href="/hotel_reservation/admin/add_room.php" class="btn btn-success mb-3"><i class="fas fa-plus"></i> Aggiungi Nuova Camera</a>

{if $errorMessage}
    <div class="alert alert-danger" role="alert">
        {$errorMessage}
    </div>
{/if}
{if $successMessage}
    <div class="alert alert-success" role="alert">
        {$successMessage}
    </div>
{/if}

<table class="admin-table">
    <thead>
        <tr>
            <th>ID Camera</th>      <th>Nome</th>          <th>Posti Letto</th>   <th>Prezzo Notte</th>  <th>Tipo</th>          <th>Azioni</th>
        </tr>
    </thead>
    <tbody>
        {if $rooms}
            {foreach $rooms as $room}
            <tr>
                <td>{$room->getId()}</td>           <td>{$room->getName()}</td>         <td>{$room->getBeds()}</td>         <td>{$room->getPrice()|string_format:"%.2f"} €</td> <td>{$room->getType()}</td>         <td>
                    <a href="/hotel_reservation/admin/edit_room.php?id={$room->getId()}" class="btn btn-sm btn-primary">Modifica</a>
                    <a href="/hotel_reservation/admin/delete_room.php?id={$room->getId()}" class="btn btn-sm btn-danger">Elimina</a>
                </td>
            </tr>
            {/foreach}
        {else}
            <tr>
                <td colspan="6">Nessuna camera trovata.</td>
            </tr>
        {/if}
    </tbody>
</table>

{include file='admin/footer_admin.tpl'}