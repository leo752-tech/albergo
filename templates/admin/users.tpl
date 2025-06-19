{include file='admin/header_admin.tpl' pageTitle='Gestione Utenti'}

<h2>Gestione Utenti</h2>

<a href="/hotel_reservation/admin/add_user.php" class="btn btn-success mb-3"><i class="fas fa-plus"></i> Aggiungi Nuovo Utente</a>

<table class="admin-table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Cognome</th>
            <th>Data di Nascita</th>
            <th>Luogo di Nascita</th>
            <th>Azioni</th>
        </tr>
    </thead>
    <tbody>
        {foreach $users as $user}
        <tr>
            <td>{$user->getIdUser()}</td>
            <td>{$user->getFirstName()}</td>
            <td>{$user->getLastName()}</td>
            <td>{$user->getBirthDate()->format('Y-m-d')}</td>
            <td>{$user->getBirthPlace()}</td>
            <td>
                <a href="/hotel_reservation/admin/edit_user.php?id={$user->getIdUser()}" class="btn btn-sm btn-primary">Modifica</a>
                <a href="/hotel_reservation/admin/delete_user.php?id={$user->getIdUser()}" class="btn btn-sm btn-danger">Elimina</a>
            </td>
        </tr>
        {foreachelse}
        <tr>
            <td colspan="6">Nessun utente trovato.</td>
        </tr>
        {/foreach}
    </tbody>
</table>

{include file='admin/footer_admin.tpl'}