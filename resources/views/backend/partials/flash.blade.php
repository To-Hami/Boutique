@if(session()->has('message'))

    <div class="alert alert-{{session()->get('alert-type')}} alert-dismissible fade show" role="alert"
         id="alert-message">
        <strong>{{session()->get('message')}}</strong>
    </div>
@endif
