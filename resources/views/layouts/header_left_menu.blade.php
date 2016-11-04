 
<script>
$(document).ready(function(){
//	$(".vertical-menu-content2").hide();

    $(".buttop").click(function(){
        $(".vertical-menu-content2").slideToggle();
    });
});
</script>


                <div class="col-sm-3" id="box-vertical-megamenus">
                    <div class="box-vertical-megamenus">
                        <h4 class="title">
                            <span class="title-menu">الأقسام الرئيسية</span>
                           <!-- <span class="btn-open-mobile buttop pull-right home-page"><i class="fa fa-bars"></i></span> -->
                                                <span class="buttop pull-left home-page"><i class="fa fa-bars"></i></span>

                        </h4>
                        <div class="vertical-menu-content2 is-home">
                            <ul class="vertical-menu-list">
                                @foreach(\App\first::where('status', 1)->orderBy('indx', 'asc')->get() as $first)
                                <li>
                                    <a class="parent" href="/category/{{\App\first::slug($first->id)}}"><img class="icon-menu" alt="{{$first->title_ar}}" src="

@if($first->id == 6)
{{ asset('data/1.png') }}
@elseif($first->id == 10)
{{ asset('data/9.png') }}
@elseif($first->id == 8)
{{ asset('data/3.png') }}
@elseif($first->id == 7)
{{ asset('data/17.png') }}
@elseif($first->id == 5)
{{ asset('data/10.png') }}
@elseif($first->id == 3)
{{ asset('data/2.png') }}
@elseif($first->id == 2)
{{ asset('data/21.png') }}
@else
{{ asset('data/16.png') }}
@endif
">{{$first->title_ar}}</a>
                                    <div class="vertical-dropdown-menu">
                                        <div class="vertical-groups col-sm-12">
                                    	
                                    	<?php $group = 0;$count = 0;?>
                                    	@foreach(\DB::table('secondlevel')->where('pid', $first->id)->orderBy('group_id')->get() as $second)
                                            @if($group != $second->group_id)
                                            @if($count < 6)
                                            <?php $group = $second->group_id;?>
                                            
                                            <div class="mega-group col-sm-4">
                                                <h4 class="mega-group-header"><span>{{\DB::table('groups')->where('id', $second->group_id)->first()->title_ar}}</span></h4>
                                                
                                                <ul class="group-link-default">
                                                	<?php $count2 = 0;?>
                                                	@foreach(\DB::table('secondlevel')->where('pid', $first->id)->where('group_id', $second->group_id)->get() as $second2)
                                                    @if($count2 < 3)
                                                    <li><a href="/products/{{\App\second::slug($second2->id)}}">{{ $second2->title_ar }}</a></li>
                                                    @endif
                                                    <?php $count2++;?>
                                                    @endforeach
                                                    
                                                    
                                                    

                                                </ul>
                                            </div>
                                            
                                            @endif
                                            <?php $count++;?>
                                            @endif
                                            @endforeach
                                            
                                            <div class="mega-custom-html col-sm-12">
                                                <a href="#"><img src="{{ asset('header_left/left_header_' .$first->id . '.png') }}" alt="Banner"></a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                
                                @endforeach
                                
                                
                            </ul>
                            <div class="all-category"><span style="margin-left: 10px;" class="open-cate"><a href="/sitemap">جميع الاقسام</a></span></div>
                        </div>
                    </div>
                </div>
                
              <style>
              	.vertical-dropdown-menu .group-link-default{
              		min-height: 100px;
              	}
              </style>  
               