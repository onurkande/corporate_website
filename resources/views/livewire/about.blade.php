<div class="row-about">
    @if($record != null)
        <div class="container-fluid">
            <div class="row equalize sm-equalize-auto">
                <div class="col-md-6 half-background style-1">
                    {{-- <img src="/storage/images/{{$record->image}}"> --}}
                    <img src="{{asset('admin/aboutImage/'.$record->image)}}">
                </div><!-- /.col-md-6 -->
                <div class="col-md-6 bg-light-grey">
                    <div class="themesflat-spacer clearfix" data-desktop="64" data-mobile="60" data-smobile="60"></div>
                    <div class="themesflat-content-box clearfix" data-margin="0 25% 0 4.5%" data-mobilemargin="0 0 0 4.5%">
                        <div class="themesflat-headings style-1 clearfix">
                            <h2 class="heading">{{$record->title}}</h2>
                            <div class="sep has-width w80 accent-bg margin-top-11 clearfix"></div>                                               
                            <p class="sub-heading margin-top-30">{{$record->content}}</p>
                        </div>
                        <div class="themesflat-spacer clearfix" data-desktop="26" data-mobile="35" data-smobile="35"></div>
                        <div class="content-list">

                            <!-- /.themeslat-list -->
                            <!-- <div class="themesflat-list has-icon style-1 icon-left clearfix">
                                <div class="inner">
                                    <span class="item">
                                        <span class="icon"><i class="fa fa-check-square"></i></span>
                                        <span class="text">Completing projects on time & Following budget guidelines</span>
                                    </span>
                            </div>    
                            </div>
                            <div class="themesflat-list has-icon style-1 icon-left clearfix">
                                <div class="inner">
                                    <span class="item">
                                        <span class="icon"><i class="fa fa-check-square"></i></span>
                                        <span class="text">Elevated quality of workmanship</span>
                                    </span>
                                </div>
                            </div>
                            <div class="themesflat-list has-icon style-1 icon-left clearfix">
                                <div class="inner">
                                    <span class="item">
                                        <span class="icon"><i class="fa fa-check-square"></i></span>
                                        <span class="text">Meeting diverse supplier requirements</span>
                                    </span>
                                </div>
                            </div>
                            <div class="themesflat-list has-icon style-1 icon-left clearfix">
                                <div class="inner">
                                    <span class="item">
                                        <span class="icon"><i class="fa fa-check-square"></i></span>
                                        <span class="text">Implementing appropriate safety precautions and procedures</span>
                                    </span>
                                </div>
                            </div> -->
                            <!-- /.themeslat-list -->
                            
                        </div><!-- /.content-list -->
                        <div class="themesflat-spacer clearfix" data-desktop="42" data-mobile="35" data-smobile="35"></div>
                        <div class="elm-button">
                            <a href="#"  class="themesflat-button bg-white">{{$record->button}}</a>
                        </div>
                    </div><!-- /.themesflat-content-box --> 
                    <div class="themesflat-spacer clearfix" data-desktop="75" data-mobile="60" data-smobile="60"></div>
                </div><!-- /.col-md-6 -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    @endif
</div>