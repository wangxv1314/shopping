@extends('home/lyout/index')
@section('content')
			<div class="banner">
                      <!--轮播 -->
						<div class="am-slider am-slider-default scoll" data-am-flexslider id="demo-slider-0">
							<ul class="am-slides">
								@foreach($banner_data as $v)
								<li class="banner1">
									<a href="javascript:;">
										<img src="upload/banners/{{ $v->pic }}" />
									</a>
								</li>
								@endforeach

							</ul>
						</div>
						<div class="clear"></div>	
			</div>
			<div class="shopNav">
				<div class="slideall">
					
					   <div class="long-title"><span class="all-goods">全部分类</span></div>
					   <div class="nav-cont">
							<ul>
								<li class="index"><a href="/">首页</a></li>
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
		        				
						<!--侧边导航 -->
						<div id="nav" class="navfull">
							<div class="area clearfix">
								<div class="category-content" id="guide_2">
									
									<div class="category">
										<ul class="category-list" id="js_climit_li">
										@foreach($cates_data as $val)
											<li class="appliance js_toggle relative first">
												<div class="category-info">
													<h3 class="category-name b-category-name"><i><img src="/home/images/cake.png"></i><a class="ml-22" title="点心">{{ $val->cname }}</a></h3>
													<em>&gt;</em></div>
												<div class="menu-item menu-in top">
													<div class="area-in">
														<div class="area-bg">
															<div class="menu-srot">
																<div class="sort-side">
																@foreach($val->sub as $vv)
																	<dl class="dl-sort">
																		<dt><span title="蛋糕">{{ $vv->cname }}</span></dt>
																		@foreach($vv->sub as $v)
																		<dd><a title="蒸蛋糕" href="/list/{{ $v->cid }}"><span>{{ $v->cname }}</span></a></dd>
																		@endforeach
																		
																	</dl>
																@endforeach

																</div>
															
															</div>
														</div>
													</div>
												</div>
											<b class="arrow"></b>	
											</li>
											@endforeach

											</li>
										</ul>
									</div>
								</div>

							</div>
						</div>
						
						
						<!--轮播-->
						
						<script type="text/javascript">
							(function() {
								$('.am-slider').flexslider();
							});
							$(document).ready(function() {
								$("li").hover(function() {
									$(".category-content .category-list li.first .menu-in").css("display", "none");
									$(".category-content .category-list li.first").removeClass("hover");
									$(this).addClass("hover");
									$(this).children("div.menu-in").css("display", "block")
								}, function() {
									$(this).removeClass("hover")
									$(this).children("div.menu-in").css("display", "none")
								});
							})
						</script>



					<!--小导航 -->
					<div class="am-g am-g-fixed smallnav">
						<div class="am-u-sm-3">
							<a href="sort.html"><img src="/home/images/navsmall.jpg" />
								<div class="title">商品分类</div>
							</a>
						</div>
						<div class="am-u-sm-3">
							<a href="#"><img src="/home/images/huismall.jpg" />
								<div class="title">大聚惠</div>
							</a>
						</div>
						<div class="am-u-sm-3">
							<a href="/user"><img src="/home/images/mansmall.jpg" />
								<div class="title">个人中心</div>
							</a>
						</div>
						<div class="am-u-sm-3">
							<a href="#"><img src="/home/images/moneysmall.jpg" />
								<div class="title">投资理财</div>
							</a>
						</div>
					</div>

					<!--走马灯 -->

					<div class="marqueen">
						<span class="marqueen-title">商城头条</span>
						<div class="demo">

							<ul>
								<li class="title-first"><a target="_blank" href="#">
									<img src="/home/images/TJ2.jpg"></img>
									<span>[特惠]</span>商城爆品1分秒								
								</a></li>
								<li class="title-first"><a target="_blank" href="#">
									<span>[公告]</span>商城与广州市签署战略合作协议
								     <img src="/home/images/TJ.jpg"></img>
								     <p>XXXXXXXXXXXXXXXXXX</p>
							    </a></li>
							    
						<div class="mod-vip">
							@if(session('user'))
							<div class="m-baseinfo">
								<a href="person/index.html">
									<img src="/home/images/getAvatar.do.jpg">
								</a>
								<em>
									Hi,<span class="s-name">
									@if(session('user_info'))
										{{ session('user_info') }}
									@else
										{{ session('user_info') }}
									@endif
									</span>
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									<a href="/logout"><p>点击退出</p></a>									
								</em>
							</div>
							@endif
							@if(!session('user'))
							<div class="member-logout">
								<a class="am-btn-warning btn" href="/login">登录</a>
								<a class="am-btn-warning btn" href="/register">注册</a>
							</div>
							@endif
							<div class="member-login">
								<a href="#"><strong>0</strong>待收货</a>
								<a href="#"><strong>0</strong>待发货</a>
								<a href="#"><strong>0</strong>待付款</a>
								<a href="#"><strong>0</strong>待评价</a>
							</div>
							<div class="clear"></div>	
						</div>																	    
							    
								<li><a target="_blank" href="#"><span>[特惠]</span>洋河年末大促，低至两件五折</a></li>
								<li><a target="_blank" href="#"><span>[公告]</span>华北、华中部分地区配送延迟</a></li>
								<li><a target="_blank" href="#"><span>[特惠]</span>家电狂欢千亿礼券 买1送1！</a></li>
								
							</ul>
                        <div class="advTip"><img src="/home/images/advTip.jpg"/></div>
						</div>
					</div>
					<div class="clear"></div>
				</div>
				<script type="text/javascript">
					if ($(window).width() < 640) {
						function autoScroll(obj) {
							$(obj).find("ul").animate({
								marginTop: "-39px"
							}, 500, function() {
								$(this).css({
									marginTop: "0px"
								}).find("li:first").appendTo(this);
							})
						}
						$(function() {
							setInterval('autoScroll(".demo")', 3000);
						})
					}
				</script>
			</div>
			<div class="shopMainbg">
				<div class="shopMain" id="shopmain">

					<!--今日推荐 -->

					<div class="am-g am-g-fixed recommendation">
						<div class="clock am-u-sm-3" ">
							<img src="/home/images/2016.png "></img>
							<p>今日<br>推荐</p>
						</div>
						<div class="am-u-sm-4 am-u-lg-3 ">
							<div class="info ">
								<h3>真的有鱼</h3>
								<h4>开年福利篇</h4>
							</div>
							<div class="recommendationMain one">
								<a href="introduction.html"><img src="/home/images/tj.png "></img></a>
							</div>
						</div>						
						<div class="am-u-sm-4 am-u-lg-3 ">
							<div class="info ">
								<h3>囤货过冬</h3>
								<h4>让爱早回家</h4>
							</div>
							<div class="recommendationMain two">
								<img src="/home/images/tj1.png "></img>
							</div>
						</div>
						<div class="am-u-sm-4 am-u-lg-3 ">
							<div class="info ">
								<h3>浪漫情人节</h3>
								<h4>甜甜蜜蜜</h4>
							</div>
							<div class="recommendationMain three">
								<img src="/home/images/tj2.png "></img>
							</div>
						</div>

					</div>
					<div class="clear "></div>
					<!--热门活动 -->

					<div class="am-container activity ">
						<div class="shopTitle ">
							<h4>活动</h4>
							<h3>每期活动 优惠享不停 </h3>
							<span class="more ">
                              <a href="# ">全部活动<i class="am-icon-angle-right" style="padding-left:10px ;" ></i></a>
                        </span>
						</div>
					  <div class="am-g am-g-fixed ">
					  @foreach($activity_data as $v)
						<div class="am-u-sm-3 ">
							<div class="icon-sale one "></div>	
								<h4>{{ $v->aname}}</h4>							
							<div class="activityMain ">
								<img src="/upload/activitys/{{ $v->pic }} "></img>
							</div>
							<div class="info ">
								<h3>{{ $v->desc }}</h3>
							</div>														
						</div>
						@endforeach
										
	

					  </div>
                   </div>
					<div class="clear "></div>


                    <div id="f1">
					<!--甜点-->
				@foreach($cates_data as $val)
				
					<div class="am-container ">
					@foreach($val->sub as $vv)
						<div class="shopTitle ">
							<h4>{{ $vv->cname}}</h4>
							<div class="today-brands ">
							@foreach($vv->sub as $cv)
								<a href="/list/{{ $cv->cid }} ">{{ $cv->cname }}</a>
							@endforeach	
							</div>
							<span class="more ">
                    <a href="# ">更多美味<i class="am-icon-angle-right" style="padding-left:10px ;" ></i></a>
                        </span>
						</div>

					</div>
					
					<div class="am-g am-g-fixed floodFour">
						<div class="am-u-sm-5 am-u-md-4 text-one list ">
							<div class="word">
							@foreach($vv->sub as $cv)
								<a class="outer" href="/list/{{ $cv->cid }}"><span class="inner"><b class="text">{{ $cv->cname}}</b></span></a>
							@endforeach										
							</div>
							<a href="# ">
								<div class="outer-con ">
									<div class="title ">
									开抢啦！
									</div>
									<div class="sub-title ">
										零食大礼包
									</div>									
								</div>
                                  <img src="/home/images/act1.png " />								
							</a>
							<div class="triangle-topright"></div>						
						</div>
							@foreach($goods_data as $gv)
								@if($gv->pid == $vv->cid)
									<div class="am-u-sm-7 am-u-md-4 text-two ">
										<div class="outer-con ">
											<div class="title ">
												{{ $gv->tname }}
											</div>									
											<div class="sub-title ">
												¥{{ $gv->price }}
											</div>
											<i class="am-icon-shopping-basket am-icon-md  seprate"></i>
										</div>
										<a href="/goods/{{ $gv->gid }} "><img src="/upload/goods/{{ $gv->pic }}"/></a>
									</div>
								@endif
							@endforeach

						@endforeach
					</div>

				@endforeach
  
                  
   

@endsection