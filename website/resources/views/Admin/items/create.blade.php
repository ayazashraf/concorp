@extends('Admin.partials.super')
@section('content')
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
            <div class="card card-user">    
                <div class="card-body card-body-user">
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
                
                    <form action="{{ route('item.store',$business) }}" method="POST"  class="needs-validation report-form-public" novalidate>
                        @csrf
                        <div class="row">                                                       
                            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-3">
                                <div class="form-group">
                                    <strong>Property:</strong>
                                    <select name="business_id" id="business_id" class="custom-select" required>
                                        @foreach($businesses as $bus)                                            
                                            <option value="{{ $bus->id }}">{{ $bus->name }}</option>                                        
                                        @endforeach
                                    <select>          
                                    <div class="valid-feedback">Valid.</div>
                                    <div class="invalid-feedback">Please fill out this field.</div>                          
                                </div>
                            </div>     
                            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-3">
                                <div class="form-group">
                                    <strong>Unit Type:</strong>
                                    <select name="item_type_id" id="item_type_id" class="custom-select" required>
                                        @foreach($types as $t)                                            
                                            <option value="{{ $t->id }}">{{ $t->type }}</option>                                        
                                        @endforeach
                                    <select>                                    
                                    <div class="valid-feedback">Valid.</div>
                                    <div class="invalid-feedback">Please fill out this field.</div>
                                </div>
                            </div>    
                            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-3">
                                <div class="form-group">
                                    <strong>Unit Name/Number:</strong>
                                    <input type="text" name="name"  autocomplete="off" value="{{ old('name') }}" class="form-control" placeholder="Title" required>
                                </div>
                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback">Please fill out this field.</div>
                            </div>                                                                                                     
                            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-3">
                                <div class="form-group">
                                    <strong>Floor:</strong>
                                    <input type="text" name="floor" autocomplete="off" value="{{ old('floor') }}" class="form-control" placeholder="Floor">                    
                                </div>
                            </div>                             
                            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-3">
                                <div class="form-group">
                                    <strong>Rent $:</strong>
                                    <input type="text" name="rent"  autocomplete="off" value="{{ old('rent') }}" class="form-control" placeholder="Add rent without $ sign" required>                    
                                </div>
                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback">Please fill out this field.</div>
                            </div> 
                            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-3">
                                <div class="form-group">
                                    <strong>Deposit:</strong>
                                    <input type="text" name="deposit" value="{{ old('deposit') }}"  autocomplete="off" class="form-control" placeholder="Deposit">                    
                                </div>
                            </div> 
                            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-3">
                                <div class="form-group">
                                    <strong>Availability:</strong>
                                    <select name="availability" class="custom-select">
                                        <option value="Not Available"  >Not Available</option>
                                        <option value="Available"  >Available</option>
                                    </select>                                    
                                </div>
                            </div> 
                            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-3">
                                <div class="form-group">
                                    <strong>Bedrooms:</strong>
                                    <select name="bedrooms" class="custom-select">
                                        <option value="0" >0</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                    </select>                                    
                                </div>
                            </div> 
                            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-3">
                                <div class="form-group">
                                    <strong>Bathrooms:</strong>
                                    <select name="bathrooms" class="custom-select">
                                        <option value="0">0</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                    </select>                                    
                                </div>
                            </div> 
                            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-3">
                                <div class="form-group">
                                    <strong>Featured:</strong>
                                    <select name="featured" class="custom-select">
                                        <option value="0">NO</option>
                                        <option value="1">YES</option>                                        
                                    </select>                                    
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-3">
                                <div class="form-group">
                                    <strong>Reference Number:</strong>
                                    <input type="text" name="reference_number" value="{{ old('reference_number') }}" autocomplete="off" class="form-control" placeholder="Reference Number">                    
                                </div>
                            </div> 
                            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-3">
                                <div class="form-group">
                                    <strong>Square Feet:</strong>
                                    <input type="text" name="square_feet" value="{{ old('square_feet') }}" autocomplete="off" class="form-control" placeholder="Square Feet">                    
                                </div>
                            </div> 
                            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-3 d-flex checkbox-center-vertically">
                                <div class="custom-control custom-checkbox">                                    
                                    <input type="checkbox" class="custom-control-input" value="{{ old('furnished') }}" id="furnished" name="furnished">
                                    <label class="custom-control-label" for="furnished">Furnished</label>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-3 d-flex checkbox-center-vertically">
                                <div class="custom-control custom-checkbox">                                    
                                    <input type="checkbox" class="custom-control-input" id="luxury" name="luxury" value="{{ old('luxury') }}" >
                                    <label class="custom-control-label" for="luxury">Luxury</label>
                                </div>
                            </div> 
                            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-3 d-flex checkbox-center-vertically">
                                <div class="custom-control custom-checkbox">                                    
                                    <input type="checkbox" class="custom-control-input" id="executive" name="executive"  value="{{ old('executive') }}" >
                                    <label class="custom-control-label" for="executive">Executive</label>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-3 d-flex checkbox-center-vertically">
                                <div class="custom-control custom-checkbox">                                    
                                    <input type="checkbox" class="custom-control-input" id="den" name="den" value="{{ old('den') }}">
                                    <label class="custom-control-label" for="den">Den</label>
                                </div>
                            </div> 
                            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-3 d-flex checkbox-center-vertically">
                                <div class="custom-control custom-checkbox">                                    
                                    <input type="checkbox" class="custom-control-input" id="short_term" name="short_term"  value="{{ old('short_term') }}">
                                    <label class="custom-control-label" for="short_term">Short Term</label>
                                </div>
                            </div> 
                            <div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-4">
                                <strong>Status:</strong>
                                <select id="active" name="active" class="form-control">
                                    <option value="1">Published</option>
                                    <option value="2">Draft</option>                    
                                    <option value="3">Hidden</option> 
                                </select>
                            </div> 
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group">                                    
                                    <textarea  class="form-control" name="notes" rows="3" style="width:100%;" placeholder="Notes" >{{ old('notes') }}</textarea>                    
                                </div>
                            </div> 
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group">                                    
                                    <textarea  class="form-control" name="description" rows="3" style="width:100%;" placeholder="Description">{{ old('description') }}</textarea>                    
                                </div>
                            </div>                             
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>   
                    </form>
                </div>
            </div>        
        </div>
        <!-- END Right Column for Property edit inputs -->
    </div>  
    <!--END Main Row -->
</div>
@endsection