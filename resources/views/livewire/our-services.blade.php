<div>
    @if($record != null)
        <div class="item">
            <div class="inner">
                <div class="themesflat-spacer clearfix" data-desktop="10" data-mobile="10" data-smobile="10"></div>  
                <h5 class="title">{{$record->title}}</h5>
                <p>{{$record->content}}</p>
                <div class="themesflat-spacer clearfix" data-desktop="8" data-mobile="8" data-smobile="8"></div>  

                @php
                    $rows = json_decode($record->rows, TRUE);
                @endphp
                @foreach($rows as $row)
                    <div class="themesflat-list has-icon style-1 icon-left size-16 clearfix">
                        <div class="inner">
                            <span class="item">
                                <span class="icon"><i class="fa fa-check-circle"></i></span>
                                <span class="text">{{$row['paragraph']}}</span>
                            </span>
                        </div>
                    </div><!-- /.themeslat-list -->
                @endforeach
                
            </div>
        </div><!-- /.item -->
    @endif
</div>
