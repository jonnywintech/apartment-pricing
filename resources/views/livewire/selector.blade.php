<div class="container row">
    <h1> Pricing Plans</h1>
    <label>Pricing Plans</label>
    <select class="browser-default" wire:model.live="pricing_plan_id">
        <option value="" disabled selected>Select pricing plan</option>
        @foreach ($pricing_plans as $pricing_plan)
            <option value="{{ $pricing_plan->id }}">
                {{ $pricing_plan->name }}
            </option>
        @endforeach
    </select>

    <div class="row">
        <p>Select pricing plan to begin with, then create date range</p>
        <a class="waves-effect waves-light btn"
            @if ($pricing_plan_id === '') disabled
        @else
        href="{{ route('pricing_period.create', ['id' => $pricing_plan_id]) }}" @endif>Create
            date range</a>
    </div>

    @if (isset($pricing_periods) && count($pricing_periods) > 0)
    @foreach ($pricing_periods as $pricing_period)
        <table class="striped highlight responsive-table">
                <thead>
                    <tr>
                        <th>Date from</th>
                        <th>Date to</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td>{{ $pricing_period->start_date }}</td>
                        <td>{{ $pricing_period->end_date }}</td>
                    </tr>
                </tbody>
                <thead>
                    <tr>
                        <th>Room Type</th>
                        <th>Price</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pricing_period->roomPrices as $room_price)
                        <tr>
                            <td>{{ $room_price->roomType->name }}</td>
                            <td>{{ $room_price->price }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <hr>
            @endforeach
    @else
        <h3>No Plans found</h3>
    @endif
</div>
