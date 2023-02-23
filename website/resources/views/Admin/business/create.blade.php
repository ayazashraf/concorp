@extends('Admin.partials.super')
@section('content')
<div class="container-fluid">
    <!-- START Main Row -->
    <div class="row">
        
        <!-- START Right Column for Property edit inputs -->        

        <div class="card card-user">    
                <div class="card-body card-body-user">

        <div class="col-sm-12">
        <form action="{{ route('business.store') }}" method="POST"  enctype="multipart/form-data"   class="needs-validation report-form-public" novalidate>
            @csrf
            
            <!-- START Tabs -->            
            <ul class="nav nav-tabs pb-1" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab"  href="#property">Property Information</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab"  href="#contact">Contact Information</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab"  href="#amenities">Amenities</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab"  href="#detail">Property Details</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab"  href="#utility">Utilities and Parking</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab"  href="#publish">Publishing</a>
                </li>
                <li class="nav-item">
                    <button type="submit" class="btn btn-primary">Save Property Information</button>
                </li>
            </ul>
            <!-- END Tabs -->

            <!-- START Tab Contents -->
                   
            <div class="tab-content mt-3">
                <div id="property" class="tab-pane active background-white" style="background-color:white;">                               
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
                
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                                <div class="form-group">
                                    <strong>Property Type:</strong>
                                    <select name="type_id" id="type_id" class="custom-select" required>
                                        @foreach($subtypes as $sub)
                                            <option value="{{ $sub->id }}">{{ $sub->type }}</option>                                        
                                        @endforeach
                                    </select>
                                    <div class="valid-feedback">Valid.</div>
                                    <div class="invalid-feedback">Please fill out this field.</div>                                         
                                </div>                                
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                                <div class="form-group">
                                    <strong>Property Name:</strong>
                                    <input type="text" name="name" autocomplete="off" class="form-control" placeholder="Property Name" required>
                                    <div class="valid-feedback">Valid.</div>
                                    <div class="invalid-feedback">Please fill out this field.</div>                                         
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                                <div class="form-group">
                                    <strong>Street Number:</strong>
                                    <input type="text" name="street_number"  autocomplete="off" class="form-control" placeholder="Street Number" required>
                                    <div class="valid-feedback">Valid.</div>
                                    <div class="invalid-feedback">Please fill out this field.</div>        
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                                <div class="form-group">
                                    <strong>Street Name:</strong>
                                    <input type="text" name="street_name"  autocomplete="off" class="form-control" placeholder="Street Name" required> 
                                    <div class="valid-feedback">Valid.</div>
                                    <div class="invalid-feedback">Please fill out this field.</div>        
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                                <div class="form-group">
                                    <strong>City:</strong>
                                    <select class="custom-select" id="city" name="city">
                                        <option value="Wolfville">Wolfville</option>                                              
                                    </select>
                                    <div class="valid-feedback">Valid.</div>
                                    <div class="invalid-feedback">Please fill out this field.</div>        
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                                <div class="form-group">
                                    <strong>Zip / Postal:</strong>
                                    <input type="text" name="zip_postal"  autocomplete="off" class="form-control" placeholder="Zip / Postal" required>
                                    <div class="valid-feedback">Valid.</div>
                                    <div class="invalid-feedback">Please fill out this field.</div>        
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                                <div class="form-group">
                                    <strong>Main Intersection:</strong>
                                    <input type="text" name="main_intersection"  autocomplete="off" class="form-control" placeholder="Main Intersection">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                                <div class="form-group">
                                    <strong>Neighborhood:</strong>
                                    <input type="text" name="neighborhood"   autocomplete="off" class="form-control" placeholder="Neighborhood">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                                <div class="form-group">
                                    <strong>Property Header:</strong>
                                    <input type="text" name="header_text" autocomplete="off" class="form-control" placeholder="Property Header">                    
                                </div>
                            </div>
                            
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                                <div class="form-group">
                                    <strong>Google Map Code:</strong>
                                    <a href="https://developers.google.com/maps/documentation/embed/start" target="_blank" style="color:blue;">Search Map code here</a> 
                                    <textarea name="map_code" autocomplete="off" class="form-control" placeholder="Google Map Code" required></textarea> 
                                    <div class="valid-feedback">Valid.</div>
                                    <div class="invalid-feedback">Please fill out this field.</div>                                              
                                </div>
                            </div>    
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                                <div class="form-group">
                                    <strong>Find Map code here at Google Map:</strong>
                                    
                                </div>
                            </div>                               
                        </div>                       
                </div>
                <div id="contact" class="tab-pane fade background-white" style="background-color:white;">
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                        <div class="form-group">
                            <strong>Contact Email Address(es):</strong>
                            <textarea name="contact_email" autocomplete="off" class="form-control" placeholder="Contact Email Address(es)"></textarea>                                       
                        </div>
                    </div>            
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                        <div class="form-group">
                            <strong>Contact Mmaintenance Address(es):</strong>
                            <textarea name="maintenance_email" autocomplete="off" class="form-control" placeholder="Contact Maintenance Address(es)"></textarea>                                       
                        </div>
                    </div>          
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                        <div class="form-group">
                            <strong>Contact Name:</strong>
                            <input type="text" name="contact_name" autocomplete="off" class="form-control" placeholder="Contact Name">                    
                        </div>
                    </div>    
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                        <div class="form-group">
                            <strong>Contact Phone:</strong>
                            <input type="text" name="phone" autocomplete="off" class="form-control" placeholder="Contact Phone">                    
                        </div>
                    </div>                        
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                        <div class="form-group">
                            <strong>Extension:</strong>
                            <input type="text" name="phone_extension" autocomplete="off" class="form-control" placeholder="Extension">                    
                        </div>
                    </div>    
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                        <div class="form-group">
                            <strong>Alternate Phone:</strong>
                            <input type="text" name="alternat_phone" autocomplete="off" class="form-control" placeholder="Alternate Phone">                    
                        </div>
                    </div>    
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                        <div class="form-group">
                            <strong>Fax:</strong>
                            <input type="text" name="fax" autocomplete="off" class="form-control" placeholder="Fax">                    
                        </div>
                    </div>  
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                        <div class="form-group">
                            <strong>Office Hours / Contact Time:</strong>
                            <textarea name="office_hours" autocomplete="off" class="form-control" placeholder="Office Hours / Contact Time"></textarea>                                       
                        </div>
                    </div> 
                </div>
                <div id="amenities" class="tab-pane fade background-white" style="background-color:white;">
                    <div>
                        <h3 class="display-7 text-primary"><strong>Property Amenities</strong></h3>                
                        <div>
                            @php $count=0; @endphp
                            @foreach($b_cats as $cat)                                    
                                <div class="row mt-3">
                                    <div class="col-sm-6"><h5 class="display-9 text-primary"><strong>{{ $cat->category }}</strong></h5></div>                                                        
                                </div>                        
                                <div class="row">      
                                @foreach($b_sub_cats as $sub)                              
                                    @if ($sub->parent_id == $cat->id)                                  
                                        @php $count++; @endphp
                                        <div class="col-sm-6 col-md-4 col-lg-2">
                                            <input type="checkbox" id="b{{ $sub->id }}" value="{{ $sub->id }}" name="p_amenities[]"><span>  {{ $sub->category }}</span>
                                        </div>
                                    @endif
                                @endforeach      
                                </div>                                                                              
                            @endforeach                                                                                                                                    
                        </div>
                    </div>

                    <div class="mt-3">
                        <h3 class="display-7 text-primary"><strong>Unit Amenities</strong></h3>                
                        <div>
                            @php $count=0; @endphp
                            @foreach($i_cats as $cat)                                    
                                <div class="row mt-3">
                                    <div class="col-sm-6"><h5 class="display-9 text-primary"><strong>{{ $cat->category }}</strong></h5></div>                                                        
                                </div>                        
                                <div class="row">      
                                @foreach($i_sub_cats as $sub)                              
                                    @if ($sub->parent_id == $cat->id)                      
                                    @php $count++; @endphp            
                                        <div class="col-sm-6 col-md-4 col-lg-2">
                                            <input type="checkbox" id="i{{ $sub->id }}" value="{{ $sub->id }}" name="i_amenities[]" ><span>  {{ $sub->category }}</span>
                                        </div>
                                    @endif
                                @endforeach      
                                </div>                                                                              
                            @endforeach                                                                                                                                    
                        </div>
                    </div>

                </div>
                <div id="detail" class="tab-pane fade background-white" style="background-color:white;">
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                        <div class="form-group">
                            <strong>Number of Units:</strong>
                            <input type="text" name="number_of_units"  autocomplete="off" class="form-control" placeholder="Number of Units">                    
                        </div>
                    </div>  
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                        <div class="form-group">
                            <strong>Number of Floors:</strong>
                            <input type="text" name="number_of_floors"   autocomplete="off" class="form-control" placeholder="Number of Floors">                    
                        </div>
                    </div>  
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                        <div class="form-group">
                            <strong>Year built:</strong>
                            <input type="text" name="year_built"  autocomplete="off" class="form-control" placeholder="Year built">                    
                        </div>
                    </div>  
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                        <div class="form-group">
                            <strong>Purchase Date:</strong>
                            <input type="text" id="datepicker" name="purchase_date"   autocomplete="off" class="form-control" placeholder="Purchase Date">                    
                        </div>
                    </div>                      
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                        <div class="form-group">
                            <strong>Classification:</strong>
                            <select id="classification" name="classification" class="form-control">
                                <option value="A" >A</option>
                                <option value="B">B</option>                    
                                <option value="C">C</option> 
                                <option value="D">D</option> 
                                <option value="Other">Other</option> 
                                <option value="Unknow">Unknow</option> 
                            </select>
                        </div>
                    </div>   
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                        <div class="form-group">
                            <strong>Summary:</strong>
                            <textarea name="summary" autocomplete="off" class="form-control" placeholder="Summary"></textarea>                                       
                        </div>
                    </div>                                                                                                         
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                        <div class="form-group">
                            <strong>Description:</strong>
                            <textarea name="description" autocomplete="off" class="form-control" placeholder="Description"></textarea>                                       
                        </div>
                    </div>    
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-3">
                        <div class="form-group">
                            <strong>Near By Property 1:</strong>
                            <select name="nearby_business_id1" id="nearby_business_id1" class="custom-select" required>
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
                            <strong>Distance:</strong>
                            <input type="text" name="distance1" autocomplete="off" class="form-control" value="0.1" placeholder="0.1" required>                    
                        </div>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div>       
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-3">
                        <div class="form-group">
                            <strong>Distance Unit:</strong>
                            <input type="text" name="distance_unit1"  autocomplete="off" value="km" class="form-control" placeholder="km" required>                    
                        </div>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div> 

                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-3">
                        <div class="form-group">
                            <strong>Near By Property 2:</strong>
                            <select name="nearby_business_id2" id="nearby_business_id2" class="custom-select" required>
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
                            <strong>Distance:</strong>
                            <input type="text" name="distance2" autocomplete="off" class="form-control" value="0.4" placeholder="0.4" required>                    
                        </div>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div>       
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-3">
                        <div class="form-group">
                            <strong>Distance Unit:</strong>
                            <input type="text" name="distance_unit2"  autocomplete="off" class="form-control" value="km" placeholder="km" required>                    
                        </div>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div> 

                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-3">
                        <div class="form-group">
                            <strong>Near By Property 3:</strong>
                            <select name="nearby_business_id3" id="nearby_business_id3" class="custom-select" required>
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
                            <strong>Distance:</strong>
                            <input type="text" name="distance3" autocomplete="off" class="form-control" value="0.3" placeholder="0.3" required>                    
                        </div>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div>       
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-3">
                        <div class="form-group">
                            <strong>Distance Unit:</strong>
                            <input type="text" name="distance_unit3"  autocomplete="off" class="form-control" value="km" placeholder="km" required>                    
                        </div>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div> 

                    <div class="col-xs-6 col-sm-6 col-md-3 col-lg-2">
                        <div class="form-group">
                            <strong>Pet Friendly:</strong>
                            <input type="checkbox" id="pet_friendly" value="1" name="pet_friendly"  />                            
                        </div>
                    </div>                                                                                                                  
                    <div class="col-xs-6 col-sm-6 col-md-4 col-lg-3">
                        <div class="form-group">
                            <strong>Small Dogs Friendly:</strong>
                            <input type="checkbox" id="small_dogs_friendly" value="1" name="small_dogs_friendly"  />                            
                        </div>
                    </div>                                                                                                                  
                    <div class="col-xs-6 col-sm-6 col-md-4 col-lg-3">
                        <div class="form-group">
                            <strong>Large Dogs Friendly:</strong>
                            <input type="checkbox" id="large_dogs_friendly" value="1" name="large_dogs_friendly"  />                            
                        </div>
                    </div>                                                                                 
                    <div class="col-xs-6 col-sm-6 col-md-3 col-lg-2">
                        <div class="form-group">
                            <strong>Cats Friendly:</strong>
                            <input type="checkbox" id="cat_friendly" value="1" name="cat_friendly"  />                            
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                        <div class="form-group">
                            <strong>No Pets Allowed:</strong>
                            <input type="checkbox" id="no_pets_allowed" value="1" name="no_pets_allowed"  />                            
                        </div>
                    </div>
                </div>
                <div id="utility" class="tab-pane fade background-white" style="background-color:white;"> 
                    <div class="col-xs-6 col-sm-6 col-md-3 col-lg-2">
                        <div class="form-group">
                            <strong>Heat:</strong>
                            <input type="checkbox" id="heat" value="1" name="heat"  />                            
                        </div>
                    </div>                                                                                                                  
                    <div class="col-xs-6 col-sm-6 col-md-3 col-lg-2">
                        <div class="form-group">
                            <strong>Water:</strong>
                            <input type="checkbox" id="heat" value="1" name="water"  />                            
                        </div>
                    </div>                                                                                                                  
                    <div class="col-xs-6 col-sm-6 col-md-3 col-lg-2">
                        <div class="form-group">
                            <strong>Electricity:</strong>
                            <input type="checkbox" id="heat" value="1" name="electricity"  />                            
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                        <div class="form-group">
                            <strong>Parking Details:</strong>
                            <textarea name="parking_details" autocomplete="off" class="form-control" placeholder="Parking Details"></textarea>                                       
                        </div>
                    </div>                                                                                                                  
                </div>
                <div id="publish" class="tab-pane fade background-white" style="background-color:white;">
                    <h3>SEO Configuration</h3>     
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                            <div class="form-group">
                                    <strong>SEO Title:</strong>
                                    <input type="text" name="seo_title"  autocomplete="off" class="form-control" placeholder="SEO Title">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                                <div class="form-group">
                                    <strong>Property Website URL:</strong>
                                    <input type="text" name="website_url"  autocomplete="off" class="form-control" placeholder="Property Website URL">                    
                                </div>
                            </div>            
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                                <div class="form-group">
                                    <strong>SEO URL:</strong>
                                    <input type="text" name="seo_url"  autocomplete="off" class="form-control" placeholder="SEO URL">                    
                                </div>
                            </div> 
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                                <div class="form-group">
                                    <strong>Meta Description:</strong>
                                    <textarea name="meta_description" autocomplete="off" class="form-control" placeholder="Meta Description"></textarea>                                       
                                </div>
                            </div>            
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                                <div class="form-group">
                                    <strong>Keywords:</strong>
                                    <input type="text" name="seo_keywords" autocomplete="off" class="form-control" placeholder="Keywords">                    
                                </div>
                            </div>            
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                                <div class="form-group">
                                    <strong>SEO Bots:</strong>
                                    <select id="seo_bots" name="seo_bots" class="form-control">
                                        <option value="noindex" > noindex</option>
                                        <option value="index"  >index</option>                                        
                                    </select>                    
                                </div>
                            </div>
                            <div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-4">
                                <strong>Status:</strong>
                                <select id="active" name="active" class="form-control">
                                    <option value="1" >Published</option>
                                    <option value="2" >Draft</option>                    
                                    <option value="3">Hidden</option> 
                                </select>
                            </div>  
                    </div>           
                </div>
            </div>        
            <!-- END Tab Contents -->            
            </form>
        </div>
        </div>
        </div>
        <!-- END Right Column for Property edit inputs -->        
    </div>  
    <!--END Main Row -->
</div>
@endsection