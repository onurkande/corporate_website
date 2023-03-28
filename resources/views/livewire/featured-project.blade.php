<div class="row-project parallax parallax-1 parallax-overlay">    
    @if($record != null)
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="themesflat-spacer clearfix" data-desktop="60" data-mobile="60" data-smobile="60"></div>
                    <div class="themesflat-headings style-1 text-center clearfix">
                        <h2 class="heading text-white">{{$record->title}}</h2>
                        <div class="sep has-icon width-125 border-color-light clearfix">
                            <div class="sep-icon">
                                <span class="sep-icon-before sep-center sep-solid"></span>
                                <span class="icon-wrap"><i class="autora-icon-build"></i></span>
                                <span class="sep-icon-after sep-center sep-solid"></span>
                            </div>
                        </div>                                                
                    </div>
                    <div class="themesflat-spacer clearfix" data-desktop="30" data-mobile="35" data-smobile="35"></div>
                    <div class="themesflat-carousel-box clearfix" data-gap="30" data-column="4" data-column2="2" data-column3="1" data-auto="false">
                        <div class="owl-carousel owl-theme">
                            
                            @php
                                $rows = json_decode($record->rows, TRUE);
                            @endphp
                            @foreach($rows as $row)
                                <div class="themesflat-project style-1 data-effect clearfix">
                                    <div class="project-item">
                                        <div class="inner">
                                            <div class="thumb data-effect-item has-effect-icon w40 offset-v-43 offset-h-46">
                                                {{-- <img src="/storage/images/{{$row['image']}}" alt="Image">  --}}
                                                <img src="/images/{{$row['image']}}" alt="Image">        
                                                <div class="text-wrap text-center">
                                                    <h5 class="heading"><a href="#">{{$row['header']}}</a></h5>
                                                    <div class="elm-meta">
                                                        <span><a href="#">{{$row['content']}}</a></span>
                                                    </div>
                                                </div>
                                                <div class="elm-link">
                                                    {{-- <a href="#" class="icon-1 icon-search"></a>
                                                    <a href="#" class="icon-1"></a> --}}
                                                </div>
                                                <div class="overlay-effect bg-color-3"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- /.themesflat-project -->
                            @endforeach
                            
                        </div>
                    </div><!-- /.themesflat-carousel-box -->
                    <div class="themesflat-spacer clearfix" data-desktop="41" data-mobile="35" data-smobile="35"></div>
                    <div class="elm-button text-center">
                        <a href="#" class="themesflat-button bg-accent">{{$record->button}} </a>
                    </div>
                    <div class="themesflat-spacer clearfix" data-desktop="73" data-mobile="60" data-smobile="60"></div>
                </div><!-- /.col-md-12 -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        <div class="bg-parallax-overlay overlay-black"></div>
    @endif
</div>