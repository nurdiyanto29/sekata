@extends('layouts.app2')

@section('content')

<style>


</style>
<div class="row mb-3">
    <div class="col-lg-12 margin-tb">
        <div class="text-center">
            <h2>Github Public Repository</h2>
            <a class="btn btn-primary" href="" title="Go back"> <i class="fas fa-backward fa-2x"></i> </a>
        </div>
    </div>
</div>



<div class="container-fluid mb-5" style="margin-bottom: 150px !important">
    <div class="row mr-4">
        @foreach ($responseBody as $response)

        <div class="col-xl-3 col-md-6 mb-4 hvr-grow ">
            <a href="{{ $response->title }}" class="text-muted">
                <div class="card shadow  py-0 rounded-lg ">
                    <div class="card-body py-2 px-2">
                        <div class="row no-gutters align-items-center">
                          
                        </div>

                     
                    </div>
                </div>
            </a>
        </div>
        @endforeach
    </div>
</div>

@endsection