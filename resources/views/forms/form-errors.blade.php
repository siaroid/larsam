@if($errors->any())
    <div class="alert alert-danger fade in">
        <ul>
            @foreach($errors->all() as $error)

                <li class="iryekan" style="font-size: 1.2em">{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif
