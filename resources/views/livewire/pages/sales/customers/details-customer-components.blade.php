@section('title', 'Customers Detail - Sales')

@section('style')
   
@endsection

@section('script')
    
@endsection

@section('scriptCrud')
    <script src="{{ asset('js/datatable/sales/customers/customer-detail-table.js') }}" ></script>
    <script src="{{ asset('js/crud/sales/customers/customer-list/chart.js') }}" ></script>
    <script src="{{ asset('js/crud/sales/customers/customer-address/add.js') }}" ></script>
    <script src="{{ asset('js/crud/sales/customers/customer-address/edit.js') }}" ></script>
    <script src="{{ asset('js/crud/sales/customers/customer-address/delete.js') }}" ></script>
@endsection
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <script>
        var customerId = "{{ $customer->id }}" ;
    </script>
    <!--begin::Toolbar-->
    <div class="toolbar" id="kt_toolbar">
        <!--begin::Container-->
        <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
            <!--begin::Page title-->
            <div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                <!--begin::Title-->
                <h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1">Customer Details</h1>
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
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-300 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">Customers</li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-300 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-dark">Customer Details</li>
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
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-xxl">
            <!--begin::Layout--> 
            <div class="d-flex flex-column flex-xl-row">
                <!--begin::Sidebar-->
                <div class="flex-column flex-lg-row-auto w-100 w-xl-350px mb-10">
                    <!--begin::Card-->
                    <a class="btn btn-secondary mb-2 fw-bolder me-3" href="{{ route('customer.index') }}" style="">Back</a>
                    <a class="btn btn-warning mb-2 fw-bolder" href="{{ route('customer.edit', $customer->code) }}" style="">Edit</a>
                    <div class="card mb-5 mb-xl-8">
                        <!--begin::Card body-->
                        <div class="card-body pt-15">
                            <!--begin::Summary-->
                            <div class="d-flex flex-center flex-column mb-5">
                                <!--begin::Avatar-->
                                <!--end::Avatar-->
                                <!--begin::Name-->
                                <a href="javascript:void(0)" class="fs-3 text-gray-800 text-hover-primary fw-bolder mb-1">{{ $customer->name }}</a>
                                <a href="javascript:void(0)" class="fs-3 text-gray-800 text-hover-primary fw-bolder mb-1">{{ $customer->code }}</a>
                                <!--end::Name-->
                                <!--begin::Email-->
                                <a href="javascript:void(0)" class="fs-5 fw-bold text-muted text-hover-primary mb-6">{{ $customer->email }}</a>
                                <!--end::Email-->
                            </div>
                            <div class="text-center mb-5">
                                <a href="{{ asset('images/customer/data_file/'.$customer->npwp_image ) }}" target="_blank" class="btn btn-success btn-hover-scale me-5">NPWP</a>
                                <a href="{{ asset('images/customer/data_file/'.$customer->nik_image ) }}" target="_blank" class="btn btn-primary btn-hover-scale me-5">NIK</a>
                            </div>
                            <!--end::Summary-->
                            <!--begin::Details toggle-->
                            <div class="d-flex flex-stack fs-4 py-3">
                                <div class="fw-bolder">Details</div>
                                <!--begin::Badge-->
                            </div>
                            <!--end::Details toggle-->
                            <div class="separator separator-dashed my-3"></div>
                            <!--begin::Details content-->
                            <div class="pb-5 fs-6">
                                <!--begin::Details item-->
                                <div class="fw-bolder mt-5">Code Customer</div>
                                <div class="text-gray-600">{{ $customer->code }}</div>
                                <!--begin::Details item-->
                                <!--begin::Details item-->
                                <div class="fw-bolder mt-5">NPWP</div>
                                <div class="text-gray-600">
                                @if ($customer->npwp != null)
                                    {{ $customer->npwp }}
                                @else
                                    -
                                @endif
                                </div>
                                <!--begin::Details item-->
                                <!--begin::Details item-->
                                <div class="fw-bolder mt-5">NIK</div>
                                <div class="text-gray-600">
                                @if ($customer->nik != null)
                                    {{ $customer->nik }}
                                @else
                                    -
                                @endif
                                </div>
                                <!--begin::Details item-->
                                <!--begin::Details item-->
                                <div class="fw-bolder mt-5">City</div>
                                <div class="text-gray-600">{{ $customer->get_city->name }}</div>
                                <!--begin::Details item-->
                                <!--begin::Details item-->
                                <div class="fw-bolder mt-5">Address</div>
                                <div class="text-gray-600">{{ $customer->address }}</div>
                                <!--begin::Details item-->
                                <!--begin::Details item-->
                                <div class="fw-bolder mt-5">Phone</div>
                                <div class="text-gray-600">
                                @if ($customer->phone != null)
                                    {{ $customer->phone }}
                                @else
                                    -
                                @endif
                                </div>
                                <!--begin::Details item-->
                                <!--begin::Details item-->
                                <div class="fw-bolder mt-5">Credit</div>
                                <div class="text-gray-600">
                                @if ($customer->credit != null)
                                    {{ $customer->credit }}
                                @else
                                    -
                                @endif   
                                </div>
                                <!--begin::Details item-->
                                <!--begin::Details item-->
                                <div class="fw-bolder mt-5">Fax</div>
                                <div class="text-gray-600">
                                    @if ($customer->fax != null)
                                        {{ $customer->fax }}
                                    @else
                                        -
                                    @endif
                                </div>
                                <!--begin::Details item-->
                                <!--begin::Details item-->
                                <div class="fw-bolder mt-5">Warehouse Address</div>
                                <div class="text-gray-600">
                                @if ($customer->warehouse_address != null)
                                    {{ $customer->warehouse_address }}
                                @else
                                    -
                                @endif    
                                </div>
                                <!--begin::Details item-->
                            </div>
                            <!--end::Details content-->
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Card-->
                </div>
                <!--end::Sidebar-->
                <!--begin::Content-->
                <div class="flex-lg-row-fluid ms-lg-15">
                    <!--begin:::Tabs-->
                    <ul class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-bold mb-8">
                        <!--begin:::Tab item-->
                        <li class="nav-item">
                            <a class="nav-link text-active-primary pb-4 active" data-bs-toggle="tab" href="#customer_">Transaction</a>
                        </li>
                        <!--end:::Tab item-->
                        <!--begin:::Tab item-->
                        <li class="nav-item">
                            <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab" href="#customer_address">Customer Address</a>
                        </li>
                        <!--end:::Tab item-->
                        <!--begin:::Tab item-->
                        <li class="nav-item">
                            <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab" href="#customer_details">Customer Detail</a>
                        </li>
                        <!--end:::Tab item-->
                    </ul>
                    <!--end:::Tabs-->
                    <!--begin:::Tab content-->
                    <div class="tab-content" id="myTabContent">
                        <!--begin:::Tab pane-->
                        <div class="tab-pane fade show active" id="customer_" role="tabpanel">
                            <!--begin::Card-->
                            <div class="card pt-4 mb-6 mb-xl-9">
                                <!--begin::Card header-->
                                <h2 class="mt-5" style="margin-left: 20px">Transaction History</h2>
                                <div class="card-header border-0">
                                    <!--begin::Card title-->
                                    <div class="card-title">
                                        <div class="d-flex align-items-center position-relative my-1">
                                            <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                                            <span class="svg-icon svg-icon-1 position-absolute ms-6">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                    <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="black" />
                                                    <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="black" />
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                            <input type="text" data-kt-customer-orders-table-filter="search" class="form-control form-control-solid w-250px ps-14" placeholder="Search Order" />
                                        </div>
                                    </div>
                                    <div class="card-toolbar">
                                        <!--begin::Toolbar-->
                                        <div class="d-flex justify-content-end" data-kt-customer-orders-table-toolbar="base">
                                            <div class="input-group w-250px me-3">
                                                <input class="form-control form-control-solid rounded rounded-end-0" placeholder="Pick date range" name="dateFilter" id="dateFilter" />
                                                <button class="btn btn-icon btn-light" id="kt_ecommerce_sales_flatpickr_clear">
                                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr088.svg-->
                                                    <span class="svg-icon svg-icon-2">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                            <rect opacity="0.5" x="7.05025" y="15.5356" width="12" height="2" rx="1" transform="rotate(-45 7.05025 15.5356)" fill="black" />
                                                            <rect x="8.46447" y="7.05029" width="12" height="2" rx="1" transform="rotate(45 8.46447 7.05029)" fill="black" />
                                                        </svg>
                                                    </span>
                                                    <!--end::Svg Icon-->
                                                </button>
                                            </div>
                                            <!--begin::Filter-->
                                          
                                            <!--end::Add product-->
                                        </div>
                                        <!--end::Toolbar-->
                                        <!--begin::Group actions-->
                                        <!--end::Group actions-->
                               
                                    </div>
                                    <!--end::Card title-->
                                </div>
                                <!--end::Card header-->
                                <!--begin::Card body-->
                                <div class="card-body pt-0 pb-5">
                                    <!--begin::Table-->
                                    <table class="table align-middle table-row-dashed gy-5" id="customer_detail_table">
                                        <!--begin::Table head-->
                                        <thead class="border-bottom border-gray-200 fs-7 fw-bolder">
                                            <!--begin::Table row-->
                                            <tr class="text-center text-muted text-uppercase gs-0">
                                                <th class="min-w-100px">order No.</th>
                                                <th>Status</th>
                                                <th class="min-w-100px">Date</th>
                                                <th class="min-w-100px">Total Price</th>
                                                <th class="min-w-50px"></th>
                                            </tr>
                                            <!--end::Table row-->
                                        </thead>
                                        <!--end::Table head-->
                                        <!--begin::Table body-->
                                        <tbody class="fs-6 fw-bold text-gray-600 text-center">
                                   
                                        </tbody>
                                        <tfoot>
                                            <tr class="fw-bolder fs-6">
                                                <th colspan="2" class="text-nowrap align-end">Total:</th>
                                                <th colspan="3" class="text-danger fs-3"></th>
                                            </tr>
                                        </tfoot>
                                        <!--end::Table body-->
                                    </table>
                                    <!--end::Table-->
                                </div>
                                <!--end::Card body-->
                            </div>
                            <!--end::Card-->
                        </div>
                        <!--end:::Tab pane-->
                        <!--begin:::Tab pane-->
                        <div class="tab-pane fade" id="customer_address" role="tabpanel">
                            <!--begin::Card-->
                            <div class="card pt-4 mb-6 mb-xl-9">
                                <!--begin::Card header-->
                                <div class="card-header border-0">
                                    <!--begin::Card title-->
                                    <div class="card-title">
                                        <h2>Address Receive List</h2>
                                    </div>
                                    <!--end::Card title-->
                                    <!--begin::Card toolbar-->
                                    <div class="card-toolbar">
                                        <a href="javascript:void(0)" class="btn btn-sm btn-flex btn-light-primary" data-bs-toggle="modal" data-bs-target="#add_new_address">
                                        <!--begin::Svg Icon | path: icons/duotune/general/gen035.svg-->
                                        <span class="svg-icon svg-icon-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5" fill="black" />
                                                <rect x="10.8891" y="17.8033" width="12" height="2" rx="1" transform="rotate(-90 10.8891 17.8033)" fill="black" />
                                                <rect x="6.01041" y="10.9247" width="12" height="2" rx="1" fill="black" />
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->Add new address</a>
                                    </div>
                                    <!--end::Card toolbar-->
                                </div>
                                <!--end::Card header-->
                                <!--begin::Card body-->
                                <div id="kt_ecommerce_customer_addresses" class="card-body pt-0 pb-5">
                                    <!--begin::Addresses-->
                                    @if (count($getCustomer->get_address) == 0)
                                        <div class="py-0 text-center">
                                            <p>No Address</p>
                                        </div>
                                    @else
                                        @foreach ($getCustomer->get_address as $address)
                                        <!--begin::Address-->
                                        @php
                                            $cityName = preg_replace('/\s+/', '', $address->get_city->name);
                                        @endphp
                                        <div class="py-0">
                                            <!--begin::Header-->
                                            <div class="py-3 d-flex flex-stack flex-wrap">
                                                <!--begin::Toggle-->
                                                <div class="d-flex align-items-center collapsible collapsed rotate" data-bs-toggle="collapse" href="#{{ $cityName . $address->id  }}" role="button" aria-expanded="false" aria-controls="kt_customer_view_payment_method_1">
                                                    <!--begin::Arrow-->
                                                    <div class="me-3 rotate-90">
                                                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr071.svg-->
                                                        <span class="svg-icon svg-icon-3">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                <path d="M12.6343 12.5657L8.45001 16.75C8.0358 17.1642 8.0358 17.8358 8.45001 18.25C8.86423 18.6642 9.5358 18.6642 9.95001 18.25L15.4929 12.7071C15.8834 12.3166 15.8834 11.6834 15.4929 11.2929L9.95001 5.75C9.5358 5.33579 8.86423 5.33579 8.45001 5.75C8.0358 6.16421 8.0358 6.83579 8.45001 7.25L12.6343 11.4343C12.9467 11.7467 12.9467 12.2533 12.6343 12.5657Z" fill="black" />
                                                            </svg>
                                                        </span>
                                                        <!--end::Svg Icon-->
                                                    </div>
                                                    <!--end::Arrow-->
                                                    <!--begin::Summary-->
                                                    <div class="me-3">
                                                        <div class="d-flex align-items-center">
                                                            <div class="fs-4 fw-bolder">{{ $address->get_city->name }}</div>
                                                        </div>
                                                    </div>
                                                    <!--end::Summary-->
                                                </div>
                                                <!--end::Toggle-->
                                                <!--begin::Toolbar-->
                                                <div class="d-flex my-3 ms-9">
                                                    <!--begin::Edit-->
                                                    <a href="javascript:void(0)" id="edit-data" data-id="{{ $address->id }}" class="btn btn-icon btn-active-light-primary w-30px h-30px me-3" data-bs-toggle="modal" data-bs-target="#edit_new_address">
                                                        <span data-bs-toggle="tooltip" data-bs-trigger="hover" title="Edit">
                                                            <!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
                                                            <span class="svg-icon svg-icon-3">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                    <path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="black" />
                                                                    <path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="black" />
                                                                </svg>
                                                            </span>
                                                            <!--end::Svg Icon-->
                                                        </span>
                                                    </a>
                                                    <!--end::Edit-->
                                                    <!--begin::Delete-->
                                                    <a href="javascript:void(0)" data-id="{{ $address->id }}" class="btn btn-icon btn-active-light-primary w-30px h-30px me-3" data-bs-toggle="tooltip" title="Delete" data-kt-customerAddress-action="delete_row">
                                                        <!--begin::Svg Icon | path: icons/duotune/general/gen027.svg-->
                                                        <span class="svg-icon svg-icon-3">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                <path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="black" />
                                                                <path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="black" />
                                                                <path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="black" />
                                                            </svg>
                                                        </span>
                                                        <!--end::Svg Icon-->
                                                    </a>
                                                    <!--end::Delete-->
                                                </div>
                                                <!--end::Toolbar-->
                                            </div>
                                            <!--end::Header-->
                                            <!--begin::Body-->
                                            <div id="{{  $cityName . $address->id  }}" class="collapse fs-6 ps-9" data-bs-parent="#kt_ecommerce_customer_addresses">
                                                <!--begin::Details-->
                                                <div class="d-flex flex-column pb-5">
                                                    <div class="fw-bolder text-gray-600">{{ $address->address }}</div>
                                                    <div class="text-muted">{{ $address->phone }}</div>
                                                </div>
                                                <!--end::Details-->
                                            </div>
                                            <!--end::Body-->
                                        </div>
                                        <!--end::Address-->
                                        @endforeach
                                        <!--end::Addresses-->
                                    @endif
                                </div>
                                <!--end::Card body-->
                            </div>
                            <!--end::Card-->
                        </div>
                        <!--end:::Tab pane-->
                        <!--begin:::Tab pane-->
                        <div class="tab-pane fade" id="customer_details" role="tabpanel">
                            <!--begin::Card-->
                            <div class="card pt-4 mb-6 mb-xl-9">
                                <!--begin::Card header-->
                                <div class="card-header border-0">
                                    <!--begin::Card title-->
                                    <div class="card-title">
                                        <h2>Customer Details</h2>
                                    </div>
                                    <!--end::Card title-->
                                </div>
                                <!--end::Card header-->
                                <!--begin::Card body-->
                                <div class="card-body pt-0 pb-5">
                                    <!--begin::Table wrapper-->
                                    <div class="table-responsive">
                                        <!--begin::Table-->
                                        <table class="table align-middle table-row-dashed gy-5" id="kt_table_users_login_session">
                                            <!--begin::Table body-->
                                            <tbody class="fs-6 fw-bold text-gray-600 text-left">
                                                <tr>
                                                    <td>Fax</td>
                                                    <td>
                                                        @if ($customer->fax == null)
                                                            -
                                                        @else
                                                            {{ $customer->fax }}
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Warehouse Address</td>
                                                    <td>
                                                        @if ($customer->warehouse_address == null)
                                                            -
                                                        @else
                                                            {{ $customer->warehouse_address }}
                                                        @endif
                                                    </td>
                                                </tr>
                                            </tbody>
                                            <!--end::Table body-->
                                        </table>
                                        <!--end::Table-->
                                    </div>
                                    <!--end::Table wrapper-->
                                </div>
                                <!--end::Card body-->
                            </div>
                            <!--end::Card-->
                            <!--begin::Card-->
                            <div class="card pt-4 mb-6 mb-xl-9">
                                <!--begin::Card header-->
                                <div class="card-header border-0">
                                    <!--begin::Card title-->
                                    <div class="card-title flex-column">
                                        <h2 class="mb-1">PIC</h2>
                                    </div>
                                    <!--end::Card title-->
                                </div>
                                <!--end::Card header-->
                                <!--begin::Card body-->
                                <div class="card-body pb-5">
                                    <div class="table-responsive">
                                        <!--begin::Table-->
                                        <table class="table align-middle table-row-dashed gy-5" id="pic_detail">
                                            <!--begin::Table body-->
                                            <tbody class="fs-6 fw-bold text-gray-600 text-left">
                                                <tr>
                                                    <td>Name</td>
                                                    <td>
                                                        @if ($customer->pic == null)
                                                            -
                                                        @else
                                                            {{ $customer->pic }}
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Phone</td>
                                                    <td>
                                                        @if ($customer->pic_phone == null)
                                                            -
                                                        @else
                                                            {{ $customer->pic_phone }}
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Position</td>
                                                    <td>
                                                        @if ($customer->pic_position == null)
                                                            -
                                                        @else
                                                            {{ $customer->pic_position }}
                                                        @endif
                                                    </td>
                                                </tr>
                                            </tbody>
                                            <!--end::Table body-->
                                        </table>
                                        <!--end::Table-->
                                    </div>
                                    <!--end::Table wrapper-->
                                </div>
                                <!--end::Card body-->
                            </div>
                            <!--end::Card-->
                        </div>
                        <!--end:::Tab pane-->
                    </div>
                    <!--end:::Tab content-->
                </div>
                <!--end::Content-->
            </div>
            <!--end::Layout-->
            <div class="card card-flush py-4 mb-5" wire:ignore.self>
                <!--begin::Card header-->
                <div class="card-header" wire:ignore>
                    <div class="card-title">
                        <h2>Statistic Customer Order</h2>
                    </div>
                    <div class="input-group w-250px me-3">
                        <select class="form-select mb-2" name="yearFilter" data-control="select2" data-hide-search="true" data-placeholder="-- Select Year --" id="yearFilter">
                            <option></option>
                            <option value="all">All</option>
                            <option selected value="{{ date("Y") }}" >{{ date("Y") }}</option>
                            <option value="{{ date("Y",strtotime("-1 year")); }}" >{{ date("Y",strtotime("-1 year")); }} - {{ date('Y') }}</option>
                            <option value="{{ date("Y",strtotime("-2 year")); }}" >{{ date("Y",strtotime("-2 year")); }} - {{ date('Y') }}</option>
                        </select>
                    </div>
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body">
                    <div id="line_chart" style="height: 300px;"></div>
                </div>
                           <!--end::Tab content-->
                <!--end::Card header-->
            </div>
            <div class="card card-flush py-4" wire:ignore.self>
                <!--begin::Card header-->
                <div class="card-header" wire:ignore>
                    <div class="card-title">
                        <h2>Statistic Order Product</h2>
                    </div>
                    <div class="card-toolbar">
                        <!--begin::Toolbar-->
                        <div class="d-flex justify-content-end" data-kt-customer-orders-table-toolbar="base">
                            <div class="input-group w-250px me-3">
                                <input class="form-control form-control-solid rounded rounded-end-0" placeholder="Pick date range" name="dateFilterPrd" id="dateFilterPrd" />
                                <button class="btn btn-icon btn-light" id="clearDatePrd">
                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr088.svg-->
                                    <span class="svg-icon svg-icon-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <rect opacity="0.5" x="7.05025" y="15.5356" width="12" height="2" rx="1" transform="rotate(-45 7.05025 15.5356)" fill="black" />
                                            <rect x="8.46447" y="7.05029" width="12" height="2" rx="1" transform="rotate(45 8.46447 7.05029)" fill="black" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                </button>
                            </div>
                            <!--begin::Filter-->
                          
                            <!--end::Add product-->
                        </div>
                        <!--end::Toolbar-->
                        <!--begin::Group actions-->
                        <!--end::Group actions-->
               
                    </div>
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <canvas id="piechart" class="mh-400px"></canvas>
                        </div>
                        <div class="col-lg-6">
                            <table class="table align-middle table-row-dashed gy-5" id="product_statistic_table">
                                <!--begin::Table head-->
                                <thead class="border-bottom border-gray-200 fs-7 fw-bolder">
                                    <!--begin::Table row-->
                                    <tr class="text-center text-muted text-uppercase gs-0">
                                        <th class="min-w-100px">Product</th>
                                        <th class="min-w-100px">QTY</th>
                                    </tr>
                                    <!--end::Table row-->
                                </thead>
                                <!--end::Table head-->
                                <!--begin::Table body-->
                                <tbody class="fs-6 fw-bold text-gray-600 text-center">
                           
                                </tbody>
                                <!--end::Table body-->
                            </table>
                        </div>
                    </div>
                </div>
                           <!--end::Tab content-->
                <!--end::Card header-->
            </div>
            <!--begin::Modals-->
           
            <!--end::Modals-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Post-->
    @livewire('components.modal.customer-receive-address.add', compact('customers', 'cities'))
    @livewire('components.modal.customer-receive-address.edit', compact('customers', 'cities'))
</div>