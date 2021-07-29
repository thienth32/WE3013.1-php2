@extends('admin.layouts.main')
@section('content')
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label for="">Tên sản phẩm</label>
                    <input type="text" name="name" class="form-control" value="{{$model->name}}">
                </div>
                <div class="form-group">
                    <label for="">Danh mục</label>
                    <select name="cate_id" id="" class="form-control">
                        @foreach ($cates as $c)
                            <option @if($c->id == $model->cate_id) selected @endif value="{{$c->id}}">{{$c->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Số lượng tổng</label>
                    <input type="text" name="quantity" class="form-control" value="{{$model->quantity}}">
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label for="">Gallery sản phẩm</label>
                    <input type="file" name="galleries[]" multiple class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Giá gốc</label>
                    <input type="text" name="price" class="form-control" value="{{$model->price}}">
                </div>
                <div class="form-group">
                    <label for="">Giá khuyến mại</label>
                    <input type="text" name="sale_price" class="form-control" value="{{$model->sale_price}}">
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label for="">Mô tả ngắn</label>
                    <textarea class="form-control" rows="3" name="short_desc">{{$model->sale_price}}</textarea>
                </div>
                <div class="form-group">
                    <label for="">Mô tả</label>
                    <textarea class="form-control" rows="5" name="pro_desc">{{$model->sale_price}}</textarea>
                </div>
                <div class="form-group">
                    <label for="">Chi tiết thông số</label>
                    <textarea class="form-control" rows="5" name="specification">{{$model->sale_price}}</textarea>
                </div>
                <div class="text-right">
                    <a href="{{BASE_URL . 'admin/product'}}" class="btn btn-danger">Hủy</a>
                    <button type="submit" class="btn btn-primary">Lưu</button>
                </div>
            </div>
        </div>
    </form>
    <br>
    
@endsection