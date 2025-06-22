{include file='header_admin.tpl'}
<h3>Aggiungi Nuovo Servizio</h3>
    <div class="form-grid mb-4">
        <form action="/albergoPulito/public/Admin/updateService" method="POST">
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

{include file='footer_admin.tpl'}