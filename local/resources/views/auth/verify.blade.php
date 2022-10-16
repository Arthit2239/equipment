@if (session('resent'))
<div class="alert alert-success" role="alert">
   {{ __('A fresh verification link has been sent to your email address.') }}
</div>
@endif

Verify Your Email Address <a href="{{ url('/reset-password/'.$token) }}">Click Here</a>
