@extends('home/lyout/goods_list')
@section('content')
			<div class="clear"></div>
			<b class="line"></b>
           <div class="search">
			<div class="search-list">
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

			
					<div class="am-g am-g-fixed">
						<div class="am-u-sm-12 am-u-md-12">
	                  	<div class="theme-popover">														
							<div class="searchAbout">
								

							</div>
							
							<div class="clear"></div>
                        </div>
							<div class="search-content">
								<div class="sort">
									
								</div>
								<div class="clear"></div>

								<ul class="am-avg-sm-2 am-avg-md-3 am-avg-lg-4 boxes">
								@foreach($goods_data as $v)
									<li>
									<a href="/goods/{{ $v->gid}}">
										<div class="i-pic limit">
											<img src="/upload/goods/{{ $v->pic }}" />											
											<p class="title fl">{{ $v->tname}}</p>
											<p class="price fl">
												<b>¥</b>
												<strong>{{ $v->price }}</strong>
											</p>
											<p class="number fl">
												销量<span>{{ $v->status}}</span>
											</p>
										</div>
									</a>
									</li>
								@endforeach	
								</ul>
							</div>
							<div class="search-side">

								<div class="side-title">
									经典搭配
								</div>
							@foreach($corre_goods as $v)
								<li>
								<a href="/goods/{{ $v->gid}}">
									<div class="i-pic check">
										<img src="/upload/goods/{{ $v->pic }}" />
										<p class="check-title">{{ $v->tname }}</p>
										<p class="price fl">
											<b>¥</b>
											<strong>{{ $v->price }}</strong>
										</p>
										<p class="number fl">
											销量<span>{{ $v->status }}</span>
										</p>
									</div>
									</a>
								</li>
							@endforeach	
							
							</div>
							<div class="clear"></div>
							<!--分页 -->
							<ul class="am-pagination am-pagination-right">
								<li class="am-disabled"><a href="#">&laquo;</a></li>
								<li class="am-active"><a href="#">1</a></li>
								<li><a href="#">2</a></li>
								<li><a href="#">3</a></li>
								<li><a href="#">4</a></li>
								<li><a href="#">5</a></li>
								<li><a href="#">&raquo;</a></li>
							</ul>

						</div>
					</div>
@endsection