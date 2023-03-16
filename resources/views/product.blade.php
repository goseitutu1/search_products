<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->
<head><base href="../">
    <title>Product</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="article" />
    <link rel="shortcut icon" href="{{asset('assets/media/svg/products-categories/product.svg')}}" />
    <!--begin::Global Stylesheets Bundle(used by all pages)-->
    <link href="{{asset('assets/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/css/style.bundle.css')}}" rel="stylesheet" type="text/css" />
    <!--end::Global Stylesheets Bundle-->
    <style>
        .nav{
            flex-wrap: wrap;
        }
    </style>
</head>
<!--end::Head-->
<!--begin::Body-->
<body class="app-default">
<!--begin::App-->
<div class="d-flex flex-column flex-root app-root" id="kt_app_root">
    <!--begin::Page-->
    <div class="app-page flex-column flex-column-fluid" id="kt_app_page">
        <!--begin::Wrapper-->
        <div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
            <!--begin::Main-->
            <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
                <!--begin::Content wrapper-->
                <div class="d-flex flex-column flex-column-fluid">
                    <!--begin::Toolbar-->
                    <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
                        <!--begin::Toolbar container-->
                        <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                            <!--begin::Page title-->
                            <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                                <!--begin::Title-->
                                <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Products</h1>
                                <!--end::Title-->
                            </div>
                            <!--end::Page title-->
                            <!--begin::Actions-->
                            <div class="d-flex align-items-center">
                                <!--begin::Search field-->
                                <input style="background-color: white" placeholder="Search" type="text" id="search" class="form-control form-control-solid ps-12" />
                                <!--end::Search field-->
                            </div>
                            <!--end::Actions-->
                        </div>
                        <!--end::Toolbar container-->
                    </div>
                    <!--end::Toolbar-->
                    <!--begin::Content-->
                    <div id="kt_app_content" class="app-content flex-column-fluid">
                        <!--begin::Content container-->
                        <div id="kt_app_content_container" class="app-container container-xxl">
                            <!--begin::Layout-->
                            <div class="d-flex flex-column flex-xl-row">
                                <!--begin::Content-->
                                <div id="" class="container-xxl">
                                    <!--begin::Row-->
                                    <div class="row g-5 g-xl-12" id="products_menu">
                                        @foreach($products as $product)
                                        <div class="col-xl-2">
                                            <!--begin::Product Widget -->
                                            <a class="nav-link nav-link-border-solid btn btn-outline btn-flex btn-active-color-primary flex-column flex-stack pt-9 pb-7 page-bg" style="width: 138px;height: 180px">
                                                <!--begin::Icon-->
                                                <div class="nav-icon mb-3">
                                                    <!--begin::Cart icon-->
                                                    <img src="{{asset('assets/media/svg/products-categories/product.svg')}}" class="w-50px" alt="" />
                                                    <!--end::Cart icon-->
                                                </div>
                                                <!--end::Icon-->
                                                <!--begin::Info-->
                                                <div class="row">
                                                    <span class="text-gray-800">{{$product->name." - ".$product->code}} </span>
                                                    <span class="text-gray-400 fw-semibold fs-7">Qty: {{$product->quantity}}</span>
                                                    <span class="text-gray-400 fw-semibold fs-7">Price: {{$product->cost_price}} GHS</span>
                                                </div>
                                                <!--end::Info-->
                                            </a>
                                            <!--end::Product Widget -->
                                        </div>
                                        @endforeach
                                            {!! $products->links() !!}
                                    </div>
                                    <!--end::Row-->
                                </div>
                                <!--end::Content-->
                            </div>
                            <!--end::Layout-->
                        </div>
                        <!--end::Content container-->
                    </div>
                    <!--end::Content-->
                </div>
                <!--end::Content wrapper-->
            </div>
            <!--end:::Main-->
        </div>
        <!--end::Wrapper-->
    </div>
    <!--end::Page-->
</div>
<!--end::App-->
<!--begin::Javascript-->
<script>var hostUrl = "assets/";</script>
<!--begin::Global Javascript Bundle(used by all pages)-->
<script src="{{asset('assets/plugins/global/plugins.bundle.js')}}"></script>
<script src="{{asset('assets/js/scripts.bundle.js')}}"></script>
<!--end::Global Javascript Bundle-->
<script>
    let search_field = $('#search');

    search_field.on('keyup',function (e) {
        e.preventDefault()

        $.ajax({
            method: 'GET',
            url: `{{route('get.products','keyword')}}`.replace('keyword',search_field.val()),
            dataType: 'JSON',
        }).done((response) => {
            if(response.code == '200'){
                let product_menu = ``, productNameAndCode;

                // if response.products array is empty
                if(response.products.length === 0){
                    product_menu += `<h2 class="col-xl-6">Product was not found</h2>`
                }
                else {
                    // loops through the product obj array
                    for(var product of response.products){
                        productNameAndCode = product.name + ` - `+ product.code;

                        product_menu += `<div class="col-xl-2">
                                            <!--begin::Product Widget -->
                                            <a class="nav-link nav-link-border-solid btn btn-outline btn-flex btn-active-color-primary flex-column flex-stack pt-9 pb-7 page-bg" style="width: 138px;height: 180px">
                                                <!--begin::Icon-->
                                                <div class="nav-icon mb-3">
                                                    <!--begin::Cart icon-->
                                                    <img src="assets/media/svg/products-categories/product.svg" class="w-50px" alt="" />
                                                    <!--end::Cart icon-->
                                                </div>
                                                <!--end::Icon-->
                                                <!--begin::Info-->
                                                <div class="row">
                                                    <span class="text-gray-800">${productNameAndCode}</span>
                                                    <span class="text-gray-400 fw-semibold fs-7">Qty: ${product.quantity}</span>
                                                    <span class="text-gray-400 fw-semibold fs-7">Price: ${product.cost_price} GHS</span>
                                                </div>
                                                <!--end::Info-->
                                            </a>
                                            <!--end::Product Widget -->
                                        </div>`
                    }
                }

                // displaying queried products on products menu
                $('#products_menu').html(product_menu)
            }
        })
    })
</script>
<!--end::Javascript-->
</body>
<!--end::Body-->
</html>
