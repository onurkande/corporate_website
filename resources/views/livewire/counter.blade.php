<div class="row-counter parallax parallax-4 parallax-overlay">
    @if($record != null)
        <div class="container">
            <div class="row clearfix">
                <div class="col-md-12">
                    <div class="themesflat-spacer clearfix" data-desktop="92" data-mobile="60" data-smobile="60"></div>
                </div><!-- /.col-md-12 -->
            </div><!-- /.row -->                                    
            <div class="themesflat-row gutter-30 separator light clearfix">
                @php
                    $columns=json_decode($record->columns, TRUE);
                @endphp
                @foreach($columns as $column)
                    <div class="col span_1_of_3">
                        <div class="themesflat-content-box clearfix" data-margin="0 0 0 0" data-mobilemargin="0 0 0 0">
                            <div class="themesflat-counter style-1 align-center clearfix">
                                <div class="counter-item">
                                    <div class="inner">
                                        <div class="text-wrap">
                                            <div class="number-wrap">
                                                <span class="number" data-speed="2000" data-to="{{$column['number']}}" data-inviewport="yes">{{$column['number']}}</span><span class="suffix">+</span>
                                            </div>
                                            <h3 class="heading margin-right-18">{{$column['title']}}</h3>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- /.themesflat-counter -->
                        </div> 
                        <div class="themesflat-spacer clearfix" data-desktop="0" data-mobile="35" data-smobile="35"></div>                                                                                  
                    </div><!-- /.col-md-3 -->
                @endforeach          
            </div><!-- /.row -->
            <div class="row clearfix">
                <div class="col-md-12">
                    <div class="themesflat-spacer clearfix" data-desktop="72" data-mobile="60" data-smobile="60"></div>                                        
                </div><!-- /.col-md-12 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
        <div class="bg-parallax-overlay overlay-black style2"></div>
    @endif
</div>