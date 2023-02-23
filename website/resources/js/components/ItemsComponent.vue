<template id="itemtemplate">        
    <div class="row no-gutters" 
        v-for="item in items" :key="item.id">
        <!-- START Item Photos on left side column -->
        <div class="col-sm-12 col-md-5 col-lg-4 col-xl-3 no-gutters">
            <div class="row  no-gutters">                   
                <img class="img-thumbnail img-fill-parent" src="{{ asset('images/photos/thumbnail/')}}{{ '/'.item.name}}" />                                                                                
            </div>        
            <div class="row no-gutter">
                <div class="col-sm-6">
                    <img class="img-thumbnail img-fill-parent" src="{{ asset('images/photos/thumbnail/')}}{{ '/'.item.name}}" style="max-height: 97px;" />                                                                                
                </div>
                <div class="col-sm-6">
                    <img class="img-thumbnail img-fill-parent" src="{{ asset('images/photos/thumbnail/')}}{{ '/'.item.name}}" style="max-height: 97px;" />            
                </div>
            </div>        
        </div>
        <!-- END Item Photos on left side column -->

        <!-- START Item Detail on side column -->
        <div class="col-sm-12 col-md-7 col-lg-8 col-xl-7"  style="margin-left: -6px;margin-top: 4px;">
            <div id="parallelogram-container" class="d-flex">
                <div class="my-auto parallelogram">
                    <span class="pl-3" style="color:white;font-size: 30px;">{{ $item->business->name }}</span>
                </div>      
            </div>
            <div class="d-flex ml-5 pl-3">
                <span style="font-size: 20px;"> {{ $item->business->name }} {{ $item->business->city }}</span>
            </div>
            <div class="d-flex ml-5">
                <div class="p-2 flex-fill" style="max-width:50%;">
                    <img class=" img-fill-parent" src="{{ asset('images/home/bedroom.jpg') }}" style="max-width:40px;" />
                    <span style="ml-5">bedrooms {{ $item->bedrooms }}</span>
                </div>
                <div class="p-2 flex-fill" style="max-width:50%;">
                    <img class=" img-fill-parent" src="{{ asset('images/home/bathroom.jpg') }}" style="max-width:40px;" />
                    <span style="ml-5">Bathrooms {{ $item->bathrooms }}</span>
                </div>
            </div>
            <div class="d-flex ml-5">
            <div class="p-2 flex-fill" style="max-width:50%;">
                    <img class=" img-fill-parent" src="{{ asset('images/home/heater.jpg') }}" style="max-width:40px;" />
                    <span style="ml-5">Heater {{ $item->business->utility->heat >0?'Available':'Not Available' }}</span>
                </div>
                <div class="p-2 flex-fill" style="max-width:50%;">
                    <img class=" img-fill-parent" src="{{ asset('images/home/parking.jpg') }}" style="max-width:40px;" />
                    <span style="ml-5">Parking  {{ strlen($item->business->utility->parking) >0?'Available':'Not Available' }}</span>
                </div>
            </div>
            <div class="d-flex ml-5">
                <div class="p-2 flex-fill" style="max-width:50%;">
                    <img class=" img-fill-parent" src="{{ asset('images/home/fridge.jpg') }}" style="max-width:40px;" />
                    <span style="ml-5">Fridge  {{ $item->business->utility->fridge >0?'Available':'Not Available' }}</span>
                </div>
                <div class="p-2 flex-fill" style="max-width:50%;">
                    <i class="fa fa-dollar" style="font-size:30px;width:40px;"></i>
                    <span style="ml-5">Rent  ${{ $item->rent }}</span>
                </div>
            </div>
            <div class="d-flex ml-5 pl-2">
                <div class="p-2 flex-fill">
                    <a href="#">Read More</a>
                </div>            
            </div>
            
        </div>
        <!-- END Item Detail on side column -->
    </div>
</template>


<script>

    export default {
        data(){
            return {
              items: {},
            }
        },
        methods: {
            getItems(){
                axios.get('/getItems')
                     .then((response)=>{
                       this.businesses = response.data.businesses
                     })
            }
        },
        created(){
            this.getItems()
        }
    }
</script> 