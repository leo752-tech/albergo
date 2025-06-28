
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
    <h2>Utenti Registrati</h2>

    <a href="/albergoPulito/public/Admin/showInsertRegisteredUser" class="btn btn-success mb-3"><i class="fas fa-plus"></i> Aggiungi Nuovo Utente Registrato</a>

    <div class="table-responsive">
        <table class="admin-table">
            <thead>
                <tr>
                    <th>ID UTENTE</th>
                    <th>NOME</th>
                    <th>COGNOME</th>
                    <th>EMAIL</th>
                    <th>STATO</th> {* <-- NUOVA COLONNA *}
                    <th>AZIONI</th>
                </tr>
            </thead>
            <tbody>  
                {if !empty($registeredUsers)}
                    {foreach $registeredUsers as $user}
                        <tr>
                            <td>{$user->getIdRegisteredUser()|default:$user.idUser}</td>
                            <td>{$user->getFirstName()|default:$user.firstName}</td>
                            <td>{$user->getLastName()|default:$user.lastName}</td>
                            <td>{$user->getEmail()|default:$user.email}</td>
                            <td> {* <-- NUOVA CELLE CON LO STATO *}
                                {if $user->getIsBanned()}
                                    <span class="status-banned">Bannato</span>
                                {else}
                                    <span class="status-active">Attivo</span>
                                {/if}
                            </td>
                            <td>
                                <a href="/albergoPulito/public/Admin/showUpdateRegisteredUser/{$user->getIdRegisteredUser()}" class="btn btn-primary btn-sm">Modifica</a>
                                {* Modifica il form per il ban/unban *}
                                <form action="/albergoPulito/public/Admin/{if $user->getIsBanned()}unBanRegisteredUser{else}banRegisteredUser{/if}/{$user->getIdRegisteredUser()}" method="POST" style="display:inline-block;">
                                    <input type="hidden" name="idUser" value="{$user->getIdRegisteredUser()}"> {* Assicurati che l'ID sia passato *}
                                    <button type="submit" class="btn {if $user->getIsBanned()}btn-secondary{else}btn-danger{/if} btn-sm" onclick="return confirm('Sei sicuro di voler {if $user->getIsBanned()}sbloccare{else}bannare{/if} questo utente?');">
                                        {if $user->getIsBanned()}Sblocca{else}Banna{/if}
                                    </button>
                                </form>
                            </td>
                        </tr>
                    {/foreach}
                {else}
                    <tr>
                        <td colspan="6" class="text-center">Nessun utente registrato trovato.</td> {* Aggiornata colspan *}
                    </tr>
                {/if}
            </tbody>
        </table>
    </div>
</div>

{include file='footer_admin.tpl'}
