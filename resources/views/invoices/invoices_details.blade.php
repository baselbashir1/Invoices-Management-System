@extends('layouts.master')
@section('css')
    <!---Internal Prism css-->
    <link href="{{ URL::asset('assets/plugins/prism/prism.css') }}" rel="stylesheet">
    <!---Internal Input tags css-->
    <link href="{{ URL::asset('assets/plugins/inputtags/inputtags.css') }}" rel="stylesheet">
    <!--- Custom-scroll -->
    <link href="{{ URL::asset('assets/plugins/custom-scroll/jquery.mCustomScrollbar.css') }}" rel="stylesheet">

    <!--- Internal Select2 css-->
    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
    <!---Internal Fileupload css-->
    <link href="{{ URL::asset('assets/plugins/fileuploads/css/fileupload.css') }}" rel="stylesheet" type="text/css" />
    <!---Internal Fancy uploader css-->
    <link href="{{ URL::asset('assets/plugins/fancyuploder/fancy_fileupload.css') }}" rel="stylesheet" />
    <!--Internal Sumoselect css-->
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/sumoselect/sumoselect-rtl.css') }}">
    <!--Internal TelephoneInput css-->
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/telephoneinput/telephoneinput-rtl.css') }}">
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">Elements</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    Tabs</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('title')
    تفاصيل الفاتورة
@stop
@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session()->has('Add'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('Add') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if (session()->has('Delete'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('Delete') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <!-- row -->
    <div class="col-xl-12">
        <div class="card mg-b-20" id="tabs-style2">
            <div class="card-body">
                <div class="text-wrap">
                    <div class="example">
                        <div class="panel panel-primary tabs-style-2">
                            <div class=" tab-menu-heading">
                                <div class="tabs-menu1">
                                    <!-- Tabs -->
                                    <ul class="nav panel-tabs main-nav-line">
                                        <li><a href="#tab4" class="nav-link active" data-toggle="tab">معلومات الفاتورة</a>
                                        </li>
                                        <li><a href="#tab5" class="nav-link" data-toggle="tab">حالات الدفع</a></li>
                                        <li><a href="#tab6" class="nav-link" data-toggle="tab">المرفقات</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="panel-body tabs-menu-body main-content-body-right border">
                                <div class="tab-content">
                                    {{-- <div class="tab-pane active" id="tab4">
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table id="example1" class="table key-buttons text-md-nowrap"
                                                    data-page-length='50'>
                                                    <thead>
                                                        <tr>
                                                            <th class="border-bottom-0">#</th>
                                                            <th class="border-bottom-0">رقم الفاتورة</th>
                                                            <th class="border-bottom-0">المنتج</th>
                                                            <th class="border-bottom-0">القسم</th>
                                                            <th class="border-bottom-0">تاريخ الاصدار</th>
                                                            <th class="border-bottom-0">تاريخ الاستحقاق</th>
                                                            <th class="border-bottom-0">الخصم</th>
                                                            <th class="border-bottom-0">نسبة الضريبة</th>
                                                            <th class="border-bottom-0">قيمة الضريبة</th>
                                                            <th class="border-bottom-0">مبلغ التحصيل</th>
                                                            <th class="border-bottom-0">مبلغ العمولة</th>
                                                            <th class="border-bottom-0">الاجمالي مع الضريبة</th>
                                                            <th class="border-bottom-0">الحالة الحالية</th>
                                                            <th class="border-bottom-0">ملاحظات</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>{{ $invoices->id }}</td>
                                                            <td>{{ $invoices->invoice_number }}</td>
                                                            <td>{{ $invoices->product }}</td>
                                                            <td>{{ $invoices->section->section_name }}</td>
                                                            <td>{{ $invoices->invoice_date }}</td>
                                                            <td>{{ $invoices->due_date }}</td>
                                                            <td>{{ $invoices->discount }}</td>
                                                            <td>{{ $invoices->rate_vat }}</td>
                                                            <td>{{ $invoices->value_vat }}</td>
                                                            <td>{{ $invoices->amount_collection }}</td>
                                                            <td>{{ $invoices->amount_commission }}</td>
                                                            <td>{{ $invoices->total }}</td>
                                                            @if ($invoices->value_status == 1)
                                                                <td>
                                                                    <span
                                                                        class="badge badge-pill badge-success">{{ $invoices->status }}</span>
                                                                </td>
                                                            @elseif ($invoices->value_status == 2)
                                                                <td>
                                                                    <span
                                                                        class="badge badge-pill badge-danger">{{ $invoices->status }}</span>
                                                                </td>
                                                            @else
                                                                <td>
                                                                    <span
                                                                        class="badge badge-pill badge-warning">{{ $invoices->status }}</span>
                                                                </td>
                                                            @endif
                                                            <td>{{ $invoices->notes }}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div> --}}
                                    <div class="tab-pane active" id="tab4">
                                        <div class="table-responsive mt-15">
                                            <table class="table table-striped" style="text-align:center">
                                                <tbody>
                                                    <tr>
                                                        <th scope="row">رقم الفاتورة</th>
                                                        <td>{{ $invoices->invoice_number }}</td>
                                                        <th scope="row">تاريخ الاصدار</th>
                                                        <td>{{ $invoices->invoice_date }}</td>
                                                        <th scope="row">تاريخ الاستحقاق</th>
                                                        <td>{{ $invoices->due_date }}</td>
                                                        <th scope="row">القسم</th>
                                                        <td>{{ $invoices->section->section_name }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">المنتج</th>
                                                        <td>{{ $invoices->product }}</td>
                                                        <th scope="row">مبلغ التحصيل</th>
                                                        <td>{{ $invoices->amount_collection }}</td>
                                                        <th scope="row">مبلغ العمولة</th>
                                                        <td>{{ $invoices->amount_commission }}</td>
                                                        <th scope="row">الخصم</th>
                                                        <td>{{ $invoices->discount }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">نسبة الضريبة</th>
                                                        <td>{{ $invoices->rate_vat }}</td>
                                                        <th scope="row">قيمة الضريبة</th>
                                                        <td>{{ $invoices->value_vat }}</td>
                                                        <th scope="row">الاجمالي مع الضريبة</th>
                                                        <td>{{ $invoices->total }}</td>
                                                        <th scope="row">الحالة الحالية</th>
                                                        @if ($invoices->value_status == 1)
                                                            <td>
                                                                <span class="badge badge-pill badge-success">
                                                                    {{ $invoices->status }}
                                                                </span>
                                                            </td>
                                                        @elseif($invoices->value_status == 2)
                                                            <td>
                                                                <span class="badge badge-pill badge-danger">
                                                                    {{ $invoices->status }}
                                                                </span>
                                                            </td>
                                                        @else
                                                            <td>
                                                                <span class="badge badge-pill badge-warning">
                                                                    {{ $invoices->status }}
                                                                </span>
                                                            </td>
                                                        @endif
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">ملاحظات</th>
                                                        <td>{{ $invoices->notes }}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tab5">
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table id="example1" class="table key-buttons text-md-nowrap"
                                                    data-page-length='50'>
                                                    <thead>
                                                        <tr>
                                                            <th class="border-bottom-0">#</th>
                                                            <th class="border-bottom-0">رقم الفاتورة</th>
                                                            <th class="border-bottom-0">المنتج</th>
                                                            <th class="border-bottom-0">القسم</th>
                                                            <th class="border-bottom-0">تاريخ الاضافة</th>
                                                            <th class="border-bottom-0">تاريخ الدفع</th>
                                                            <th class="border-bottom-0">حالة الدفع</th>
                                                            <th class="border-bottom-0">ملاحظات</th>
                                                            <th class="border-bottom-0">المستخدم</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @php
                                                            $i = 0;
                                                        @endphp
                                                        @foreach ($invoices_details as $details)
                                                            @php
                                                                $i++;
                                                            @endphp
                                                            <tr>
                                                                <td>{{ $i }}</td>
                                                                <td>{{ $details->invoice_number }}</td>
                                                                <td>{{ $details->product }}</td>
                                                                <td>{{ $invoices->section->section_name }}</td>
                                                                <td>{{ $details->created_at }}</td>
                                                                <td>{{ $details->payment_date }}</td>
                                                                @if ($details->value_status == 1)
                                                                    <td>
                                                                        <span
                                                                            class="badge badge-pill badge-success">{{ $details->status }}</span>
                                                                    </td>
                                                                @elseif ($details->value_status == 2)
                                                                    <td>
                                                                        <span
                                                                            class="badge badge-pill badge-danger">{{ $details->status }}</span>
                                                                    </td>
                                                                @else
                                                                    <td>
                                                                        <span
                                                                            class="badge badge-pill badge-warning">{{ $details->status }}</span>
                                                                    </td>
                                                                @endif
                                                                <td>{{ $details->notes }}</td>
                                                                <td>{{ $details->created_by }}</td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tab6">
                                        <div class="card card-statistics">
                                            <!--Attachments-->
                                            <div class="card-body">
                                                <p class="text-danger">صيغة المرفق pdf, jpeg, jpg, png *</p>
                                                <h5 class="card-title">حدد المرفق</h5>
                                                <form method="post" action="{{ url('/invoices-attachments') }}"
                                                    enctype="multipart/form-data">
                                                    {{ csrf_field() }}
                                                    <div class="col-sm-12 col-md-12">
                                                        <input type="file" class="dropify" name="file_name"
                                                            id="customFile"
                                                            accept=".pdf, .jpg, .png, image/jpeg, image/png"
                                                            data-height="70" required>
                                                        <input type="hidden" id="customFile" name="invoice_number"
                                                            value="{{ $invoices->invoice_number }}">
                                                        <input type="hidden" id="invoice_id" name="invoice_id"
                                                            value="{{ $invoices->id }}">
                                                    </div>
                                                    <br>
                                                    <button type="submit" class="btn btn-primary btn-sm "
                                                        name="uploadedFile">تاكيد</button>
                                                </form>
                                            </div>
                                            <!-- /Attachments -->
                                            <br>
                                            <div class="table-responsive">
                                                <table id="example1" class="table key-buttons text-md-nowrap"
                                                    data-page-length='50'>
                                                    <thead>
                                                        <tr>
                                                            <th class="border-bottom-0">#</th>
                                                            <th class="border-bottom-0">اسم الملف</th>
                                                            <th class="border-bottom-0">تاريخ الاضافة</th>
                                                            <th class="border-bottom-0">المستخدم</th>
                                                            <th class="border-bottom-0">العمليات</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @php
                                                            $i = 0;
                                                        @endphp
                                                        @foreach ($invoices_attachments as $attachments)
                                                            @php
                                                                $i++;
                                                            @endphp
                                                            <tr>
                                                                <td>{{ $i }}</td>
                                                                <td>{{ $attachments->file_name }}</td>
                                                                <td>{{ $attachments->created_at }}</td>
                                                                <td>{{ $attachments->created_by }}</td>
                                                                <td colspan="2">
                                                                    <a class="btn btn-outline-success btn-sm"
                                                                        href="{{ url('view_file') }}/{{ $invoices->invoice_number }}/{{ $attachments->file_name }}"
                                                                        role="button"><i class="fas fa-eye"></i>&nbsp;
                                                                        عرض</a>

                                                                    <a class="btn btn-outline-info btn-sm"
                                                                        href="{{ url('download') }}/{{ $invoices->invoice_number }}/{{ $attachments->file_name }}"
                                                                        role="button"><i
                                                                            class="fas fa-download"></i>&nbsp;
                                                                        تحميل</a>

                                                                    <button class="btn btn-outline-danger btn-sm"
                                                                        data-toggle="modal"
                                                                        data-file_name="{{ $attachments->file_name }}"
                                                                        data-invoice_number="{{ $attachments->invoice_number }}"
                                                                        data-id_file="{{ $attachments->id }}"
                                                                        data-target="#delete_file">حذف</button>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
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
    <!-- /row -->

    {{-- delete --}}
    <div class="modal fade" id="delete_file" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">حذف المرفق</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('delete_file') }}" method="post">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <p class="text-center">
                        <h6 style="color:red"> هل انت متاكد من عملية حذف المرفق ؟</h6>
                        </p>
                        <input type="hidden" name="id_file" id="id_file" value="">
                        <input type="hidden" name="file_name" id="file_name" value="">
                        <input type="hidden" name="invoice_number" id="invoice_number" value="">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">الغاء</button>
                        <button type="submit" class="btn btn-danger">تاكيد</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
    <!--Internal  Datepicker js -->
    <script src="{{ URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js') }}"></script>
    <!-- Internal Select2 js-->
    <script src="{{ URL::asset('assets/plugins/select2/js/select2.min.js') }}"></script>
    <!-- Internal Jquery.mCustomScrollbar js-->
    <script src="{{ URL::asset('assets/plugins/custom-scroll/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    <!-- Internal Input tags js-->
    <script src="{{ URL::asset('assets/plugins/inputtags/inputtags.js') }}"></script>
    <!--- Tabs JS-->
    <script src="{{ URL::asset('assets/plugins/tabs/jquery.multipurpose_tabcontent.js') }}"></script>
    <script src="{{ URL::asset('assets/js/tabs.js') }}"></script>
    <!--Internal Clipboard js-->
    <script src="{{ URL::asset('assets/plugins/clipboard/clipboard.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/clipboard/clipboard.js') }}"></script>
    <!-- Internal Prism js-->
    <script src="{{ URL::asset('assets/plugins/prism/prism.js') }}"></script>
    <!--Internal Fileuploads js-->
    <script src="{{ URL::asset('assets/plugins/fileuploads/js/fileupload.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fileuploads/js/file-upload.js') }}"></script>
    <!--Internal Fancy uploader js-->
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.ui.widget.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.fileupload.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.iframe-transport.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.fancy-fileupload.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/fancy-uploader.js') }}"></script>
    <!--Internal Form-elements js-->
    <script src="{{ URL::asset('assets/js/advanced-form-elements.js') }}"></script>
    <script src="{{ URL::asset('assets/js/select2.js') }}"></script>
    <!--Internal Sumoselect js-->
    <script src="{{ URL::asset('assets/plugins/sumoselect/jquery.sumoselect.js') }}"></script>
    <!--Internal jquery.maskedinput js -->
    <script src="{{ URL::asset('assets/plugins/jquery.maskedinput/jquery.maskedinput.js') }}"></script>
    <!--Internal spectrum-colorpicker js -->
    <script src="{{ URL::asset('assets/plugins/spectrum-colorpicker/spectrum.js') }}"></script>
    <!-- Internal form-elements js -->
    <script src="{{ URL::asset('assets/js/form-elements.js') }}"></script>

    <script>
        $('#delete_file').on('show.bs.modal', function(event) {
            let button = $(event.relatedTarget);
            let id_file = button.data('id_file');
            let file_name = button.data('file_name');
            let invoice_number = button.data('invoice_number');
            let modal = $(this);
            modal.find('.modal-body #id_file').val(id_file);
            modal.find('.modal-body #file_name').val(file_name);
            modal.find('.modal-body #invoice_number').val(invoice_number);
        });
    </script>

@endsection
