<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;


use Illuminate\Http\Request;
use App\Models\Backend\Tag;




class TagController extends  BackendBaseController
{
    protected $base_route = 'backend.tag.';
    protected $base_view = 'backend.tag.';
    protected $module = 'Tag';
   



    public function __construct()
    {
        $this->model= new Tag();
    }
        
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
            $data['records'] = $this->model::all();
            return view($this->__loadDataToView($this->base_view.'index'), compact('data'));
        
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view($this->__loadDataToView($this->base_view .'create'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $request->validate([
                'title'=>'required',
                'slug'=>'required'
            ]);
            $request->request->add(['created_by'=>auth()->user()->id]);
            $record=$this->model::create($request->all());
            if($record)
            {
                request()->session()->flash('success',($this->__loadDataToView($this->module))."Created");
            }else{
                request()->session()->flash('error',($this->__loadDataToView($this->module))."Creation Failed ");
                
            }
        }
        catch(\Exception $exception){
            request()->session()->flash('error',"Error:".$exception->getMessage());

        }
        
        return redirect()->route($this->__loadDataToView($this->base_route.'index'));
     }
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['record'] = $this->model::find($id);
        if(!$data['record' ]){
         request()->session()->flash('error',"Error:Invalid Request");
        return redirect()->route($this->__loadDataToView($this->base_route.'index'));
 
        }
        return view($this->__loadDataToView($this->base_view.'show'),compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['record'] = $this->model::find($id);
        if(!$data['record' ]){
         request()->session()->flash('error',"Error:Invalid Request");
        return redirect()->route($this->__loadDataToView($this->base_route.'index'));
 
        }
        return view($this->__loadDataToView($this->base_view.'edit '),compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{
            $request->validate([
                'title'=>'required',
                'slug'=>'required'
            ]);
            $data['record']=$this->model::find($id);
             if(!$data['record' ]){
            request()->session()->flash('error',"Error:Invalid Request");
           return redirect()->route($this->__loadDataToView($this->base_route.'index'));
    
        }
            $request->request->add(['updated_by'=>auth()->user()->id]);
            $record=$data['record']->update($request->all());
            if($record)
            {
                request()->session()->flash('success',($this->__loadDataToView($this->module))."Updated");
            }else{
                request()->session()->flash('error',($this->__loadDataToView($this->module))."Updation Failed ");
                
            }
        }
        catch(\Exception $exception){
            request()->session()->flash('error',"Error:".$exception->getMessage());

        }
        
        return redirect()->route($this->__loadDataToView($this->base_route.'index'));
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data['record']=$this->model::find($id);
        if(!$data['record' ]){
            request()->session()->flash('error',"Error:Invalid Request");
           return redirect()->route($this->__loadDataToView($this->base_route.'index'));
    
        }
        if($data["record"]->delete())
        {
            request()->session()->flash('success',"Successfully Deleted");
             
        }else{
            request()->session()->flash('error',"Error:Delete Failed ");
               
        }
       return redirect()->route($this->__loadDataToView($this->base_route.'index'));
    }
    public function trash()
    {
        $data['records'] = $this->model::onlyTrashed()->get();
        return view($this->__loadDataToView($this->base_view.'trash'), compact('data'));
        

    }
    public function restore(Request $request, $id)
    {
        try{
            $data['record']=$this->model::onlyTrashed()->where('id',$id)->first();
            if(!$data['record'])
            {
                request()->session()->flash('error',"Error:Invalid Request");
                return redirect()->route($this->__loadDataToView($this->base_route."index"));
            }
                if($data['record'])
                {
                $data['record']->restore();
                request()->session()->flash('success',"Restored Successfully");

                }
                else{
                request()->session()->flash('error',"Updation Failed");

                }
            
        }
            catch(Exception $exception)
            {
                request()->session()->flash('error',"Error:".$exception->getMessage());

            }
            return redirect()->route($this->__loadDataToView($this->base_route."index"));
            
        
    }
    public function permanentDelete($id)
    {
        $data['record']=$this->model::onlyTrashed()->where('id',$id)->first();
        if(!$data['record' ]){
            request()->session()->flash('error',"Error:Invalid Request");
           return redirect()->route($this->__loadDataToView($this->base_route.'index'));
    
        }
        if($data["record"]->forceDelete())
        {
            request()->session()->flash('success',"Successfully Deleted");
             
        }else{
            request()->session()->flash('error',"Error:Delete Failed ");
               
        }
       return redirect()->route($this->__loadDataToView($this->base_route.'index'));
    }
}
