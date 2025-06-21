

{include file='admin/header_admin.tpl' pageTitle='Gestione Politiche di Prezzo'}

<div class="container">
    <h2>Gestione Politiche di Prezzo</h2>

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

    <h3>Aggiungi Nuova Politica di Prezzo / Offerta</h3>
    <div class="form-grid mb-4">
        <form action="{$base_url}admin/process_add_price_policy.php" method="POST">
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
                    <th>TIPO SCONTO</th>
                    <th>VALORE</th>
                    <th>INIZIO</th>
                    <th>FINE</th>
                    <th>MIN. NOTTI</th>
                    <th>AZIONI</th>
                </tr>
            </thead>
            <tbody>
                {* Presuppone che $pricePolicies sia un array di oggetti/array *}
                {if !empty($pricePolicies)}
                    {foreach $pricePolicies as $policy}
                        <tr>
                            <td>{$policy->getIdPolicy()|default:$policy.idPolicy}</td>
                            <td>{$policy->getName()|default:$policy.name}</td>
                            <td>{$policy->getDiscountType()|default:$policy.discountType}</td>
                            <td>
                                {if $policy->getDiscountType() eq 'percentage'}
                                    {$policy->getDiscountValue()|default:$policy.discountValue}%
                                {else}
                                    {$policy->getDiscountValue()|string_format:"%.2f"|default:'0.00'} €
                                {/if}
                            </td>
                            <td>{$policy->getStartDate()|date_format:"%d/%m/%Y"|default:$policy.startDate}</td>
                            <td>{$policy->getEndDate()|date_format:"%d/%m/%Y"|default:$policy.endDate}</td>
                            <td>{$policy->getMinNights()|default:$policy.minNights|default:'N/A'}</td>
                            <td>
                                <a href="{$base_url}admin/edit_price_policy.php?id={$policy->getIdPolicy()|default:$policy.idPolicy}" class="btn btn-primary btn-sm">Modifica</a>
                                <form action="{$base_url}admin/delete_price_policy.php" method="POST" style="display:inline-block;">
                                    <input type="hidden" name="idPolicy" value="{$policy->getIdPolicy()|default:$policy.idPolicy}">
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

{include file='admin/footer_admin.tpl'}