<div class="container row">
    @if (session('status_message'))
        <div class="alert alert-success">
            {{ session('status_message') }}
            <button class="alert-success-button" onclick="this.parentElement.remove()">&#x2716;</button>
        </div>
        <br />
    @elseif ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="alert alert-error">
                {{ $error }}
                <button class="alert-error-button" onclick="this.parentElement.remove()">&#x2716;</button>
            </div>
            <br />
        @endforeach
    @endif
    <h1> Pricing Plans</h1>
    <label for="pricing_plans">Pricing Plans</label>
    <select id=pricing_plans class="browser-default" wire:model.live="pricing_plan_id">
        <option value="" disabled selected>Select pricing plan</option>
        @foreach ($pricing_plans as $pricing_plan)
            <option value="{{ $pricing_plan->id }}">
                {{ $pricing_plan->name }}
            </option>
        @endforeach
    </select>

    <div class="row">
        <p>Select pricing plan to begin with, then create date range</p>
        <a class="waves-effect waves-light btn green"
            @if ($pricing_plan_id === '') disabled
        @else
        href="{{ route('pricing_period.create', ['id' => $pricing_plan_id]) }}" @endif>Create
            Room Prices for selected plan</a>
    </div>

    @if (isset($pricing_periods) && count($pricing_periods) > 0)
        @foreach ($pricing_periods as $pricing_period)
            <table class="striped highlight responsive-table">
                <thead>
                    <tr>
                        <th>Date from</th>
                        <th>Date to</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            {{ $pricing_period->start_date }}
                        </td>
                        <td>{{ $pricing_period->end_date }}</td>
                        <td>
                                <button class="btn blue modal__trigger"
                                    wire:click="openModal({{ $pricing_period->id }})">edit</button>

                                <button class="btn red modal__trigger" wire:click="destroy({{ $pricing_period->id }})"
                                    wire:confirm="Are you sure you want to delete termin?">Delete</button>
                        </td>
                    </tr>
                    <tr>
                        <th>Room Type</th>
                        <th>Price</th>
                    </tr>

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

    <div class="modal__data {{ $pricing_period_modal_id ? '' : 'modal__data--active' }} ">
        <div class="modal-content modal__data-content">
            <button class="close-modal__button" wire:click="clearData"
                onclick="this.parentElement.parentElement.classList.toggle('modal__data--active')">&#x2716;</button>
            <form method="POST" class="" wire:submit.prevent="update">
                @csrf
                <div class="row">
                    <table class="striped highlight responsive-table">
                        <thead>
                            <tr>
                                <th>Date from</th>
                                <th>Date to</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    {{ $dates[0] ?? '' }}
                                </td>
                                <td>
                                    {{ $dates[1] ?? '' }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="row">
                    @for ($i = 0; $i < count($room_prices_ids); $i++)
                        <div class="input-field col s4 input-icon input-icon-left">
                            <input wire:model="room_prices_ids.{{ $i }}" type="hidden"
                                name="room_price_id[]" value="{{ $room_prices_ids[$i] }}">
                            <input wire:model="room_prices.{{ $i }}"
                                id="price_update_{{ $room_prices_ids[$i] }}" name="room_price[]"
                                value="{{ $room_prices[$i] }}" type="number" min="1"
                                max="9999999999999999999999999999" class="validate input-symbol-dollar" required
                                placeholder="300$" step="0.01">
                            <label class="active label__large"
                                for="price_update_{{ $room_prices_ids[$i] }}">{{ $room_names[$i] }}</label>
                            <span class="helper-text" data-error="wrong" data-success="right"></span>
                        </div>
                    @endfor
                </div>
                <div class="row">
                    <button class="btn blue waves-effect waves-light" type="submit">Update
                        <i class="material-icons right">vertical_align_top</i>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
