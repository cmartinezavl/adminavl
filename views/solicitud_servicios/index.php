<?php include '../../head.php';?>
<style>
.card {
    margin-block-end: 0rem !important;
}

.fc-col-header {
    width: 100% !important;
}

.fc-daygrid-body {
    width: 100% !important;
}

.fc-scrollgrid-sync-table {
    width: 100% !important;
}
#full-calendar-activity li:hover {
    color: var(--default-text-color);
    background-color: var(--list-hover-focus-bg);
    border-radius: 4px;
    cursor:pointer;
}
</style>
<div class="container-full mt-2 mb-2">
    <div class="row g-2">
        <div class="col-xl-3">
            <div class="card custom-card">
                <div class="card-header d-grid">
                    <button class="btn btn-primary-transparent" id="btn-crear-solicitud"><i
                            class="ri-add-line align-middle me-1 fw-semibold d-inline-block"></i>Crear una nueva
                        solicitud</button>
                </div>
                <div class="card-body p-0">
                    <div class="p-3">
                        <div class="d-flex align-items-center justify-content-between">
                            <h6 class="fw-semibold">
                                Solicitudes
                            </h6>
                        </div>
                        <div class="input-group">
                            <input type="search" class="form-control px-2" placeholder="Buscar..." id="contenido">
                            <a href="javascript:void(0);" class="input-group-text" id="btn-buscar"><i
                                    class="fe fe-search header-link-icon fs-18"></i></a>
                        </div>
                    </div>
                    <hr class="p-0 m-0">
                    <div class="p-3 border-bottom">
                        <ul class="list-unstyled mb-0 fullcalendar-events-activity" id="full-calendar-activity">
                            <li>
                                <a href="">
                                    <div class="d-flex align-items-center justify-content-between flex-wrap">
                                        <p class="mb-1 fw-semibold">
                                            Monday, Jan 1,2023
                                        </p>
                                        <!-- <span class="badge bg-light text-default mb-1">12:00PM - 1:00PM</span> -->
                                    </div>
                                    <p class="mb-0 text-muted fs-12">
                                        Meeting with a client about new project requirement.
                                    </p>
                                </a>
                            </li>
                            <li>
                                <div class="d-flex align-items-center justify-content-between flex-wrap">
                                    <p class="mb-1 fw-semibold">
                                        Thursday, Dec 29,2022
                                    </p>
                                    <!-- <span class="badge bg-success mb-1">Completed</span> -->
                                </div>
                                <p class="mb-0 text-muted fs-12">
                                    Birthday party of niha suka
                                </p>
                            </li>
                            <li>
                                <div class="d-flex align-items-center justify-content-between flex-wrap">
                                    <p class="mb-1 fw-semibold">
                                        Wednesday, Jan 3,2023
                                    </p>
                                    <!-- <span class="badge bg-warning-transparent mb-1">Reminder</span> -->
                                </div>
                                <p class="mb-0 text-muted fs-12">
                                    WOrk taget for new project is completing
                                </p>
                            </li>
                            <li>
                                <div class="d-flex align-items-center justify-content-between flex-wrap">
                                    <p class="mb-1 fw-semibold">
                                        Friday, Jan 20,2023
                                    </p>
                                    <!-- <span class="badge bg-light text-default mb-1">06:00PM - 09:00PM</span> -->
                                </div>
                                <p class="mb-0 text-muted fs-12">
                                    Watch new movie with family
                                </p>
                            </li>
                            <li>
                                <div class="d-flex align-items-center justify-content-between flex-wrap">
                                    <p class="mb-1 fw-semibold">
                                        Saturday, Jan 07,2023
                                    </p>
                                    <!-- <span class="badge bg-danger-transparent mb-1">Due Date</span> -->
                                </div>
                                <p class="mb-0 text-muted fs-12">
                                    Last day to pay the electricity bill and water bill.need to check the bank details.
                                </p>
                            </li>
                        </ul>
                    </div>
                    <div class="p-3">
                        <img src="<?php echo $baseUrl; ?>/assets/images/media/media-83.svg" alt="">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-9">
            <div class="card custom-card">
                <div class="card-body">
                    <div id='calendar2'></div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include '../../views/solicitud_servicios/modal_agregar_solicitud.php'; ?>
<script src="../../controllers/solicitud_servicios/solicitudServiciosController.js"></script>
<script async
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBzYoA7Qxha8oqBaMHlkPC_7g0EsFeOjwc&callback=initMap&loading=async">
</script>
<?php include '../../body.php'; ?>