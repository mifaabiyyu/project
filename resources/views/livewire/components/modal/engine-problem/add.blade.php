<div class="modal fade" id="add_engine_problem" tabindex="-1" data-bs-backdrop="static" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered" style="max-width : 1500px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header" id="Machine_header">
                <!--begin::Modal title-->
                <h2 class="fw-bolder">Add Engine Problem</h2>
                <!--end::Modal title-->
                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-engine-problem-modal-action="close">
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
                <form id="add_engine_problem_form" method="post" action="javascript:void(0)" class="form" enctype="multipart/form-data">
                    <!--begin::Scroll-->
                    @csrf
                    <div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_add_company_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#packingType_header" data-kt-scroll-wrappers="#kt_modal_add_company_scroll" data-kt-scroll-offset="300px">
                        <div class="d-flex flex-wrap gap-5 mb-5" > 
                            <div class="fv-row mb-7 flex-md-root">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">Date</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="date" name="date" id="date" data-dropdown-parent="#add_engine_problem" class="form-control mb-3 mb-lg-0" placeholder="-- Select Date --" />
                                <!--end::Input-->
                            </div>
                            <div class="fv-row mb-7 flex-md-root">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">Reference</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <select class="form-select" data-dropdown-parent="#add_engine_problem" data-control="select2" name="production_planning_id" data-placeholder="-- Select Production Planning --" id="production_planning_id">
                                    <option></option>
                                    @foreach ($planning as $item)
                                        <option value="{{ $item->id }}">{{ $item->code }}</option>
                                    @endforeach
                                </select>
                                <!--end::Input-->
                            </div>
                        </div>
                        <!--end::Input group-->
                        <table class="table align-middle table-row-dashed fs-6 gy-5" >
                            <!--begin::Table head--> 
                            <thead>
                                <!--begin::Table row-->
                                <tr class="text-center text-muted fw-bolder fs-7 text-uppercase gs-0">
                                    <th class="min-w-10px">Machine</th>
                                    <th class="min-w-100px">Start</th>
                                    <th class="min-w-100px">End</th>
                                    <th class="min-w-300px">Problem</th>
                                    <th class="min-w-50px">Category</th>
                                    <th class=" min-w-50px">Actions</th>
                                </tr>
                                <!--end::Table row-->
                            </thead>
                            <!--end::Table head-->
                            <!--begin::Table body-->
                            <tbody class="text-gray-600 fw-bold text-center">
                            </tbody> 
                            <!--end::Table body-->
                        </table>
                        <div id="engine_problem">
                            <!--begin::Form group-->
                            <div class="form-group">
                                <div data-repeater-list="engine_problem">
                                    <div data-repeater-item>
                                        <div class="form-group row mb-5 ">
                                            {{-- <input type="hidden" name="reference_id"> --}}
                                            <div class="col-md-1">
                                                {{-- <label class="form-label">Machine :</label> --}}
                                                <select class="form-select" data-kt-repeater="machine" data-dropdown-parent="#add_engine_problem" name="machine" data-kt-repeater="select2" data-placeholder="-- Select Machine --">
                                                    <option></option>
                                                    @foreach ($dataMachine as $mch)
                                                        <option value="{{ $mch->id }}">{{ $mch->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-2 ">
                                                {{-- <label class="form-label">Start :</label> --}}
                                                <input type="time"  name="start_time" class="form-control" placeholder="Start"  aria-describedby="basic-addon1"/>
                                            </div>
                                            <div class="col-md-2">
                                                {{-- <label class="form-label">End :</label> --}}
                                                <input type="time"  name="end_time" class="form-control" placeholder="End"  aria-describedby="basic-addon1"/>
                                            </div>
                                            <div class="col-md-4">
                                                {{-- <label class="form-label">Problem :</label> --}}
                                                <textarea name="problem" class="form-control" data-kt-autosize="true" placeholder="Problem"  aria-describedby="basic-addon1"></textarea>

                                            </div>
                                            <div class="col-md-2">
                                                {{-- <label class="form-label">Category  :</label> --}}
                                                <select class="form-select" data-kt-repeater="machine" data-dropdown-parent="#add_engine_problem" name="category" data-kt-repeater="select2" data-placeholder="-- Category --">
                                                    <option></option>
                                                    <option value="minor">Minor</option>
                                                    <option value="major">Major</option>
                                                    <option value="lain-lain">Lain - lain</option>
                                                </select>
                                            </div>
                                            <div class="col-md-1">
                                                <a href="javascript:;" data-repeater-delete class="btn btn-sm btn-light-danger ">
                                                    <i class="la la-trash-o fs-3"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end::Form group-->

                            <!--begin::Form group-->
                            <div class="form-group">
                                <a href="javascript:;" data-repeater-create class="btn btn-light-primary">
                                    <i class="la la-plus"></i>Add
                                </a>
                            </div>
                            <!--end::Form group-->
                        </div>
                    </div>
                    <!--end::Scroll-->
                    <!--begin::Actions-->
                    <div class="text-center pt-15">
                        <button type="reset" class="btn btn-light me-3" data-kt-engine-problem-modal-action="cancel">Discard</button>
                        <button type="submit" class="btn btn-primary" data-kt-engine-problem-modal-action="submit">
                            <span class="indicator-label">Submit</span>
                            <span class="indicator-progress">Please wait...
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
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
