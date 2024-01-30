@section('title', 'Add Customers - Sales')

@section('scriptCrud')
    <script src="{{ asset('js/crud/sales/customers/customer-list/add.js') }}" ></script>
@endsection

<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Toolbar-->
    <div class="toolbar" id="kt_toolbar">
        <!--begin::Container-->
        <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
            <!--begin::Page title-->
            <div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                <!--begin::Title-->
                <h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1">Add Customer</h1>
                <!--end::Title-->
                <!--begin::Separator-->
                <span class="h-20px border-gray-300 border-start mx-4"></span>
                <!--end::Separator-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">
                        <a href="../../demo1/dist/index.html" class="text-muted text-hover-primary">Home</a>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-300 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">Sales</li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-300 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-dark">Add Customer</li>
                    <!--end::Item-->
                   
                </ul>
                <!--end::Breadcrumb-->
            </div>
            <!--end::Page title-->
     
        </div>
        <!--end::Container-->
    </div>
    <!--end::Toolbar-->
    <!--begin::Post-->
    <div class="post d-flex flex-column-fluid" id="kt_post" wire:ignore>
        <!--begin::Container-->
        <div id="kt_content_container" class="container-xxl">
            <!--begin::Form-->
            <form id="add_customer" method="POST" action="javascript:void(0)" enctype="multipart/form-data" class="form d-flex flex-column flex-lg-row">
                @csrf
                <!--begin::Aside column-->
                <div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px mb-7 me-lg-10">
                    <!--begin::Thumbnail settings-->
                    <div class="card card-flush py-4">
                        <!--begin::Card header-->
                        <div class="card-header">
                            <!--begin::Card title-->
                            <div class="card-title">
                                <h2>NPWP</h2>
                            </div>
                            <!--end::Card title-->
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body text-center pt-0">
                            <!--begin::Image input-->
                            <div id="npwpData" class="image-input image-input-empty image-input-outline mb-3" data-kt-image-input="true" style="background-image: url(assets/media/svg/files/blank-image.svg)">
                                <!--begin::Preview existing avatar-->
                                <div id="img-add-cust" class="image-input-wrapper w-150px h-150px"></div>
                                <embed id="npwp-file" src="" class="fileView" frameborder="0" style="display: none" width="200" height="200"></embed>
                                <!--end::Preview existing avatar-->
                                <!--begin::Label-->
                                <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change NPWP">
                                    <i class="bi bi-pencil-fill fs-7"></i>
                                    <!--begin::Inputs-->
                                    <input type="file" name="npwp_image" id="npwp_image" accept=".png, .jpg, .jpeg, .pdf" />
                                    <input type="hidden" name="avatar_remove" />
                                    <!--end::Inputs-->
                                </label>
                                <!--end::Label-->
                                <!--begin::Cancel-->
                                <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel NPWP">
                                    <i class="bi bi-x fs-2"></i>
                                </span>
                                <!--end::Cancel-->
                                <!--begin::Remove-->
                                <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove NPWP">
                                    <i class="bi bi-x fs-2"></i>
                                </span>
                                <!--end::Remove-->
                            </div>
                            <!--end::Image input-->
                            <!--begin::Description-->
                            <div class="text-muted fs-7">Upload File NPWP. Format .jpg, .png, .jpeg, .pdf</div>
                            <!--end::Description-->

                            <div class="mb-10 mt-10 fv-row text-left">
                                <!--begin::Label-->
                                <label class=" form-label ">NPWP</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="npwp" id="npwp" class="form-control mb-2" placeholder="Customer NPWP" value="" />
                                <!--end::Input-->
                                <!--begin::Description-->
                                <div class="text-muted fs-7">Format penulisan xx.yyy.yyy-z.xxx.xxx</div>
                                <!--end::Description-->
                            </div>
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Thumbnail settings-->
                       
                    <!--begin::Status-->
                    <div class="card card-flush py-4">
                        <!--begin::Card header-->
                        <div class="card-header">
                            <!--begin::Card title-->
                            <div class="card-title">
                                <h2>Status</h2>
                            </div>
                            <!--end::Card title-->
                            <!--begin::Card toolbar-->
                            <div class="card-toolbar">
                                <div class="rounded-circle bg-success w-15px h-15px" id="kt_ecommerce_add_product_status"></div>
                            </div>
                            <!--begin::Card toolbar-->
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body pt-0">
                            <!--begin::Select2-->
                            <select class="form-select mb-2" name="status" data-control="select2" data-hide-search="true" data-placeholder="-- Select status --" id="status">
                                <option></option>
                                <option value="1" selected="selected">Active</option>
                                <option value="0">Non Active</option>
                            </select>
                            <!--end::Select2-->
                            <!--begin::Description-->
                            <!--end::Description-->
                            <!--begin::Datepicker-->
                            <div class="d-none mt-10">
                                <label for="kt_ecommerce_add_product_status_datepicker" class="form-label">Select publishing date and time</label>
                                <input class="form-control" id="kt_ecommerce_add_product_status_datepicker" placeholder="Pick date &amp; time" />
                            </div>
                            <!--end::Datepicker-->
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Status-->
                 
                </div>
                <!--end::Aside column-->
                <!--begin::Main column-->
                <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                    <!--end:::Tabs-->
                    <!--begin::Tab content-->
                    <div class="tab-content">
                        <!--begin::Tab pane-->
                        <div class="tab-pane fade show active" id="kt_ecommerce_add_product_general" role="tab-panel">
                            <div class="d-flex flex-column gap-7 gap-lg-10">
                                <!--begin::General options-->
                                <div class="card card-flush py-4">
                                    <!--begin::Card header-->
                                    <div class="card-header">
                                        <div class="card-title">
                                            <h2>General</h2>
                                        </div>
                                    </div>
                                    <!--end::Card header-->
                                    <!--begin::Card body-->
                                    <div class="card-body pt-0">
                                        <div class="d-flex flex-wrap gap-5 mb-5">
                                            <div class="mb-5 fv-row text-left w-100 flex-md-root" wire:ignore>
                                                <!--begin::Label-->
                                                <label class="required form-label">Name Customer</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="text" name="name" id="name" class="form-control mb-2" placeholder="Name Customer" value="" />
                                                <!--end::Input-->
                                                <!--begin::Description-->
                                                <!--end::Description-->
                                            </div>
                                            <!--end::Input group-->
                                            <!--begin::Input group-->
                                            <div class="mb-5 fv-row text-left w-100 flex-md-root" wire:ignore>
                                                <!--begin::Label-->
                                                <label class="required form-label">Email Customer</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="email" name="email" id="email" class="form-control mb-2" placeholder="Email Customer" value="" />
                                                <!--end::Input-->
                                                <!--begin::Description-->
                                                <!--end::Description-->
                                            </div>
                                        </div>
                                        <div class="d-flex flex-wrap gap-5 mb-5">
                                            <div class="mb-5 fv-row text-left w-100 flex-md-root" wire:ignore>
                                                <label class=" form-label">Phone Customer</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="number" name="phone" id="phone" class="form-control mb-2" placeholder="Phone Customer" value="" />
                                                <!--end::Input-->
                                            </div>
                                            <div class="mb-5 fv-row text-left w-100 flex-md-root" wire:ignore>
                                                <label class=" form-label">Businness Area</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="text" name="business_area" id="business_area" class="form-control mb-2" placeholder="Businness Area" value="" />
                                                <!--end::Input-->
                                                <!--begin::Description-->
                                                <!--begin::Description-->
                                            </div>
                                           
                                        </div>
                                        <div class="d-flex flex-wrap gap-5 mb-5">
                                         
                                            <div class="mb-5 fv-row text-left w-100 flex-md-root" wire:ignore>
                                                <label class=" form-label">City Customer</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <select class="form-select" name="city" id="city" data-control="select2" data-placeholder="-- Select city --">
                                                    <option></option>
                                                    @foreach ($cities as $city)
                                                        <option value="{{ $city->id }}">{{ $city->name }}</option>
                                                    @endforeach
                                                </select>
                                                <!--end::Input-->
                                                <!--begin::Description-->
                                            </div>
                                            <div class="mb-5 fv-row text-left w-100 flex-md-root" wire:ignore>
                                                <label class=" form-label">Address Customer</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <textarea type="text" name="address" id="address" class="form-control mb-2" placeholder="Address Customer" value="" ></textarea>
                                                <!--end::Input-->
                                            </div>
                                           
                                        </div>
                                        <!--begin::Input group-->
                                        <!--end::Input group-->
                                      
                                    </div>
                                    <!--end::Card header-->
                                </div>
                                <!--end::General options-->
                                <div class="card card-flush py-4">
                                    <!--begin::Card header-->
                                    <div class="card-header">
                                        <div class="card-title">
                                            <h2>PIC</h2>
                                        </div>
                                    </div>
                                    <!--end::Card header-->
                                    <!--begin::Card body-->
                                    <div class="card-body pt-0">
                                        <div class="d-flex flex-wrap gap-5 mb-5">
                                         
                                            <div class="mb-5 fv-row text-left w-100 flex-md-root" wire:ignore>
                                                <label class=" form-label">PIC Name</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                                <input type="text" name="pic" id="pic" class="form-control mb-2" placeholder="PIC" value="" />
                                            <!--end::Input-->
                                            </div>
                                            <div class="mb-5 fv-row text-left w-100 flex-md-root" wire:ignore>
                                                <label class=" form-label">PIC Position</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="text" name="pic_position" id="pic_position" class="form-control mb-2" placeholder="PIC Position" value="" />
                                                <!--end::Input-->
                                            </div>
                                            <div class="mb-5 fv-row text-left w-100 flex-md-root" wire:ignore>
                                                <label class=" form-label">PIC Phone</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="text" name="pic_phone" id="pic_phone" class="form-control mb-2" placeholder="PIC Phone" value="" />
                                                <!--end::Input-->
                                            </div>
                                           
                                        </div>
                                        <!--begin::Input group-->
                                     
                                    </div>
                                    <!--end::Card header-->
                                </div>
                            </div>
                        </div>
                        <!--end::Tab pane-->
                  
                        <!--end::Tab pane-->
                    </div>
                    <!--end::Tab content-->
                    <div class="d-flex justify-content-end">
                        <!--begin::Button-->
                        <a href="{{ route('customer.index') }}" id="kt_ecommerce_add_customer_cancel" class="btn btn-light me-5">Cancel</a>
                        <!--end::Button-->
                        <!--begin::Button-->
                        <button type="submit" id="kt_ecommerce_add_customer_submit" class="btn btn-primary" data-kt-customers-action="submit" >
                            <span class="indicator-label" >Save Changes</span>
                            <span class="indicator-progress">Please wait...
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                        <!--end::Button-->
                    </div>
                </div>
                <!--end::Main column-->
            </form>
            <!--end::Form-->
        </div>
        <!--end::Container-->
    </div>
  
    <!--end::Post-->
</div>
<script>
   
$("#nik_image").on("change", function (e) {
    var file = e.target.files[0]
    if(file.type == "application/pdf"){
        document.getElementById(
            "img-add-cust2"
        ).style.display = "none";
        document.getElementById(
            "nik-file"
        ).style.display = "block";
        $("#nik-file").attr("src", URL.createObjectURL(event.target.files[0]));
    } else{
        document.getElementById("nik-file").style.display = "none"
        document.getElementById("img-add-cust2").style.display = "block"
    }
})
$("#npwp_image").on("change", function (e) {
    var file = e.target.files[0]
    if(file.type == "application/pdf"){
        document.getElementById(
            "img-add-cust"
        ).style.display = "none";
        document.getElementById(
            "npwp-file"
        ).style.display = "block";
        $("#npwp-file").attr("src", URL.createObjectURL(event.target.files[0]));
    }else{
        document.getElementById("npwp-file").style.display = "none"
        document.getElementById("img-add-cust").style.display = "block"
    }
});
 
</script>