@extends('template.app')

@section('vite_head')
    @vite(['resources/js/pricing_period/create.js', 'resources/css/pricing_period/create.css'])
@endsection

@section('content')
    <div class="container" style="padding:25px;">
        <div class="row">
            <div class="col 6">
                <label for="pricing_plan">Select Pricing Plan</label>
                <select class="browser-default" id="pricing_plan">
                    @foreach ($pricing_plans as $pricing_plan)
                        <option wire:key="pricing_plan_{{ $pricing_plan->id }}" value="{{ $pricing_plan->id }}"
                            @if ($pricing_plan->id == $pricing_plan_id) selected @endif>
                            {{ $pricing_plan->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col 6">

                <div class="col 3">
                    <label for="date_from">Select date from</label>
                    <input type="text" name="date_from" id="date_from" class="datepicker" required>
                </div>
                <div class="col 3">
                    <label for="date_from">Select date from</label>
                    <input type="text" name="date_to" id="date_to" class="datepicker" required>
                </div>
            </div>
        </div>
        <div class="row text">
            <h3>Set room prices</h3>
            @foreach ($room_types as $room_type)
                <div class="input-field col s4">
                    <input id="price_{{$room_type->id}}" type="number" min="1" class="validate" required placeholder="300$">
                    <label for="price_{{$room_type->id}}">{{ $room_type->name }}</label>
                    <span class="helper-text" data-error="wrong" data-success="right"></span>
                </div>
            @endforeach
        </div>
        <div class="row">
            <button class="btn waves-effect waves-light" type="submit" name="action">Create
                <i class="material-icons right">playlist_add</i>
              </button>
        </div>
    </div>
    </div>
    <script type="text/javascript"></script>
@endsection
