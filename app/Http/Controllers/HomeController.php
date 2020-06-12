<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use GuzzleHttp\Client;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        // state検証
        $state_line = $request->input('state');
        $state_cookie = \Cookie::get('state');

        // stateが異なる場合
        if($state_line !== $state_cookie){
            \Session::flash('flash_message', 'state検証エラー');
            return redirect('/');
        }

        // エラーレスポンスが返って来た場合はエラーを返却
        $error_description = $request->input('error_description');
        if($error_description != ""){
                \Session::flash('flash_message', '権限が拒否されました');
                return redirect('/');
        }

        // アクセストークンを発行する
        $code = $request->input('code');
        $this->basic_request($code); 


        $tasks = Task::orderBy('created_at','asc')->get();

        return view('tasks',[
            'tasks' => $tasks
        ]);
    }

    // アクセストークン発行
    // 参考　https://yaba-blog.com/laravel-call-api/
    public function basic_request(String $code) {

        $client = new Client();
        $response = $client->request('POST', 'https://api.line.me/oauth2/v2.1/token', array(
            "headers" => array(
                "Content-Type" => "application/x-www-form-urlencoded",
            ),
            "form_params" => array(
                "grant_type" => "authorization_code",
                "code" => $code,
                "redirect_uri" => "http://localhost/home",
                "client_id" => env('CLIENT_ID', false),
                "client_secret" => env('CHANNEL_SECRET')
            )
        )); 

        $post = $response->getBody();
        $post = json_decode($post, true);
        //レスポンスから新規記事のURLを取得
        $access_token = $post['access_token'];

        $this-> verify_access_token($access_token);
    }


    // アクセストークン検証
    public function verify_access_token(String $access_token){

        $url = "https://api.line.me/oauth2/v2.1/verify?access_token=" . $access_token ;
        $method = "GET";
        //接続
        $client = new Client();
        $response = $client->request($method, $url);
        $posts = $response->getBody();
        $posts = json_decode($posts, true);
    }
//    /**
//     * Create a new controller instance.
//     *
//     * @return void
//     */
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }
//
//    /**
//     * Show the application dashboard.
//     *
//     * @return \Illuminate\Contracts\Support\Renderable
//     */
//    public function index()
//    {
//        return view('home');
//    }
}
