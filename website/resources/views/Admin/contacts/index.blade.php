@extends('Admin.partials.super')

@section('content')

    <div class="row justify-content-center">
        <div class="col-sm-6 col-md-2">
            @include('Admin.partials.Inquirysidebar')
        </div>
        <div class="col-sm-6 col-md-10">
        <div class="d-flex  justify-content-start">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif    
            @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
            @endif
        </div>        
            <div class="card card-user">
                    <div class="card-header card-header-user">
                            <h3><strong>CONTACT FORM INQUIRIES</strong></h3>                            
                    </div>

                    <div class="card-body">
                        <table class="table table-bordered">
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>                            
                                <th>Message</th>              
                                <th width="280px">Action</th>                           
                            </tr>
                            <tbody id="dataRecords">
                                @foreach ($contacts as  $contact)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $contact->name }}</td>
                                    <td>{{ $contact->email }}</td>
                                    <td>{{ $contact->phone }}</td>
                                    <td>{{ $contact->message }}</td>  
                                    <td><a class="btn btn-info" href="{{ route('admin.contacts.show',$contact) }}">Show</a></td>                                                                               
                                </tr>
                                @endforeach
                            </tbody>
                        </table>                    
                        {!! $contacts->links() !!}
                    </div>            
            </div>

            
        </div>
    </div>

@endsection