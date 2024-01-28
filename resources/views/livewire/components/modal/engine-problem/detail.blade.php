<div class="modal fade" id="detail_engine_problem" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered" style="max-width : 1500px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header" id="Machine_header">
                <!--begin::Modal title-->
                <h2 class="fw-bolder">Detail Engine Problem</h2>
                <!--end::Modal title-->
                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-icon-primary" data-bs-dismiss="modal" >
                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                    <span class="svg-icon svg-icon-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
                            <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                </div>
                <!--end::Close-->
            </div>
            <!--end::Modal header-->
            <!--begin::Modal body-->
            <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                <!--begin::Form-->
                <form id="detail_engine_problem_form" method="post" action="javascript:void(0)" class="form" enctype="multipart/form-data">
                    <!--begin::Scroll-->
                    @csrf
                    <div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_add_company_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#packingType_header" data-kt-scroll-wrappers="#kt_modal_add_company_scroll" data-kt-scroll-offset="300px">
                        <div class="d-flex flex-wrap gap-5 mb-5" > 
                            <div class="fv-row mb-7 flex-md-root">
                                <!--begin::Label-->
                                <label class=" fw-bold fs-6 mb-2">Date</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="date" name="date" id="detail_date" disabled data-dropdown-parent="#detail_engine_problem" class="form-control mb-3 mb-lg-0" placeholder="-- Select Date --" />
                                <!--end::Input-->
                            </div>
                            <div class="fv-row mb-7 flex-md-root">
                                <!--begin::Label-->
                                <label class=" fw-bold fs-6 mb-2">Reference</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input class="form-control" disabled name="production_planning_id" id="detail_production_planning_id" />
                                <!--end::Input-->
                            </div>
                        </div>
                        <!--end::Input group-->
                        <table class="table align-middle table-row-dashed fs-6 gy-5" id="detail_engine_problem_table">
                            <!--begin::Table head--> 
                            <thead>
                                <!--begin::Table row-->
                                <tr class="text-center text-muted fw-bolder fs-7 text-uppercase gs-0">
                                    <th class="min-w-10px">Machine</th>
                                    <th class="min-w-100px">Start</th>
                                    <th class="min-w-100px">End</th>
                                    <th class="min-w-300px">Problem</th>
                                    <th class="min-w-50px">Category</th>
                                </tr>
                                <!--end::Table row-->
                            </thead>
                            <!--end::Table head-->
                            <!--begin::Table body-->
                            <tbody class="text-gray-600 fw-bold text-center">
                            </tbody> 
                            <!--end::Table body-->
                        </table>
                    </div>
                    <!--end::Scroll-->
                    <!--begin::Actions-->
                    <div class="text-center pt-15">
                        <button type="reset" class="btn btn-light me-3" data-bs-dismiss="modal">Discard</button>
                    </div>
                    <!--end::Actions-->
                </form>
                <!--end::Form-->
            </div>
            <!--end::Modal body-->
        </div>
        <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
    <script>
        // $('#date').flatpickr();
    </script>
</div>
