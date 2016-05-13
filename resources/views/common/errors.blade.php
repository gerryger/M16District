<!-- resources/views/common/errors.blade.php -->

<!-- /**
 * Created by PhpStorm.
 * User: Gerryger
 * Date: 2/28/16
 * Time: 9:16 AM
 */ -->

@if (count($errors) > 0)
        <!-- Form Error List -->
<div class="alert alert-danger">
    <strong>Whoops! Something went wrong!</strong>

    <br><br>

    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
