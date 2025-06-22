

{include file='header_admin.tpl'}

<div class="container">
    <h2>Gestione Politiche di Prezzo</h2>

    

    <h3>Aggiungi Nuova Politica di Prezzo / Offerta</h3>
    <div class="form-grid mb-4">
        <form action="/albergoPulito/public/Admin/showInsertOffer" method="POST">
            <div class="form-group">
                <label for="policyName">Nome Politica/Offerta:</label>
                <input type="text" class="form-control" id="policyName" name="policyName" value="{$formData.policyName|default:''}" required>
            </div>
            <div class="form-group">
                <label for="discountType">Tipo di Sconto:</label>
                <select class="form-control" id="discountType" name="discountType" required>
                    <option value="">Seleziona tipo</option>
                    <option value="percentage" {if $formData.discountType eq 'percentage'}selected{/if}>Percentuale (%)</option>
                    <option value="fixed_amount" {if $formData.discountType eq 'fixed_amount'}selected{/if}>Importo Fisso (€)</option>
                </select>
            </div>
            <div class="form-group">
                <label for="discountValue">Valore Sconto:</label>
                <input type="number" step="0.01" class="form-control" id="discountValue" name="discountValue" value="{$formData.discountValue|default:''}" required min="0">
            </div>
            <div class="form-group">
                <label for="startDate">Data Inizio:</label>
                <input type="date" class="form-control" id="startDate" name="startDate" value="{$formData.startDate|default:''}" required>
            </div>
            <div class="form-group">
                <label for="endDate">Data Fine:</label>
                <input type="date" class="form-control" id="endDate" name="endDate" value="{$formData.endDate|default:''}" required>
            </div>
            <div class="form-group">
                <label for="minNights">Notti Minime (Opzionale):</label>
                <input type="number" class="form-control" id="minNights" name="minNights" value="{$formData.minNights|default:''}" min="0">
            </div>
            <div class="form-group full-width">
                <label for="description">Descrizione (Opzionale):</label>
                <textarea class="form-control" id="description" name="description" rows="3">{$formData.description|default:''}</textarea>
            </div>
            <div class="form-group full-width">
                <button type="submit" class="btn btn-success">Aggiungi Politica</button>
            </div>
        </form>
    </div>

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
                                {if $policy->getDescription() eq 'percentage'}
                                    {$policy->getDescription()|default:$policy.discountValue}%
                                {else}
                                    {$policy->getDescription()|string_format:"%.2f"|default:'0.00'} €
                                {/if}
                            </td>
                           <td>{$policy->getLength()|default:$policy.length|default:'N/A'}</td>
                            <td>
                                <a href="/albergoPulito/public/Admin/showUpdate{$policy->getIdSpecialOffer()|default:$policy.idPolicy}" class="btn btn-primary btn-sm">Modifica</a>
                                <form action="/albergoPulito/public/Admin/deleteOffer" method="POST" style="display:inline-block;">
                                    <input type="hidden" name="idPolicy" value="{$policy->getIdSpecialOffer()|default:$policy.idPolicy}">
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