@component('mail::message')

@component('mail::panel')
**{{ $data->name }}**
<br>
{{ $data->message }}
@endcomponent

@component('mail::button', ['url' => $data->url])
{{ $data->email }}
@endcomponent

@component('mail::subcopy')
**IP Address** {{ $data->ip }}
<br>
**Region** {{ $data->region }}
<br>
**Country** {{ $data->country }}
<br>
**Provider** {{ $data->isp }}
<br>
**Referer** {{ $data->referer }}
@endcomponent
