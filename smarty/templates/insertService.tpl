{include file='header_admin.tpl' pageTitle='insert Service'}

<h3>Aggiungi Nuovo Servizio</h3>
<div class="form-grid mb-4">
    <form action="/albergoPulito/public/Admin/insertService" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="name">Nome Servizio:</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="description">Descrizione:</label>
            <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
        </div>
        <div class="form-group">
            <label for="price">Prezzo (€):</label>
            <input type="number" step="0.01" class="form-control" id="price" name="price" min="0">
        </div>
        <div class="form-group full-width">
            <label for="service_image">Immagine Offerta:</label> 
            <input type="file" class="form-control-file" id="service_image" name="pathImage" accept="image/*">
            <small class="form-text text-muted">Carica un'immagine per il servizio.</small>
        </div>
        <div class="form-group full-width">
            <button type="submit" class="btn btn-success">Aggiungi Servizio</button>
            <a href="/albergoPulito/public/Admin/manageExtraServices" class="btn btn-secondary">Annulla</a>
        </div>
    </form>
</div>

{include file='footer_admin.tpl'}
