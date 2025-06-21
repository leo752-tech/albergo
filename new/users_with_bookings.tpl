

{include file='admin/header_admin.tpl' pageTitle='Utenti Registrati e Prenotazioni'}

<div class="container">
    <h2>Utenti Registrati e Prenotazioni</h2>

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
                {if !empty($users)}
                    {foreach $users as $user}
                        <tr>
                            <td>{$user->getIdUser()|default:$user.idUser}</td>
                            <td>{$user->getFirstName()|default:$user.firstName}</td>
                            <td>{$user->getLastName()|default:$user.lastName}</td>
                            <td>{$user->getEmail()|default:$user.email}</td>
                            <td>{$user->getNumBookings()|default:$user.numBookings|default:0}</td>
                            <td>
                                <a href="{$base_url}admin/edit_user.php?id={$user->getIdUser()|default:$user.idUser}" class="btn btn-primary btn-sm">Modifica</a>
                                <form action="{$base_url}admin/delete_user.php" method="POST" style="display:inline-block;">
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

{include file='admin/footer_admin.tpl'}