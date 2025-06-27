{include file='header_admin.tpl'}

<h3>Aggiungi Nuova Politica di Prezzo / Offerta</h3>
<div class="form-grid mb-4">
    <form action="/albergoPulito/public/Admin/insertOffer" method="POST" enctype="multipart/form-data"> 
        <div class="form-group">
            <label for="policyName">Nome Politica/Offerta:</label>
            <input type="text" class="form-control" id="policyName" name="title" value="{$formData.policyName|default:''}" required>
        </div>
        <div class="form-group">
            <label for="description">Descrizione:</label> {* Ho corretto l'ID da 'Descrizione' a 'description' per consistenza *}
            <input type="text" class="form-control" id="description" name="description" required>
        </div>
        <div class="form-group">
            <label for="beds">Numero di posti letto:</label>
            <input type="number" class="form-control" id="beds" name="beds" min="0">
        </div>
        <div class="form-group">
            <label for="length">Notti Minime (Opzionale):</label>
            <input type="number" class="form-control" id="length" name="length" min="0">
        </div>
        <div class="form-group full-width">
            <label for="specialPrice">Prezzo:</label> 
            <input type="number" class="form-control" id="specialPrice" name="specialPrice" min="0">
        </div>
        
        <div class="form-group full-width">
            <label for="offer_image">Immagine Offerta:</label> 
            <input type="file" class="form-control-file" id="offer_image" name="pathImage" accept="image/*">
            <small class="form-text text-muted">Carica un'immagine per l'offerta.</small>
        </div>
        
        <div class="form-group full-width">
            <button type="submit" class="btn btn-success">Aggiungi Politica</button>
            <a href="/albergoPulito/public/Admin/manageSpecialOffer" class="btn btn-secondary">Annulla</a> 
        </div>
    </form>
</div>

{include file='footer_admin.tpl'}
