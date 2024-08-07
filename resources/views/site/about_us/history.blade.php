@extends('layouts.app-site')

@section('content')
<div class="row">
        <div class="col-xl-12">
    
    
         <h5>{{  $history->title }}</h5>
         <p>{!!   $history->text !!}</p>
    
    
        </div>
     
    </div>
@endsection