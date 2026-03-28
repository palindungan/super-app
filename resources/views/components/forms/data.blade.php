@method($method)
@csrf
<input type="hidden" name="_token_form" value="{{ generate_token_form() }}" autocomplete="off">
