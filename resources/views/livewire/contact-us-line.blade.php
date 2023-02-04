<div class="row-quote bg-row-1">
    @if($record != null)
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="themesflat-spacer clearfix" data-desktop="38" data-mobile="35" data-smobile="35"></div>
                    <div class="themesflat-quote style-1 clearfix">
                        <div class="quote-item">
                            <div class="inner">
                                <div class="heading-wrap">
                                    <h3 class="heading">{{$record->title}}</h3>
                                </div>
                                <div class="button-wrap has-icon icon-left">
                                    <a href="#" class="themesflat-button bg-white small"><span>{{$record->number}}<span class="icon"><i class="autora-icon-phone-contact"></i></span></span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="themesflat-spacer clearfix" data-desktop="33" data-mobile="35" data-smobile="35"></div>
                </div><!-- /.col-md-12 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    @endif
</div>