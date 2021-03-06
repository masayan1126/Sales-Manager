@include('layouts.menu')
@extends('common.template')
@section('title')
product
@endsection
@section('content')
<div class="mt-4 w-100 card mx-auto max-width-500">
  <div class="card-header">
    <h4>販路の追加</h4>
  </div>
  <div class="card-body">
    <form action="/channel-add" method="post" enctype="multipart/form-data" id="form">
    @csrf
    <div class="form-group">
    <div class="row">
          <div class="col-6">
          <label class="d-block p-1" for="imagefile">販路</label>
          <input type="text" class="d-block p-1 mb-2 form-control" name="salesChannel" id="channel" value=""/>
          <label class="d-block p-1" for="channel-url">販路のURLなど</label>
          <input type="text" class="d-block p-1 mb-2 form-control" name="channel_url" id="channel-url" value=""/>
          <input class="btn bg-mauve shadow-sm text-white mt-4" type="submit" name="confirm" id="button" value="確認" />
    </div>
    </div>
    </div>
    </form>
  </div>
</div>
@endsection