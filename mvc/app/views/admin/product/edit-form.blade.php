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
                    <label for="">Giá gốc</label>
                    <input type="text" name="price" class="form-control" value="{{$model->price}}">
                </div>
                <div class="form-group">
                    <label for="">Giá khuyến mại</label>
                    <input type="text" name="sale_price" class="form-control" value="{{$model->sale_price}}">
                </div>
            </div>
            <div class="col-12">
                <table class="table table-stripped">
                    <thead>
                        <th>Url/Input</th>
                        <th>Ảnh</th>
                        <th>
                            <button id="addGalleryRow" type="button" class="btn btn-sm btn-success">Thêm ảnh</button>
                        </th>
                    </thead>
                    <tbody id="gallery_tbody">
                        @foreach ($model->galleries as $item)
                            <tr>
                                <td>
                                    <div class="form-group">
                                        <input type="file" name="galleries[]" class="form-control">
                                    </div>
                                </td>
                                <td>
                                    <img src="{{PUBLIC_PATH . $item->img_url}}" width="80">
                                </td>
                                <td>
                                    <button class="btn btn-danger btn-sm">Xóa</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label for="">Mô tả ngắn</label>
                    <textarea class="form-control" rows="3" name="short_desc">{{$model->short_desc}}</textarea>
                </div>
                <div class="form-group">
                    <label for="">Mô tả</label>
                    <textarea class="form-control" rows="5" name="pro_desc">{{$model->pro_desc}}</textarea>
                </div>
                <div class="form-group">
                    <label for="">Chi tiết thông số</label>
                    <textarea class="form-control" rows="5" name="specification">{{$model->specification}}</textarea>
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
@section('pagescript')
    <script>
        $(document).ready(function(){
            $('#addGalleryRow').click(function(){
                $('#gallery_tbody').append(`
                    <tr>
                        <td>
                            <div class="form-group">
                                <input type="file" name="galleries[]" class="form-control">
                            </div>
                        </td>
                        <td>
                            <img src="" width="80">
                        </td>
                        <td>
                            <button class="btn btn-danger btn-sm">Xóa</button>
                        </td>
                    </tr>
                `);
            })
        });
    </script>
@endsection