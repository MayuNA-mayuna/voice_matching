<?php

namespace App\Http\Controllers;
namespace App\Http\Controllers;
use App\User;
use App\Match;
use App\Voicedata;



use Illuminate\Http\Request;

class VoicematchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('top');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('telephone_voice');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function analyze(){
        $voice = Voicedata::findOrFail(1);

        return view('usual_analyze', compact('voice'));
    }
    public function analyze2(){
        $items = User::all();
        $voice = Voicedata::findOrFail(1);

//controllerからviewへの変数の受け渡し
//view('blade.phpの前についてる名前', 使いたい配列)
        return view('analyze',compact('items','voice'));

    }
    public function explain(){
        return view('explain');
    }
    public function explain2(){
        return view('explain2');
    }
    public function match($id){
        $items = User::find($id);
        return view('matching',compact('items'));
    }

    public function upload(){
        $items = Voicedata::all();
        return view('upload',compact('items'));
    }


    //画像のアップロード
    public function store(Request $request)
    {

        $voicedata = Voicedata::findOrFail(1);


        // 画像ファイルの保存場所指定
        if(request('voicedata')){
            $filename= $request->file('voicedata')->getClientOriginalName(); //拡張子を含めたアップロードしたファイル名
            $request->file('voicedata')->storeAs('public',"$filename");

        }
        $voicedata->voicedata = "$filename";

        // postを保存
        $voicedata->save();
    }

    
    public function update(Request $request,$id)
    {
    $voice = User::findOrFail($id);
    $voice->max_f = $request->input('max_f');
    $voice->max_average_f = $request->input('max_average_f');
    $voice->save();
    #return redirect('greeting',['status' => 'UPDATE完了！']);　←error!
    return redirect ('home');
    }

    public function update2(Request $request)
    {
    $voice = New Match();
    $voice->matching_id = $request->input('matching_id');
    $voice->max_f = $request->input('max_f');
    $voice->max_average_f = $request->input('max_average_f');
    $voice->save();
    #return redirect('greeting',['status' => 'UPDATE完了！']);　←error!
    return redirect ('home');
    }
}
