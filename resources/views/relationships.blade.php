@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Relationships</div>
                @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
                @endif

                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-6">
                            @if ( count($relationships) > 0)
                            <ul class="list-group">
                                <?php foreach ($relationships as $relationship) { ?>
                                <li class="list-group-item justify-content-between">
                                    <?php echo $relationship->name; ?>
                                </li>
                                <?php } ?>
                            </ul>
                            {{ $relationships->links() }}
                            @else
                            <h4>No relationships Found.</h4>
                            @endif
                        </div>

                        <div class="col-md-6">
                            <form role="form" action="{{ route('relationship') }}" method="POST">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="relationship">Add a relationship</label>
                                    <input type="text" class="form-control" name="relationship" placeholder="Add a relationship">
                                </div>
                                <button type="submit" class="btn btn-default">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
