

{include file='admin/header_admin.tpl' pageTitle='Aggiungi Nuova Camera'}

<div class="container">
    <h2>Aggiungi Nuova Camera</h2>

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
        {* IMPORTANTE: Aggiungere enctype="multipart/form-data" per l'upload di file *}
        <form action="{$base_url}admin/process_add_room.php" method="POST" enctype="multipart/form-data">
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
                <label for="type">Tipo:</label>
                <select class="form-control" id="type" name="type" required>
                    <option value="">Seleziona un tipo</option>
                    <option value="Singola" {if $formData.type eq 'Singola'}selected{/if}>Singola</option>
                    <option value="Doppia" {if $formData.type eq 'Doppia'}selected{/if}>Doppia</option>
                    <option value="Suite" {if $formData.type eq 'Suite'}selected{/if}>Suite</option>
                  
                </select>
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
                <a href="{$base_url}admin/rooms.php" class="btn btn-secondary">Annulla</a>
            </div>
        </form>
    </div>
</div>

{include file='admin/footer_admin.tpl'}