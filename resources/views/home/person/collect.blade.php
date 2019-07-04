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

					<div class="user-collection">
						<!--标题 -->
						<div class="am-cf am-padding">
							<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">我的收藏</strong> / <small>My&nbsp;Collection</small></div>
						</div>
						<hr/>

						<div class="you-like">
							<div class="s-bar">
								我的收藏
								
							</div>
							<div class="s-content">
								
							@foreach($collect_data as $v)
								<div class="s-item-wrap">
									<div class="s-item">

										<div class="s-pic">
											<a href="/goods/{{ $v->goods->gid }}" class="s-pic-link">
												<img src="/upload/goods/{{ $v->goods->pic }}" alt="包邮s925纯银项链女吊坠短款锁骨链颈链日韩猫咪银饰简约夏配饰" title="包邮s925纯银项链女吊坠短款锁骨链颈链日韩猫咪银饰简约夏配饰" class="s-pic-img s-guess-item-img">
											</a>
										</div>
										<div class="s-info">
											<div class="s-title"><a href="#" title="包邮s925纯银项链女吊坠短款锁骨链颈链日韩猫咪银饰简约夏配饰">{{ $v->goods->tname }}</a></div>
											<div class="s-price-box">
												<span class="s-price"><em class="s-price-sign">¥</em><em class="s-value">{{ $v->goods->price  }}</em></span>
												
											</div>
											
										</div>
										
									</div>
								</div>
							@endforeach
								
							</div>

							

						</div>

					</div>

				</div>
				<!--底部-->
				
			</div>
	 @include('/home/public/person_nav')
			
		</div>
@endsection