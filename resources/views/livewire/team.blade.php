<div class="row-team">
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
                        <p class="sub-heading font-weight-400 text-808 max-width-680">{{$record->content}}</p>
                    </div>
                    <div class="themesflat-spacer clearfix" data-desktop="39" data-mobile="35" data-smobile="35"></div>
                    <div class="themesflat-carousel-box data-effect has-bullets bullet-circle bullet24 clearfix" data-gap="30" data-column="3" data-column2="2" data-column3="1" data-auto="true">
                        <div class="owl-carousel owl-theme">
                            @php
                                $employees = json_decode($record->employee, TRUE);
                            @endphp
                            @foreach($employees as $employee)
                                <div class="themesflat-team style-1 align-center clearfix">
                                    <div class="team-item">
                                        <div class="inner">
                                            <div class="thumb data-effect-item">
                                                {{-- <img src="/storage/images/{{$employee['image']}}" alt="Image"> --}}
                                                <img src="/images/{{$employee['image']}}" alt="Image"> 
                                                <ul class="socials clearfix">
                                                    <li class="facebook"><a href="#"><i class="autora-icon-facebook"></i></a></li>
                                                    <li class="twitter"><a href="#"><i class="autora-icon-twitter"></i></a></li>
                                                    <li class="camera"><a href="#"><i class="autora-icon-camera-outline"></i></a></li>
                                                </ul>
                                                <div class="overlay-effect bg-color-4"></div>
                                            </div>
                                            <div class="text-wrap">
                                                <h6 class="name">{{$employee["name"]}}</h6>
                                                <div class="position">{{$employee["task"]}}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- /.themesflat-team -->
                            @endforeach
                            
                        </div><!-- /.owl-carousel -->
                    </div><!-- /.themesflat-carousel -->
                    <div class="themesflat-spacer clearfix" data-desktop="80" data-mobile="60" data-smobile="60"></div>
                </div><!-- /.col-md-12 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    @endif
</div>