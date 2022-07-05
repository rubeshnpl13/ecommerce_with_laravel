<div class="card-body">
    <div class="form-group">
        {!!Form::label('categories_id ','Category')!!} 
        {!!Form::select ('categories_id',$data['categories'],null,['class'=> 'form-control', 'placeholder' => 'Select category','id' => 'categories_id'])!!} {{-- //single field error --}}
    </div>
    <div class="form-group">
        {!!Form::label('subcategories_id ','SubCategory')!!} 
        {!!Form::select ('subcategories_id',$data['subcategories'],null,['class'=> 'form-control', 'placeholder' => 'Select subcategory','id' => 'subcategories_id'])!!}
    </div>
    <div class="form-group">
        {!!Form::label('title','Title')!!} {!!Form::text ('title',null,['class'=> 'form-control','placeholder'=>'Title'])!!} @error('title')
        <span class="text-danger">{{$message}}</span> @enderror
    </div>
    <div class="form-group">
        {!!Form::label('slug','Slug')!!} {!!Form::text ('slug',null,['class'=> 'form-control','placeholder'=>'Slug'])!!} @error('slug')
        <span class="text-danger">{{$message}}</span> @enderror
    </div>
    <div class="form-group">
        {!!Form::label('price','Price')!!} {!!Form::number('price',null,['class'=> 'form-control','placeholder'=>'price'])!!} @error('price')
        <span class="text-danger">{{$message}}</span> @enderror
    </div>
    <div class="form-group">
        {!!Form::label('discount','Discount')!!} {!!Form::number('discount',null,['class'=> 'form-control','placeholder'=>'discount'])!!} @error('discount')
        <span class="text-danger">{{$message}}</span> @enderror
    </div>
    <div class="form-group">
        {!!Form::label('quantity','Quantity')!!} {!!Form::number('quantity',null,['class'=> 'form-control','placeholder'=>'quantity'])!!} @error('quantity')
        <span class="text-danger">{{$message}}</span> @enderror
    </div>
    <div class="form-group">
        {!!Form::label('specification','Specification')!!} {!!Form::textarea('specification',null,['class'=> 'form-control','rows' => 5, 'id' => 'task-textarea','placeholder'=>'specification'])!!} @error('specification')
        <span class="text-danger">{{$message}}</span> @enderror
    </div>
    <div class="form-group">
        {!!Form::label('description','Description')!!} {!!Form::textarea('description',null,['class'=> 'form-control','rows' => 5,'id' => 'task-textarea2','placeholder'=>'description'])!!} @error('description')
        <span class="text-danger">{{$message}}</span> @enderror
    </div>
    <div class="form-group">
        {!!Form::label('status','Status')!!} <br>
        <input type="radio" name="status" value="1"> Enable<br>
        <input type="radio" name="status" value="2" checked> Disable<br>
    </div>
    <div class="form-group">
        {!!Form::label('hot_key','Hot_Product')!!} <br>
        <input type="radio" name="hot_key" value="1"> Enable<br>
        <input type="radio" name="hot_key" value="2" checked> Disable<br>
    </div>
    <div class="form-group">
        {!!Form::label('flash_key','Flash_Product')!!} <br>
        <input type="radio" name="flash_key" value="1"> Enable<br>
        <input type="radio" name="flash_key" value="2" checked> Disable<br>
    </div>
    {!!Form::label('Tag','Tag')!!} 
    {!!Form::select ('tag_id[]',$data['tags'],null, ['class'=> 'form-control','placeholder'=>'Select Tag','multiple'=>'multiple'])!!}
     
</div>
{{--
<div class="card-footer">
    {!!Form::submit($button .''.$module,['class'=>'btn btn-success'])!!} {!!Form::reset('Clear'.''.$module,['class'=>'btn btn-danger'])!!} <br>
</div> --}}