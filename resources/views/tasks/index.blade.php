@extends('layouts.app')


@section('content')

	<section class='panel panel-default'>
		<div class='panel-body'>
			@include('common.errors')
			<form action="{{ url('task') }}" method="post" class="form-horizontal">
				<div class="form-group">
					<label class="col-sm-3" for="name">Task</label>
					<div class="col-sm-6">
						<input type="text" name="name" id="name" class="form-control" autocomplete="off">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-3 col-sm-6">
						<button type="submit" class="btn btn-default">Add Task</button>

					</div>

				</div>
				{{csrf_field()}}
			</form>

		</div>
	</section>

	@if($tasks->count())

		<div class="panel panel-default">
			<div class="panel-heading">
				
				Current tasks

			</div>
			<div class="panel-body">
				
				<table class="table table-striped">
					<thead>
						<th>Task</th>
						<th>&nbsp;</th>
					</thead>
					<tbody>
						
						@foreach ($tasks as $task)
							<tr>
								<td>{{$task->name}}</td>
								<td>
									
									<form action="{{ url('task/' . $task->id) }}" method="">
										
										<button type="submit" class="btn btn-danger">Delete</button>

										{{ method_field('DELETE') }}

										{{ csrf_field() }}

									</form>

								</td>
							</tr>

						@endforeach
					</tbody>

				</table>

			</div>


		</div>

	@endif

@endsection