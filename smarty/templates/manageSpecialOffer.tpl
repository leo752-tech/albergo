{include file='header_admin.tpl', pageTitle='manage specialoffer'}

<h2>Gestione OfferteSpeciali</h2>

<a href="/albergoPulito/public/Admin/showInsertOffer" class="btn btn-success mb-3"><i class="fas fa-plus"></i> Aggiungi Nuova Offerta</a>


<table class="admin-table">
    <thead>
        <tr>
            <th>ID OfferteSpeciali</th>      <th>Nome</th>          <th>Descrizione</th>          <th>Posti Letto</th>          <th>Durata</th>   <th>Prezzo Totale</th>          <th>Azioni</th>
        </tr>
    </thead>
    <tbody>
        {if !empty($specialOffers)}
            {foreach $specialOffers as $specialOffer}
            <tr>
                <td>{$specialOffer->getIdSpecialOffer()}</td>           <td>{$specialOffer->getTitle()}</td>         <td>{$specialOffer->getDescription()}</td>           <td>{$specialOffer->getBeds()}</td>       <td>{$specialOffer->getLength()}</td>        <td>{$specialOffer->getSpecialPrice()|string_format:"%.2f"} €</td>          <td>
                    <a href="/albergoPulito/public/Admin/showUpdateOffer/{$specialOffer->getIdSpecialOffer()}" class="btn btn-sm btn-primary">Vai</a>
                    <a href="/albergoPulito/public/Admin/deleteRoom/{$specialOffer->getIdSpecialOffer()}" class="btn btn-sm btn-danger">Elimina</a>
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

{include file='footer_admin.tpl'}