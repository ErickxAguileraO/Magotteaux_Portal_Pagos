@if (session()->has('message'))
   <input id="msg-notify" type="hidden" value="{{ session()->get('message') }}">
   <input id="type-notify" type="hidden" value="{{ session()->get('type') }}">
   <input id="route-notify" type="hidden" value="{{ session()->get('route') }}">
@endif