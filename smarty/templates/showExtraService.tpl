{include file='header.tpl'}


    <section class="section-padding">
        <div class="container">
            <h2 style="text-align: center; margin-bottom: 40px; color: #007bff;">I Nostri Servizi Extra</h2>

            {if !empty($services)}
                <div class="services-list">
                    {foreach $services as $servizio}
                        <div class="service-card" style="border: 1px solid #ddd; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); margin-bottom: 25px; overflow: hidden;">
                            
                            {* --- SEZIONE IMMAGINE AGGIUNTA --- *}
                            {* Controlla se il percorso dell'immagine è definito *}
                            {if !empty($servizio->getPathImage())}
                                <img src="{$servizio->getPathImage()}" alt="{$servizio->getName()}" style="width: 100%; height: 200px; object-fit: cover;">
                            {/if}
                            {* --- FINE SEZIONE IMMAGINE --- *}

                            <div class="service-content" style="padding: 20px;">
                                <div class="service-header" style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 15px;">
                                    <h3 style="margin: 0; color: #333;">{$servizio->getName()}</h3>
                                    <span class="service-price" style="font-size: 1.2em; font-weight: bold; color: #007bff; white-space: nowrap; margin-left: 15px;">
                                        €{$servizio->getPrice()|string_format:"%.2f"}
                                    </span>
                                </div>
                                
                                <div class="service-body">
                                    <p style="color: #666; margin: 0;">{$servizio->getDescription()}</p>
                                </div>
                            </div>

                        </div>
                    {/foreach}
                </div>

            {else}
                <div class="alert alert-warning" style="text-align: center;">
                    <p>Al momento non sono disponibili servizi extra.</p>
                    <a href="/" class="btn btn-primary">Torna alla Home</a>
                </div>
            {/if}
        </div>
    </section>

{include file='footer.tpl'}