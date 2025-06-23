
{include file='admin/header_admin.tpl' pageTitle='Modifica Politica di Prezzo'}

<div class="container-fluid">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Modifica Politica di Prezzo</h1>
    </div>

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

    <div class="form-grid">
        <form action="{$base_url}admin/process_edit_price_policy.php?id={$policy->getIdPolicy()|default:''}" method="POST">
            <input type="hidden" name="idPolicy" value="{$policy->getIdPolicy()|default:''}">
            
            <div class="form-group">
                <label for="policyName">Nome Politica/Offerta:</label>
                <input type="text" class="form-control" id="policyName" name="policyName" value="{$policy->getName()|default:''}" required>
            </div>
            <div class="form-group">
                <label for="discountType">Tipo di Sconto:</label>
                <select class="form-control" id="discountType" name="discountType" required>
                    <option value="">Seleziona tipo</option>
                    <option value="percentage" {if $policy->getDiscountType() eq 'percentage'}selected{/if}>Percentuale (%)</option>
                    <option value="fixed_amount" {if $policy->getDiscountType() eq 'fixed_amount'}selected{/if}>Importo Fisso (€)</option>
                </select>
            </div>
            <div class="form-group">
                <label for="discountValue">Valore Sconto:</label>
                <input type="number" step="0.01" class="form-control" id="discountValue" name="discountValue" value="{$policy->getDiscountValue()|default:''}" required min="0">
            </div>
            <div class="form-group">
                <label for="startDate">Data Inizio:</label>
                <input type="date" class="form-control" id="startDate" name="startDate" value="{$policy->getStartDate()|default:''}" required>
            </div>
            <div class="form-group">
                <label for="endDate">Data Fine:</label>
                <input type="date" class="form-control" id="endDate" name="endDate" value="{$policy->getEndDate()|default:''}" required>
            </div>
            <div class="form-group">
                <label for="minNights">Notti Minime (Opzionale):</label>
                <input type="number" class="form-control" id="minNights" name="minNights" value="{$policy->getMinNights()|default:''}" min="0">
            </div>
            <div class="form-group full-width">
                <label for="description">Descrizione (Opzionale):</label>
                <textarea class="form-control" id="description" name="description" rows="3">{$policy->getDescription()|default:''}</textarea>
            </div>
            <div class="form-group full-width">
                <button type="submit" class="btn btn-primary">Salva Modifiche</button>
                <a href="{$base_url}admin/price_policies.php" class="btn btn-secondary">Annulla</a>
            </div>
        </form>
    </div>
</div>

{include file='admin/footer_admin.tpl'}