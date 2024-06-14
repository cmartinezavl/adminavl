<style>
.card {
    margin-block-end: 0rem;
}
</style>
<div class="modal fade" id="modalWizard" tabindex="-1" aria-labelledby="exampleModalScrollable2"
    data-bs-keyboard="false" aria-hidden="true" data-bs-backdrop="static">
    <!-- Scrollable modal -->
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="staticBackdropLabel2">Orden de Servicio
                </h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                    id="cerrar-modificar"></button>
            </div>
            <div class="modal-body text-center"
                style="background-color:var(--default-body-bg-color);border-bottom-left-radius: 0.5rem;border-bottom-right-radius: 0.5rem;">
                <div class="multisteps-form">

                    <div class="row g-2">
                        <div class="col-12 col-lg-12 mx-auto m-3 mb-4">
                            <div class="multisteps-form__progress">
                                <button class="multisteps-form__progress-btn js-active" type="button" title="Ingresado">
                                    <span>Ingresado</span>
                                </button>
                                <button class="multisteps-form__progress-btn" type="button"
                                    title="Asignación de Equipos">
                                    <span>Asignación de Equipos</span>
                                </button>
                                <button class="multisteps-form__progress-btn" type="button"
                                    title="Armado y Configurado">
                                    <span>Armado y Configurado</span>
                                </button>
                                                        <button class="multisteps-form__progress-btn pendiente" type="button" title="Pendiente">
                                    <span>Pendiente</span>
                                </button>
                                <button class="multisteps-form__progress-btn finalizado" type="button"
                                    title="Finalizado">
                                    <span>Finalizado</span>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="row g-2">
                        <div class="col-12 col-lg-12 m-auto">
                            <div class="multisteps-form__form">

                                <div class="card multisteps-form__panel p-3 bg-white js-active"
                                    style="border-radius:0.5rem;" data-animation="FadeIn">
                                    <div class="multisteps-form__content">
                                        <div class="row g-2">
                                            <div class="col-12 col-xl-2">
                                                <div class="card bg-white p-2 text-dark text-start mb-3"
                                                    style="background-color:var(--default-body-bg-color) !important;">
                                                    <p><b>Nombre </b><br>Franco Gutiérrez</p>
                                                </div>
                                            </div>
                                            <div class="col-12 col-xl-10">

                                                <table class="table text-nowrap table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">User</th>
                                                            <th scope="col">Status</th>
                                                            <th scope="col">Email</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <th scope="row">
                                                                <div class="d-flex align-items-center">
                                                                    <span
                                                                        class="avatar avatar-xs me-2 online avatar-rounded">
                                                                        <img src="<?php echo $baseUrl; ?>/assets/images/faces/13.jpg"
                                                                            alt="img">
                                                                    </span>Sukuro Kim
                                                                </div>
                                                            </th>
                                                            <td><span class="badge bg-success-transparent">Active</span>
                                                            </td>
                                                            <td>kimosukuro@gmail.com</td>
                                                            <td>
                                                                <div class="hstack gap-2 flex-wrap">
                                                                    <a href="javascript:void(0);"
                                                                        class="text-info fs-14 lh-1"><i
                                                                            class="ri-edit-line"></i></a>
                                                                    <a href="javascript:void(0);"
                                                                        class="text-danger fs-14 lh-1"><i
                                                                            class="ri-delete-bin-5-line"></i></a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">
                                                                <div class="d-flex align-items-center">
                                                                    <span
                                                                        class="avatar avatar-xs me-2 offline avatar-rounded">
                                                                        <img src="<?php echo $baseUrl; ?>/assets/images/faces/6.jpg"
                                                                            alt="img">
                                                                    </span>Hasimna
                                                                </div>
                                                            </th>
                                                            <td><span class="badge bg-light text-dark">Inactive</span>
                                                            </td>
                                                            <td>hasimna2132@gmail.com</td>
                                                            <td>
                                                                <div class="hstack gap-2 flex-wrap">
                                                                    <a href="javascript:void(0);"
                                                                        class="text-info fs-14 lh-1"><i
                                                                            class="ri-edit-line"></i></a>
                                                                    <a href="javascript:void(0);"
                                                                        class="text-danger fs-14 lh-1"><i
                                                                            class="ri-delete-bin-5-line"></i></a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">
                                                                <div class="d-flex align-items-center">
                                                                    <span
                                                                        class="avatar avatar-xs me-2 online avatar-rounded">
                                                                        <img src="<?php echo $baseUrl; ?>/assets/images/faces/15.jpg"
                                                                            alt="img">
                                                                    </span>Azimo Khan
                                                                </div>
                                                            </th>
                                                            <td><span class="badge bg-success-transparent">Active</span>
                                                            </td>
                                                            <td>azimokhan421@gmail.com</td>
                                                            <td>
                                                                <div class="hstack gap-2 flex-wrap">
                                                                    <a href="javascript:void(0);"
                                                                        class="text-info fs-14 lh-1"><i
                                                                            class="ri-edit-line"></i></a>
                                                                    <a href="javascript:void(0);"
                                                                        class="text-danger fs-14 lh-1"><i
                                                                            class="ri-delete-bin-5-line"></i></a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">
                                                                <div class="d-flex align-items-center">
                                                                    <span
                                                                        class="avatar avatar-xs me-2 online avatar-rounded">
                                                                        <img src="<?php echo $baseUrl; ?>/assets/images/faces/5.jpg"
                                                                            alt="img">
                                                                    </span>Samantha Julia
                                                                </div>
                                                            </th>
                                                            <td><span class="badge bg-success-transparent">Active</span>
                                                            </td>
                                                            <td>julianasams143@gmail.com</td>
                                                            <td>
                                                                <div class="hstack gap-2 flex-wrap">
                                                                    <a href="javascript:void(0);"
                                                                        class="text-info fs-14 lh-1"><i
                                                                            class="ri-edit-line"></i></a>
                                                                    <a href="javascript:void(0);"
                                                                        class="text-danger fs-14 lh-1"><i
                                                                            class="ri-delete-bin-5-line"></i></a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>

                                            </div>
                                        </div>
                                        <div class="button-row g-2 d-flex mt-3">
                                            <button class="ms-auto mb-0 btn btn-primary-light btn-wave label-btn label-end js-btn-next" type="button"
                                                title="guardar">Siguiente&nbsp;&nbsp;
                                                <i class="ri-arrow-right-line label-btn-icon ms-2"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <div class="card multisteps-form__panel p-3 bg-white" style="border-radius:0.5rem;"
                                    data-animation="FadeIn">
                                    <div class="row text-center">
                                        <div class="col-10 mx-auto">
                                            <h5 class="font-weight-normal">What are you doing? (checkboxes)</h5>
                                            <p>Give us more details about you. What do you enjoy doing in your spare
                                                time?</p>
                                        </div>
                                    </div>
                                    <div class="multisteps-form__content">
                                        <div class="row mt-4">
                                            <div class="col-sm-3 ms-auto">
                                                <input type="checkbox" class="btn-check" id="btncheck1">
                                                <label class="btn btn-lg btn-outline-secondary border-2 px-6 py-5"
                                                    for="btncheck1">
                                                    <svg class="text-dark" width="20px" height="20px"
                                                        viewBox="0 0 40 40" version="1.1"
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink">
                                                        <title>settings</title>
                                                        <g stroke="none" stroke-width="1" fill="none"
                                                            fill-rule="evenodd">
                                                            <g transform="translate(-2020.000000, -442.000000)"
                                                                fill="#FFFFFF" fill-rule="nonzero">
                                                                <g transform="translate(1716.000000, 291.000000)">
                                                                    <g transform="translate(304.000000, 151.000000)">
                                                                        <polygon class="color-background"
                                                                            opacity="0.596981957"
                                                                            points="18.0883333 15.7316667 11.1783333 8.82166667 13.3333333 6.66666667 6.66666667 0 0 6.66666667 6.66666667 13.3333333 8.82166667 11.1783333 15.315 17.6716667">
                                                                        </polygon>
                                                                        <path class="color-background"
                                                                            d="M31.5666667,23.2333333 C31.0516667,23.2933333 30.53,23.3333333 30,23.3333333 C29.4916667,23.3333333 28.9866667,23.3033333 28.48,23.245 L22.4116667,30.7433333 L29.9416667,38.2733333 C32.2433333,40.575 35.9733333,40.575 38.275,38.2733333 L38.275,38.2733333 C40.5766667,35.9716667 40.5766667,32.2416667 38.275,29.94 L31.5666667,23.2333333 Z"
                                                                            opacity="0.596981957"></path>
                                                                        <path class="color-background"
                                                                            d="M33.785,11.285 L28.715,6.215 L34.0616667,0.868333333 C32.82,0.315 31.4483333,0 30,0 C24.4766667,0 20,4.47666667 20,10 C20,10.99 20.1483333,11.9433333 20.4166667,12.8466667 L2.435,27.3966667 C0.95,28.7083333 0.0633333333,30.595 0.00333333333,32.5733333 C-0.0583333333,34.5533333 0.71,36.4916667 2.11,37.89 C3.47,39.2516667 5.27833333,40 7.20166667,40 C9.26666667,40 11.2366667,39.1133333 12.6033333,37.565 L27.1533333,19.5833333 C28.0566667,19.8516667 29.01,20 30,20 C35.5233333,20 40,15.5233333 40,10 C40,8.55166667 39.685,7.18 39.1316667,5.93666667 L33.785,11.285 Z">
                                                                        </path>
                                                                    </g>
                                                                </g>
                                                            </g>
                                                        </g>
                                                    </svg>
                                                </label>
                                                <h6>Design</h6>
                                            </div>
                                            <div class="col-sm-3">
                                                <input type="checkbox" class="btn-check" id="btncheck2">
                                                <label class="btn btn-lg btn-outline-secondary border-2 px-6 py-5"
                                                    for="btncheck2">
                                                    <svg class="text-dark" width="20px" height="20px"
                                                        viewBox="0 0 42 42" version="1.1"
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink">
                                                        <title>box-3d-50</title>
                                                        <g stroke="none" stroke-width="1" fill="none"
                                                            fill-rule="evenodd">
                                                            <g transform="translate(-2319.000000, -291.000000)"
                                                                fill="#FFFFFF" fill-rule="nonzero">
                                                                <g transform="translate(1716.000000, 291.000000)">
                                                                    <g transform="translate(603.000000, 0.000000)">
                                                                        <path class="color-background"
                                                                            d="M22.7597136,19.3090182 L38.8987031,11.2395234 C39.3926816,10.9925342 39.592906,10.3918611 39.3459167,9.89788265 C39.249157,9.70436312 39.0922432,9.5474453 38.8987261,9.45068056 L20.2741875,0.1378125 L20.2741875,0.1378125 C19.905375,-0.04725 19.469625,-0.04725 19.0995,0.1378125 L3.1011696,8.13815822 C2.60720568,8.38517662 2.40701679,8.98586148 2.6540352,9.4798254 C2.75080129,9.67332903 2.90771305,9.83023153 3.10122239,9.9269862 L21.8652864,19.3090182 C22.1468139,19.4497819 22.4781861,19.4497819 22.7597136,19.3090182 Z">
                                                                        </path>
                                                                        <path class="color-background"
                                                                            d="M23.625,22.429159 L23.625,39.8805372 C23.625,40.4328219 24.0727153,40.8805372 24.625,40.8805372 C24.7802551,40.8805372 24.9333778,40.8443874 25.0722402,40.7749511 L41.2741875,32.673375 L41.2741875,32.673375 C41.719125,32.4515625 42,31.9974375 42,31.5 L42,14.241659 C42,13.6893742 41.5522847,13.241659 41,13.241659 C40.8447549,13.241659 40.6916418,13.2778041 40.5527864,13.3472318 L24.1777864,21.5347318 C23.8390024,21.7041238 23.625,22.0503869 23.625,22.429159 Z"
                                                                            opacity="0.7"></path>
                                                                        <path class="color-background"
                                                                            d="M20.4472136,21.5347318 L1.4472136,12.0347318 C0.953235098,11.7877425 0.352562058,11.9879669 0.105572809,12.4819454 C0.0361450918,12.6208008 6.47121774e-16,12.7739139 0,12.929159 L0,30.1875 L0,30.1875 C0,30.6849375 0.280875,31.1390625 0.7258125,31.3621875 L19.5528096,40.7750766 C20.0467945,41.0220531 20.6474623,40.8218132 20.8944388,40.3278283 C20.963859,40.1889789 21,40.0358742 21,39.8806379 L21,22.429159 C21,22.0503869 20.7859976,21.7041238 20.4472136,21.5347318 Z"
                                                                            opacity="0.7"></path>
                                                                    </g>
                                                                </g>
                                                            </g>
                                                        </g>
                                                    </svg>
                                                </label>
                                                <h6>Code</h6>
                                            </div>
                                            <div class="col-sm-3 me-auto">
                                                <input type="checkbox" class="btn-check" id="btncheck3">
                                                <label class="btn btn-lg btn-outline-secondary border-2 px-6 py-5"
                                                    for="btncheck3">
                                                    <svg class="text-dark" width="20px" height="20px"
                                                        viewBox="0 0 40 40" version="1.1"
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink">
                                                        <title>spaceship</title>
                                                        <g stroke="none" stroke-width="1" fill="none"
                                                            fill-rule="evenodd">
                                                            <g transform="translate(-1720.000000, -592.000000)"
                                                                fill="#FFFFFF" fill-rule="nonzero">
                                                                <g transform="translate(1716.000000, 291.000000)">
                                                                    <g transform="translate(4.000000, 301.000000)">
                                                                        <path class="color-background"
                                                                            d="M39.3,0.706666667 C38.9660984,0.370464027 38.5048767,0.192278529 38.0316667,0.216666667 C14.6516667,1.43666667 6.015,22.2633333 5.93166667,22.4733333 C5.68236407,23.0926189 5.82664679,23.8009159 6.29833333,24.2733333 L15.7266667,33.7016667 C16.2013871,34.1756798 16.9140329,34.3188658 17.535,34.065 C17.7433333,33.98 38.4583333,25.2466667 39.7816667,1.97666667 C39.8087196,1.50414529 39.6335979,1.04240574 39.3,0.706666667 Z M25.69,19.0233333 C24.7367525,19.9768687 23.3029475,20.2622391 22.0572426,19.7463614 C20.8115377,19.2304837 19.9992882,18.0149658 19.9992882,16.6666667 C19.9992882,15.3183676 20.8115377,14.1028496 22.0572426,13.5869719 C23.3029475,13.0710943 24.7367525,13.3564646 25.69,14.31 C26.9912731,15.6116662 26.9912731,17.7216672 25.69,19.0233333 L25.69,19.0233333 Z">
                                                                        </path>
                                                                        <path class="color-background"
                                                                            d="M1.855,31.4066667 C3.05106558,30.2024182 4.79973884,29.7296005 6.43969145,30.1670277 C8.07964407,30.6044549 9.36054508,31.8853559 9.7979723,33.5253085 C10.2353995,35.1652612 9.76258177,36.9139344 8.55833333,38.11 C6.70666667,39.9616667 0,40 0,40 C0,40 0,33.2566667 1.855,31.4066667 Z">
                                                                        </path>
                                                                        <path class="color-background"
                                                                            d="M17.2616667,3.90166667 C12.4943643,3.07192755 7.62174065,4.61673894 4.20333333,8.04166667 C3.31200265,8.94126033 2.53706177,9.94913142 1.89666667,11.0416667 C1.5109569,11.6966059 1.61721591,12.5295394 2.155,13.0666667 L5.47,16.3833333 C8.55036617,11.4946947 12.5559074,7.25476565 17.2616667,3.90166667 L17.2616667,3.90166667 Z"
                                                                            opacity="0.598539807"></path>
                                                                        <path class="color-background"
                                                                            d="M36.0983333,22.7383333 C36.9280725,27.5056357 35.3832611,32.3782594 31.9583333,35.7966667 C31.0587397,36.6879974 30.0508686,37.4629382 28.9583333,38.1033333 C28.3033941,38.4890431 27.4704606,38.3827841 26.9333333,37.845 L23.6166667,34.53 C28.5053053,31.4496338 32.7452344,27.4440926 36.0983333,22.7383333 L36.0983333,22.7383333 Z"
                                                                            opacity="0.598539807"></path>
                                                                    </g>
                                                                </g>
                                                            </g>
                                                        </g>
                                                    </svg>
                                                </label>
                                                <h6>Develop</h6>
                                            </div>
                                        </div>
                                        <div class="button-row d-flex mt-4">
                                            <button class="btn bg-gradient-light mb-0 js-btn-prev" type="button"
                                                title="Prev">Prev</button>
                                            <button class="btn bg-gradient-dark ms-auto mb-0 js-btn-next" type="button"
                                                title="Next">Next</button>
                                        </div>
                                    </div>
                                </div>

                                <div class="card multisteps-form__panel p-3 bg-white" style="border-radius:0.5rem;"
                                    data-animation="FadeIn">
                                    <div class="row text-center">
                                        <div class="col-10 mx-auto">
                                            <h5 class="font-weight-normal">Are you living in a nice area?</h5>
                                            <p>One thing I love about the later sunsets is the chance to go for a walk
                                                through the neighborhood woods before dinner</p>
                                        </div>
                                    </div>
                                    <div class="multisteps-form__content">
                                        <div class="row text-start">
                                            <div class="col-12 col-md-8 ms-auto mt-3">
                                                <label>Street Name</label>
                                                <input class="multisteps-form__input form-control" type="text"
                                                    placeholder="Eg. Soft" onfocus="focused(this)"
                                                    onfocusout="defocused(this)">
                                            </div>
                                            <div class="col-12 col-md-4 ms-auto mt-3">
                                                <label>Street No</label>
                                                <input class="multisteps-form__input form-control" type="number"
                                                    placeholder="Eg. 221" onfocus="focused(this)"
                                                    onfocusout="defocused(this)">
                                            </div>
                                            <div class="col-12 col-md-7 ms-auto mt-3">
                                                <label>City</label>
                                                <input class="multisteps-form__input form-control" type="text"
                                                    placeholder="Eg. Tokyo" onfocus="focused(this)"
                                                    onfocusout="defocused(this)">
                                            </div>
                                            <div class="col-12 col-md-5 ms-auto mt-3 text-start">
                                                <label>Country</label>
                                                <div class="choices" data-type="select-one" tabindex="0" role="combobox"
                                                    aria-autocomplete="list" aria-haspopup="true" aria-expanded="false">
                                                    <div class="choices__inner"><select
                                                            class="form-control choices__input" name="choices-country"
                                                            id="choices-country" hidden="" tabindex="-1"
                                                            data-choice="active">
                                                            <option value="Argentina">Argentina</option>
                                                        </select>
                                                        <div class="choices__list choices__list--single">
                                                            <div class="choices__item choices__item--selectable"
                                                                data-item="" data-id="1" data-value="Argentina"
                                                                data-custom-properties="null" aria-selected="true">
                                                                Argentina</div>
                                                        </div>
                                                    </div>
                                                    <div class="choices__list choices__list--dropdown"
                                                        aria-expanded="false"><input type="text"
                                                            class="choices__input choices__input--cloned"
                                                            autocomplete="off" autocapitalize="off" spellcheck="false"
                                                            role="textbox" aria-autocomplete="list" aria-label="false"
                                                            placeholder="">
                                                        <div class="choices__list" role="listbox">
                                                            <div id="choices--choices-country-item-choice-1"
                                                                class="choices__item choices__item--choice choices__item--selectable is-highlighted"
                                                                role="option" data-choice="" data-id="1"
                                                                data-value="Albania" data-select-text="Press to select"
                                                                data-choice-selectable="" aria-selected="true">Albania
                                                            </div>
                                                            <div id="choices--choices-country-item-choice-2"
                                                                class="choices__item choices__item--choice choices__item--selectable"
                                                                role="option" data-choice="" data-id="2"
                                                                data-value="Algeria" data-select-text="Press to select"
                                                                data-choice-selectable="">Algeria</div>
                                                            <div id="choices--choices-country-item-choice-3"
                                                                class="choices__item choices__item--choice choices__item--selectable"
                                                                role="option" data-choice="" data-id="3"
                                                                data-value="Andorra" data-select-text="Press to select"
                                                                data-choice-selectable="">Andorra</div>
                                                            <div id="choices--choices-country-item-choice-4"
                                                                class="choices__item choices__item--choice choices__item--selectable"
                                                                role="option" data-choice="" data-id="4"
                                                                data-value="Angola" data-select-text="Press to select"
                                                                data-choice-selectable="">Angola</div>
                                                            <div id="choices--choices-country-item-choice-5"
                                                                class="choices__item choices__item--choice is-selected choices__item--selectable"
                                                                role="option" data-choice="" data-id="5"
                                                                data-value="Argentina"
                                                                data-select-text="Press to select"
                                                                data-choice-selectable="">Argentina</div>
                                                            <div id="choices--choices-country-item-choice-6"
                                                                class="choices__item choices__item--choice choices__item--selectable"
                                                                role="option" data-choice="" data-id="6"
                                                                data-value="Brasil" data-select-text="Press to select"
                                                                data-choice-selectable="">Brasil</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="button-row d-flex mt-4 col-12">
                                                <button class="btn bg-gradient-light mb-0 js-btn-prev" type="button"
                                                    title="Prev">Prev</button>
                                                <button class="btn bg-gradient-dark ms-auto mb-0" type="button"
                                                    title="Send">Send</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card multisteps-form__panel p-3 bg-white" style="border-radius:0.5rem;"
                                    data-animation="FadeIn">
                                    <div class="row text-center">
                                        <div class="col-10 mx-auto">
                                            <h5 class="font-weight-normal">Are you living in a nice area?</h5>
                                            <p>One thing I love about the later sunsets is the chance to go for a walk
                                                through the neighborhood woods before dinner</p>
                                        </div>
                                    </div>
                                    <div class="multisteps-form__content">
                                        <div class="row text-start">
                                            <div class="col-12 col-md-8 ms-auto mt-3">
                                                <label>Street Name</label>
                                                <input class="multisteps-form__input form-control" type="text"
                                                    placeholder="Eg. Soft" onfocus="focused(this)"
                                                    onfocusout="defocused(this)">
                                            </div>
                                            <div class="col-12 col-md-4 ms-auto mt-3">
                                                <label>Street No</label>
                                                <input class="multisteps-form__input form-control" type="number"
                                                    placeholder="Eg. 221" onfocus="focused(this)"
                                                    onfocusout="defocused(this)">
                                            </div>
                                            <div class="col-12 col-md-7 ms-auto mt-3">
                                                <label>City</label>
                                                <input class="multisteps-form__input form-control" type="text"
                                                    placeholder="Eg. Tokyo" onfocus="focused(this)"
                                                    onfocusout="defocused(this)">
                                            </div>
                                            <div class="col-12 col-md-5 ms-auto mt-3 text-start">
                                                <label>Country</label>
                                                <div class="choices" data-type="select-one" tabindex="0" role="combobox"
                                                    aria-autocomplete="list" aria-haspopup="true" aria-expanded="false">
                                                    <div class="choices__inner"><select
                                                            class="form-control choices__input" name="choices-country"
                                                            id="choices-country" hidden="" tabindex="-1"
                                                            data-choice="active">
                                                            <option value="Argentina">Argentina</option>
                                                        </select>
                                                        <div class="choices__list choices__list--single">
                                                            <div class="choices__item choices__item--selectable"
                                                                data-item="" data-id="1" data-value="Argentina"
                                                                data-custom-properties="null" aria-selected="true">
                                                                Argentina</div>
                                                        </div>
                                                    </div>
                                                    <div class="choices__list choices__list--dropdown"
                                                        aria-expanded="false"><input type="text"
                                                            class="choices__input choices__input--cloned"
                                                            autocomplete="off" autocapitalize="off" spellcheck="false"
                                                            role="textbox" aria-autocomplete="list" aria-label="false"
                                                            placeholder="">
                                                        <div class="choices__list" role="listbox">
                                                            <div id="choices--choices-country-item-choice-1"
                                                                class="choices__item choices__item--choice choices__item--selectable is-highlighted"
                                                                role="option" data-choice="" data-id="1"
                                                                data-value="Albania" data-select-text="Press to select"
                                                                data-choice-selectable="" aria-selected="true">Albania
                                                            </div>
                                                            <div id="choices--choices-country-item-choice-2"
                                                                class="choices__item choices__item--choice choices__item--selectable"
                                                                role="option" data-choice="" data-id="2"
                                                                data-value="Algeria" data-select-text="Press to select"
                                                                data-choice-selectable="">Algeria</div>
                                                            <div id="choices--choices-country-item-choice-3"
                                                                class="choices__item choices__item--choice choices__item--selectable"
                                                                role="option" data-choice="" data-id="3"
                                                                data-value="Andorra" data-select-text="Press to select"
                                                                data-choice-selectable="">Andorra</div>
                                                            <div id="choices--choices-country-item-choice-4"
                                                                class="choices__item choices__item--choice choices__item--selectable"
                                                                role="option" data-choice="" data-id="4"
                                                                data-value="Angola" data-select-text="Press to select"
                                                                data-choice-selectable="">Angola</div>
                                                            <div id="choices--choices-country-item-choice-5"
                                                                class="choices__item choices__item--choice is-selected choices__item--selectable"
                                                                role="option" data-choice="" data-id="5"
                                                                data-value="Argentina"
                                                                data-select-text="Press to select"
                                                                data-choice-selectable="">Argentina</div>
                                                            <div id="choices--choices-country-item-choice-6"
                                                                class="choices__item choices__item--choice choices__item--selectable"
                                                                role="option" data-choice="" data-id="6"
                                                                data-value="Brasil" data-select-text="Press to select"
                                                                data-choice-selectable="">Brasil</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="button-row d-flex mt-4 col-12">
                                                <button class="btn bg-gradient-light mb-0 js-btn-prev" type="button"
                                                    title="Prev">Prev</button>
                                                <button class="btn bg-gradient-dark ms-auto mb-0" type="button"
                                                    title="Send">Send</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card multisteps-form__panel p-3 bg-white" style="border-radius:0.5rem;"
                                    data-animation="FadeIn">
                                    <div class="row text-center">
                                        <div class="col-10 mx-auto">
                                            <h5 class="font-weight-normal">Are you living in a nice area?</h5>
                                            <p>One thing I love about the later sunsets is the chance to go for a walk
                                                through the neighborhood woods before dinner</p>
                                        </div>
                                    </div>
                                    <div class="multisteps-form__content">
                                        <div class="row text-start">
                                            <div class="col-12 col-md-8 ms-auto mt-3">
                                                <label>Street Name</label>
                                                <input class="multisteps-form__input form-control" type="text"
                                                    placeholder="Eg. Soft" onfocus="focused(this)"
                                                    onfocusout="defocused(this)">
                                            </div>
                                            <div class="col-12 col-md-4 ms-auto mt-3">
                                                <label>Street No</label>
                                                <input class="multisteps-form__input form-control" type="number"
                                                    placeholder="Eg. 221" onfocus="focused(this)"
                                                    onfocusout="defocused(this)">
                                            </div>
                                            <div class="col-12 col-md-7 ms-auto mt-3">
                                                <label>City</label>
                                                <input class="multisteps-form__input form-control" type="text"
                                                    placeholder="Eg. Tokyo" onfocus="focused(this)"
                                                    onfocusout="defocused(this)">
                                            </div>
                                            <div class="col-12 col-md-5 ms-auto mt-3 text-start">
                                                <label>Country</label>
                                                <div class="choices" data-type="select-one" tabindex="0" role="combobox"
                                                    aria-autocomplete="list" aria-haspopup="true" aria-expanded="false">
                                                    <div class="choices__inner"><select
                                                            class="form-control choices__input" name="choices-country"
                                                            id="choices-country" hidden="" tabindex="-1"
                                                            data-choice="active">
                                                            <option value="Argentina">Argentina</option>
                                                        </select>
                                                        <div class="choices__list choices__list--single">
                                                            <div class="choices__item choices__item--selectable"
                                                                data-item="" data-id="1" data-value="Argentina"
                                                                data-custom-properties="null" aria-selected="true">
                                                                Argentina</div>
                                                        </div>
                                                    </div>
                                                    <div class="choices__list choices__list--dropdown"
                                                        aria-expanded="false"><input type="text"
                                                            class="choices__input choices__input--cloned"
                                                            autocomplete="off" autocapitalize="off" spellcheck="false"
                                                            role="textbox" aria-autocomplete="list" aria-label="false"
                                                            placeholder="">
                                                        <div class="choices__list" role="listbox">
                                                            <div id="choices--choices-country-item-choice-1"
                                                                class="choices__item choices__item--choice choices__item--selectable is-highlighted"
                                                                role="option" data-choice="" data-id="1"
                                                                data-value="Albania" data-select-text="Press to select"
                                                                data-choice-selectable="" aria-selected="true">Albania
                                                            </div>
                                                            <div id="choices--choices-country-item-choice-2"
                                                                class="choices__item choices__item--choice choices__item--selectable"
                                                                role="option" data-choice="" data-id="2"
                                                                data-value="Algeria" data-select-text="Press to select"
                                                                data-choice-selectable="">Algeria</div>
                                                            <div id="choices--choices-country-item-choice-3"
                                                                class="choices__item choices__item--choice choices__item--selectable"
                                                                role="option" data-choice="" data-id="3"
                                                                data-value="Andorra" data-select-text="Press to select"
                                                                data-choice-selectable="">Andorra</div>
                                                            <div id="choices--choices-country-item-choice-4"
                                                                class="choices__item choices__item--choice choices__item--selectable"
                                                                role="option" data-choice="" data-id="4"
                                                                data-value="Angola" data-select-text="Press to select"
                                                                data-choice-selectable="">Angola</div>
                                                            <div id="choices--choices-country-item-choice-5"
                                                                class="choices__item choices__item--choice is-selected choices__item--selectable"
                                                                role="option" data-choice="" data-id="5"
                                                                data-value="Argentina"
                                                                data-select-text="Press to select"
                                                                data-choice-selectable="">Argentina</div>
                                                            <div id="choices--choices-country-item-choice-6"
                                                                class="choices__item choices__item--choice choices__item--selectable"
                                                                role="option" data-choice="" data-id="6"
                                                                data-value="Brasil" data-select-text="Press to select"
                                                                data-choice-selectable="">Brasil</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="button-row d-flex mt-4 col-12">
                                                <button class="btn bg-gradient-light mb-0 js-btn-prev" type="button"
                                                    title="Prev">Prev</button>
                                                <button class="btn bg-gradient-dark ms-auto mb-0" type="button"
                                                    title="Send">Send</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="<?php echo $base_url?>assets/js/multistep-form.js"></script>