<!DOCTYPE html>
<!--
Author: Keenthemes
Product Name: Metronic - Bootstrap 5 HTML, VueJS, React, Angular & Laravel Admin Dashboard Theme
Purchase: https://1.envato.market/EA4JP
Website: http://www.keenthemes.com
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
License: For each use you must have a valid license purchased only from above link in order to legally use the theme for your project.
-->
<html lang="en">
	<!--begin::Head-->
	<head><base href="../../../">
		<title>Checkout</title>
		<meta charset="utf-8" />
		<meta name="description" content="Hector App" />
		<meta name="keywords" content="Web Application" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta property="og:locale" content="en_US" />
		<meta property="og:type" content="article" />
		<meta property="og:title" content="Checkout" />
		{{-- <meta property="og:url" content="https://keenthemes.com/metronic" /> --}}
		<meta property="og:site_name" content="Hector Apps" />
		<link rel="canonical" href="https://preview.keenthemes.com/metronic8" />
		<link rel="shortcut icon" href="logo.png" />
		<!--begin::Fonts-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
		<!--end::Fonts-->
		<!--begin::Page Vendor Stylesheets(used by this page)-->
		<link href="assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />
		<!--end::Page Vendor Stylesheets-->
		<!--begin::Global Stylesheets Bundle(used by all pages)-->
		<script src="{{ asset('assets/js/scripts.bundle.js') }}" ></script>
		<script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}" ></script>
		<script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}" ></script>
		<script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}" ></script>
		<script src="{{ asset('js/function.js') }}" ></script>
		{{-- <script src="{{ asset('admin/assets/js/selectize.js') }}" ></script> --}}
		@yield('script')

		<!--end::Page Vendor Stylesheets-->
		{{-- <script type="module">
			import hotwiredTurbo from 'https://cdn.skypack.dev/@hotwired/turbo';
		</script> --}}
		@livewireStyles()
		<link rel="shortcut icon" href="{{ asset('logo.png') }}"  />
		<!--begin::Fonts-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
		<!--end::Fonts-->
		<link href="{{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet"   type="text/css" />
		<link href="{{ asset('assets/css/style.bundle.css') }}" rel="stylesheet"   type="text/css" />
		<link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
       
		<!--end::Global Stylesheets Bundle-->
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled toolbar-fixed aside-enabled aside-fixed" style="--kt-toolbar-height:55px;--kt-toolbar-height-tablet-and-mobile:55px">
		<!--begin::Main-->
		<!--begin::Root-->
		<div class="d-flex flex-column flex-root">
			<!--begin::Page-->
			<div class="post d-flex flex-column-fluid" id="kt_post">
                <!--begin::Container-->
                <div id="kt_content_container" class="container-xxl" style="max-width: 800px">
                    <!--begin::Order details page-->
                    <div class="d-flex flex-column gap-7 gap-lg-10 mt-20" style="margin-bottom:20px">
                        
                        <!--begin::Order summary-->
                        <div class="d-flex flex-column flex-xl-row gap-7 gap-lg-10">
                           
                            <!--begin::Order details-->
                            <div class="card card-flush py-4 flex-row-fluid">
                                <!--begin::Card header-->
                             
                                <!--end::Card header-->
                                <!--begin::Card body-->
                                <div class="card-body pt-0">
                                    <div class=" text-center mt-5">
                                        <h4>Checkout</h4>
                                        <h1>HectorAPP Services</h1>
                                        <h3>Satu Aplikasi Untuk Semua Kebutuhan Bisnis Anda </h3>
                                    </div>
                                    <div class="table-responsive">
                                        <!--begin::Table-->
                                        <table class="table align-middle table-row-bordered mb-0 fs-6 gy-5 min-w-300px">
                                            <!--begin::Table body-->
                                            <tbody class="fw-bold text-gray-600">
                                                <!--begin::Date-->
                                                <tr>
                                                    <td class="text-muted">
                                                        <div class="d-flex align-items-center">
                                                        <!--begin::Svg Icon | path: icons/duotune/files/fil002.svg-->
                                                        <span class="svg-icon svg-icon-2 me-2">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="21" viewBox="0 0 20 21" fill="none">
                                                                <path opacity="0.3" d="M19 3.40002C18.4 3.40002 18 3.80002 18 4.40002V8.40002H14V4.40002C14 3.80002 13.6 3.40002 13 3.40002C12.4 3.40002 12 3.80002 12 4.40002V8.40002H8V4.40002C8 3.80002 7.6 3.40002 7 3.40002C6.4 3.40002 6 3.80002 6 4.40002V8.40002H2V4.40002C2 3.80002 1.6 3.40002 1 3.40002C0.4 3.40002 0 3.80002 0 4.40002V19.4C0 20 0.4 20.4 1 20.4H19C19.6 20.4 20 20 20 19.4V4.40002C20 3.80002 19.6 3.40002 19 3.40002ZM18 10.4V13.4H14V10.4H18ZM12 10.4V13.4H8V10.4H12ZM12 15.4V18.4H8V15.4H12ZM6 10.4V13.4H2V10.4H6ZM2 15.4H6V18.4H2V15.4ZM14 18.4V15.4H18V18.4H14Z" fill="black" />
                                                                <path d="M19 0.400024H1C0.4 0.400024 0 0.800024 0 1.40002V4.40002C0 5.00002 0.4 5.40002 1 5.40002H19C19.6 5.40002 20 5.00002 20 4.40002V1.40002C20 0.800024 19.6 0.400024 19 0.400024Z" fill="black" />
                                                            </svg>
                                                        </span>
                                                        <!--end::Svg Icon-->Date Added</div>
                                                    </td>
                                                    <td class="fw-bolder text-end">{{ $data->date }}</td>
                                                </tr>
                                                <!--end::Date-->
                                                <!--begin::Payment method-->
                                                <tr>
                                                    <td class="text-muted">
                                                        <div class="d-flex align-items-center">
                                                        <!--begin::Svg Icon | path: icons/duotune/finance/fin008.svg-->
                                                        <span class="svg-icon svg-icon-2 me-2">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                <path opacity="0.3" d="M3.20001 5.91897L16.9 3.01895C17.4 2.91895 18 3.219 18.1 3.819L19.2 9.01895L3.20001 5.91897Z" fill="black" />
                                                                <path opacity="0.3" d="M13 13.9189C13 12.2189 14.3 10.9189 16 10.9189H21C21.6 10.9189 22 11.3189 22 11.9189V15.9189C22 16.5189 21.6 16.9189 21 16.9189H16C14.3 16.9189 13 15.6189 13 13.9189ZM16 12.4189C15.2 12.4189 14.5 13.1189 14.5 13.9189C14.5 14.7189 15.2 15.4189 16 15.4189C16.8 15.4189 17.5 14.7189 17.5 13.9189C17.5 13.1189 16.8 12.4189 16 12.4189Z" fill="black" />
                                                                <path d="M13 13.9189C13 12.2189 14.3 10.9189 16 10.9189H21V7.91895C21 6.81895 20.1 5.91895 19 5.91895H3C2.4 5.91895 2 6.31895 2 6.91895V20.9189C2 21.5189 2.4 21.9189 3 21.9189H19C20.1 21.9189 21 21.0189 21 19.9189V16.9189H16C14.3 16.9189 13 15.6189 13 13.9189Z" fill="black" />
                                                            </svg>
                                                        </span>
                                                        <!--end::Svg Icon-->Expiry Date</div>
                                                    </td>
                                                    <td class="fw-bolder text-end">{{ $data->valid_until }}</td>
                                                </tr>
                                                <!--end::Payment method-->
                                            </tbody>
                                            <!--end::Table body-->
                                        </table>
                                        <!--end::Table-->
                                    </div>
                                </div>
                                <!--end::Card body-->
                            </div>
                            <!--end::Order details-->
                        </div>
                        <!--end::Order summary-->
                        <!--begin::Tab content-->
                        <div class="tab-content">
                            <!--begin::Tab pane-->
                            <div class="tab-pane fade show active" id="kt_ecommerce_sales_order_summary" role="tab-panel">
                                <!--begin::Orders-->
                                <div class="d-flex flex-column gap-7 gap-lg-10">
                                    {{-- <div class="d-flex flex-column flex-xl-row gap-7 gap-lg-10">
                                        <!--begin::Payment address-->
                                        <div class="card card-flush py-4 flex-row-fluid overflow-hidden">
                                            <!--begin::Background-->
                                            <div class="position-absolute top-0 end-0 opacity-10 pe-none text-end">
                                                <img src="assets/media/icons/duotune/ecommerce/ecm001.svg" class="w-175px" />
                                            </div>
                                            <!--end::Background-->
                                            <!--begin::Card header-->
                                            <div class="card-header">
                                                <div class="card-title">
                                                    <h2>Payment Address</h2>
                                                </div>
                                            </div>
                                            <!--end::Card header-->
                                            <!--begin::Card body-->
                                            <div class="card-body pt-0">Unit 1/23 Hastings Road,
                                            <br />Melbourne 3000,
                                            <br />Victoria,
                                            <br />Australia.</div>
                                            <!--end::Card body-->
                                        </div>
                                        <!--end::Payment address-->
                                        <!--begin::Shipping address-->
                                        <div class="card card-flush py-4 flex-row-fluid overflow-hidden">
                                            <!--begin::Background-->
                                            <div class="position-absolute top-0 end-0 opacity-10 pe-none text-end">
                                                <img src="assets/media/icons/duotune/ecommerce/ecm006.svg" class="w-175px" />
                                            </div>
                                            <!--end::Background-->
                                            <!--begin::Card header-->
                                            <div class="card-header">
                                                <div class="card-title">
                                                    <h2>Shipping Address</h2>
                                                </div>
                                            </div>
                                            <!--end::Card header-->
                                            <!--begin::Card body-->
                                            <div class="card-body pt-0">Unit 1/23 Hastings Road,
                                            <br />Melbourne 3000,
                                            <br />Victoria,
                                            <br />Australia.</div>
                                            <!--end::Card body-->
                                        </div>
                                        <!--end::Shipping address-->
                                    </div> --}}
                                    <!--begin::Product List-->
                                    <div class="card card-flush py-4 flex-row-fluid overflow-hidden">
                                        <!--begin::Card header-->
                                        <div class="card-header">
                                            <div class="card-title">
                                                <h2>{{ $data->code }}</h2>
                                            </div>
                                        </div>
                                        <!--end::Card header-->
                                        <!--begin::Card body-->
                                        <div class="card-body pt-0">
                                            <div class="table-responsive">
                                                <!--begin::Table-->
                                                <table class="table align-middle table-row-dashed fs-6 gy-5 mb-0">
                                                    <!--begin::Table head-->
                                                    <thead>
                                                        <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                                            <th class="min-w-100px">Product</th>
                                                            <th class="min-w-50px text-end">Month</th>
                                                            {{-- <th class="min-w-100px text-end">Unit Price</th> --}}
                                                            <th class="min-w-100px text-end">Total</th>
                                                        </tr>
                                                    </thead>
                                                    <!--end::Table head-->
                                                    <!--begin::Table body-->
                                                    <tbody class="fw-bold text-gray-600">
                                                        <!--begin::Products-->
                                                        @foreach ($data->get_detail as $item)
                                                            <tr>
                                                                <!--begin::Product-->
                                                                <td>
                                                                    <div class="d-flex align-items-center">
                                                                        <!--begin::Title-->
                                                                        <div class="ms-5">
                                                                            <a class="fw-bolder text-gray-600 text-hover-primary">{{ $item->product_name }}, {{ $item->get_product->user }} User</a>
                                                                        </div>
                                                                        <!--end::Title-->
                                                                    </div>
                                                                </td>
                                                                <!--end::Product-->
                                                                <!--begin::SKU-->
                                                                <td class="text-end">{{ $item->qty }}</td>
                                                                <!--end::SKU-->
                                                                <!--begin::Quantity-->
                                                                <!--end::Quantity-->
                                                                <!--begin::Price-->
                                                                {{-- <td class="text-end">{{ "Rp " . number_format($item->unit_price,0,'','.') }}</td> --}}
                                                                <!--end::Price-->
                                                                <!--begin::Total-->
                                                                <td class="text-end">{{ "Rp " . number_format($item->total_price,0,'','.') }}</td>
                                                                <!--end::Total-->
                                                            </tr>
                                                        @endforeach
                                                        <!--begin::Grand total-->
                                                        <tr>
                                                            <td colspan="2" class="fs-3 text-dark text-end">Total</td>
                                                            <td class="text-dark fs-3 fw-boldest text-end">{{ "Rp " . number_format($data->total,0,'','.') }}</td>
                                                        </tr>
                                                        <!--end::Grand total-->
                                                    </tbody>
                                                    <!--end::Table head-->
                                                </table>
                                                <!--end::Table-->
                                            </div>
                                           
                                        </div>
                                        <!--end::Card body-->
                                    </div>
                                    <form method="POST" id="postData">
                                        <div class="card card-flush py-4">
                                            <!--begin::Card header-->
                                            <div class="card-header">
                                                <div class="card-title">
                                                    <h2>Buat Akun Baru</h2>
                                                </div>
                                            </div>
                                            <!--end::Card header-->
                                            <!--begin::Card body-->
                                            <div class="card-body pt-0">
                                                <!--begin::Input group-->
                                                <div class="d-flex flex-wrap gap-5" >
                                                    <div class="mb-5 fv-row w-100 flex-md-root" wire:ignore>
                                                        <!--begin::Label-->
                                                        <label class="form-label required">Email</label>
                                                        <!--end::Label-->
                                                        <!--begin::Input-->
                                                        <input type="email" class="form-control" name="email" id="email" placeholder="Email" value="">
                                                        <!--end::Input-->
                                                    </div>
                                                </div>
                                          
                                                <div class="d-flex flex-wrap gap-5" >
                                                    <div class="mb-5 fv-row w-100 flex-md-root" wire:ignore>
                                                        <!--begin::Label-->
                                                        <label class="form-label required">Password</label>
                                                        <!--end::Label-->
                                                        <!--begin::Input-->
                                                        <input type="password" class="form-control" name="password" id="password" placeholder="Password" value="">
                                                        <!--end::Input-->
                                                    </div>
                                                </div>
                                                <div class="d-flex flex-wrap gap-5" >
                                                    <div class="mb-5 fv-row w-100 flex-md-root" wire:ignore>
                                                        <!--begin::Label-->
                                                        <label class="form-label required">Confirm Password</label>
                                                        <!--end::Label-->
                                                        <!--begin::Input-->
                                                        <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="Confirm Password" value="">
                                                        <!--end::Input-->
                                                    </div>
                                                </div>
                                                <!--end::Input group-->
                                            
                                            
                                            </div>
                                        </div>
                                        <input type="hidden" name="params" value="{{ $params }}" id="params">
                                        <div class="card card-flush py-4">
                                            <!--begin::Card header-->
                                            <div class="card-header">
                                                <div class="card-title">
                                                    <h2>Data Pribadi</h2>
                                                </div>
                                            </div>
                                            <!--end::Card header-->
                                            <!--begin::Card body-->
                                            <div class="card-body pt-0">
                                                <!--begin::Input group-->
                                                <div class="d-flex flex-wrap gap-5" >
                                                    <div class="mb-5 fv-row w-100 flex-md-root" wire:ignore>
                                                        <!--begin::Label-->
                                                        <label class="form-label required">Nama Lengkap</label>
                                                        <!--end::Label-->
                                                        <!--begin::Input-->
                                                        <input type="text" class="form-control" name="username" id="username" placeholder="Username" value="">
                                                        <!--end::Input-->
                                                    </div>
                                                </div>
                                              
                                                <div class="d-flex flex-wrap gap-5" >
                                                    <div class="mb-5 fv-row w-100 flex-md-root" wire:ignore>
                                                        <!--begin::Label-->
                                                        <label class="form-label required">Nomor Whatsapp</label>
                                                        <!--end::Label-->
                                                        <!--begin::Input-->
                                                        <input type="text" class="form-control" name="whatsapp" id="whatsapp" placeholder="08xxxxxxxxx" value="">
                                                        <!--end::Input-->
                                                    </div>
                                                </div>
                                                <div class="d-flex flex-wrap gap-5" >
                                                    <div class="mb-5 fv-row w-100 flex-md-root" wire:ignore>
                                                        <!--begin::Label-->
                                                        <label class="form-label required">Company</label>
                                                        <!--end::Label-->
                                                        <!--begin::Input-->
                                                        <input type="text" class="form-control" name="company" id="company" placeholder="Company" value="">
                                                        <!--end::Input-->
                                                    </div>
                                                </div>
                                                <div class="d-flex flex-wrap gap-5" >
                                                    <div class="mb-5 fv-row w-100 flex-md-root" wire:ignore>
                                                        <!--begin::Label-->
                                                        <label class="form-label required">Alamat</label>
                                                        <!--end::Label-->
                                                        <!--begin::Input-->
                                                        <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Alamat" value="">
                                                        <!--end::Input-->
                                                    </div>
                                                </div>
                                               
                                                <div class="d-flex flex-wrap gap-5" >
                                                    <div class="mb-5 fv-row w-100 flex-md-root" wire:ignore>
                                                        <!--begin::Label-->
                                                        <label class="form-label required">Tipe Bisnis</label>
                                                        <!--end::Label-->
                                                        <!--begin::Input-->
                                                        <select class="form-select customer" data-control="select2" data-placeholder="-- Select Business Type --" name="business_type" id="business_type" >
                                                            <option></option>
                                                            @foreach ($businessType as $item)
                                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                            @endforeach
                                                        </select>
                                                        <!--end::Input-->
                                                    </div>
                                                </div>
                                                <!--end::Input group-->

                                            
                                                <div class="d-flex flex-column mb-5 fv-row rounded-3 p-7 border border-dashed border-gray-300">
															<!--begin::Label-->
															<div class="fs-5 fw-bold form-label mb-3">Syarat & Ketentuan / Akad Jual Beli
															<i tabindex="0" class="cursor-pointer fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-html="true" data-bs-delay-hide="1000" data-bs-content="Thresholds help manage risk by limiting the unpaid usage balance a customer can accrue. Thresholds only measure and bill for metered usage (including discounts but excluding tax). &lt;a href='#'&gt;Learn more&lt;/a&gt;."></i></div>
															<!--end::Label-->
															<!--begin::Checkbox-->
															
                                                                <div class="fv-row mb-7">
															<!--begin::Label-->
															
															<!--end::Label-->
															<!--begin::Input-->
															<textarea class="form-control form-control-solid" name="notes" placeholder="08xxxxxxxxx"></textarea>
															<!--end::Input-->
														</div>
                                                        <label class="form-check form-check-custom form-check-solid">
																<input class="form-check-input" type="checkbox" checked="checked" value="1" /> 
																<span class="form-check-label text-gray-600">YA, Saya telah membaca dan menyetujui syarat & ketentuan / akad jual beli di atas</span>
															</label>
															<!--end::Checkbox-->
														</div>
                                                        <!--begin::Notice-->
														<div class="notice d-flex bg-light-primary rounded border-primary border border-dashed rounded-3 p-6">
															<!--begin::Wrapper-->
															<div class="d-flex flex-stack flex-grow-1">
																<!--begin::Content-->
																<div class="fw-semibold">
																	<h4 class="justify-content-center text-gray-900 fw-bold">Total Pembelian :  {{ "Rp " . number_format($data->total,0,'','.') }} </h4>
																	
																</div>
																<!--end::Content-->
															</div>
															<!--end::Wrapper-->
														</div>
														<!--end::Notice-->
                                                        <br>
                                        <button type="submit" id="kt_ecommerce_add_quote_submit" {{-- $validation==true?'':"disabled" --}} class="btn btn-primary w-100" data-kt-add-quotation="submit" >
                                            <span class="svg-icon svg-icon-3">
															<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																<path d="M15.43 8.56949L10.744 15.1395C10.6422 15.282 10.5804 15.4492 10.5651 15.6236C10.5498 15.7981 10.5815 15.9734 10.657 16.1315L13.194 21.4425C13.2737 21.6097 13.3991 21.751 13.5557 21.8499C13.7123 21.9488 13.8938 22.0014 14.079 22.0015H14.117C14.3087 21.9941 14.4941 21.9307 14.6502 21.8191C14.8062 21.7075 14.9261 21.5526 14.995 21.3735L21.933 3.33649C22.0011 3.15918 22.0164 2.96594 21.977 2.78013C21.9376 2.59432 21.8452 2.4239 21.711 2.28949L15.43 8.56949Z" fill="currentColor" />
																<path opacity="0.3" d="M20.664 2.06648L2.62602 9.00148C2.44768 9.07085 2.29348 9.19082 2.1824 9.34663C2.07131 9.50244 2.00818 9.68731 2.00074 9.87853C1.99331 10.0697 2.04189 10.259 2.14054 10.4229C2.23919 10.5869 2.38359 10.7185 2.55601 10.8015L7.86601 13.3365C8.02383 13.4126 8.19925 13.4448 8.37382 13.4297C8.54839 13.4145 8.71565 13.3526 8.85801 13.2505L15.43 8.56548L21.711 2.28448C21.5762 2.15096 21.4055 2.05932 21.2198 2.02064C21.034 1.98196 20.8409 1.99788 20.664 2.06648Z" fill="currentColor" />
															</svg>
														</span>
                                            <span class="" >Beli Sekarang</span>
                                            <span class="indicator-progress">Please wait...
                                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                        </button>
                                            
                                            </div>
                                        </div>
                                        
                                    </form>
                                    <div class="d-flex justify-content-center mb-10">
                                        <!--begin::Button-->
                                        <!--end::Button-->
                                        <!--begin::Button-->
                                        
                                        <!--end::Button-->
                                    </div>
                                    <!--end::Product List-->
                                </div>
                                <!--end::Orders-->
                            </div>
                       
                        </div>
                        <!--end::Tab content-->
                    </div>
                    <!--end::Order details page-->
                </div>
                <!--end::Container-->
            </div>
			<!--end::Page-->
		</div>
		<!--end::Root-->
        <div class="modal fade" id="checkoutModal" tabindex="-1" aria-hidden="true">
            <!--begin::Modal dialog-->
            <div class="modal-dialog modal-dialog-centered mw-650px">
                <!--begin::Modal content-->
                <div class="modal-content">
                    <!--begin::Modal header-->
                    <div class="modal-header" id="Ekspedisi_header">
                        <!--begin::Modal title-->
                        <h2 class="fw-bolder">Checkout</h2>
                        <!--end::Modal title-->
                        <!--begin::Close-->
                        {{-- <div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-ekspedisi-modal-action="close">
                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                            <span class="svg-icon svg-icon-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
                                    <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </div> --}}
                        <!--end::Close-->
                    </div>
                    <!--end::Modal header-->
                    <style>
                        .iframe-invoice {
    height: inherit;
    width: inherit;
    border: 0;
    overflow-y: scroll;
}
                    </style>
                    <!--begin::Modal body-->
                    <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                        <iframe
                            id="iframe-invoice"
                            class="iframe-invoice"
                            title="Invoice"
                        ></iframe>
                    </div>
                    <!--end::Modal body-->
                </div>
                <!--end::Modal content-->
            </div>
            <!--end::Modal dialog-->
        </div>
        
		<!--end::Modal - Invite Friend-->
		<!--end::Modals-->
		<!--begin::Javascript-->
		<script>var hostUrl = "assets/";</script>
		<!--begin::Global Javascript Bundle(used by all pages)-->
		<script src="assets/plugins/global/plugins.bundle.js"></script>
		<script src="assets/js/scripts.bundle.js"></script>
		<!--end::Global Javascript Bundle-->
		<!--begin::Page Vendors Javascript(used by this page)-->
		<script src="assets/plugins/custom/datatables/datatables.bundle.js"></script>
		<!--end::Page Vendors Javascript-->
        <script>
			var options = {
			closeButton: false,
			debug: false,
			newestOnTop: false,
			progressBar: false,
			positionClass: "toast-top-right",
			preventDuplicates: false,
			onclick: null,
			showDuration: "300",
			hideDuration: "1000",
			timeOut: "5000",
			extendedTimeOut: "1000",
			showEasing: "swing",
			hideEasing: "linear",
			showMethod: "fadeIn",
			hideMethod: "fadeOut",
		};
		</script>
		<!--begin::Page Custom Javascript(used by this page)-->
		<script src="assets/js/widgets.bundle.js"></script>
		<script src="assets/js/custom/widgets.js"></script>
		<script src="assets/js/custom/apps/chat/chat.js"></script>
		<script src="assets/js/custom/utilities/modals/upgrade-plan.js"></script>
		<script src="assets/js/custom/utilities/modals/create-app.js"></script>
		<script src="assets/js/custom/utilities/modals/users-search.js"></script>
        {{-- <script src="js/crud/checkout.js"></script> --}}
        <script src="js/crud/checkout copy.js"></script>
		<!--end::Page Custom Javascript-->
		<!--end::Javascript-->
	</body>
	<!--end::Body-->
</html>