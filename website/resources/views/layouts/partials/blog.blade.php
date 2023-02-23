
    <div class="col-sm-12 col-md-6 mt-3 mb-3">
        <div class="card" style="max-width:400px">
            @if(strlen($blog->featured_image)>0)
                <img id="thumbImg" name="thumbImg" class="thumbnail"  src="{{ asset('images/blogs'). '/'.$blog->featured_image }}" alt="{{ strlen($blog->featured_image)>0?$blog->image_caption:'' }}" style="max-height:300px;">            
            @else
            <img id="thumbImg" name="thumbImg" class="thumbnail"  src="#" alt="">        
            @endif        
            <div class="card-body blog-card-body">
                <h4 class="card-title">{{$blog->title}}</h4>
                <p class="card-text">{{$blog->summary}}</p>    
                <a href="{{route('blog.detail',$blog->id)}}" class="stretched-link"></a>            
            </div>
            <div class="card-footer">
                <div class="mr-auto">
                    {{ $blog->publish_date }} -  {{$blog->author}}
                </div>                                
            </div>
        </div>                
    </div>
