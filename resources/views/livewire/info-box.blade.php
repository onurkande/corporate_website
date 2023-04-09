<div>
    @if ($record != null)
        <div class="item">
            <div class="themesflat-spacer clearfix" data-desktop="0" data-mobile="0" data-smobile="35"></div>  
            <div class="themesflat-content-box clearfix" data-margin="0 0 0 11px" data-mobilemargin="0 0 0 0">
                <div class="inner pd35 bg-ffc">
                    <h5 class="title text-white line-height-24 padding-left-7">{{$record->title}}</h5>
                    <div class="themesflat-spacer clearfix" data-desktop="16" data-mobile="16" data-smobile="16"></div>
                    <div class="button-wrap has-icon icon-right size-14">
                        @php
                            $rows = json_decode($record->rows, TRUE);
                        @endphp
                        @foreach($rows as $row)
                            <a href="{{ route('download', ['file' => $row['file'] ]) }}" class="themesflat-button bg-white color-333 w100 font-weight-400 no-letter-spacing pd26" download><span>Dosya İndir<span class="icon"><i class="fa fa-file-pdf-o"></i></span></span></a>
                            <div class="themesflat-spacer clearfix" data-desktop="6" data-mobile="6" data-smobile="6"></div>
                        @endforeach
                        {{-- <a href="{{ route('download', ['file' => 'House-of-the-Dragon-Release-Date.jpg']) }}" class="themesflat-button bg-white color-333 w100 font-weight-400 no-letter-spacing pd26"><span>Dosya İndir<span class="icon"><i class="fa fa-file-pdf-o"></i></span></span></a> --}}
                    </div><!-- /.button-wrap -->
                </div>
            </div>                                    
        </div>        
    @endif
</div>