<div class="container row">
    <h1> Pricing Plans</h1>
    <label>Pricing Plans</label>
    <select class="browser-default" wire:model.live="pricing_plan_id">
        <option value="" disabled selected wire:key="pricing_plan_0">Select pricing plan</option>
        @foreach ($pricing_plans as $pricing_plan)
            <option wire:key="pricing_plan_{{ $pricing_plan->id }}" value="{{ $pricing_plan->id }}">
                {{ $pricing_plan->name }}</option>
        @endforeach
    </select>

    <div class="row">
        <p>Select pricing plan to begin with, then create date range</p>
        <a class="waves-effect waves-light btn"
            @if (!isset($pricing_plan_id)) disabled
        @else
        href="{{ route('pricing_period.create', ['id' => $pricing_plan_id]) }}" @endif>Create
            date range</a>
    </div>

    <table class="striped highlight responsive-table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Item Name</th>
                <th>Item Price</th>
            </tr>
        </thead>

        <tbody>
            <tr>
                <td>Alvin</td>
                <td>Eclair</td>
                <td>$0.87</td>
            </tr>
            <tr>
                <td>Alan</td>
                <td>Jellybean</td>
                <td>$3.76</td>
            </tr>
            <tr>
                <td>Jonathan</td>
                <td>Lollipop</td>
                <td>$7.00</td>
            </tr>
        </tbody>
    </table>
</div>
