@extends('Admin.partials.super')

@section('content')

    <div class="row">
    <div class="col-lg-6 margin-tb pull-right">
            <a class="btn btn-success" href="{{ route('users.create') }}"> Create New Tenant User</a>
        </div>        
        <div class="col-lg-6 margin-tb">
            <input type="text" class="form-controller" id="usersearch" name="usersearch" placeholder="Write to search"></input>
        </div>
        
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   <div class="row">
      <div class="col-lg-12 margin-tb">    
        
      </div>
   </div>   
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Email</th>            
            <th>Contact no(s)</th>            
            <th>Payments</th>
            <th>Leases</th>
            <th>Vehicles</th>
            <th>Active</th>
            <th>Action</th>
        </tr>
        <tbody id="dataRecords">
            @foreach ($users as $user)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $user->name }}</td>
                <td style="max-width:250px;">{{ $user->email }}</td>            
                <td>{{ $user->contact_no }} </td>
                <td><a class="btn btn-primary" href="{{ route('user.payments',$user) }}">Payments</a></td>
                <td><a class="btn btn-primary" href="{{ route('user.leases',$user) }}">Leases</a></td>
                <td><a class="btn btn-primary" href="{{ route('user.vehicles',$user) }}">Vehicles</a></td>
                <td>
                @if($user->active)                     
                    <i class="fas fa-check"></i>     
                @else
                    <span><strong>Removed</strong></span>
                @endif
                </td>
                <td>
                
                    <form action="{{ route('users.destroy',$user->id) }}" method="POST">
                    
                    <!--<a class="btn btn-info" href="{{ route('users.show',$user->id) }}">Show</a>-->
                    <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">Edit</a>                           
                        @csrf
                        @method('GET')
        
                        <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-danger">Delete</button>
                    </form>
                    <form action="{{ route('users.reset',$user) }}" method="PUT" class="mt-1">
                    @csrf
                        <input type="hidden" name="_method" value="put">
                        <input type="hidden" name="email" value="{{ $user->email }}">
                        <button class="btn btn-success" type="submit">Send Password Reset Email</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
  
    {!! $users->links() !!}
@endsection

