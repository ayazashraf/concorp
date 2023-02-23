<div class="card card-user">    
    <div class="card-header card-header-user">
            <div class="row">
                <div class="col-lg-12">
                    <div class="pull-left">
                        <a class="btn btn-primary" href="{{ route('users.home') }}">ALL TENANTS</a>
                    </div>
                </div>
            </div>
        
        <div>
            {{ $user->name }} 
        </div>
        <div>
            {{ $user->email }} 
        </div>
        <div>
        {{ $user->property->busuiness->name }} 
        </div>
    </div>
    <div class="card-body card-body">
        <div>
            <a href="{{ route('user.payments',$user) }}">PAYMENTS</a>    
        </div>        
        <div  class="mt-3">
            <a href="{{ route('user.leases',$user) }}">LEASES</a>    
        </div>
        <div class="mt-3">
            <a href="{{ route('user.vehicles',$user) }}">VEHICLES</a>    
        </div>           
    </div>
</div>
