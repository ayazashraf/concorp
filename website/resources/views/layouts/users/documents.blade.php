@extends('layouts.mainlayout')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-6 col-md-4">
            @include('user')
        </div>
        <div class="col-sm-6 col-md-8">
        <div class="d-flex  justify-content-start mb-3">
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
                            <h3><strong>List of Available Lease Documents</strong></h3>                            
                    </div>

                    <div class="card-body">
                        <table class="table table-bordered">
                            <tr>
                                <th>No</th>
                                <th>Title</th>
                                <th>Document/Download</th>
                                <th>Uploaded By</th>                            
                            </tr>
                            <tbody id="dataRecords">
                                @foreach ($admindocuments as  $document)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $document->title }}</td>
                                    <td>
                                    <a href="{{ url('public/documents/leases')}}{{ '/' . $document->file_name }}" download="{{$document->file_name }}">
                                        <button class="btn" style="width:100%"><i class="fas fa-download"></i> Download</button>
                                    </a>
                                    </td>            
                                    <td>
                                    Admin
                                    </td>                            
                                </tr>
                                @endforeach
                            </tbody>
                        </table>                    
                        {!! $admindocuments->links() !!}
                    </div>            
            </div>

            <div class="card card-user">
                    <div class="card-header card-header-user">
                            <h3><strong>List of Uploaded Signed Documents</strong></h3>                           
                            <button type="button" onclick="window.location='{{ route("create.lease") }}'" class="btn btn-danger">Add New Signed Lease Document</button>                                
                    </div>

                    <div class="card-body">
                        <table class="table table-bordered">
                            <tr>
                                <th>No</th>
                                <th>Title</th>
                                <th>Document</th>
                                <th>Signed By</th>                            
                            </tr>
                            <tbody id="dataRecords">
                                @foreach ($documents as  $document)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $document->title }}</td>
                                    <td>
                                    <a href="{{ url('public/user/leases')}}{{ '/' . $document->file_name }}" download="{{$document->file_name }}">
                                        <button class="btn" style="width:100%"><i class="fas fa-download"></i> Download</button>
                                    </a>
                                    </td>                                     
                                    <td>{{ $document->signed_by }}</td>                            
                                </tr>
                                @endforeach
                            </tbody>
                        </table>                    
                        {!! $documents->links() !!}
                    </div>            
            </div>
        </div>
    </div>
</div>    
@endsection