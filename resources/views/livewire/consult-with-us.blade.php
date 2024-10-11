<div>
    @if ($record != null)
        <div class="flat-content-wrap style-2 clearfix">
            <h5 class="title no-letter-spacing">{{$record->title}}</h5>
            <div class="themesflat-spacer clearfix" data-desktop="27" data-mobile="27" data-smobile="27"></div> 
            <div class="themesflat-tabs style-2 title-w170 clearfix">
                <ul class="tab-title clearfix ">
                    @php
                        $header = json_decode($record->header, TRUE);
                    @endphp
                    @foreach($header as $single)
                        <li class="item-title active">
                            <span class="inner">{{$single}}</span>
                        </li>   
                    @endforeach
                </ul>

                <div class="tab-content-wrap clearfix">
                    <div class="tab-content">
                        <div class="item-content">                                                            
                            <p>{{$record->content}}</p>
                        </div>
                    </div><!-- /.tab-content -->
                </div><!-- /.tab-content-wrap -->
            </div><!-- /.themesflat-tabs -->
        </div>        
    @endif
    
</div>
