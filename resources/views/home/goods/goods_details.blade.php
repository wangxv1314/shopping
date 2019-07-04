@extends('home/lyout/goods')
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
				<ol class="am-breadcrumb am-breadcrumb-slash">
					<li><a href="#">首页</a></li>
					<li><a href="#">分类</a></li>
					<li class="am-active">内容</li>
				</ol>
				<script type="text/javascript">
					$(function() {});
					$(window).load(function() {
						$('.flexslider').flexslider({
							animation: "slide",
							start: function(slider) {
								$('body').removeClass('loading');
							}
						});
					});
				</script>
				<div class="scoll">
					<section class="slider">
						<div class="flexslider">
							<ul class="slides">
								<li>
									<img src="/home/images/01.jpg" title="pic" />
								</li>
								<li>
									<img src="/home/images/02.jpg" />
								</li>
								<li>
									<img src="/home/images/03.jpg" />
								</li>
							</ul>
						</div>
					</section>
				</div>

				<!--放大镜-->

				<div class="item-inform">
					<div class="clearfixLeft" id="clearcontent">

						<div class="box">
							<script type="text/javascript">
								$(document).ready(function() {
									$(".jqzoom").imagezoom();
									$("#thumblist li a").click(function() {
										$(this).parents("li").addClass("tb-selected").siblings().removeClass("tb-selected");
										$(".jqzoom").attr('src', $(this).find("img").attr("mid"));
										$(".jqzoom").attr('rel', $(this).find("img").attr("big"));
									});
								});
							</script>
							
							<div class="tb-booth tb-pic tb-s310">
								@foreach($goods as $k=>$v)
								<a href="/upload/goods/{{ $v->pic }}"><img src="/upload/goods/{{ $v->pic }}" alt="细节展示放大镜特效" rel="/upload/goods/{{ $v->pic }}" class="jqzoom" /></a>
								@endforeach
							</div>
							
							<ul class="tb-thumb" id="thumblist">
								@foreach($goodspics as $k=>$v)
								<li class="tb-selected">
									<div class="tb-pic tb-s40">
										<a href="#"><img src="/upload/goods/{{ $v->pic1 }}" mid="/upload/goods/{{ $v->pic1 }}" big="/upload/goods/{{ $v->pic1 }}"></a>
									</div>
								</li>
								@endforeach
								@foreach($goodspics as $k=>$v)
								<li class="tb-selected">
									<div class="tb-pic tb-s40">
										<a href="#"><img src="/upload/goods/{{ $v->pic2 }}" mid="/upload/goods/{{ $v->pic2 }}" big="/upload/goods/{{ $v->pic2 }}"></a>
									</div>
								</li>
								@endforeach
								@foreach($goodspics as $k=>$v)
								<li class="tb-selected">
									<div class="tb-pic tb-s40">
										<a href="#"><img src="/upload/goods/{{ $v->pic3 }}" mid="/upload/goods/{{ $v->pic3 }}" big="/upload/goods/{{ $v->pic3 }}"></a>
									</div>
								</li>
								@endforeach
							</ul>
						</div>

						<div class="clear"></div>
					</div>

					<div class="clearfixRight">

						<!--规格属性-->
						<!--名称-->
						<div class="tb-detail-hd">
							<h1>	
				 {{ $goods_data->tname}}
	          </h1>
						</div>
						<div class="tb-detail-list">
							<!--价格-->
							<div class="tb-detail-price">
								<li class="price iteminfo_mktprice">
									<dt>价格</dt>
									<dd><em>¥</em><b>{{ $goods_data->price}}</b></dd>									
								</li>
								<div class="clear"></div>
							</div>

							
							<div class="clear"></div>

							<!--销量-->
							<ul class="tm-ind-panel">
								
								<li class="tm-ind-item tm-ind-sumCount canClick">
									<div class="tm-indcon"><span class="tm-label">累计销量</span><span class="tm-count">{{ $goods_data->sales }}</span></div>
								</li>
								<li class="tm-ind-item tm-ind-reviewCount canClick tm-line3">
									<div class="tm-indcon"><span class="tm-label">累计评价</span><span class="tm-count">640</span></div>
								</li>
							</ul>
							<div class="clear"></div>

							<!--各种规格-->
							<dl class="iteminfo_parameter sys_item_specpara">
								<dt class="theme-login"><div class="cart-title">可选规格<span class="am-icon-angle-right"></span></div></dt>
								<dd>
									<!--操作页面-->

									<div class="theme-popover-mask"></div>

									<div class="theme-popover">
										<div class="theme-span"></div>
										<div class="theme-poptit">
											<a href="javascript:;" title="关闭" class="close">×</a>
										</div>
										<div class="theme-popbod dform">
											<form class="theme-signin" name="loginform" action="" method="post">

												<div class="theme-signin-left">

													<div class="theme-options">
														<div class="cart-title">口味</div>
														<ul>
															<li class="sku-line selected">原味<i></i></li>
															<li class="sku-line">奶油<i></i></li>
															<li class="sku-line">炭烧<i></i></li>
															<li class="sku-line">咸香<i></i></li>
														</ul>
													</div>
													
													<div class="theme-options">
														<div class="cart-title number">数量</div>
														<dd>
															<input id="min" class="am-btn am-btn-default" name="" type="button" value="-" />
															<input id="text_box" name="" type="text" value="1" style="width:30px;" />
															<input id="add" class="am-btn am-btn-default" name="" type="button" value="+" />
															<span id="Stock" class="tb-hidden">库存<span class="stock">{{ $goods_data->num }}</span>件</span>
														</dd>

													</div>
													<div class="clear"></div>

													<div class="btn-op">
														<div class="btn am-btn am-btn-warning">确认</div>
														<div class="btn close am-btn am-btn-warning">取消</div>
													</div>
												</div>
												<div class="theme-signin-right">
													<div class="img-info">
														<img src="/home/images/songzi.jpg" />
													</div>
													<div class="text-info">
														<span class="J_Price price-now">¥39.00</span>
														<span id="Stock" class="tb-hidden">库存<span class="stock">1000</span>件</span>
													</div>
												</div>

											</form>
										</div>
									</div>

								</dd>
							</dl>
											<div class="clear"></div>
							<!--活动	-->
							<div class="shopPromotion gold">
								<div class="hot">
									<dt class="tb-metatit">商品描述</dt>
									<div class="gold-list">
										<p>{{ $goods_data->desc }}</p>
									</div>
								</div>
								<div class="clear"></div>
								<div class="coupon">
									<dt class="tb-metatit">优惠券</dt>
									<div class="gold-list">
										<ul>
											<li>125减5</li>
											<li>198减10</li>
											<li>298减20</li>
										</ul>
									</div>
								</div>
							</div>
						</div>
 
						<div class="pay">
							<div class="pay-opt">
							<a href="home.html"><span class="am-icon-home am-icon-fw">首页</span></a>
							<a href=""><span class="am-icon-heart am-icon-fw">收藏</span></a>
							
							</div>
							<li>
								<div class="clearfix tb-btn tb-btn-buy theme-login">
									<a id="LikBuy" title="点此按钮到下一步确认购买信息" href="/cart/add/{{ $goods_data->gid }}">加入购物车</a>
								</div>
							</li>
							<li>
								<div class="clearfix tb-btn tb-btn-basket theme-login">
							@if(session('login'))
								@if($coll == null)
									<a id="LikBasket" title="加入购物车" href="/collect/{{ $goods_data->gid }}"><i></i>收藏</a>
								@else
									<a id="LikBasket" title="加入购物车" href="/collectcall/{{ $goods_data->gid }}"><i></i>取消收藏</a>
								@endif
							@else
								<a id="LikBasket" title="加入购物车" href="/collect/{{ $goods_data->gid }}"><i></i>收藏</a>
							@endif
								</div>
							</li>
						</div>

					</div>

					<div class="clear"></div>

				</div>

				
				<div class="introduce">
					<div class="browse">
					    <div class="mc"> 
						     <ul>					    
						     	<div class="mt">            
						            <h2>特别推荐</h2>        
					            </div>
					            
						     	@foreach($data as $v)
						     		@if($v->cid == $goods_data->cid)

						     		
							      <li class="first">
							      	<div class="p-img">                    
							      		<a  href="#"> <img class="" src="/upload/goods/{{ $v->pic }}"> </a>               
							      	</div>
							      	<div class="p-name"><a href="#">
							      		{{ $v->tname }}
							      	</a>
							      	</div>
							      	<div class="p-price"><strong>￥{{ $v->price }}</strong></div>
							      </li>
							      
							     
							      @endif

							  @endforeach
						     </ul>					
					    </div>
					</div>
					<div class="introduceMain">
						<div class="am-tabs" data-am-tabs>
							<ul class="am-avg-sm-3 am-tabs-nav am-nav am-nav-tabs">

								<li>
									<a href="#">

										<span class="index-needs-dt-txt">全部评价</span></a>

								</li>

								
							</ul>

							<div class="am-tabs-bd">

								

								<div class="am-tab-panel am-fade">
									
                                    <div class="actor-new">
                                    	
                                    </div>	
                                    <div class="clear"></div>
									<div class="tb-r-filter-bar">
										<ul class=" tb-taglist am-avg-sm-4">
											<li class="tb-taglist-li tb-taglist-li-current">
												<div class="comment-info">
													<span>全部评价</span>
													<span class="tb-tbcr-num">(32)</span>
												</div>
											</li>

										
										</ul>
									</div>
									<div class="clear"></div>

									<ul class="am-comments-list am-comments-list-flip">
									@foreach($discus_data as $v)
										<li class="am-comment">
											<!-- 评论容器 -->
											<a href="">
												<img class="am-comment-avatar" src="/upload/user_info/{{ $v->pic }}" />
												<!-- 评论者头像 -->
											</a>

											<div class="am-comment-main">
												<!-- 评论内容容器 -->
												<header class="am-comment-hd">
													<!--<h3 class="am-comment-title">评论标题</h3>-->
													<div class="am-comment-meta">
														<!-- 评论元数据 -->
														<a href="#link-to-user" class="am-comment-author">{{ $v->uid }}</a>
														<!-- 评论者 -->
														评论于
														<time datetime="">{{ $v->dtime }}</time>
													</div>
												</header>

												<div class="am-comment-bd">
													<div class="tb-rev-item " data-id="255776406962">
														<div class="J_TbcRate_ReviewContent tb-tbcr-content ">
															{{ $v->content }}
														</div>
														
													</div>

												</div>
												<!-- 评论内容 -->
											</div>
										</li>
									@endforeach

									</ul>

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
									<div class="clear"></div>

									<div class="tb-reviewsft">
										<div class="tb-rate-alert type-attention">购买前请查看该商品的 <a href="#" target="_blank">购物保障</a>，明确您的售后保障权益。</div>
									</div>

								</div>

								
							</div>

						</div>

						<div class="clear"></div>

					</div>

				</div>
			</div>

@endsection