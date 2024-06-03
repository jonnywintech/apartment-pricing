@extends('template.app')

@section('vite_head')
    @vite(['resources/js/pricing_period/create.js', 'resources/css/pricing_period/create.css'])
@endsection

@section('content')
    <div class="container">
        <form action="{{route('pricing_period.store')}}" method="POST" class="create-plan__form">
            @csrf
            <div class="row">
                <div class="col 6">
                    <label for="pricing_plan_id">Select Pricing Plan</label>
                    <select class="browser-default" id="pricing_plan_id" name="pricing_plan_id">
                        @foreach ($pricing_plans as $pricing_plan)
                            <option value="{{ $pricing_plan->id }}"
                                @if ($pricing_plan->id == $pricing_plan_id) selected @endif>
                                {{ $pricing_plan->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col 6">
                    <div class="col 3">
                        <label for="start_date">Select date from</label>
                        <input type="text" name="start_date" id="start_date" class="datepicker" required>
                    </div>
                    <div class="col 3">
                        <label for="end_date">Select date from</label>
                        <input type="text" name="end_date" id="end_date" class="datepicker" required>
                    </div>
                </div>
            </div>
            <div class="row text">
                <h3>Set room prices</h3>
                @foreach ($room_types as $room_type)
                    <div class="input-field col s4 input-icon input-icon-left">
                        <input id="price_{{$room_type->id}}" name="room_price[]" type="number" min="1" class="validate input-symbol-dollar" required placeholder="300$" step="0.01">
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
        </form>
    </div>
    </div>
    <script type="text/javascript"></script>
@endsection
