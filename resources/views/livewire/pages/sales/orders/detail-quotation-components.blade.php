@section('title', 'Detail Invoice - Sales')

@section('scriptCrud')
<script>

 
    
</script>
    {{-- <script src="{{ asset('js/crud/sales/customers/quotation/action.js') }}" ></script> --}}
    {{-- <script src="{{ asset('js/crud/sales/customers/quotation/add.js') }}" ></script> --}}
    <script src="{{ asset('js/crud/sales/customers/quotation/delete.js') }}" ></script>
@endsection

<div class="content d-flex flex-column flex-column-fluid pt-4 pb-30" id="kt_content" wire:ignore.self>
    <!--begin::Toolbar-->
    <div class="toolbar" id="kt_toolbar" wire:ignore>
        <!--begin::Container-->
        <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack" wire:ignore.self>
            <!--begin::Page title-->
            <div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                <!--begin::Title-->
                <h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1">Detail Invoice</h1>
                <!--end::Title-->
                <!--begin::Separator-->
                <span class="h-20px border-gray-300 border-start mx-4"></span>
                <!--end::Separator-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">
                        <a href="{{ route('dashboard') }}" class="text-muted text-hover-primary">Home</a>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-300 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">Sales Quotation</li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-300 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-dark">Detail Invoice</li>
                    <!--end::Item-->
                   
                </ul>
                <!--end::Breadcrumb-->
            </div>
            <!--end::Page title-->
     
        </div>
        <!--end::Container-->
    </div>
    <!--end::Toolbar-->
    
    <div class="modal fade" id="shareLink" tabindex="-1" aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Modal header-->
                <div class="modal-header" id="Ekspedisi_header">
                    <!--begin::Modal title-->
                    <h2 class="fw-bolder">Get Shareable Link</h2>
                    <!--end::Modal title-->
                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-icon-primary" data-bs-dismiss="modal" data-kt-sales-quotation-action="close">
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
                    <form id="add_ekspedisi_form" method="post" action="javascript:void(0)" class="form" enctype="multipart/form-data">
                        <!--begin::Scroll-->
                        @csrf
                        <div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_add_company_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#packingType_header" data-kt-scroll-wrappers="#kt_modal_add_company_scroll" data-kt-scroll-offset="300px">
                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">Anyone with the link can view the invoice</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <div class="input-group">
                                    <input type="text" readonly class="form-control" id="kt_clipboard_1" value="{{ route('checkout', base64_encode($data->code)) }}" placeholder="Type some value to copy"/>
                                    <div class="input-group-append">
                                        {{-- <a href="javascript:void(0)" class="btn btn-secondary" onclick="myFunction()" data-clipboard="true" data-clipboard-target="#kt_clipboard_1"><i class="la la-copy"></i></a> --}}
                                    </div>
                                </div>
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->
                        </div>
                        <!--end::Scroll-->
                        <!--begin::Actions-->
                        <div class="text-center pt-15">
                            <button class="btn btn-light me-3" data-bs-dismiss="modal" data-kt-sales-quotation-action="close" >Close</button>
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
    </div>

    <!--begin::Post-->
    <div class="post d-flex flex-column-fluid" id="kt_post" wire:ignore.self>
        <!--begin::Container-->
        <div id="kt_content_container" class="container-xxl" wire:ignore.self>
            <!--begin::Form-->
            <form id="add_sales_quotation" method="POST" action="javascript:void(0)" enctype="multipart/form-data" class="form d-flex flex-column flex-lg-row" wire:ignore.self>
                @csrf
                <!--begin::Main column-->
                <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                    <!--end:::Tabs-->
                    <!--begin::Tab content-->
                    <div class="tab-content">
                        <!--begin::Tab pane-->
                        <div class="tab-pane fade show active" id="general_contractor" role="tab-panel" wire:ignore.self>
                            <div class="d-flex flex-column gap-7 gap-lg-10">
                                <!--begin::General options-->
                                <div class="card card-flush py-4">
                                    <!--begin::Card header-->
                                    <div class="card-header">
                                        <div class="card-title">
                                            <h2>{{ $data->code }}</h2>
                                        </div>
                                        <div class="text-end mb-4 mt-4 ">
                                            <button class="btn fw-bolder btn-warning me-3 " data-bs-toggle="modal" data-bs-target="#shareLink">Share Link</button>
                                            <a href="{{ url()->previous() }}" class="btn fw-bolder btn-secondary">Back</a>
                                            <h4 class="mt-5">Total : <span id='total_all'>{{ "Rp " . number_format($data->total,0,'','.') }}</span></h4>
                                        </div>
                                    </div>
                                    <!--end::Card header-->
                                    <!--begin::Card body-->
                                    <div class="card-body pt-0">
                                        <!--begin::Input group-->
                                        <div class="d-flex flex-wrap gap-5" >
                                            <div class="mb-5 fv-row w-100 flex-md-root" >
                                                <div class="d-flex justify-content-between">
                                                    <!--begin::Label-->
                                                    <label class=" form-label">Customer</label>
                                                    <!--end::Label-->
                                                    {{-- <button  type="button" data-bs-toggle="modal" id="add-customer" data-bs-target="#add_customer" wire:click.prevent="nambahItem()" class="badge fw-bolder badge-secondary mb-1" style="border: 0" onclick="document.getElementById('check-shipping').checked = true;">Add New</button> --}}
                                                    {{-- <a href="{{ route('admin.sales.index') }}" class="badge fw-bolder badge-secondary mb-4">Add Contractor</a> --}}
                                                </div>
                                                <!--begin::Input-->
                                                <h4>{{ $data->customer_name ?? '-' }}</h4>
                                               
                                                <!--end::Input-->
                                            </div>
                                         
                                            <div class="mb-5 fv-row w-100 flex-md-root" wire:ignore>
                                                <!--begin::Label-->
                                                <label class="form-label ">Expiry Date</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <h6>{{ $data->valid_until ?? '-' }}</h6>
                                                {{-- <input type="datetime-local" class="form-control" name="expiry_date" id="expiry_date" placeholder="Expiry Date" value=""> --}}
                                                <!--end::Input-->
                                            </div>
                                            <div class="mb-5 fv-row w-100 flex-md-root" wire:ignore>
                                                <!--begin::Label-->
                                                <label class="form-label">Status</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <div>
                                                    <span class="font-bolder text-center badge badge-light-{{ $data->status == 1 ? 'success' : 'danger' }}">
                                    {{ $data->get_status->name }}
                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end::Input group-->
                                    
                                        <div class="d-flex flex-wrap gap-5 mt-5" >
                                            <div class="mb-5 fv-row w-100 flex-md-root" wire:ignore>
                                                <!--begin::Label-->
                                                <label class="form-label">Notes</label>
                                                <p>{{ $data->notes ?? '-' }}</p>
                                            </div>
                                            @if (!Auth::user()->hasRole('Customer'))
                                                <div class="mb-5 fv-row w-100 flex-md-root" wire:ignore>
                                                    <!--begin::Label-->
                                                    <label class="form-label">Active Start</label>
                                                    <p>{{ $data->active_start ?? '-' }}</p>
                                                </div>
                                                <div class="mb-5 fv-row w-100 flex-md-root" wire:ignore>
                                                    <!--begin::Label-->
                                                    <label class="form-label">Active End</label>
                                                    <p>{{ $data->active_end ?? '-' }}</p>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                          
                                <div class="d-flex flex-column gap-7 gap-lg-10">
                                    <!--begin::General options-->
                                    <!--end::General options-->
                                    <!--begin::General options-->
                                    <div class="card card-flush py-4">
                                        <!--begin::Card header-->
                                        <div class="card-header">
                                            <div class="card-title">
                                                <h2>List Items</h2>
                                            </div>
                                            <div class="text-end mb-8 mt-4 ">
                                                {{-- <button  type="button"  id="addItem"  class="mr-5 btn btn-success" >
                                                    <span class="indicator-label" >Add Item</span>
                                                </button> --}}
                                            </div>
                                        </div>
                              
                                        <!--begin::Card body-->
                                        <div class="card-body pt-0">
                                            <!--begin::Input group-->
                                            <div class="table-responsive" wire:ignore.self>
                                                <!--begin::Table-->
                                             
                                                <table class="table align-middle text-center table-row-bordered border-4  table-row-gray-300 gy-7" id="table_item" wire:ignore.self>
                                                    <!--begin::Table head-->
                                                    <thead wire:ignore>
                                                        <tr class="fw-bolder text-muted text-center bg-light">
                                                            <th class="min-w-200px">Product</th>
                                                            <th class="min-w-50px">User</th>
                                                            <th class="min-w-50px">Qty</th>
                                                            <th class="min-w-200px">Unit Price</th>
                                                            <th class="min-w-200px">Total Price</th>
                                                            {{-- <th class="min-w-50px">Action</th> --}}
                                                        </tr>
                                                    </thead>
                                                    <!--end::Table head-->
                                                    {{-- <input type="hidden" name="list_items" value="{{ json_encode($listItems, true) }}">
                                                    <input type="hidden" name="tanggal_pengiriman" value="{{ json_encode($tanggal_pengiriman, true) }}">
                                                    <input type="hidden" name="qty_pengiriman" value="{{ json_encode($qty_pengiriman, true) }}"> --}}
                                                    <!--begin::Table body-->
                                                    <tbody>
                                                          @foreach ($data->get_detail as $item)
                                                              <tr>
                                                                <td>{{ $item->product_name }}</td>
                                                                <td>{{ $item->get_product->user }}</td>
                                                                <td>{{ $item->qty }}</td>
                                                                <td>{{ "Rp " . number_format($item->unit_price,0,'','.') }}</td>
                                                                <td>{{ "Rp " . number_format($item->total_price,0,'','.') }}</td>
                                                              </tr>
                                                          @endforeach
                                                        </tbody>
                                                        <!--end::Table body-->
                                                    </table>
                                                  
                                                <!--end::Table-->
                                            </div>
                                        </div>
                                        <!--end::Card header-->
                                    </div>
                                    <div class="d-flex fv-row flex-wrap gap-3">
                                        @can('Quotation.edit')
                                            <a class="btn btn-primary" href="{{ route('quotation.edit', base64_encode($data->code)) }}">Edit</a> 
                                        @endcan
                                        @can('Quotation.delete')
                                            <button type="button" class="btn btn-danger me-3" data-id="{{ base64_encode($data->code) }}" data-kt-quote-table-filter="delete_row">Delete</button>
                                        @endcan
                                    </div>
                                    <!--end::General options-->
                                </div>
                            </div>
                        </div>
                        <!--end::Tab pane-->
                        <!--begin::Tab pane-->
                    </div>
                    <!--end::Tab content-->
                   
                </div>
                <!--end::Main column-->
            </form>
            <!--end::Form-->
        </div>
        <!--end::Container-->
    </div>

 

    <!--end::Post-->
    {{-- <!-- Modal Add Customer -->
    <div class="modal fade" id="add_customer" tabindex="-1" aria-hidden="true" wire:ignore.self>
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Modal header-->
                <div class="modal-header" id="">
                    <!--begin::Modal title-->
                    <h2 class="fw-bolder">Add Customer</h2>
                    <!--end::Modal title-->
                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-icon-primary" data-bs-dismiss="modal">
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
                <div class="modal-body scroll-y mx-5 mx-xl-15 mt-1 mb-5">
                    <!--begin::Form-->
                        <!--begin::Scroll-->
                        <div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_add_company_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#packingType_header" data-kt-scroll-wrappers="#kt_modal_add_company_scroll" data-kt-scroll-offset="300px">
                            <form id="tambah-customer" method="post" action="javascript:void(0)">
                            @csrf
                            <!--begin::Input group-->
                            <div class="fv-row mb-5">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">Company Name</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="name" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Company Name" />
                                <!--end::Input-->
                            </div>
                            <div class="fv-row mb-5">
                                <label class=" form-label">Email</label>
                                <input type="email" name="email" id="email" class="form-control mb-2" placeholder="Email" value="" />
                            </div>
                            <div class="fv-row mb-5">
                                <label class=" form-label">Telephone number</label>
                                <input type="text" name="telepon" id="telepon" class="form-control mb-2" placeholder="Telephone number" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" />
                            </div>
                            <div class="fv-row mb-5">
                                <label class=" form-label">Billing address</label>
                                <textarea type="text" name="billing" id="billing" class="form-control mb-2" placeholder="Billing address" value="" ></textarea>
                            </div>
                            <div class="fv-row mb-5">
                                <label class=" form-label">Shipping address</label>
                                <textarea type="text" name="shipping" id="shipping" class="form-control mb-2" placeholder="Shipping address" value="" style="display: none"></textarea>
                                <div class="d-flex">
                                    <input type="checkbox" name="check_shipping" id="check-shipping" checked onclick='shippingDiklik(this);'>
                                    <label style="margin-left: 4px" for="check-shipping">Same with billing address</label>
                                </div>
                            </div>
                            <!--end::Input group-->
                            </form>
                        </div>
                        <!--end::Scroll-->
                        <!--begin::Actions-->
                        <div class="text-center pt-15">
                            <button type="reset" class="btn btn-light me-3" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" data-kt-add-customer-action="submit">
                                <span class="indicator-label">Submit</span>
                                <span class="indicator-progress">Please wait...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                            </button>
                        </div>
                        <!--end::Actions-->
                    <!--end::Form-->
                </div>
                <!--end::Modal body-->
            </div>
            <!--end::Modal content-->
        </div>
        <!--end::Modal dialog-->
    </div>
    <!-- Modal Add Proyek --> --}}



    <script>
        let text = document.getElementById('kt_clipboard_1').value;
        const myFunction = async () => {
            try {
            await navigator.clipboard.writeText(text);
            console.log('Content copied to clipboard');
            } catch (err) {
            console.error('Failed to copy: ', err);
            }
        };
    </script>
</div>
