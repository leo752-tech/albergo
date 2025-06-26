{include file='header_admin.tpl'}

<h3>Aggiungi Nuova Politica di Prezzo / Offerta</h3>
<div class="form-grid mb-4">
    <form action="/albergoPulito/public/Admin/insertOffer" method="POST" enctype="multipart/form-data"> 
        <div class="form-group">
            <label for="policyName">Nome Politica/Offerta:</label>
            <input type="text" class="form-control" id="policyName" name="title" value="{$formData.policyName|default:''}" required>
        </div>
        <div class="form-group">
            <label for="Description">Descrizione:</label>
            <input type="text" class="form-control" id="Descrizione" name="description" required>
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
            <label for="price">Prezzo:</label>
            <input type="number" class="form-control" id="specialPrice" name="specialPrice" min="0">
        </div>

       
        <div class="form-group full-width">
            <label for="room_image">Immagine Offerta:</label> 
            <input type="file" class="form-control-file" id="room_image" name="pathImage" accept="image/*">
            <small class="form-text text-muted">Carica un'immagine per l'offerta. Puoi visualizzarla e rimuoverla prima di salvare.</small>
            <hr>
            <div id="image_preview_container" class="image-preview-grid"></div>
        </div>
       

        <div class="form-group full-width">
            <button type="submit" class="btn btn-success">Aggiungi Politica</button>
        </div>
        
    </form>
</div>

{include file='footer_admin.tpl'}