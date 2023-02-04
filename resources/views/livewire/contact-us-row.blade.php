<div class="row-iconbox">
    @if($record != null)
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="themesflat-spacer clearfix" data-desktop="61" data-mobile="60" data-smobile="60"></div>
                    <div class="themesflat-headings style-1 text-center clearfix">
                        <h2 class="heading">{{$record->title}}</h2>
                        <div class="sep has-icon width-125 clearfix">
                            <div class="sep-icon">
                                <span class="sep-icon-before sep-center sep-solid"></span>
                                <span class="icon-wrap"><i class="autora-icon-build"></i></span>
                                <span class="sep-icon-after sep-center sep-solid"></span>
                            </div>
                        </div>
                        <p class="sub-heading font-weight-400 max-width-770 line-height-26 margin-top-14">{{$record->content}}</p>
                    </div>
                    <div class="themesflat-spacer clearfix" data-desktop="45" data-mobile="35" data-smobile="35"></div>
                </div><!-- /.col-md-12 -->
            </div><!-- /.row -->

            <div class="row gutter-16">
                @php
                    $rows = json_decode($record->rows, TRUE);
                @endphp
                @foreach($rows as $row)
                    <div class="col-md-4">
                        <div class="themesflat-icon-box icon-top align-center  accent-color style-3 bg-light-snow clearfix">
                            <div class="icon-wrap">
                                {{$row['icon']}}
                            </div>
                            <div class="text-wrap">
                                <h5 class="heading"><a href="#">{{$row['header']}}</a></h5>
                                <p class="sub-heading">{{$row['paragraph']}}</p>
                            </div>
                        </div><!-- /.themesflat-icon-box -->
                    </div><!-- /.col --> 
                @endforeach
                                        
            </div><!-- /.row -->

            <div class="row">
                <div class="col-md-12">
                    <div class="themesflat-spacer clearfix" data-desktop="58" data-mobile="35" data-smobile="35"></div>
                </div><!-- /.col-md-12 -->
            </div><!-- /.row -->
        </div><!-- /.container -->        
    @endif
    
</div>