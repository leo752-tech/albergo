

{include file='admin/header_admin.tpl' pageTitle='Gestione Servizi'}

<div class="container">
    <h2>Gestione Servizi</h2>

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

    <h3>Aggiungi Nuovo Servizio</h3>
    <div class="form-grid mb-4">
        <form action="{$base_url}admin/process_add_service.php" method="POST">
            <div class="form-group">
                <label for="name">Nome Servizio:</label>
                <input type="text" class="form-control" id="name" name="name" value="{$formData.name|default:''}" required>
            </div>
            <div class="form-group">
                <label for="description">Descrizione (Opzionale):</label>
                <textarea class="form-control" id="description" name="description" rows="3">{$formData.description|default:''}</textarea>
            </div>
            <div class="form-group">
                <label for="price">Prezzo (€):</label>
                <input type="number" step="0.01" class="form-control" id="price" name="price" value="{$formData.price|default:''}" min="0">
            </div>
            <div class="form-group">
                <label for="available">Disponibile:</label>
                <select class="form-control" id="available" name="available" required>
                    <option value="1" {if $formData.available eq 1}selected{/if}>Sì</option>
                    <option value="0" {if $formData.available eq 0}selected{/if}>No</option>
                </select>
            </div>
            <div class="form-group full-width">
                <button type="submit" class="btn btn-success">Aggiungi Servizio</button>
            </div>
        </form>
    </div>

    <h3>Servizi Esistenti</h3>
    <div class="table-responsive">
        <table class="admin-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NOME</th>
                    <th>DESCRIZIONE</th>
                    <th>PREZZO</th>
                    <th>DISPONIBILE</th>
                    <th>AZIONI</th>
                </tr>
            </thead>
            <tbody>
                {* Presuppone che $services sia un array di oggetti/array che rappresentano i servizi *}
                {if !empty($services)}
                    {foreach $services as $service}
                        <tr>
                            <td>{$service->getIdService()|default:$service.idService}</td>
                            <td>{$service->getName()|default:$service.name}</td>
                            <td>{$service->getDescription()|default:$service.description}</td>
                            <td>{$service->getPrice()|string_format:"%.2f"|default:'N/A'} €</td>
                            <td>{if $service->isAvailable()|default:$service.available}Sì{else}No{/if}</td>
                            <td>
                                <a href="{$base_url}admin/edit_service.php?id={$service->getIdService()|default:$service.idService}" class="btn btn-primary btn-sm">Modifica</a>
                                <form action="{$base_url}admin/delete_service.php" method="POST" style="display:inline-block;">
                                    <input type="hidden" name="idService" value="{$service->getIdService()|default:$service.idService}">
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Sei sicuro di voler eliminare questo servizio?');">Elimina</button>
                                </form>
                            </td>
                        </tr>
                    {/foreach}
                {else}
                    <tr>
                        <td colspan="6" class="text-center">Nessun servizio registrato.</td>
                    </tr>
                {/if}
            </tbody>
        </table>
    </div>
</div>

{include file='admin/footer_admin.tpl'}