@isset($method)
    @method($method)
@endisset
@csrf
<input type="hidden" name="_token_form" value="{{ tokenFormGenerate() }}" autocomplete="off">
