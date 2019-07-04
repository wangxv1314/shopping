<!-- 引入css样式 -->
@include('/admin/public/header')
<!-- 左侧导航与登录部分 -->
@include('/admin/public/left')
<!-- 内容部分 -->
  <div class="content-wrapper">
     @section('content')

     @show
  </div>
<!-- 页脚部分 -->
@include('/admin/public/footer')

