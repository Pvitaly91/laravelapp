@extends('layouts.admin')

@section('content')

     <h1>Post index page</h1>
     <table class="table">
         <thead>
             @foreach($posts[0]->getAttributes() as $fName => $f)
                 <th>{{$fName}}</th>
             @endforeach
         </thead>
         <tbody>
             @foreach($posts as $key => $post)
                 <tr>
                     @foreach($post->getConten() as $k =>  $fvalue)

                         <td>

                                 {{$fvalue}}

                         </td>
                     @endforeach
                 </tr>
             @endforeach
         </tbody>
     </table>
@endsection
