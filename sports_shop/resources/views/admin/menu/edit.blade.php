@extends('admin.main')

@section('header')
<script src="../assets/vendor/ckeditor5.js"></script>
<link rel="stylesheet" href="../../assets/vendor/ckeditor5.css">
@endsection

@section('content')
<div class="card card-primary">
    <!-- /.card-header -->
    <!-- form start -->
    <form action="" method="post">
        <div class="card-body">
            <div class="form-group">
                <label>Tên danh mục</label>
                <input list="list_option" type="text" value="{{$menu->name}}" name="name" class="form-control"
                    placeholder="Nhập tên danh mục">
                <datalist id="list_option">
                    <option value="Quần áo thể thao">
                    <option value="Giày thể thao">
                    <option value="Phụ kiện thể thao">
                        <!-- <option value=""> -->
                </datalist>
            </div>


            <div class="form-group">
                <label>Danh mục</label>
                <select class="form-control" name="parent_id" id="">
                    <option value="0" {{$menu->parent_id == 0 ? 'selected' : ''}}>Danh mục cha</option>
                    @foreach ($menus as $menuParent)
                    <option value="{{$menuParent->id}} " {{$menu->parent_id == $menuParent->id ? 'selected' : ''}}>
                        {{$menuParent->name}}
                    </option>
                    @endforeach
                </select>
            </div>


            <div class="form-group">
                <label>Mô tả</label>
                <textarea type="text" name="description" class="form-control"> {{$menu->description}}
                </textarea>
            </div>


            <div class="form-group">
                <label>Mô tả chi tiết</label>
                <div class="main-container">
                    <textarea id="content" name="content" class="form-control">{{$menu->content}}
                </textarea>
                </div>
            </div>


            <div class="form-group">
                <label>Trạng thái</label>

                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="1" type="radio" id="active" name="active"
                        {{$menu->active == 1 ? 'checked=""' : ''}}>
                    <label for="active" class="custom-control-label">Có</label>
                </div>

                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="0" type="radio" id="no_active" name="active"
                        {{$menu->active == 0 ? 'checked=""' : ''}}>
                    <label for="no_active" class="custom-control-label">Không</label>
                </div>
            </div>

        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Cập nhật danh mục</button>
        </div>
        @csrf
    </form>




</div>
@endsection

@section('footer')
<script type="importmap">
    {
                "imports": {
                    "ckeditor5": "../../assets/vendor/ckeditor5.js",
                    "ckeditor5/": "../../assets/vendor/"
                }
            }
        </script>

<script type="module">
import {
    ClassicEditor,
    Essentials,
    Paragraph,
    Bold,
    Italic,
    Font
} from 'ckeditor5';

ClassicEditor
    .create(document.querySelector('#content'), {
        plugins: [Essentials, Paragraph, Bold, Italic, Font],
        toolbar: [
            'undo', 'redo', '|', 'bold', 'italic', '|',
            'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor'
        ]
    })
    .then(content => {
        window.content = content;
    })
    .catch(error => {
        console.error(error);
    });
</script>
@endsection