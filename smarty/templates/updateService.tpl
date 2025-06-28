{include file='header_admin.tpl'}
<h3>Modifica Servizio</h3>
    <div class="form-grid mb-4">
        <form action="/albergoPulito/public/Admin/updateService" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">Nome Servizio:</label>
                <input type="text" class="form-control" id="name" name="name" value="{$service->getName()|default:''}">
            </div>
            <div class="form-group">
                <label for="description">Descrizione (Opzionale):</label>
                <textarea class="form-control" id="description" name="description" value="{$service->getDescription()|default:''}"  rows="3"></textarea>
            </div>
            <div class="form-group">
                <label for="price">Prezzo (€):</label>
                <input type="number" step="0.01" class="form-control" id="price" name="price" value="{$service->getPrice()|default:''}"  min="0">
            </div>
            <div class="form-group full-width">
                <label for="service_image">Immagine Servizio:</label> 
                <input type="file" class="form-control-file" id="service_image" name="pathImage" accept="image/*">
                <small class="form-text text-muted">Carica un'immagine per il servizio.</small>
            </div>
            <div class="form-group full-width">
                <button type="submit" class="btn btn-success">Aggiungi Servizio</button>
            </div>
        </form>
    </div>

{include file='footer_admin.tpl'}