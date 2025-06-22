

{include file='header_admin.tpl'}

<div class="container">
    <h2>Aggiungi Nuova Camera</h2>

   

    <div class="form-grid">
        {* IMPORTANTE: Aggiungere enctype="multipart/form-data" per l'upload di file *}
        <form action="/albergoPulito/public/Admin/updateRoom" method="POST" enctype="multipart/form-data">
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
                <label for="name">Tipo:</label>
                <input type="text" class="form-control" id="name" name="type" value="{$formData.type|default:''}" required>
            </div>

            <div class="form-group full-width">
                <label for="description">Descrizione (Opzionale):</label>
                <textarea class="form-control" id="description" name="description" rows="5">{$formData.description|default:''}</textarea>
            </div>

            {*  Seleziona file immagini *}
            <div class="form-group full-width">
                <label for="room_images">Immagini Camera (Seleziona più file):</label>
                {* L'attributo 'multiple' permette di selezionare più file *}
                {* L'attributo 'accept' suggerisce i tipi di file accettati *}
                <input type="file" class="form-control-file" id="room_images" name="room_images[]" accept="image/*" multiple>
                <small class="form-text text-muted">Carica una o più immagini per la camera.</small>
            </div>

            <div class="form-group full-width">
                <button type="submit" class="btn btn-success">Crea Camera</button>
                <a href="/albergoPulito/public/Admin/manageRooms" class="btn btn-secondary">Annulla</a>
            </div>
        </form>
    </div>
</div>

{include file='footer_admin.tpl'}