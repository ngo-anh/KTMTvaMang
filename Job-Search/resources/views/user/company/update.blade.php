@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12 col-12">
            <h4 class="text-center text-primary">Update Company</h4>
        </div>
    </div>
    {{-- Start Error Message --}}
    @if($errors->any())
    {!! implode('', $errors->all('<div class="alert alert-danger">:message</div>')) !!}
    @endif
    {{-- End Error Message --}}

    <form action="{{route('company.update', $company->id)}}" method="POST" enctype="multipart/form-data">
        @method('PATCH')
        @csrf
        <div class="form-group">
            <label for="company__name">Name</label>
            <input type="text" class="form-control" id="company__name" name="company__name"
                placeholder="Enter company's name: " value='{{$company->name}}' />
        </div>
        <div class=" form-group">
            <label for="company__description">Description</label>
            <textarea class="form-control" id="company__description" rows="5" name="company__description"
                placeholder='{{$company->description}}'>{{$company->description}}</textarea>
        </div>
        <div class="form-group">
            <label for="company__description">Address</label>
            <input class="form-control" id="company__description" rows="5" name="company__address"
                value='{{$company->address}}' />
        </div>
        <div class="form-group company__image">
            <label class="" for="company__image__upload">Image</label>
            <img class="image__preview" alt="image-company" src='{{$company->image_path}}'>
            <div>
                <input type="file" id="company__image__upload" value='{{$company->image_path}}'>
                <input type="hidden" class="" id="company__image__hidden" name="company__image"
                    value='{{$company->image_path}}'>
            </div>
        </div>
        <div class="row">
            <div class="offset-sm-6 col-sm-6 offset-6 col-6">
                <button type="submit" class="btn btn-primary" name="update">Update</button>
            </div>
        </div>
    </form>
</div>
@endsection

@section('scripts')
<script type="text/javascript">
    let imageLabel = $(".company__image label");
    let imageImg = $(".company__image img");
    let imageUpload = $('#company__image__upload');
    let imageHidden = $('#company__image__hidden');
</script>
<script type="text/javascript">
    if (imageImg.attr('src') == undefined || imageImg.attr('src') == "")
    {
        imageImg.hide();
    }
    else {
        imageLabel.hide();
    }
</script>
<script type="text/javascript">
    imageUpload.on('change', () => {
        console.log("Hi");

        let file = imageUpload[0].files[0];
        let formData = new FormData();
        formData.append("image", file);

        let url = `{{route('company.saveImage')}}`;

        fetch(url, {
            method: "POST",
            body: formData,
        })
            .then(res =>{
                res.json()
                    .then((data) => {
                        let path = `/images/companies/${data.src}`;
                        console.log(path);
                        imageHidden.val(path);
                        imageImg.attr("src", path);
                        imageImg.show();
                    })
            })
            .catch((err) => {
                console.error("Error: " + err);
            });
    })
</script>
@endsection
