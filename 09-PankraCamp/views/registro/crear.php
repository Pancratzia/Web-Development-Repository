<div class="registro">
    <h2 class="registro__heading"><?php echo $titulo ?></h2>
    <p class="registro__descripcion">Únete a PankraCamp</p>

    <div class="paquetes__grid">

        <div class="paquete" <?php aos_animacion() ?>>
            <h3 class="paquete__nombre">Starter</h3>
            <ul class="paquete__lista">
                <li class="paquete__elemento">Acceso Virtual a las Conferencias de PankraCamp</li>
            </ul>

            <p class="paquete__precio">0$</p>

            <form action="/finalizar-registro/gratis" method="POST">
                <input type="submit" value="Inscripción Gratis" class="paquetes__submit">
            </form>
        </div>

        <div class="paquete" <?php aos_animacion() ?>>
            <h3 class="paquete__nombre">Platinum</h3>
            <ul class="paquete__lista">
                <li class="paquete__elemento">Acceso Presencial a PankraCamp</li>
                <li class="paquete__elemento">Pase por 2 días</li>
                <li class="paquete__elemento">Acceso a Talleres y Conferencias</li>
                <li class="paquete__elemento">Acceso a las Grabaciones</li>
                <li class="paquete__elemento">Camisa del Evento</li>
                <li class="paquete__elemento">Comida y Bebida</li>
            </ul>

            <p class="paquete__precio">100$</p>

            <div id="smart-button-container">
                <div style="text-align: center;">
                    <div id="paypal-button-container"></div>
                </div>
            </div>
        </div>

        <div class="paquete" <?php aos_animacion() ?>>
            <h3 class="paquete__nombre">Gold</h3>
            <ul class="paquete__lista">
                <li class="paquete__elemento">Acceso Virtual a PankraCamp</li>
                <li class="paquete__elemento">Pase por 2 días</li>
                <li class="paquete__elemento">Enlace a Talleres y Conferencias</li>
                <li class="paquete__elemento">Acceso a las Grabaciones</li>
            </ul>

            <p class="paquete__precio">50$</p>
            <div id="smart-button-container">
                <div style="text-align: center;">
                    <div id="paypal-button-container-virtual"></div>
                </div>
            </div>

        </div>

    </div>
</div>

<script src="https://www.paypal.com/sdk/js?client-id=AZdxvHCDd9XTjW9Ctn3g2sORnNtxGm2WGTuS9jyWlDKFFfMOBmRe8SYxxO9h4m-IIHuk0GyoMAbwEiBi&enable-funding=venmo&currency=USD" data-sdk-integration-source="button-factory"></script>

<script>
    function initPayPalButton() {
        paypal.Buttons({
            style: {
                shape: 'rect',
                color: 'blue',
                layout: 'vertical',
                label: 'pay',
            },

            createOrder: function(data, actions) {
                return actions.order.create({
                    purchase_units: [{
                        "description": "1",
                        "amount": {
                            "currency_code": "USD",
                            "value": 100
                        }
                    }]
                });
            },

            onApprove: function(data, actions) {
                return actions.order.capture().then(function(orderData) {
                    
                const datos = new FormData();
                datos.append('paquete_id', orderData.purchase_units[0].description);
                datos.append('pago_id', orderData.purchase_units[0].payments.captures[0].id);

                fetch('/finalizar-registro/pagar', {
                    method: 'POST',
                    body: datos
                }).then(respuesta => respuesta.json())
                .then(resultado => {
                    console.log(resultado);
                    if(resultado.resultado){
                        actions.redirect($_ENV['HOST'] + '/finalizar-registro/conferencias');
                    }
                })
                        
                });
            },

            onError: function(err) {
                console.log(err);
            }
        }).render('#paypal-button-container');

        //Pase Virtual

        paypal.Buttons({
            style: {
                shape: 'rect',
                color: 'blue',
                layout: 'vertical',
                label: 'pay',
            },

            createOrder: function(data, actions) {
                return actions.order.create({
                    purchase_units: [{
                        "description": "2",
                        "amount": {
                            "currency_code": "USD",
                            "value": 50
                        }
                    }]
                });
            },

            onApprove: function(data, actions) {
                return actions.order.capture().then(function(orderData) {
                    
                const datos = new FormData();
                datos.append('paquete_id', orderData.purchase_units[0].description);
                datos.append('pago_id', orderData.purchase_units[0].payments.captures[0].id);

                fetch('/finalizar-registro/pagar', {
                    method: 'POST',
                    body: datos
                }).then(respuesta => respuesta.json())
                .then(resultado => {
                    console.log(resultado);
                    if(resultado.resultado){
                        actions.redirect($_ENV['HOST'] + '/finalizar-registro/conferencias');
                    }
                })
                        
                });
            },

            onError: function(err) {
                console.log(err);
            }
        }).render('#paypal-button-container-virtual');
    }
    initPayPalButton();
</script>