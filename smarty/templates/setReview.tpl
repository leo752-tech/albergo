{include file='header.tpl'}

<form action="/albergoPulito/public/User/setReview" method="POST">
    <div class="form-group">
        <label for="title">Titolo:</label>
        <input type="text" id="title" name="title" class="form-control" required maxlength="100">
        {* Puoi aggiungere qui messaggi di errore specifici se la validazione fallisce *}
        
    </div>

    <div class="form-group">
        <label for="rating">Valutazione (1-5):</label>
        <select id="rating" name="rating" class="form-control" required>
            <option value="">Seleziona un voto</option>
            <option value="1">1 Stella - Pessimo</option>
            <option value="2">2 Stelle - Scarso</option>
            <option value="3">3 Stelle - Nella media</option>
            <option value="4">4 Stelle - Buono</option>
            <option value="5">5 Stelle - Eccellente</option>
        </select>
        
    </div>

    <div class="form-group">
        <label for="description">Descrizione della recensione:</label>
        <textarea id="description" name="description" class="form-control" rows="5" required maxlength="1000"></textarea>
        
    </div>

    {* Campo nascosto per l'ID dell'utente registrato. Questo dovrebbe essere popolato nel controller. *}
    <input type="hidden" name="idRegisteredUser" value="{$loggedInUserId|default:''}">
    {* Se l'ID utente non è disponibile, potresti voler reindirizzare o mostrare un messaggio. *}
   

    <button type="submit" class="btn btn-primary">Invia Recensione</button>
</form>

{include file='footer.tpl'}
