@extends('Admin.layouts.inc.app')
@section('title')
    {{trans('admin.home')}}
@endsection
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css"/>
    <style>
        .icon-image {
            height: 40px;
            width: 40px;
        }
    </style>
@endsection
@section('content')
    <div class="profile-foreground position-relative mx-n4 mt-n4">
        <div class="profile-wid-bg">
            <img src="{{asset('assets/AE_style')}}/images/profile-bg.jpg" alt="" class="profile-wid-img">
        </div>
    </div>
    <div class="pt-4 mb-4 mb-lg-3 pb-lg-4 profile-wrapper">
        <div class="row g-4">
            <div class="col-auto">
                <div class="avatar-lg">
                    <img src="{{get_user_file(auth()->guard('admin')->user()->image)}}" style="width: 85px;height: 85px"
                         alt="user-img" class="img-thumbnail rounded-circle">
                </div>
            </div>
            <!--end col-->
            <div class="col">
                <div class="p-2">
                    <h3 class="text-white mb-1">{{auth()->guard('admin')->user()->name}}</h3>
                    <p class="text-white text-opacity-75">مشرف النظام </p>
                    <div class="hstack text-white-50 gap-1">
                        <div>
                            @if(auth()->guard('admin')->user()->created_at)
                                <i class="ri-map-pin-time-line me-1 text-white text-opacity-75 fs-16 align-middle"></i>
                                وقت الانضمام
                                {{\Carbon\Carbon::parse(auth()->guard('admin')->user()->created_at)->diffForHumans()}}
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <!--end col-->

        </div>
        <!--end row-->
    </div>


    <div class="row">
        <div class="col-xl-12">
            <div class="card crm-widget">
                <div class="card-body p-0">
                    <div class="row row-cols-md-3 row-cols-1">
                        <div class="col col-lg border-end">
                            <div class="mt-3 mt-lg-0 py-4 px-3">
                                <h5 class="text-muted text-uppercase fs-13">
                                    الطلاب
                                </h5>
                                <div class="d-flex justify-content-between">
                                    <div class="flex-grow-1 ms-3">
                                        <h2 class="mb-0"><span class="counter-value"
                                                               data-target="{{$students}}">0</span></h2>
                                    </div>
                                    <div class="flex-shrink-0">
                                        <img class="icon-image"
                                             src="{{ asset('assets/AE_style/images/students.png') }}">
                                    </div>
                                </div>
                            </div>
                        </div><!-- end col -->
                        <div class="col col-lg border-end">
                            <div class="mt-3 mt-md-0 py-4 px-3">
                                <h5 class="text-muted text-uppercase fs-13">المواد الدراسية
                                </h5>
                                <div class="d-flex justify-content-between">
                                    <div class="flex-grow-1 ms-3">
                                        <h2 class="mb-0"><span class="counter-value"
                                                               data-target="{{$categories}}">0</span></h2>
                                    </div>
                                    <div class="flex-shrink-0">
                                        <img class="icon-image"
                                             src="{{ asset('assets/AE_style/images/subjects.png') }}">
                                    </div>
                                </div>
                            </div>
                        </div><!-- end col -->
                        <div class="col col-lg border-end">
                            <div class="mt-3 mt-md-0 py-4 px-3">
                                <h5 class="text-muted text-uppercase fs-13">
                                    الصفوف الدراسية
                                </h5>
                                <div class="d-flex justify-content-between">
                                    <div class="flex-grow-1 ms-3">
                                        <h2 class="mb-0"><span class="counter-value" data-target="{{$rows}}">0</span>
                                        </h2>
                                    </div>
                                    <div class="flex-shrink-0">
                                        <img class="icon-image"
                                             src="{{ asset('assets/AE_style/images/presentation.gif') }}">
                                    </div>
                                </div>
                            </div>
                        </div><!-- end col -->
                        <div class="col col-lg border-end">
                            <div class="mt-3 mt-lg-0 py-4 px-3">
                                <h5 class="text-muted text-uppercase fs-13">
                                    المدرسين
                                </h5>
                                <div class="d-flex justify-content-between">
                                    <div class="flex-grow-1 ms-3">
                                        <h2 class="mb-0"><span class="counter-value"
                                                               data-target="{{$teachers}}">0</span></h2>
                                    </div>
                                    <div class="flex-shrink-0">
                                        <img class="icon-image" src="{{ asset('assets/AE_style/images/teacher.png') }}">
                                    </div>
                                </div>
                            </div>
                        </div><!-- end col -->
                        <div class="col col-lg">
                            <div class="mt-3 mt-lg-0 py-4 px-3">
                                <h5 class="text-muted text-uppercase fs-13">
                                    الفصول
                                </h5>
                                <div class="d-flex justify-content-between">
                                    <div class="flex-grow-1 ms-3">
                                        <h2 class="mb-0"><span class="counter-value" data-target="{{$rooms}}">0</span>
                                        </h2>
                                    </div>
                                    <div class="flex-shrink-0">
                                        <img class="icon-image" src="{{ asset('assets/AE_style/images/class.png') }}">
                                    </div>
                                </div>
                            </div>
                        </div><!-- end col -->
                    </div><!-- end row -->
                </div><!-- end card body -->
            </div><!-- end card -->
        </div><!-- end col -->
    </div>

    <div class="row mt-lg-5">
        @if($positive)
            <div class="col-xl-4">
                <div class="card">
                    <div class="card-body p-0">
                        <div class="row align-items-end">
                            <div class="col-sm-8">
                                <div class="p-3">
                                    <p class="fs-16 lh-base">
                                        عمل رائع يوجد
                                        <span class="fw-semibold">{{$positive}}</span>
                                        من علامات التمييز
                                        <i class="mdi mdi-check"></i>
                                    </p>
                                    <div class="mt-3">
                                        <a href="#!" class="btn btn-success">عرض التمميزات</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="px-3">
                                    <img src="{{ asset('assets/AE_style/images/good3.png') }}" class="img-fluid" alt="">
                                </div>
                            </div>
                        </div>
                    </div> <!-- end card-body-->
                </div>
            </div>
        @endif

        @if($negative)
            <div class="col-xl-4">
                <div class="card">
                    <div class="card-body p-0">
                        <div class="row align-items-end">
                            <div class="col-sm-8">
                                <div class="p-3">
                                    <p class="fs-16 lh-base">
                                        يوجد عقوبات بمقدار
                                        <span class="fw-semibold">{{$negative}}</span>
                                        عقوبة الان !
                                    </p>
                                    <div class="mt-3">
                                        <a href="#!" class="btn btn-danger">عرض العقوبات</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="px-3">
                                    <img src="{{ asset('assets/AE_style/images/bad6.png') }}" class="img-fluid" alt="">
                                </div>
                            </div>
                        </div>
                    </div> <!-- end card-body-->
                </div>
            </div>
        @endif
        {{--        <div class="row">--}}
        {{--    <!-- start AE col -->--}}
        {{--    <div class="col-xl-3 col-lg-4 col-sm-6">--}}
        {{--            <div class="AE_box">--}}

        {{--                 <!-- inner text -->--}}
        {{--                  <div class="AE_innerText">--}}
        {{--                    <p class="AE_subTitle">المشرفين</p>--}}
        {{--                    <h3 class="AE_mainTitle">--}}
        {{--                        <span class="counter-value" data-target="{{$admins}}">0</span>--}}
        {{--                    </h3>--}}
        {{--                  </div>--}}
        {{--                  <!-- icon box -->--}}
        {{--                  <div class="AE_icon AE_bg-lightGreen">--}}
        {{--                    <i class="fa-solid fa-user-tie AE_text-green"></i>--}}
        {{--                    </div>--}}
        {{--                  <!--  -->--}}
        {{--                  <a href="#!" class="AE_link"></a>--}}
        {{--            </div>--}}
        {{--            <!--  -->--}}
        {{--        </div>--}}
        {{--    <!-- end AE col -->--}}
        {{--    <!-- start AE col -->--}}
        {{--    <div class="col-xl-3 col-lg-4 col-sm-6">--}}
        {{--            <div class="AE_box">--}}

        {{--                 <!-- inner text -->--}}
        {{--                  <div class="AE_innerText">--}}
        {{--                    <p class="AE_subTitle">المواد الدراسية </p>--}}
        {{--                    <h3 class="AE_mainTitle">--}}
        {{--                        <span class="counter-value" data-target="{{$categories}}">0</span>--}}
        {{--                    </h3>--}}
        {{--                  </div>--}}
        {{--                  <!-- icon box -->--}}
        {{--                  <div class="AE_icon AE_bg-lightBlue">--}}
        {{--                        <i class="fa-solid fa-book AE_text-blue"></i>--}}
        {{--                    </div>--}}
        {{--                  <!--  -->--}}
        {{--                  <a href="#!" class="AE_link"></a>--}}
        {{--            </div>--}}
        {{--            <!--  -->--}}
        {{--        </div>--}}
        {{--    <!-- end AE col -->--}}
        {{--    <!-- start AE col -->--}}
        {{--    <div class="col-xl-3 col-lg-4 col-sm-6">--}}
        {{--            <div class="AE_box">--}}

        {{--                 <!-- inner text -->--}}
        {{--                  <div class="AE_innerText">--}}
        {{--                    <p class="AE_subTitle"> الصفوف الدراسية  </p>--}}
        {{--                    <h3 class="AE_mainTitle">--}}
        {{--                        <span class="counter-value" data-target="{{$rows}}">0</span>--}}
        {{--                    </h3>--}}
        {{--                  </div>--}}
        {{--                  <!-- icon box -->--}}
        {{--                  <div class="AE_icon AE_bg-lightYellow">--}}

        {{--                        <i class="fa-solid fa-chalkboard-user AE_text-yellow"></i>--}}
        {{--                    </div>--}}
        {{--                  <!--  -->--}}
        {{--                  <a href="#!" class="AE_link"></a>--}}
        {{--            </div>--}}
        {{--            <!--  -->--}}
        {{--        </div>--}}
        {{--    <!-- end AE col -->--}}
        {{--    <!-- start AE col -->--}}
        {{--    <div class="col-xl-3 col-lg-4 col-sm-6">--}}
        {{--            <div class="AE_box">--}}

        {{--                 <!-- inner text -->--}}
        {{--                  <div class="AE_innerText">--}}
        {{--                    <p class="AE_subTitle">  المدرسين  </p>--}}
        {{--                    <h3 class="AE_mainTitle">--}}
        {{--                        <span class="counter-value" data-target="{{$teachers}}">0</span>--}}
        {{--                    </h3>--}}
        {{--                  </div>--}}
        {{--                  <!-- icon box -->--}}
        {{--                  <div class="AE_icon AE_bg-lightMagenta">--}}

        {{--                        <i class="fa-solid fa-users AE_text-magenta"></i>--}}
        {{--                    </div>--}}
        {{--                  <!--  -->--}}
        {{--                  <a href="#!" class="AE_link"></a>--}}
        {{--            </div>--}}
        {{--            <!--  -->--}}
        {{--        </div>--}}
        {{--    <!-- end AE col -->--}}
        {{--    <!-- start AE col -->--}}
        {{--    <div class="col-xl-3 col-lg-4 col-sm-6">--}}
        {{--            <div class="AE_box">--}}

        {{--                 <!-- inner text -->--}}
        {{--                  <div class="AE_innerText">--}}
        {{--                    <p class="AE_subTitle">  الفصول  </p>--}}
        {{--                    <h3 class="AE_mainTitle">--}}
        {{--                        <span class="counter-value" data-target="{{$rooms}}">0</span>--}}
        {{--                    </h3>--}}
        {{--                  </div>--}}
        {{--                  <!-- icon box -->--}}
        {{--                  <div class="AE_icon AE_bg-lightCaen">--}}

        {{--                        <i class="fa-solid fa-school-flag  AE_text-caen"></i>--}}

        {{--                    </div>--}}
        {{--                  <!--  -->--}}
        {{--                  <a href="#!" class="AE_link"></a>--}}
        {{--            </div>--}}
        {{--            <!--  -->--}}
        {{--        </div>--}}
        {{--    <!-- end AE col -->--}}
        {{--    <!-- start AE col -->--}}
        {{--    <div class="col-xl-3 col-lg-4 col-sm-6">--}}
        {{--            <div class="AE_box">--}}

        {{--                 <!-- inner text -->--}}
        {{--                  <div class="AE_innerText">--}}
        {{--                    <p class="AE_subTitle">  الطلاب  </p>--}}
        {{--                    <h3 class="AE_mainTitle">--}}
        {{--                        <span class="counter-value" data-target="{{$students}}">0</span>--}}
        {{--                    </h3>--}}
        {{--                  </div>--}}
        {{--                  <!-- icon box -->--}}
        {{--                  <div class="AE_icon AE_bg-lightPink">--}}


        {{--                        <i class="fa-solid fa-children AE_text-pink"></i>--}}

        {{--                    </div>--}}
        {{--                  <!--  -->--}}
        {{--                    <a href="#!" class="AE_link"></a>--}}
        {{--            </div>--}}
        {{--            <!--  -->--}}
        {{--        </div>--}}
        {{--    <!-- end AE col -->--}}
        {{--    <!-- start AE col -->--}}
        {{--    <div class="col-xl-3 col-lg-4 col-sm-6">--}}
        {{--            <div class="AE_box">--}}

        {{--                 <!-- inner text -->--}}
        {{--                  <div class="AE_innerText">--}}
        {{--                    <p class="AE_subTitle">  العقوبات  </p>--}}
        {{--                    <h3 class="AE_mainTitle">--}}
        {{--                        <span class="counter-value" data-target="{{$negative}}">0</span>--}}
        {{--                    </h3>--}}
        {{--                  </div>--}}
        {{--                  <!-- icon box -->--}}
        {{--                  <div class="AE_icon AE_bg-lightRed">--}}
        {{--                        <i class="fa-solid fa-triangle-exclamation AE_text-red"></i>--}}
        {{--                    </div>--}}
        {{--                  <!--  -->--}}
        {{--                    <a href="#!" class="AE_link"></a>--}}
        {{--            </div>--}}
        {{--            <!--  -->--}}
        {{--        </div>--}}
        {{--    <!-- end AE col -->--}}
        {{--    <!-- start AE col -->--}}
        {{--    <div class="col-xl-3 col-lg-4 col-sm-6">--}}
        {{--            <div class="AE_box">--}}

        {{--                 <!-- inner text -->--}}
        {{--                  <div class="AE_innerText">--}}
        {{--                    <p class="AE_subTitle">  التميز  </p>--}}
        {{--                    <h3 class="AE_mainTitle">--}}
        {{--                        <span class="counter-value" data-target="{{$positive}}">0</span>--}}
        {{--                    </h3>--}}
        {{--                  </div>--}}
        {{--                  <!-- icon box -->--}}
        {{--                  <div class="AE_icon AE_bg-lightGreen">--}}

        {{--                        <i class="fa-solid fa-thumbs-up AE_text-green"></i>--}}
        {{--                    </div>--}}
        {{--                  <!--  -->--}}
        {{--                    <a href="#!" class="AE_link"></a>--}}
        {{--            </div>--}}
        {{--            <!--  -->--}}
        {{--        </div>--}}
        {{--    <!-- end AE col -->--}}

        <div class="d-flex flex-column mb-7 fv-row col-sm-12 m-7 AE_selectBox">
            <!--begin::Label-->
            <label for="student_id" class="d-flex align-items-center  mb-2 ">
                <span class="required mr-1">   الطلاب</span>
            </label>
            <select id='student_id' name="student_id[]" style='width: 200px;'>
                <option selected disabled>- ابحث الطالب</option>
            </select>
        </div>


        <div class="   my-5 col-sm-12" id="table_data">


        </div>


    </div>
    <!-- end row -->
    <!-- AE new  section  -->
    <section class="AE_newSection" style="background:red;">

    </section>
    <!--end  AE new  section  -->

@endsection


@section('js')

    <link href="{{url('assets/dashboard/css/select2.css')}}" rel="stylesheet"/>
    <!-- start style select by AhmedEltatawy -->
    <style>
        .select2-container .select2-selection--single {
            height: 48px !important;
            box-shadow: 0px 10px 20px 0px rgba(229, 229, 229, 0.75);
        }

        .select2-container--default .select2-selection--single, .select2-container .select2-selection--single {

            border-color: #e5e5e6;
        }

        .select2-container--default .select2-selection--single:focus {
            border-color: #3f7afc;
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {
            line-height: 45px !important;
        }

        .select2-container--default .select2-selection--single .select2-selection__arrow {
            display: none;
        }
    </style>
    <!-- end style select by AhmedEltatawy -->
    <script src="{{url('assets/dashboard/js/select2.js')}}"></script>

    <script>

        (function () {

            $("#student_id").select2({
                placeholder: 'Channel...',
                // width: '350px',
                allowClear: true,
                ajax: {
                    url: '{{route('admin.getStudents')}}',
                    dataType: 'json',
                    delay: 250,
                    data: function (params) {
                        return {
                            term: params.term || '',
                            page: params.page || 1
                        }
                    },
                    cache: true
                }
            });
        })();

    </script>
    <script>
        var loader = ` <div class="linear-background">
                            <div class="inter-crop"></div>
                            <div class="inter-right--top"></div>
                            <div class="inter-right--bottom"></div>
                        </div>
        `;

        $(document).on('change', '#student_id', function () {
            var id = $(this).val();
            $('#table_data').html(loader)

            var url = "{{route("admin.getReviewForStudent",':id')}}";
            url = url.replace(':id', id)

            setTimeout(function () {
                $('#table_data').load(url)
            }, 1000)
        })

    </script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css"/>
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css"/>
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">

    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>

@endsection
