<div class="row carousel-holder">
    <div class="col-md-12">
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <?php $count = 0 ?>
                @foreach($slide as $item_slide)
                
                <li data-target="#carousel-example-generic" data-slide-to="{{ $count }}" 
                @if($count == 0)
                    class="active"
                @else
                    class="" 
                @endif
                ></li>
                <?php $count = $count+1 ?>
                @endforeach
            </ol>
            <div class="carousel-inner">
                <?php $i=0 ?>
                @foreach($slide as $item_slide)
                <div

                @if($i == 0) 
                    class="item active"
                @else
                    class="item"
                @endif
                >
                <?php $i++ ?>
                    <img class="slide-image" width="800px" height="300px" src="{{ url('upload/slide/'.$item_slide->image) }}" alt="">
                </div>
                @endforeach
            </div>
            <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
            </a>
            <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
            </a>
        </div>
    </div>
</div>