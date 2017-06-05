@extends('layouts.admin')

@section('content')
    <h1>Users</h1>
     <table class="table">
         <thead>
               <tr>
                   <th>id</th>
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
                     <td>{{$user->name}}</td>
                     <td>{{$user->email}}</td>
                     <td>{{$user->role->name}}</td>
                     <td>

                         @if($user->is_active)
                             yeas
                         @else
                             no
                         @endif
                     </td>
                     <td>{{$user->created_at->diffForHumans()}}</td>
                     <td>{{$user->updated_at->diffForHumans()}}</td>
                 </tr>
             @endforeach
            @endif
         </tbody>
       </table>
@endsection

