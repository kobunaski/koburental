<html lang="en">
<head>
    <title>Laravel Image Upload With Preview - W3Adda</title>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
</head>
<body>

<div class="container">
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> Some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <h3 class="jumbotron">Laravel Image Upload With Preview - W3Adda</h3>
    <form method="post" action="{{url('preview-image-upload')}}" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <input type="file" name="profile_image" id="profile_image" onchange="loadPreview(this);" class="form-control">

                <label for="profile_image"></label>
                <img id="preview_img" hidden src="https://www.w3adda.com/wp-content/uploads/2019/09/No_Image-128.png" class=""/>


            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <button type="submit" class="btn btn-success" style="margin-top:10px">Upload Image</button>
            </div>
        </div>

    </form>
</div>
</body>
</html>
<script>
    function loadPreview(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#preview_img').attr('src', e.target.result);
                $('#preview_img').removeAttr('hidden');
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
