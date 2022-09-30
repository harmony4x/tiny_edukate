@extends('admin.layouts.master')
@section('content')


    <div class="container-fluid">
        <style type="text/css">
            .title_thongke{
                text-align: center;
                font-size: 20px;
                font-weight: bold;
            }
            #ui-datepicker-div {
                top: 180px  !important;

            }
        </style>
        <div class="row">
            <p class="title_thongke">Thống kê đơn hàng doanh số</p>
            <div class="col-md-2">
                <form autocomplete="off">
                    @csrf
                    <div class="col-md-12">
                        <p>Từ ngày: <input type="text" id="datepicker" class="form-control"></p>

                    </div>
                    <div class="col-md-12">
                        <p>Đến ngày: <input type="text" id="datepicker2" class="form-control"></p>
                    </div>
                    <div class="col-md-12">
                        <p>Lọc theo:
                            <select class="dashboard-filter form-control">
                                <option disabled selected>--Chọn--</option>
                                <option value="7ngay">7 ngày qua</option>
                                <option value="thangtruoc">Tháng trước</option>
                                <option value="thangnay">Tháng này</option>
                                <option value="365ngay">365 ngày</option>
                            </select>
                        </p>
                    </div>
                    <div class="col-md-12">
                        <input style="margin-top: 22px" type="button" id="btn-dashboard-filter" class="btn btn-primary btn-sm" value="Lọc kết quả">
                    </div>
                </form>
            </div>


            <div class="col-md-10">
                <div id="myfirstchart" style="height: 250px"></div>
            </div>
        </div>

    </div>
@endsection
