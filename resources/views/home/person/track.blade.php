@extends('home/lyout/personal')
@section('content')
		 <div class="nav-table">
					   <div class="long-title"><span class="all-goods">全部分类</span></div>
					   <div class="nav-cont">
							<ul>
								<li class="index"><a href="#">首页</a></li>
                                <li class="qc"><a href="#">闪购</a></li>
                                <li class="qc"><a href="#">限时抢</a></li>
                                <li class="qc"><a href="#">团购</a></li>
                                <li class="qc last"><a href="#">大包装</a></li>
							</ul>
						    <div class="nav-extra">
						    	<i class="am-icon-user-secret am-icon-md nav-user"></i><b></b>我的福利
						    	<i class="am-icon-angle-right" style="padding-left: 10px;"></i>
						    </div>
						</div>
			</div>
			<b class="line"></b>


			<div class="center">
			<div class="col-main">
				<div class="main-wrap">

					<div class="user-foot">
						<!--标题 -->
						<div class="am-cf am-padding">
							<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">我的足迹</strong> / <small>Browser&nbsp;History</small></div>
						</div>
						<hr/>

						<!--足迹列表 -->

						<div class="goods">
							
						@foreach($track_data as $v)
							<div class="goods-box first-box">
								<div class="goods-pic">
									<div class="goods-pic-box">
										<a class="goods-pic-link" target="_blank" href="#" title="意大利费列罗进口食品巧克力零食24粒  进口巧克力食品">
											<img src="/upload/goods/{{ $v->pic }}" class="goods-img"></a>
									</div>
									<a class="goods-delete" href="javascript:void(0);"></a>
									
								</div>

								<div class="goods-attr">
									<div class="good-title">
										<a class="title" href="#" target="_blank">{{ $v->tname }}</a>
									</div>
									<div class="goods-price">
										<span class="g_price g_price-original">                                    
                                        <span>¥</span><strong>{{ $v->price }}</strong>
										</span>
									</div>
									<div class="clear"></div>
									
								</div>
							</div>
						@endforeach
						</div>

					

						
					

						
						
						
					</div>
				</div>

				
			</div>
	 @include('/home/public/person_nav')
		</div>

@endsection