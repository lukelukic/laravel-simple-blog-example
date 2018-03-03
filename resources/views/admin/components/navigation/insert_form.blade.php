<div class="row">

    <div class="col-md-4 col-md-offset-4">

        <p class="lead">Add new navigation link</p>

        <form action="{{ route("navigation.store") }}" method="post">

            {{ csrf_field() }}

            <div class="form-group">

                <div class="form-line">

                    <input name="name" type="text" class="form-control" placeholder="Link name">

                </div>

            </div>

            <div class="form-group">

                <div class="form-line">

                    <input name="route" type="text" class="form-control" placeholder="Page URL">

                </div>

            </div>

            <div class="form-group">

                <div class="form-line">

                    <input name="position" type="number" class="form-control" placeholder="Navigtion position">

                </div>

            </div>



            <div class="form-group">

                <input type="submit" class="btn btn-primary waves-amber" value="Add">

                <a href="{{ route("navigation.index") }}" class="btn btn-warning waves-effect">Cancel</a>

            </div>

        </form>

    </div>

</div>