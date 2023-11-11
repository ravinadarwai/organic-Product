<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    

@include('admin.nav')

<div class="dashboard-wrapper">
    <div class="dashboard-ecommerce">
        <div class="container mt-5">
            <div class="uh">
                <h2 style="color : green">Add Meta Data</h2>
                <form action="{{ route('meta-data.storee') }}" method="post" class="ug" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <div class="col-lg-6">

                            <label for="prono" class="form-label">Description</label>
                            <textarea type="text" class="form-control" id="description" placeholder="Enter vege number" name="description"></textarea>
                        </div>
                        <div class="col-lg-6">

<label for="prono" class="form-label">keyword</label>
<input type="text" class="form-control" id="keyword" placeholder="Enter vege number" name="keyword">
</div>

                    </div>

                    <div class="row">
                        <div class="col-lg-6 ">
                           
                            <label for="name" class="form-email">title</label>
                            <input type="text" name="title" class="form-control" id="name" aria-describedby="emailHelp" placeholder="Enter vege name">
                        </div>
                        <div class="col-lg-6">
                            <label for="date" class="form-label">Url</label>
                            <input type="text" class="form-control" id="Route" name="url" placeholder="Enter date">
                        </div>

                    </div>

 

                    <!-- <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div> -->
                    <button type="submit" class="btn btn-primary my-3" name="done">Save</button> 

            </div>
        </div>

        </form>
    </div>



</div>
@include('admin.footer')         

</body>
</html>
