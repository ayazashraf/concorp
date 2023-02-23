<div class="card card-user">
    <div class="card-header card-header-user">
        <img src="{{ asset('images/user/') }}{{ '/'. Auth::user()->photo }}" class="avatar" alt="{{ Auth::user()->name }}" rel="no-follow" />
        <div class="mt-3">
            <h3><strong>MY ACCOUNT</strong></h3>    
        </div>                    
    </div>

    <div class="card-body">
        <div>
            <a href="{{ url('tenant') }}">PROFILE</a>    
        </div>
        <div class="mt-3">
            <a href="{{ url('tenant/payments') }}">PAYMENTS</a>    
        </div>
        <div class="mt-3">                    
            <a href="{{ url('tenant/documents') }}">DOCUMENTS</a>    
        </div>
        <div class="mt-3">
            <a href="{{ url('tenant/report') }}">REPORT MAINTENANCE</a>    
        </div>
        <div class="mt-3">
            <a href="{{ url('tenant/vehicle') }}">VEHICLES</a>    
        </div>
        <div class="mt-3">
            <a href="{{ route('feedback.write') }}">FEEDBACK</a>    
        </div>
    </div>
</div>
