@component('mail::message')
**От:** {{ $feedback['last_name'] }} {{ $feedback['first_name'] }}

**Email:** {{ $feedback['email'] }}

**Сообщение:** {{ $feedback['message'] }}
@endcomponent
