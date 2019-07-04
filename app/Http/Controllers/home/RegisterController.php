<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\Users;
use Hash;
use Mail;
class RegisterController extends Controller
{
	// 前台注册页面
    public function index()
    {
        return view('home/register/index');
    }

    // 邮箱注册
    public function store(Request $request)
    {
        // dump($request->all());
        $upass = $request->input('upass');
        $repass = $request->input('repass');
        $email = $request->input('email');
        $account = $request->input('email');
        //验证密码
        if($upass != $repass){
            echo "<script>alert('俩次密码不一致');location.href='/register'</script>";
            exit;
        }


        // send -> view('xx.blade.php',[])
        $token = str_random(30);

        $user = new Users;
        $user->upass = Hash::make($upass);
        $user->email = $email;
        $user->token = $token;
        $user->account = $account;
        $res1 = $user->save();
        if($res1){
            // 发送邮件
            Mail::send('home.register.mail', ['id' => $user->uid,'token'=>$token], function ($m) use ($email) {
                // to 发送地址   subject  标题
                $s = $m->to($email)->subject('【LAMPoto】提醒邮件!');

                if($s){
                    echo "用户注册成功，请尽快完成激活";
                }
            }); 
        }
        return view('home/login/index');
    }

    // 激活 用户 （邮件）
    public function changeStatus($id,$token)
    {
        // echo "激活 ---- ".$id;
        $user = Users::find($id);
        // 验证token
        if($user->token != $token){
            dd('链接失效');
        }

        $user->status = 1;
        $user->token = str_random(30);

        if($user->save()){
            echo "<script>alert('激活成功');location.href='/login'</script>";
        }else{
            echo "<script>alert('激活失败');location.href='/register'</script>";
        }  
    }



    // 手机号注册
    public function register(Request $request)
    {
        // 验证手机验证码 用户输入
        $phone = $request->input('phone',0);
        // 获取发送到手机上验证码
        $k = $phone.'_code';
        $phone_code = session($k);
        $code = $request->input('code',0);
        // dump($code);
        // dump($phone_code);
        if($phone_code != $code){
            // return back();
            echo "<script>alert('验证码错误');location.href='/register'</script>";
            exit;
        }

        // 接收数据
        // dump($request->all());
        // $account = $request->input('account');
        $upass = $request->input('upass');
        $repass = $request->input('repass');
        $cate = new Users;
        $cate->account = $request->input('phone');
        $cate->upass = Hash::make($upass);
        $cate->phone = $request->input('phone');
        // dd($cate);
        if($repass != $upass){
            echo "<script>alert('两次密码不一致');location.href='/register'</script>";
        }
        $res = $cate->save();
        if($res){
            echo "<script>alert('恭喜!注册成功');location.href='/login'</script>";
        }else{
            echo "<script>alert('哎呀,不好了,注册失败');location.href='/register'</script>";
        }
        
    }


    // 发送手机号 验证码
    public function sendPhone(Request $request)
    {
        // 接收手机号
        $phone = $request->input('phone');
        
        $code = rand(1234,4321);
        // 如果存入到redis中 注意键名覆盖
        $k = $phone.'_code';

        session([$k=>$code]);

        $url = "http://v.juhe.cn/sms/send";
        $params = array(
            'key'   => 'e9451c90f2388317b2ad04946d084dcc', //您申请的APPKEY
            'mobile'    => $phone, //接受短信的用户手机号码
            'tpl_id'    => '167000', //您申请的短信模板ID，根据实际情况修改
            'tpl_value' =>'#code#='.$code, //您设置的模板变量，根据实际情况修改
            'dtype'=>'json'
        );

        $paramstring = http_build_query($params);
        $content = self::juheCurl($url, $paramstring);
        // echo $content;
        // $result = json_decode($content, true);  将json格式转化成数组
        // 返回结构
        // if ($result) {
        //     var_dump($result);
        // }

    }
    public static function juheCurl($url, $params = false, $ispost = 0)
    {
        $httpInfo = array();
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
        curl_setopt($ch, CURLOPT_USERAGENT, 'JuheData');
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 60);
        curl_setopt($ch, CURLOPT_TIMEOUT, 60);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        if ($ispost) {
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
            curl_setopt($ch, CURLOPT_URL, $url);
        } else {
            if ($params) {
                curl_setopt($ch, CURLOPT_URL, $url.'?'.$params);
            } else {
                curl_setopt($ch, CURLOPT_URL, $url);
            }
        }
        $response = curl_exec($ch);
        if ($response === FALSE) {
            //echo "cURL Error: " . curl_error($ch);
            return false;
        }
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $httpInfo = array_merge($httpInfo, curl_getinfo($ch));
        curl_close($ch);
        return $response;
    }
}
