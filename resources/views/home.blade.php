@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
    @extends('layouts.app')

    @section('content')
      <div class="carousel">

         <a class="carousel-item" href="#one!"><img src="https://lorempixel.com/250/250/nature/1"></a>

         <a class="carousel-item" href="#two!"><img src="https://lorempixel.com/250/250/nature/2"></a>

         <a class="carousel-item" href="#three!"><img src="https://lorempixel.com/250/250/nature/3"></a>

         <a class="carousel-item" href="#four!"><img src="https://lorempixel.com/250/250/nature/4"></a>

         <a class="carousel-item" href="#five!"><img src="https://lorempixel.com/250/250/nature/5"></a>

       </div>


    @endsection

</div>
@endsection
