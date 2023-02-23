<div class="container-fluid">
    <!-- START Main Row -->
    <div class="row">
        <!-- START Left Column for Property Links -->
        <div class="col-sm-4 col-md-3 col-lg-2">
            <div class="card card-user">    
                <div class="card-body card-body-user">
                    <div class="row">
                        <div class="pull-left">
                            <a class="btn btn-primary text-white" href="{{ route('business.home') }}"> Back to Listings</a>
                        </div>
                    </div>
                    <div class="row mt-4  no-gutters">
                        <div class="pull-left">
                        <h5><strong>
                            @php 
                            echo $business->name;
                            @endphp
                            </strong>
                            </h5>
                        
                        </div>
                    </div>
                    <div class="row no-gutters">
                        <div class="pull-left">
                        <h5><strong>
                            @php 
                            echo $business->street_number. ' '. $business->street_name;
                            @endphp
                            </strong>
                            </h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="pull-left">
                            <a href="{{ route('business.edit',$business) }}">
                                <button type="button" class="btn btn-info"><span class="material-icons">apartment</span> Property Info</button>                                 
                            </a>
                        </div>
                    </div>
                    <div class="row pt-1">
                        <div class="pull-left">
                            <a href="{{ route('photo.home',$business) }}">
                                <button type="button" class="btn btn-info"><span class="material-icons">add_a_photo</span> Photos</button>
                            </a>
                        </div>
                    </div>
                    <div class="row pt-1">
                        <div class="pull-left">
                            <a href="{{ route('item.home',$business) }}">
                                <button type="button" class="btn btn-info"><span class="material-icons">apartment</span> Units</button>
                            </a>
                        </div>
                    </div>
                    <div class="row pt-1">
                        <div class="pull-left">
                            <a href="{{ route('video.home',$business) }}">
                                <button type="button" class="btn btn-info"><span class="material-icons">video_library</span> Videos</button>       
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END Left Column for Property Links -->
          
        <!-- START Right Column for Property edit inputs -->
        <div class="col-sm-8 col-md-9 col-lg-10">