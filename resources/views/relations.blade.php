@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Relations</div>
                @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
                @endif

                @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
                @endif

                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-6">
                            <ul class="list-group">
                                @if ( count($data['relations']) > 0)
                                <ul class="list-group">
                                    <?php foreach ($data['relations'] as $relation) { ?>
                                    <li class="list-group-item justify-content-between">
                                        {{ $relation->relative->name }}
                                        <span class="badge badge-default badge-pill">{{ $relation->relationship->name }}</span>
                                    </li>
                                    <?php } ?>
                                </ul>
                                {{ $data['relations']->links() }}
                                @else
                                <h4>No relations Found.</h4>
                                @endif
                            </ul>
                        </div>

                        <div class="col-md-6">
                            <form role="form" action="{{ route('relation') }}" method="POST">
                                {{ csrf_field() }}

                                <div class="form-group">
                                    <label for="relative">Choose a relative</label>
                                    <select class="form-control" name="relative">
                                        <option value="">Choose a relative</option>
                                        <?php foreach ($data['users'] as $user) { ?>
                                        <option value="{{ $user->id }}"><?php echo $user->name; ?></option>
                                        <?php } ?>
                                        <option value="other">Other</option>
                                    </select>
                                </div>

                                <div id="newUser"></div>

                                <div class="form-group">
                                    <label for="relationships">Choose a relationship</label>
                                    <select class="form-control" name="relationships">
                                        <option value="">Choose a relationship</option>
                                        <?php foreach ($data['relationships'] as $relationship) { ?>
                                        <option value="{{ $relationship->id }}"><?php echo $relationship->name; ?></option>
                                        <?php } ?>
                                    </select>
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
