@method($method)
@csrf
<input type="hidden" name="_token_form" value="{{ Str::uuid() }}" autocomplete="off">
