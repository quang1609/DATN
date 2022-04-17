@extends('main')

@section('content')
    <div style="width: 1500px;text-align: center;margin:auto">
        <form class="bg0 p-t-130 p-b-85" action="{{route('checkoutPost')}}" method="post">
            @csrf
            <div class="flex-w flex-t p-t-15">
                <span class="stext-112 cl8">
                        <h1>Thanh Toán</h1>
                </span>
                <div class="size-100 p-r-18 p-r-0-sm w-full-ssm row" style="margin-left: 125px;">
                    <div class="col">
                        <div class="form-group row" style="margin-top: 20px;width: 400px;">
                            <label class="col" for="" style="text-align: right;">Họ Tên</label>
                            <input type="text" class="form-control col" name="name" required>
                        </div>
                        <div class="form-group row" style="margin-top: 20px;width: 400px;">
                            <label class="col" for="" style="text-align: right;">Email</label>
                            <input type="text" class="form-control col" name="email" required>
                        </div>
                        
                        
                    </div>
                    <div class="col">
                        <div class="form-group row" style="margin-top: 20px;width: 400px;">
                            <label class="col" for="" style="text-align: right;">Địa chỉ</label>
                            <input type="text" class="form-control col" name="address" required>
                        </div>
                        <div class="form-group row" style="margin-top: 20px;width: 400px;">
                            <label class="col" for="" style="text-align: right;">Số điện thoại</label>
                            <input type="text" class="form-control col" name="phone" required>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" style="margin-left: 433px;width: 50%;">
                <label class="col-2" style="text-align: right;">Note</label>
                <input class="form-control col" name="content">
            </div>
            <button class="btn btn-dark btn-lg" style="margin-left: 700px;margin-top:20px">
               Đặt Hàng
            </button>
        </form>
    </div>

@endsection
@section('script')

@endsection

