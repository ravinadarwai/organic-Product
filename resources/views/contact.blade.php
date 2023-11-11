<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body style="background-color: azure;">
   
    @include('layouts.header')

<section class="section" style="    margin-top: -5rem;
" >
    <div class="container-flex" style="margin: 5rem;
    margin-left: 22rem;
    margin-right: 19rem;
    padding-left: 5rem; ">
        <h1 class="section-title"  style="margin-bottom: 3rem;">Contact Us</h1>
        <p style="text-align: center;color:green;"><marque>If you have any questions or inquiries, please feel free to contact us using the form below:</marque></p>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="{{ route('contact') }}">
            @csrf

            <div class="mb-3" style="    margin-left: 24rem;
    margin-right: 25rem;">
                <label for="name" class="form-label">Name</label>
                <input type="text" style="border-color: 16a916;" name="name" id="name" class="form-control" required>
            </div>

            <div class="mb-3" style="    margin-left: 24rem;
    margin-right: 25rem;">
                <label for="email" class="form-label">Email</label>
                <input type="email" style="border-color: 16a916;" name="email" id="email" class="form-control" required>
            </div>

            <div class="mb-3" style="    margin-left: 24rem;
    margin-right: 25rem;">
                <label for="message" class="form-label">Message</label>
                <textarea name="message"  id="message" class="form-control" rows="4" required></textarea>
            </div>

            <button type="submit"  style="    margin: auto;
 margin-top:2rem;" class="btn btn-primary">Send Message</button>
        </form>
    </div>
</section>
 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    @include('layouts.footer1')
  </body>
</html>