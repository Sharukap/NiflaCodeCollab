@extends('home')

@section('cont')
<h3 class="p-3 display-4">Crime report handling</h3>
<hr>
<span>
    <h3 class="text-center bg-success text-light">{{session('message')}}</h3>
</span>
<div class="row justify-content-between">
    <div class="col-md-12">
        <h6>Crime information</h6>
        <table class="table table-dark table-striped border-secondary rounded-lg mr-4">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>crime type</th>
                    <th>description</th>
                    <th>Location</th>
                    <th>Date complained logged</th>
                    <th>Action taken</th>
                    <th>Photos</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{$crime->id}}</td>
                    <td>{{$crime->crime_type->type}}</td>
                    <td>{{$crime->description}}</td>
                    <td>...</td>
                    <td>{{date('d-m-Y',strtotime($crime->created_at))}}</td>
                    <td>{{$crime->taken_action->type}}</td>
                    <td><img src="{{ asset('\storage\crimeEvidence\WhatsApp Image 2021-01-02 at 16.49.22.jpeg') }}" alt="photo" width="80" /> </td>
                    <td>{{$crime->status}}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
</br>
<div class="row justify-content-between">
    <div class="col-md-8">
        <h6>Prerequisites</h6>
        <table class="table table-dark table-striped border-secondary rounded-lg mr-4">
            <thead>
                <tr>
                    <th>Requested by</th>
                    <th>status</th>
                    <th>remarks</th>
                    <th>check</th>
                </tr>
            </thead>
            <tbody>
            @foreach($Prerequisites as $prerequisite)<tr>
                    <td>{{$prerequisite->requst_organization}}</td>
                    <td>{{$prerequisite->status_id}}</td>
                    <td>{{$prerequisite->remark}}</td>
                    <td><a href="/approval-item/viewprerequisite/{{$prerequisite->id}}" class="text-muted">check</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
<hr>
</br>
<div class="row justify-content-between">
    <div class="col-md-8">
    @switch(Auth::user()->role_id)
    @case('3')
        <h6>Assign Manager/Staff</h6>
    @break;
    @case('4')
        <h6>Assign Staff</h6>
    @endswitch
        <table class="table table-dark table-striped border-secondary rounded-lg mr-4">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>name</th>
                    <th>role</th>
                    <th>email</th>
                    <th>assign</th>
                </tr>
            </thead>
            <tbody>
                @foreach($Users as $user)<tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->role->title}}<td>
                    <td>{{$user->email}}</td>
                    <td><a href="/approval-item/confirmassign/{{$user->id}}/{{$Process_item->id}}" class="text-muted">assign</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<br>
<hr>
<br>
<div class="row justify-content-between">
    <div class="col-md-8">
        <h6>Request additional investigation</h6>
        <br>
        <form action="\approval-item\createprerequisite" method="post">
            @csrf
            <h6>Select Organization in charge</h6>
            <div class="input-group mb-3">
            <select name="organization" class="custom-select">
                <option value="0" selected>Select Organization</option>
            @foreach($Organizations as $organization)         
                <option value="{{$organization->id}}">{{$organization->title}}</option>
            @endforeach
            </select>
            @error('organization')
                <div class="alert">                                   
                    <strong>{{ $message }}</strong>
                </div>
            @enderror
            </div>
            <h6>Request</h6>
            <div class="input-group mb-3">
            </br>
                <textarea  class="form-control" rows="5" name="request">
                </textarea>
                @error('request')
                    <div class="alert">
                        <strong>{{ $message }}</strong>
                    </div>
                @enderror
                <input type="hidden" class="form-control" name="create_by" value="{{ Auth::user()->id }}">
                <input type="hidden" class="form-control" name="create_organization" value="{{ Auth::user()->organization_id }}">
                <input type="hidden" class="form-control" name="process_id" value="{{ $Process_item->id }}">
            </div>
            <div class="form-check">
                <button type="submit" class="btn btn-primary" >Submit</button>
            </div>
        </form>
    </div>
</div>
@endsection
