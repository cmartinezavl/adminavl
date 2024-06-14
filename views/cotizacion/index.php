<?php include '../../head.php'; ?>
<style>
    .salto {
        padding-left: 20px;
    }

    .center {
        text-align: center;
    }

    p {
        text-align: justify;
        !important
    }

    .btn-glare {
        display: inline-block;
        text-align: center;
        width: auto;
        padding-bottom: 10px;
    }

    .button-container {
        display: flex;
        justify-content: center;
        align-items: center;
    }
</style>
<div class="row g-2">
    <div class="col-xl-5" style="padding: 10px;">
        <div class="card custom-card">
            <div class="card-header justify-content-between">
                <div class="card-title">
                    Cotizacion
                </div>
            </div>
            <div class="card-body gy-4">
                <div class="row g-3 needs-validation">
                    <div class="col-md-6">
                        <label for="" class="form-label">Cliente</label>
                        <select name="cliente" class="form-control" data-trigger id="cliente">
                            <option value="" hidden selected>Seleccione una empresa</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="" class="form-label">Modelo</label>
                        <select name="modelo" class="form-control" data-trigger id="modelo">
                            <option value="" hidden selected>Seleccione una empresa</option>
                        </select>
                    </div>
                    <label for="input-label" class="form-label">Sin Contrato </label>
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                        <label for="input-label" class="form-label">Precio Modelo</label>
                        <input type="number" id="precioModeloSC" class="form-control" id="input-label">
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                        <label for="input-label" class="form-label">Precio Instalaciones: Sector Urbano</label>
                        <input type="number" id="precioUrbanoSc" class="form-control" id="input-label">
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                        <label for="input-label" class="form-label">Precio Instalaciones: Sector Rural</label>
                        <input type="number" id="precioRuralSC" class="form-control" id="input-label">
                    </div>
                    <label for="input-label" class="form-label"> Contrato 12 Meses </label>
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                        <label for="input-label" class="form-label">Precio Instalaciones: Sector Urbano</label>
                        <input type="number" id="precioUrbanoC12" class="form-control" id="input-label">
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                        <label for="input-label" class="form-label">Precio Instalaciones: Sector Rural</label>
                        <input type="number" id="precioRuralC12" class="form-control" id="input-label">
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                        <label for="input-label" class="form-label">Traslado Tecnico</label>
                        <input type="number" id="precioTrasladoC12" class="form-control" id="input-label">
                    </div>
                    <label for="input-label" class="form-label"> Contrato 24 Meses </label>
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                        <label for="input-label" class="form-label">Visitas técnicas</label>
                        <input type="number" id="visitaUrbanoC24" class="form-control" id="input-label">
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                        <label for="input-label" class="form-label">Precio Instalaciones: Sector Rural</label>
                        <input type="number" id="visitaRuralC24" class="form-control" id="input-label">
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                        <label for="input-label" class="form-label">Traslado Tecnico</label>
                        <input type="number" id="precioTrasladoC24" class="form-control" id="input-label">
                    </div>
                    <label for="input-label" class="form-label"> Extras </label>
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                        <label for="input-label" class="form-label">OBDII </label>
                        <input type="number" id="obdii" class="form-control" id="input-label">
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                        <label for="input-label" class="form-label">Corta corriente</label>
                        <input type="number" id="cortaCorriente" class="form-control" id="input-label">
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                        <label for="input-label" class="form-label">Instalación con corta corrient</label>
                        <input type="number" id="instalacionCC" class="form-control" id="input-label">
                    </div>
                    <label for="input-label" class="form-label"> Valores Servicio Mensual: </label>
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                        <label for="input-label" class="form-label">Servicio Normal : </label>
                        <input type="number" id="servicioN" class="form-control" id="input-label">
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                        <label for="input-label" class="form-label">Servicio Premium :</label>
                        <input type="number" id="servicioP" class="form-control" id="input-label">
                    </div>
                </div>
            </div>
            <div class="button-container">
                <button class="btn btn-secondary btn-glare"><span>Enviar Cotización</span></button>
            </div>
        </div>
    </div>

    <div class="col-xl-6" style="padding: 10px; ">
        <div class="card custom-card">
            <div id="project-descriptioin-editor" style="height: 900px; ">
                <div class="card-body" style="padding-left: 60px; padding-right: 60px;">
                    <img src="../../assets/images/authentication/Logo_AVL.png" class="border-image">
                    <img src="../../assets/images/authentication/Logo_AVL_nombre.png" class="border-image">
                    <img align="right" src="../../assets/images/authentication/wialon-png.png" class="border-image"
                        style="width: 200px; align-self: right;  padding-right:60px; padding-top: 10px;">
                    <p style="text-align: right;  padding-right: 60px;">Monitoreo y Gestión de Flotas</p>
                    <h1 style="text-align: center"><u> Cotización</u> </h1>
                    <p>Señor <a id="clienteDoc">______________</a> </p>
                    <p>Junto con saludar, Informo que nuestra empresa trabaja con diversos modelos de equipos GPS.</p>
                    <p>Para los empresarios que prestan servicios a Forestal Arauco ofrecemos el modelo <a
                            id="modeloDoc">______________</a></p>
                    <p><strong>De 1 a 5 equipos se trabaja Sin Contrato:</strong></p>
                    <div class="salto">
                        <p> Cliente compra los GPS (Modelo <a id="modeloDoc2">______________</a> $<a
                                id="precioModeloSCDoc">______________</a> + IVA) <strong>*Valores unitarios*</strong>
                        </p>
                        <p> Cancela las instalaciones $<a id="precioUrbanoSCDoc">______________</a> + IVA (Sector
                            urbano)</p>
                        <p> Instalaciones <a id="precioRuralSCDoc">______________</a> + IVA (Sector rural)</p>
                    </div>
                    <p><strong>*Esta opción permite dar de baja el servicio cuando lo requiera, a diferencia de tomar el
                            servicio con
                            contrato, en donde debe cumplir el plazo estipulado para dar de baja el servicio*.</strong>
                    </p>
                    <p><strong>Tipos de contratos con los que trabajamos :</strong></p>
                    <div class="salto">
                        <p><strong> Contrato a 12 meses: </strong>GPS Costo Cero proporcionados por AVL</p>
                        <p>Cancela las instalaciones $<a id="precioRuralDocC12">______________</a> + IVA (Sector urbano)
                        </p>
                        <p>Instalaciones $<a id="precioUrbanoDocC12">______________</a>+ IVA (Sector rural)</p>
                        <p>Cancela el traslado del técnico al lugar de instalación, <a
                                id="precioTrasladoDocC12">______________</a>+ IVA x Km.</p>
                    </div>
                    <div class="salto">
                        <p><strong> Contrato a 24 meses: </strong>GPS e instalaciones Costo Cero proporcionados por AVL
                        </p>
                        <p>Visitas técnicas $<a id="precioVisitaTecnicaDocC24">______________</a> + IVA en sector urbano
                        </p>
                        <p>Sector rural $<a id="precioVisitaTecnicaUrbanoDocC24">______________</a> + IVA </p>
                        <p>Cancela el traslado del técnico al lugar de instalación $<a
                                id="precioTrasladoDocC24">______________</a> + IVA x Km.</p>
                        <p>En caso de que los vehículos se encuentren en <strong> modalidad de leasing no permitiéndose
                                la
                                intervención,
                                se ofrece como adicional un adaptador OBDII </strong>con un costo de $ <a
                                id="obdiiDoc">______________</a>+ IVA.</p>
                        <p><strong>*Corta corriente*</strong> $ <a id="cortaCorrienteDoc">______________</a> + IVA</p>
                        <p><strong>*Instalación con corta corriente* : </strong><a
                                id="instalacionCCDoc">______________</a> + IVA </p> <br>
                        <p><u>Valores Servicio Mensual:</u></p>
                        <p><strong>Servicio Normal : </strong>$ <a id="servicioNDoc">______________</a> + IVA Por móvil.
                            Sistema estándar de monitoreo,
                            controla posición, velocidad,
                            geocercas, detenciones, combustible, etc..</p>
                        <p><strong>Servicio Premium :</strong>$ <a id="servicioPDoc">______________</a> + IVA Por Móvil.
                            Permite la integración de las
                            Carpetas de rodado, Rutas
                            Prohibidas, Predios, información adicional órdenes de transporte, guías de despacho, etc..
                            <strong>(Servicio utilizado por Forestal Arauco).</strong>
                        </p>

                        <p class="center">Pago del servicio</p>
                        <p>El SUSCRIPTOR se obliga a pagar los servicios acordados, correspondientes a la instalación de
                            los equipos y el
                            servicio de monitoreo mensual por un periodo inicial de <strong>xxx meses </strong> a contar
                            de la fecha de
                            suscripción (operación)
                            del presente contrato, dentro de los 30 días siguientes de emitida la factura por el periodo
                            correspondiente. Si el
                            cliente no pagare dentro del periodo indicado, <strong>se faculta expresamente a AVL CHILE
                                para
                                suspender el servicio
                                en caso de simple retardo de más de 5 días en el pago de dicha factura en la fecha
                                estipulada, es decir, el
                                SUSCRIPTOR dispondrá de un plazo máximo de 35 días, desde la fecha de emisión de la
                                factura,
                                para proceder
                                al pago. Pasado este plazo se faculta a AVL CHILE para proceder al bloqueo de las
                                tarjetas
                                de datos SIM de los
                                equipos, debiendo cancelar el SUSCRIPTOR la visita técnica para su posterior reposición
                                la
                                que tendrá un costo
                                de xxxxxxx más IVA por equipo.</strong> Además deberá costear los gastos de los
                            correspondientes
                            traslados si así se
                            requiriese y se obligará a pagar la suma de xxxxxxx por concepto de indemnización moratoria,
                            la que procederá
                            por el sólo hecho del retardo en el pago dentro del plazo convenido. En todo caso, el valor
                            del servicio de
                            monitoreo comienza a cobrarse desde que el equipo se encuentre operativo, de tal manera que
                            si comienza a
                            operar después del día 1 del primer mes, el primer cobro sólo será proporcional a la fecha
                            en que el equipo
                            comience a estar operativo.</p>
                        <p>En caso de que la suspensión del servicio sólo afecte el acceso a la plataforma, el valor de
                            reposición será de
                            xxxxxxx más IVA independiente del número de móviles monitoreados, y será incluido en la
                            siguiente factura. Lo
                            anterior es sin perjuicio de las indemnizaciones que correspondan por el retardo en el pago
                            del servicio.
                        </p>
                        <p>Conforme a lo anterior, el cliente declara conocer de antemano la fecha de facturación y
                            vencimiento del plazo
                            de pago, por lo que de no recibir oportunamente su factura, estará en la obligación de
                            proceder a su pago antes
                            del respectivo vencimiento so pena de incurrir en todas las obligaciones, gastos e
                            indemnizaciones mencionadas
                            anteriormente</p>
                        <h2 class="center"> Terminación de servicio</h2>*SOLO APLICA PARA CONTRATO*
                        <p>AVL CHILE se reserva el derecho de interrumpir el acceso del SUSCRITOR al Servicio de GPS en
                            cualquier momento,
                            en caso que el suscriptor deje de cumplir o acatar los términos y condiciones del presente
                            acuerdo.
                        </p>
                        <p>AVL CHILE podrá proceder a la terminación unilateral del presente contrato en cualquier
                            momento y sin incurrir
                            en responsabilidades, indemnizaciones u obligación alguna para con el SUSCRIPTOR en caso de
                            incurrir éste último
                            en cualquier incumplimiento de las obligaciones contenidas en el contrato, en especial la
                            relativa al pago mensual
                            estipulado en el presente acuerdo. La misma terminación, con iguales consecuencias, ocurrirá
                            en caso de que AVL
                            CHILE deje de prestar el Servicio de GPS en general a sus clientes en el territorio
                            autorizado y, en consecuencia,
                            AVL CHILE no incurrirá en ningún incumplimiento ni se verá comprometido al pago de monto
                            alguno con motivo
                            de dicho término unilateral del presente contrato.
                        </p>
                        <p>El SUSCRIPTOR podrá poner término en cualquier momento a las obligaciones contraídas por
                            ambas partes en el
                            presente contrato de prestación del Servicio de GPS de acuerdo a estas dos modalidades: </p>
                        <p>1.- La comunicación de la voluntad de dar término al contrato por correo electrónico dirigida
                            a info@avlchile.cl
                            con a lo menos 15 días de anticipación al próximo periodo de facturación. </p>
                        <p>2.- Mediante carta certificada dirigida a Ingeniería AVL CHILE LIMITADA a la dirección de
                            Vega de Saldías 690
                            Chillan. Dicha cancelación realizada por el SUSCRIPTOR tendrá efecto a partir del momento en
                            que AVL CHILE
                            reciba su notificación, por lo tanto, AVL CHILE podrá cobrar los servicios hasta la fecha de
                            dicha notificación.
                        </p>
                        <p>En cualquier caso de terminación del Servicio de GPS y los inconvenientes generados con
                            posterioridad a la
                            notificación de término de contrato, AVL CHILE no incurrirá en responsabilidad ni tendrá
                            obligación alguna para
                            con el SUSCRIPTOR ni para con terceros.
                        </p>
                        <p>
                            Cualquier que sea la modalidad por la cual el SUSCRIPTOR ponga término unilateral al
                            presente
                            contrato, estará
                            obligado para con AVL CHILE a las siguientes actuaciones: /div>
                        </p>
                        <p>1.- Proceder a la restitución, devolución o compra de los equipos e instrumentos entregados
                            por AVL CHILE y que
                            eran los necesarios para la prestación del servicio, siempre y cuando se haya cumplido el
                            plazo de servicio
                            acordado en el presente contrato. En caso de no poder proceder a dicha restitución o
                            devolución por pérdida o
                            daño de los equipos, el SUSCRIPTOR deberá pagar a AVL el valor que los mismos equipos o
                            instrumentos tengan
                            a la época de la terminación unilateral del contrato.</p>
                        <p>2.- En el caso que el SUSCRIPTOR, de término al contrato de servicio antes del plazo
                            establecido, éste deberá
                            pagar a AVL el valor que los mismos equipos, instrumentos e instalaciones tengan a la época
                            de la terminación
                            unilateral del contrato.</p>
                        <p>3.- Proceder al pago del xxxxx del monto que en total correspondería pagar al SUSCRIPTOR en
                            el caso de haberse
                            ejecutado y cumplido el contrato por el periodo originalmente pactado respecto de cada
                            equipo contratado, Debiendo en consecuencia multiplicarse el monto mensual por cada uno de
                            los meses restantes del contrato y
                            sobre dicho total calcularse el xxxxx que deberá pagar el SUSCRIPTOR. Este pago deberá
                            realizarse por lo pactado
                            originalmente por cada equipo en particular de tal manera que este xxxxx debe calcularse por
                            los meses restantes
                            que le quede a cada uno de los equipos si fueron contratados e instalados en fechas
                            distintas. </p>
                        <p> Saluda cordialmente, AVL CHILE LIMITADA.</p>
                        <p>*Cotización válida por 15 días*.</p>
                        <div>
                            <p class="center">Servicios de Gestión de Flotas – AVL Chile Limitada
                            </p>
                            <p class="center"> contacto@avlchile.cl</p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="../../controllers/cotizacion/cotizacionController.js"></script>
<?php include '../../body.php'; ?>