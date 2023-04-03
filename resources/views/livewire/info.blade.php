<div>
    @if($record != null)
    <div class="themesflat-spacer clearfix" data-desktop="80" data-mobile="60" data-smobile="60"></div>

    <div class="themesflat-row equalize sm-equalize-auto clearfix">
        <div class="span_1_of_6 bg-f7f">
            <div class="themesflat-spacer clearfix" data-desktop="60" data-mobile="60" data-smobile="60"></div>
            <div class="themesflat-content-box clearfix" data-margin="0 10px 0 43px" data-mobilemargin="0 15px 0 15px">
                <div class="themesflat-headings style-2 clearfix">
                    <div class="sup-heading">{{$record->title}}</div>
                    <h2 class="heading font-size-28 line-height-39">{{$record->bigtitle}}</h2>
                    <div class="sep has-width w80 accent-bg margin-top-20 clearfix"></div>                                          
                    <p class="sub-heading margin-top-33 line-height-24">{{$record->content}}</p>
                </div>
            </div>                               
            <div class="themesflat-spacer clearfix" data-desktop="56" data-mobile="56" data-smobile="56"></div> 
        </div>
        <div class="span_1_of_6 half-background style-2">                        
        </div>
    </div><!-- /.themesflat-row -->
    @endif
</div>
