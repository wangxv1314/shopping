<!-- 引入css样式 -->
@include('/home/public/order_style')
<!-- 左侧导航与登录部分 -->
@include('/home/public/main')
<!-- 内容部分 -->
  <div class="am-container header">
     @section('content')

     @show
  </div>
<!-- 页脚部分 -->
<!-- @include('/home/public/footer') -->
