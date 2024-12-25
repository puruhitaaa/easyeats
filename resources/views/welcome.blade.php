@extends('layouts.app')

@section('content')
    <div>
        <livewire:latest-recipes />
        <livewire:latest-ingredients />
        <livewire:latest-restaurants />
    </div>
@endsection
