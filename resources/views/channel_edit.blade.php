@include('layouts.menu')
@extends('common.template')
@section('title')
channel
@endsection
@section('content')
<div class="mt-4 w-100 card mx-auto max-width-500">
  <div class="card-header">
    <h4>販路の編集</h4>
  </div>
  <div class="card-body">
    <form action="/channel-update" method="post" enctype="multipart/form-data" id="form">
    @csrf
    <div class="form-group">
      <input name="check[]" type="hidden" value="{{ $id }}">
      <label class="d-block p-1" for="salesChannel">販路：</label>
      <input name="salesChannel" class="form-control col-4" id="sales-channel" value="{{ $sales_channel }}">
      <label class="d-block p-1" for="channel-url">販路のURLなど</label>
      <input type="text" class="d-block p-1 mb-2 form-control" name="channel_url" id="channel-url" value="{{ $channel_url }}"/>
      <input class="d-block btn bg-mauve shadow-sm text-white mt-4" type="submit" name="confirm" id="button" value="確認" />
    </div>
    </form>
  </div>
</div>
@endsection
