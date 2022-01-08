<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Pagination\Paginator;

class ContactController extends Controller
{
    //
    public function add(Request $request)
    {
        $request->validate([
            "firstname" => "required",
            "secondname" => "required",
            "email" => "required|email",
            "postcode" => "required|size:8",
            "address" => "required",
            "opinion" => "required|max:120",
        ],[
            "firstname.required" => "入力必須です",
            "secondname.required" => "入力必須です",
            "email.required" => "入力必須です",
            "email.email" => "形式に誤りがあります",
            "postcode.required" => "入力必須です",
            "postcode.size" => "形式に誤りがあります",
            "address.required" => "入力必須です",
            "opinion.required" => "入力必須です",
            "opinion.max" => ":max 文字以下で入力してください",
        ]);
        $data =[
            "firstname" => $request->firstname,
            "secondname" => $request->secondname,
            "gender" => $request->gender,
            "email" => $request->email,
            "postcode" => $request->postcode,
            "address" => $request->address,
            "building_name" => $request->building_name,
            "opinion" => $request->opinion,
        ];
        $request->session()->put("store",$data);
        return view("create",$data);
    }
    public function store(Request $request)
    {
        $data = $request->session()->get("store");
        Contact::create([
            "fullname" => $data["firstname"].$data["secondname"],
            "gender" => $data["gender"],
            "email" => $data["email"],
            "postcode" => $data["postcode"],
            "address" => $data["address"],
            "building_name" => $data["building_name"],
            "opinion" => $data["opinion"],
        ]);
        return view("result");
    }


    public function index(Request $request)
    {
        $sql = $request->session()->get("log_sql");

        if($sql){

            //検索履歴がある場合
            $contacts = Contact::where($sql)->paginate(10);
            $request->session()->put("log_sql",$sql);
            $count = count(Contact::where($sql)->get());
            $count_now = count($contacts);
            $page = $request->page ? $request->page : 1;
            if($count == 0){
                $message = "0件";
            }else{
                $message = "全".$count."件中".( ($page-1) * 10 +1) ."~".(($page-1) * 10)+($count_now)."件";
            }
        }else{

            //検索履歴がない場合


            $contacts = Contact::where($sql)->paginate(10);



            $count = count(Contact::all());
            $count_now = count($contacts);
            $page = $request->page ? $request->page : 1;
            if($count == 0){
                $message = "0件";
            }else{
                $message = "全".$count."件中".( ($page-1) * 10 +1) ."~".(($page-1) * 10)+($count_now)."件";
            }
        }

        $request->session()->put("page",$page);
        return view("admin",compact("contacts","message"));
    }



    public function search(Request $request)
    {
        $log_sql = $request->session()->get("log_sql");
        if($log_sql){
            $sql = $log_sql;
        }else{
            $sql = array();
        }
        if($request->flg){
            $sql = array();
            if($request->name){
                $data = [
                    "fullname","like","%".$request->name."%"
                ];
                array_push($sql,$data);
            }
            if($request->gender != 0){
                $data = [
                    "gender",$request->gender
                ];
                array_push($sql,$data);
            }
            if($request->create_start){
                $data = [
                    "created_at",">=",$request->create_start
                ];
                array_push($sql,$data);
            }
            if($request->create_end){
                $data = [
                    "created_at","<=",$request->create_end
                ];
                array_push($sql,$data);
            }
            if($request->mail){
                $data = [
                    "email","like","%".$request->mail."%"
                ];
                array_push($sql,$data);
            }
        }
        $contacts = Contact::where($sql)->paginate(10);
        $request->session()->put("log_sql",$sql);
        $count = count(Contact::where($sql)->get());
        $count_now = count($contacts);
        $page = $request->page ? $request->page : 1;
        if($count == 0){
            $message = "0件";
        }else{
            $message = "全".$count."件中".( ($page-1) * 10 +1) ."~".(($page-1) * 10)+($count_now)."件";
        }
        $request->session()->put("page",$page);
        return view("admin",compact("contacts","message"));
    }
    public function delete(Request $request)
    {
        Contact::where("id",$request->id)->delete();
        $page_log = $request->session()->get("page");
        if($page_log){
            $url = "/admin?page=".$page_log;
        }else{
            $url = "/admin";
        }

        return redirect($url);
    }
    public function reset()
    {
        session()->forget("log_sql");
        session()->forget("page");
        return redirect("/admin");
    }
}
