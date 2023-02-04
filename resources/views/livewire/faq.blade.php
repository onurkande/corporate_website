<div class="row-tabs">
    @if($record != null)
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="themesflat-spacer clearfix" data-desktop="61" data-mobile="60" data-smobile="60"></div>
                </div><!-- /.col-md-12 -->
            </div><!-- /.row -->
            <div class="row">
                <div class="col-md-12">
                    <div class="themesflat-spacer clearfix" data-desktop="0" data-mobile="0" data-smobile="35"></div>
                    <div class="themesflat-content-box" data-margin="0 0 0 18px" data-mobilemargin="0 0 0 0">
                        <div class="themesflat-headings style-1 clearfix">
                            <h2 class="heading">{{$record->title}}</h2>
                            <div class="sep has-width w80 accent-bg margin-top-11 clearfix"></div>                                          
                        </div>
                        <div class="themesflat-spacer clearfix" data-desktop="38" data-mobile="35" data-smobile="35"></div>
                        <div class="themesflat-accordions style-1 has-icon icon-left iconstyle-1 clearfix">
                            @php
                                $lines = json_decode($record->lines, TRUE);
                            @endphp

                            @foreach($lines as $line)
                                <div class="accordion-item">
                                    <h3 class="accordion-heading"><span class="inner">{{$line["header"]}}</span></h3>
                                    <div class="accordion-content">
                                        <div>{{$line["content"]}}</div>
                                    </div>
                                </div><!-- /.accordion-item -->
                            @endforeach
                        </div><!-- /.themesflat-accordion -->
                    </div><!-- /.themesflat-content-box -->                                                
                </div><!-- /.col-md-6 -->
            </div><!-- /.row -->
            <div class="row">
                <div class="col-md-12">
                    <div class="themesflat-spacer clearfix" data-desktop="0" data-mobile="0" data-smobile="0"></div>
                </div><!-- /.col-md-12 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    @endif
</div>