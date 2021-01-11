@extends('home')

@section('cont')
<h1>hyi</h1>
<img src="{{ asset('/storage/crimeEvidence/'.$crime ?? ''->photos) }}" alt="photo" width="80" />
@endsection