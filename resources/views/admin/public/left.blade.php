<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="/">后台管理</a>
      <div class="collapse navbar-collapse" id="navbarResponsive">
      <!-- 分类 -->
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item">
          <a class="nav-link" href="\">
            <i class="fa fa-fw fa-file"></i>
            <span>首页</span>
          </a>
        </li>

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Example Pages">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#user">
            <i class="fa fa-fw fa-file"></i>
            <span class="nav-link-text">用户管理</span>
          </a>
          <ul class="sidenav-second-level collapse" id="user">
            <li>
              <a href="/user/index">用户列表</a>
            </li>
          </ul>
        </li>
        
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Example Pages">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#fenlei">
            <i class="fa fa-fw fa-bars"></i>
            <span class="nav-link-text">分类管理</span>
          </a>
          <ul class="sidenav-second-level collapse" id="fenlei">
            <li>
              <a href="/admin/cates/index">分类列表</a>
            </li>
            <li>
              <a href="/admin/cates/create">添加分类</a>
            </li>
          </ul>
        </li>

        <!-- 订单 -->
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Example Pages">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#order">
            <i class="fa fa-fw fa-book"></i>
            <span class="nav-link-text">订单管理</span>
          </a>
          <ul class="sidenav-second-level collapse" id="order">
            <li>
              <a href="/admin/order/index">订单列表</a>
            </li>
          </ul>
        </li>

        <!-- 商品 -->
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Example Pages">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#goods">
            <i class="fa fa-fw fa-cart-plus"></i>
            <span class="nav-link-text">商品管理</span>
          </a>
          <ul class="sidenav-second-level collapse" id="goods">
            <li>
              <a href="/admin/goods/index">商品列表</a>
            </li>
            <li>
              <a href="/admin/goods/create">添加商品</a>
            </li>
          </ul>
        </li>

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Example Pages">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#adminuser">
            <i class="fa fa-fw fa-cart-plus"></i>
            <span class="nav-link-text">管理员</span>
          </a>
          <ul class="sidenav-second-level collapse" id="adminuser">
            <li>
              <a href="/admin/adminuser">管理员列表</a>
            </li>
            <li>
              <a href="/admin/adminuser/create">添加管理员</a>
            </li>
          </ul>
        </li>

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Example Pages">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#roles">
            <i class="fa fa-fw fa-cart-plus"></i>
            <span class="nav-link-text">角色管理</span>
          </a>
          <ul class="sidenav-second-level collapse" id="roles">
            <li>
              <a href="/admin/roles">角色列表</a>
            </li>
            <li>
              <a href="/admin/roles/create">添加角色</a>
            </li>
          </ul>
        </li>

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Example Pages">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#nodes">
            <i class="fa fa-fw fa-cart-plus"></i>
            <span class="nav-link-text">权限管理</span>
          </a>
          <ul class="sidenav-second-level collapse" id="nodes">
            <li>
              <a href="/admin/nodes">权限列表</a>
            </li>
            <li>
              <a href="/admin/nodes/create">添加权限</a>
            </li>
          </ul>
        </li>


      </ul>
      

      <!-- 退出 -->
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a href="/admin/logout" class="nav-link">
            <i class="fa fa-fw fa-sign-out"></i>{{ session('admin_user')->uname }}</a>
        </li>
      </ul>
      <!-- 退出 -->
    </div>
  </nav>