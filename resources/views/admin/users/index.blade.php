@extends('layouts.admin')

@section('content')
    <h1>Users</h1>
     @if(Session::has('deleted_user'))
         <div class="alert alert-success">
            <p >{{session('deleted_user')}}</p>
         </div>
     @endif
     <table class="table">
         <thead>
               <tr>
                   <th>id</th>
                   <th>Photo</th>
                   <th>name</th>
                   <th>Email</th>
                   <th>Role</th>
                   <th>Active</th>
                   <th>created</th>
                   <th>Updated</th>
               </tr>
         </thead>
         <tbody>
         @if($users)
             @foreach($users as $user)
                 <tr>
                     <td>{{$user->id}}</td>
                     <td>@if($user->photo)<img style="width:100px" src="{{$user->photo->file}}">@else{{"no user photo"}}@endif</td>
                     <td><a href="{{route('users.edit',[$user->id])}}">{{$user->name}}</a></td>
                     <td>{{$user->email}}</td>
                     <td>{{$user->role->name}}</td>
                     <td>{{$user->is_active ? "yeas" : "no"}}</td>
                     <td>{{$user->created_at->diffForHumans()}}</td>
                     <td>{{$user->updated_at->diffForHumans()}}</td>
                 </tr>
             @endforeach
         @endif
         </tbody>
       </table>
@endsection

