<div class="row-iconbox">
    @if($record != null)
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="themesflat-spacer clearfix" data-desktop="60" data-mobile="60" data-smobile="60"></div>
                    <div class="themesflat-headings style-1 text-center clearfix">
                        <h2 class="heading">{{$record->title}}</h2>
                        <div class="sep has-icon width-125 clearfix">
                            <div class="sep-icon">
                                <span class="sep-icon-before sep-center sep-solid"></span>
                                <span class="icon-wrap"><i class="autora-icon-build"></i></span>
                                <span class="sep-icon-after sep-center sep-solid"></span>
                            </div>
                        </div>
                        <p class="sub-heading">{{$record->content}}</p>
                    </div>
                    <div class="themesflat-spacer clearfix" data-desktop="42" data-mobile="35" data-smobile="35"></div>
                </div><!-- /.col-md-12 -->
            </div><!-- /.row -->

            <div class="row">
                @php
                    $header = json_decode($record->header, TRUE);
                    $icon = json_decode($record->icon, TRUE);
                    $paragraph = json_decode($record->paragraph, TRUE);
                @endphp
                @foreach($header as $key=>$single)
                    <div class="col-md-4">
                        <div class="themesflat-spacer clearfix" data-desktop="0" data-mobile="0" data-smobile="35"></div>
                        <div class="themesflat-content-box clearfix" data-margin="0 5px 0 5px" data-mobilemargin="0 0 0 0">
                            <div class="themesflat-icon-box icon-top align-center has-width w95 circle light-bg accent-color style-1 clearfix">
                                <div class="icon-wrap">
                                    <i class="{{$icon[$key]}}"></i>
                                </div>
                                <div class="text-wrap">
                                    <h5 class="heading"><a href="#">{{$single}}</a></h5>
                                    <div class="sep clearfix"></div>
                                    <p class="sub-heading">{{$paragraph[$key]}}</p>
                                </div>
                            </div><!-- /.themesflat-icon-box -->
                        </div><!-- /.themesflat-content-box -->
                    </div><!-- /.col-md-4 -->
                @endforeach
            </div><!-- /.row -->

            <div class="row">
                <div class="col-md-12">
                    <div class="themesflat-spacer clearfix" data-desktop="41" data-mobile="35" data-smobile="35"></div>
            
                    <div class="themesflat-spacer clearfix" data-desktop="73" data-mobile="60" data-smobile="60"></div>
                </div><!-- /.col-md-12 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    @endif
</div>
