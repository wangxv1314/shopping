	<!-- 头  -->
		<header>
			<article>
				<div class="mt-logo">
					<!-- 顶部导航条 -->
					<div class="am-container header">

						<ul class="message-r">
							<div class="topMessage home">
								<div class="menu-hd"><a href="/" target="_top" class="h">商城首页</a></div>
							</div>
							<div class="topMessage my-shangcheng">
								<div class="menu-hd MyShangcheng"><a href="/personal" target="_top"><i class="am-icon-user am-icon-fw"></i>个人中心</a></div>
							</div>
							<div class="topMessage mini-cart">
								<div class="menu-hd"><a id="mc-menu-hd" href="/cart/show" target="_top"><i class="am-icon-shopping-cart  am-icon-fw"></i><span>购物车</span><strong id="J_MiniCartNum" class="h"></strong></a></div>
							</div>
							<div class="topMessage favorite">
								<div class="menu-hd"><a href="/personal/collect" target="_top"><i class="am-icon-heart am-icon-fw"></i><span>收藏夹</span></a></div>
						</ul>
						</div>
		
						<!-- 悬浮搜索框 -->
		
						<div class="nav white">
							<div class="logoBig">
								<li><img src="/home/images//logobig.png" /></li>
							</div>
		
							<div class="search-bar pr">
								<a name="index_none_header_sysc" href="#"></a>
								<form action="/list/search" method="post">
									{{ csrf_field() }}
									<input id="searchInput" name="data" type="text" placeholder="搜索" autocomplete="off">
									<input id="ai-topsearch" class="submit am-btn" value="搜索" index="1" type="submit">
								</form>
							</div>
						</div>
		
						<div class="clear"></div>
					</div>
				</div>
			</article>
		</header>