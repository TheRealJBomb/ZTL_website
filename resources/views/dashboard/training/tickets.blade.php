@extends('layouts.dashboard')

@section('title')
Training Tickets
@endsection

@section('content')
<div class="container-fluid" style="background-color:#F0F0F0;">
    &nbsp;
    <h2>Training Tickets</h2>
    &nbsp;
</div>
<br>

<div class="container">
    @if($search_result != null)
        <a class="btn btn-primary" href="/dashboard/training/tickets/new?id={{ $search_result->id }}">Submit New Training Ticket</a>
    @else
        <a class="btn btn-primary" href="/dashboard/training/tickets/new">Submit New Training Ticket</a>
    @endif
    <br><br>
    <h5>Search Training Tickets:</h5>
    {!! Form::open(['url' => '/dashboard/training/tickets/search']) !!}
        <div class="row">
            <div class="col-sm-3">
                {!! Form::text('cid', null, ['placeholder' => 'Search by CID', 'class' => 'form-control']) !!}
            </div>
            <div class="col-sm-1">
                <button class="btn btn-primary" action="submit">Search</button>
            </div>
            <div class="col-sm-1">
    {!! Form::close() !!}
    <center>OR</center>
    {!! Form::open(['url' => '/dashboard/training/tickets/search']) !!}
            </div>
            <div class="col-sm-3">
                {!! Form::select('cid', $controllers, null, ['placeholder' => 'Select Controller', 'class' => 'form-control']) !!}
            </div>
            <div class="col-sm-1">
                <button class="btn btn-primary" action="submit">Search</button>
            </div>
        </div>
    {!! Form::close() !!}


    @if($search_result != null)
   
   
   



        <hr>
        <h5>Showing Training Tickets for {{ $search_result->full_name }} ({{ $search_result->id }})</h5>
        <br>
        
        
        
        
        <ul class="nav nav-tabs nav-justified" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" href="#s1" role="tab" data-toggle="tab" style="color:black">S1</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#s2" role="tab" data-toggle="tab" style="color:black">S2</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#s3" role="tab" data-toggle="tab" style="color:black">S3</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#c1" role="tab" data-toggle="tab" style="color:black">C1</a>
        </li>
    </ul>   
<div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="s1">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Training Date</th>
                    <th scope="col">Trainer Name</th>
                    <th scope="col">Position</th>
                    <th scope="col">Session Type</th>
                    <th scope="col">Start Time</th>
                    <th scope="col">End Time</th>
                </tr>
                @if(strpos($position_name, 'S1') !== false) 
                @if($tickets->count() > 0)
                    @foreach($tickets as $t)

                        <tr>
                            <td><a href="/dashboard/training/tickets/view/{{ $t->id }}">{{ $t->date }}</a></td>
                            <td>{{ $t->trainer_name }}</td>
                            <td>{{ $t->position_name }}</td>
                            <td>{{ $t->type_name }}</td>
                            <td>{{ $t->start_time }}z</td>
                            <td>{{ $t->end_time }}z</td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="6">No training tickets found.</td>
                    </tr>
                @endif
                @endif
            </thead>
        </table>
    </div>
    <div role="tabpanel" class="tab-pane active" id="s2">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Training Date</th>
                    <th scope="col">Trainer Name</th>
                    <th scope="col">Position</th>
                    <th scope="col">Session Type</th>
                    <th scope="col">Start Time</th>
                    <th scope="col">End Time</th>
                </tr>
                @if($tickets->count() > 0)
                    @foreach($tickets as $t)
                        <tr>
                            <td><a href="/dashboard/training/tickets/view/{{ $t->id }}">{{ $t->date }}</a></td>
                            <td>{{ $t->trainer_name }}</td>
                            <td>{{ $t->position_name }}</td>
                            <td>{{ $t->type_name }}</td>
                            <td>{{ $t->start_time }}z</td>
                            <td>{{ $t->end_time }}z</td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="6">No training tickets found.</td>
                    </tr>
                @endif
            </thead>
        </table>
    </div>
</div>
        {!! $tickets->appends(['id' => $search_result->id])->render() !!}
    @endif
</div>

@endsection
