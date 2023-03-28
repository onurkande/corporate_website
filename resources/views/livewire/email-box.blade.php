<div>
    @if($record != null)
        <div id="inner-sidebar" class="inner-content-wrap">
            <div class="widget widget_help align-center has-shadow no-sep has-border border-solid">
                <div class="inner">
                    <h2 class="widget-title margin-bottom-14"><span>{{$record->title}}</span></h2>
                    <p class="text line-height-26 margin-bottom-23">
                        {{$record->content}}
                    </p>
                    <div class="elm-button">
                        <a href="#" class="themesflat-button bg-accent pd30">{{$record->button}}</a>
                    </div>
                </div>                                
            </div>
        </div>
    @endif
</div>
