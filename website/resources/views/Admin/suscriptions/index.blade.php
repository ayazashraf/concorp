@extends('Admin.partials.super')

@section('content')
<div class="container">
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
            <th>Email</th>
            <th>Date Recorded</th>                        
        </tr>
        <tbody id="dataRecords">
            @foreach ($suscriptions as $suscription)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $suscription->email }}</td>
                <td>{{ $suscription->created_at }}</td>                            
            </tr>
            @endforeach
        </tbody>
    </table>
  
    {!! $suscriptions->links() !!}
</div>      
@endsection

