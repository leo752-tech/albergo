

{include file='admin/header_admin.tpl' pageTitle='Modifica Servizio'}

<div class="container-fluid">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Modifica Servizio</h1>
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
        <form action="{$base_url}admin/process_edit_service.php?id={$service->getIdService()|default:''}" method="POST">
            <input type="hidden" name="idService" value="{$service->getIdService()|default:''}">
            
            <div class="form-group">
                <label for="name">Nome Servizio:</label>
                <input type="text" class="form-control" id="name" name="name" value="{$service->getName()|default:''}" required>
            </div>
            <div class="form-group">
                <label for="description">Descrizione (Opzionale):</label>
                <textarea class="form-control" id="description" name="description" rows="3">{$service->getDescription()|default:''}</textarea>
            </div>
            <div class="form-group">
                <label for="price">Prezzo (€):</label>
                <input type="number" step="0.01" class="form-control" id="price" name="price" value="{$service->getPrice()|string_format:'%.2f'|default:''}" min="0">
            </div>
            <div class="form-group">
                <label for="available">Disponibile:</label>
                <select class="form-control" id="available" name="available" required>
                    <option value="1" {if $service->isAvailable() eq 1}selected{/if}>Sì</option>
                    <option value="0" {if $service->isAvailable() eq 0}selected{/if}>No</option>
                </select>
            </div>
            <div class="form-group full-width">
                <button type="submit" class="btn btn-primary">Salva Modifiche</button>
                <a href="{$base_url}admin/services.php" class="btn btn-secondary">Annulla</a>
            </div>
        </form>
    </div>
</div>

{include file='admin/footer_admin.tpl'}