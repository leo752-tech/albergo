

{include file='header_admin.tpl'  pageTitle='manage Offers'}

<div class="container">
    <h2>Gestione Politiche di Prezzo</h2>

    

    <a href="/albergoPulito/public/Admin/showInsertOffer" class="btn btn-primary">
    Aggiungi Nuova Politica di Prezzo
    </a>

    <h3>Politiche di Prezzo Esistenti</h3>
    <div class="table-responsive">
        <table class="admin-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NOME</th>
                    <th>DESCRIZIONE</th>
                    <th>PREZZO</th>
                    <th>MIN. NOTTI</th>
                    <th>AZIONI</th>
                </tr>
            </thead>
            <tbody>
                {* Presuppone che $pricePolicies sia un array di oggetti/array *}
                {if !empty($policies)}
                    {foreach $policies as $policy}
                        <tr>
                            <td>{$policy->getIdSpecialOffer()|default:$policy.idPolicy}</td>
                            <td>{$policy->getTitle()|default:$policy.title}</td>
                            <td>{$policy->getDescription()|default:$policy.description}</td>
                            <td>
                                {if $policy->getSpecialPrice() eq 'percentage'}
                                    {$policy->getSpecialPrice()|default:$policy.discountValue}%
                                {else}
                                    {$policy->getSpecialPrice()|string_format:"%.2f"|default:'0.00'} €
                                {/if}
                            </td>
                           <td>{$policy->getLength()|default:$policy.length|default:'N/A'}</td>
                            <td>
                                <a href="/albergoPulito/public/Admin/showUpdateOffer/{$policy->getIdSpecialOffer()}" class="btn btn-primary btn-sm">Modifica</a>
                                <form action="/albergoPulito/public/Admin/deleteOffer" method="POST" style="display:inline-block;">
                                    <input type="hidden" name="idPolicy" value="{$policy->getIdSpecialOffer()}">
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Sei sicuro di voler eliminare questa politica di prezzo?');">Elimina</button>
                                </form>
                            </td>
                        </tr>
                    {/foreach}
                {else}
                    <tr>
                        <td colspan="8" class="text-center">Nessuna politica di prezzo o offerta registrata.</td>
                    </tr>
                {/if}
            </tbody>
        </table>
    </div>
</div>

{include file='footer_admin.tpl'}