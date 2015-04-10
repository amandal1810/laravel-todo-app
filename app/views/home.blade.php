@extends('layout')
@section('content')

<section class="header section-padding">
	<div class="background">&nbsp;
	</div>
	<div class="container">
		<div class="header-text">
			<h1>A Laravel Walkthrough Implementation</h1>
			<p>
			A To-do application
			<br /> using Laravel 4 framework!
			</p>
		</div>
	</div>
</section>

<div class="container">
	<section class="section-padding">
		<div class="jumbotron text-center">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h1>
					<span class="grey">Our</span> To-do List
					</h1>
				</div>
			@if ($tasks->isEmpty())
				<p> Currently, there is no task!</p>
			@else
				<table class="table">
				<thead>
					<tr>
						<th>#</th>
						<th>Title</th>
						<th>Body</th>
						<th>Finish</th>
						<th>Date Created</th>
						<th>Edit</th>
						<th>Delete</th>
					</tr>
				</thead>
				<tbody>
				@foreach($tasks as $task)
					<tr>
						<td>{{ $task->id }} </td>
						<td><a href="{{ action('TasksController@show', $task->id) }}">
							{{ $task->title }}</a></td>
						<td>{{ $task->body}}</td>
						<td>{{ $task->done ? 'Yes' : 'No'}}</td>
						
						<td>{{ $task->created_at }}</td>
						<td>
							<a href="{{ action('TasksController@edit', $task->id) }}"
							class="btn btn-info">Edit</a>
						</td>
						<td>
							<a href="{{ action('TasksController@delete', $task->id) }}"
							class="btn btn-info">Delete</a>
						</td>
					</tr>
				@endforeach
				</tbody>
				</table>
			@endif
			</div>
		</div>
	</section>
</div>

<div class="jumbotron text-center">
	<div class="row">
		<div class="showcase-box col-md-4">
			<div class="showcase-item">
				<img src="{{ asset('img/icon1.png') }}" />
				
			</div>
		</div>
		<div class="showcase-box col-md-4">
			<div class="showcase-item">
				<img src="{{ asset('img/icon2.png') }}" />
				
			</div>
		</div>

	<div class="showcase-box col-md-4">
		<div class="showcase-item">
			<img src="{{ asset('img/icon3.png') }}" />
			
		</div>
		</div>
	</div>
</div>
@stop