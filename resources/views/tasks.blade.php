@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    New Task
                </div>

                <div class="panel-body">
                    <!-- Display Validation Errors -->
                    @include('common.errors')

                    <!-- New Task Form -->
                    <form action="{{ url('task')}}" method="POST" class="form-horizontal">
                        {{ csrf_field() }}

                        <!-- Task Name -->
                        <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Task</label>

                            <div class="col-sm-6">
                                <input type="text" name="name" id="task-name" class="form-control" value="{{ old('task') }}">
                            </div>
                        </div>

                        <!-- Add Task Button -->
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <input id="deadline" type="date" name="deadline">
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-btn fa-plus"></i>Add Task
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Current Tasks -->
            @if (count($tasks) > 0)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Current Tasks
                    </div>

                    <div class="panel-body">
                        <table class="table table-striped task-table">
                            <thead>
                                <th>Task</th>
                                <th>Deadline</th>
                                <th>&nbsp;</th>

                            </thead>
                            <tbody>
                                @foreach ($tasks as $task)
                                    <tr>
                                        <td class="table-text"><input class="no-border" value="{{ $task->name }}" type="text" readonly></td>

                                        <td class="table-text"><input class="no-border" value="{{ $task->deadline }}" type="text" readonly></td>
                                       
                                        <td>

                                        <!-- Task Delete Button -->
                                            <form action="{{ url('task/'.$task->id) }}" method="POST" style="float:right; margin-left: 2px;">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}

                                                <button type="submit" class="btn btn-danger">
                                                    <i class="fa fa-btn fa-trash"></i>Delete
                                                </button>
                                            </form>

                                         <!-- Task Edit Button -->
                                            <form  method="GET" style="float:right;">
                                                <!-- {{ csrf_field() }}
                                                {{ method_field('EDIT') }} -->

                                                <button type="submit" class="btn btn-success" onclick="edit({{$task->id}})">
                                                    <i class="fa fa-btn fa-check"></i>Done
                                                </button>
                                            </form>
                                       
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif
        </div>
    </div>
    
@endsection