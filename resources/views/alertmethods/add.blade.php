@extends('template_Dashboard')

@section('title')
    Add Alert Methods|Website Uptime Monitor
@endsection

@section('content')
    <div id="page-wrapper" style="padding-top: 20px;">
        <div class="row">
            @component('flash_alert_message')

            @endcomponent
            <div class="col-lg-12">
                <h1 class="page-header">Add Alert Methods</h1>
            </div>
            <div style="margin: 20px 0">
                <a href="{{ route('viewListAlertMethods') }}"><button type="button" class="btn btn-primary" >List Alert Methods</button></a>
            </div>
            <div class="panel panel-default">
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('addAlertMethods') }}">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-1 control-label">Methods Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">
                            <label for="type" class="col-md-1 control-label">Type</label>

                            <div class="col-md-6">
                                <select id="type" class="form-control" name="type" onchange="showDiv('type',this)" value="{{ old('type') }}">
                                    @foreach($listType as $key => $value)
                                        <option value="{{ $key }}" {{ old('type')== $key?'selected':''  }}>{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div id="type1" class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-1 control-label">E-Mail</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                                @endif
                            </div>
                        </div>

                        <div id="type2" class="form-group{{ $errors->has('phone_number') ? ' has-error' : '' }}" style="display: none;">
                            <label for="phone_number" class="col-md-1 control-label">Phone Number</label>

                            <div class="col-md-6">
                                <input id="phone_number" type="text" class="form-control" name="phone_number" value="{{ old('phone_number') }}" disabled autofocus>

                                @if ($errors->has('phone_number'))
                                    <span class="help-block">
                                <strong>{{ $errors->first('phone_number') }}</strong>
                            </span>
                                @endif
                            </div>
                        </div>

                        <div id="type3" class="form-group{{ $errors->has('webhook') ? ' has-error' : '' }}" style="display: none;">
                            <label for="webhook" class="col-md-1 control-label">Webhook</label>

                            <div class="col-md-6">
                                <input id="webhook" type="webhook" class="form-control" name="webhook" value="{{ old('webhook') }}" disabled autofocus>

                                @if ($errors->has('webhook'))
                                    <span class="help-block">
                                <strong>{{ $errors->first('webhook') }}</strong>
                            </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-1">
                                <button type="submit" class="btn btn-primary">
                                    Add Methods
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/alert_methods.js')}}"></script>
@endsection