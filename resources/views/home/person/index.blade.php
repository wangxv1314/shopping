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
					<div class="wrap-left">
						<div class="wrap-list">
							<div class="m-user">
								<!--个人信息 -->
								<div class="m-bg"></div>
								<div class="m-userinfo">
									<div class="m-baseinfo">
										<a href="information.html">
											<img src="/upload/user_info/{{ $user_info->pic }}">
										</a>
										<em class="s-name">{{ $user_info->uname }}<span class="vip1"></em>
										<div class="s-prestige am-btn am-round">
											</span>会员福利</div>
									</div>
									<div class="m-right">
										<div class="m-new">
											<a href="news.html"><i class="am-icon-bell-o"></i>消息</a>
										</div>
										<div class="m-address">
											<a href="address.html" class="i-trigger">我的收货地址</a>
										</div>
									</div>
								</div>

								<!--个人资产-->
								<div class="m-userproperty">
									
									
									
									
									
								</div>
							</div>
							<div class="box-container-bottom"></div>

							<!--订单 -->
							<div class="m-order">
								<div class="s-bar">
									<i class="s-icon"></i>我的订单
									<a class="i-load-more-item-shadow" href="order.html">全部订单</a>
								</div>
								<ul>
									<li><a href="order.html"><i><img src="/home/images/pay.png"/></i><span>待付款</span></a></li>
									<li><a href="order.html"><i><img src="/home/images/send.png"/></i><span>待发货<em class="m-num">1</em></span></a></li>
									<li><a href="order.html"><i><img src="/home/images/receive.png"/></i><span>待收货</span></a></li>
									<li><a href="order.html"><i><img src="/home/images/comment.png"/></i><span>待评价<em class="m-num">3</em></span></a></li>
									<li><a href="change.html"><i><img src="/home/images/refund.png"/></i><span>退换货</span></a></li>
								</ul>
							</div>
							

							
							

						</div>
					</div>
					<div class="wrap-right">

						<!-- 日历-->
						<div class="day-list">
							<div class="s-bar">
								<a class="i-history-trigger s-icon" href="#"></a>我的日历
								<a class="i-setting-trigger s-icon" href="#"></a>
							</div>
							<div class="s-care s-care-noweather">
								<div class="s-date">
									<em>{{ $time['day']}}</em>
									<span>{{ $time['week']}}</span>
									<span>{{ $time['year']}}</span>
								</div>
							</div>
						</div>
						<!--新品 -->
						<div class="new-goods">
							
						</div>

						<!--热卖推荐 -->
						<div class="new-goods">
							
						</div>

					</div>
				</div>
				<!--底部-->
				
			</div>

			  @include('/home/public/person_nav')
		</div>
         
          
@endsection