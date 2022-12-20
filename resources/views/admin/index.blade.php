@extends('admin.master')


@section('content')

		<div class="content">
		<?php 
		$u = u();
		$level = str_slug($u->level); ?>
		<?php if(getisset("t")) {
              
			  $t = get("t");
			   ?>
			 
				@if(View::exists("admin.$level.$t"))
				  @include("admin.$level.$t")
			   @endif 
		
 
			   <?php 
		  } else  { 
			?>
			@if(View::exists("admin.dashboard.$level"))
				@include("admin.dashboard.$level")
			@endif
			
		 
		 
		  <?php 
	 } ?>
		</div>

@endsection
