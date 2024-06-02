@extends('template.app')

@section('vite_head')
    @vite('resources/js/pricing_period/create.js')
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col s12">
                <div class="card">
                    <div class="card-content">
                        <span class="card-title">Card Title</span>
                        <p>I am a very simple card. I am good at containing small bits of information.
                            I am convenient because I require little markup to use effectively.</p>
                    </div>
                    <div class="card-action">
                        <a href="#">This is a link</a>
                        <a href="#">This is a link</a>
                    </div>
                </div>
            </div>
        </div>
        <label for="date_from">Select date from</label>
        <input type="text" name="date_from"  id="date_from" class="datepicker" required>
        <label for="date_from">Select date from</label>
        <input type="text" name="date_to" id="date_to" class="datepicker" required>
    </div>
    </div>
    <script type="text/javascript">

    </script>
@endsection
