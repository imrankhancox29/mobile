@extends('layout')
@section('content')
 <style>
 .uper {
 margin-top: 40px;
 }
 </style>
 <div class="uper">
 @if(session()->get('success'))
 <div class="alert alert-success">
 {{ session()->get('success') }}
 </div><br />
 @endif
 <table class="table table-striped">
 <thead>
 <tr>
 <td>ID</td>
 <td>mobile Name</td>
 <td>mobile Description</td>
 <td>mobile Price</td>
 <td colspan="2">Action</td>
 </tr>
 </thead>
 <tbody>
 @foreach($items as $item)
 <tr>
 <td>{{$item->id}}</td>
 <td>{{$item->mobile_name}}</td>
 <td>{{$item->mobile_desc}}</td>
 <td>{{$item->mobile_price}}</td>
 <td><a href="{{ route('mobile.edit',$item->id)}}" class="btn 
btn-primary">Edit</a></td>
 <td>
 <form action="{{ route('mobile.destroy', $item->id)}}" 
method="post">
 @csrf
@method('DELETE')
<button class="btn btn-danger" 
type="submit">Delete</button>
 </form>
 </td>
 </tr>
 @endforeach
 </tbody>
 </table>
 <div>
@endsection
s