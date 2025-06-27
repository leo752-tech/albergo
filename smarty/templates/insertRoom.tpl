{include file='header_admin.tpl'}

<div class="container">
    <h2>Aggiungi Nuova Camera</h2>

    <div class="form-grid">
        <form action="/albergoPulito/public/Admin/insertOffer" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">Nome Camera:</label>
                <input type="text" class="form-control" id="name" name="name" value="{$formData.name|default:''}" required>
            </div>
            
            <div class="form-group">
                <label for="beds">Posti Letto:</label>
                <input type="number" class="form-control" id="beds" name="beds" value="{$formData.beds|default:''}" required min="1">
            </div>
            
            <div class="form-group">
                <label for="price">Prezzo Notte (€):</label>
                <input type="number" step="0.01" class="form-control" id="price" name="price" value="{$formData.price|default:''}" required min="0">
            </div>
            
            <div class="form-group">
                <label for="type">Tipo:</label> {* Ho corretto l'ID da 'name' a 'type' per coerenza *}
                <input type="text" class="form-control" id="type" name="type" value="{$formData.type|default:''}" required>
            </div>

            <div class="form-group full-width">
                <label for="description">Descrizione (Opzionale):</label>
                <textarea class="form-control" id="description" name="description" rows="5">{$formData.description|default:''}</textarea>
            </div>

            <div class="form-group full-width">
                <label for="room_images">Immagini Camera:</label> 
                <input type="file" class="form-control-file" id="room_images" name="room_images[]" accept="image/*" multiple>
                <small class="form-text text-muted">Carica una o più immagini per la camera. Puoi visualizzarle e rimuoverle prima di salvare.</small>
                
                <hr>
                <div id="image_preview_container" class="image-preview-grid">
                    
                </div>
            </div>
            <div class="form-group full-width">
                <button type="submit" class="btn btn-success">Crea Offerta</button>
                <a href="/albergoPulito/public/Admin/manageSpecialOffer" class="btn btn-secondary">Annulla</a>
            </div>
        </form>
    </div>
</div>

{include file='footer_admin.tpl'}
