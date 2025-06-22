
{include file='header_admin.tpl' pageTitle='Gestione Utenti'}

<h2>Gestione Utenti</h2>



<a href="/albergoPulito/public/Admin/showInsertUser" class="btn btn-success mb-3"><i class="fas fa-plus"></i> Aggiungi Nuovo Utente</a>

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
                <a href="/albergoPulito/public/Admin/showUpdateUser/{$user->getIdUser()}" class="btn btn-sm btn-primary">Modifica</a>
                <a href="/albergoPulito/public/Admin/deleteUser/{$user->getIdUser()}" class="btn btn-sm btn-danger">Elimina</a>
            </td>
        </tr>
        {foreachelse}
        <tr>
            <td colspan="6">Nessun utente trovato.</td>
        </tr>
        {/foreach}
    </tbody>
</table>

<div class="container">
    <h2>Utenti Registrati e Prenotazioni</h2>


    <div class="table-responsive">
        <table class="admin-table">
            <thead>
                <tr>
                    <th>ID UTENTE</th>
                    <th>NOME</th>
                    <th>COGNOME</th>
                    <th>EMAIL</th>
                    <th>NUM. PRENOTAZIONI</th>
                    <th>AZIONI</th>
                </tr>
            </thead>
            <tbody>
                {* Presuppone che $users sia un array di oggetti/array con i dettagli utente e un campo 'numBookings' *}
                {if !empty($registeredUsers)}
                    {foreach $registeredUsers as $user}
                        <tr>
                            <td>{$user->getIdRegisteredUser()|default:$user.idUser}</td>
                            <td>{$user->getFirstName()|default:$user.firstName}</td>
                            <td>{$user->getLastName()|default:$user.lastName}</td>
                            <td>{$user->getEmail()|default:$user.email}</td>
                            <td>
                                <a href="{$base_url}admin/edit_user.php?id={$user->getIdUser()|default:$user.idUser}" class="btn btn-primary btn-sm">Modifica</a>
                                <form action="/albergoPulito/public/Admin/delete_user.php" method="POST" style="display:inline-block;">
                                    <input type="hidden" name="idUser" value="{$user->getIdUser()|default:$user.idUser}">
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Sei sicuro di voler eliminare questo utente? Tutte le sue prenotazioni saranno cancellate.');">Elimina</button>
                                </form>
                            </td>
                        </tr>
                    {/foreach}
                {else}
                    <tr>
                        <td colspan="6" class="text-center">Nessun utente registrato trovato o nessun utente con prenotazioni.</td>
                    </tr>
                {/if}
            </tbody>
        </table>
    </div>
</div>

{include file='footer_admin.tpl'}
