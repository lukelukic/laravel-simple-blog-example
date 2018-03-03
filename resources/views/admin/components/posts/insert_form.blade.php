<div class="row">

    <div class="col-md-8 col-md-offset-2">

        <p class="lead">Add New Blog Post</p>

        <form action="{{ route("posts.store") }}" method="post" enctype="multipart/form-data">

            {{ csrf_field() }}

            <div class="form-group">

                <div class="form-line">

                    <input name="title" type="text" class="form-control" placeholder="Title">

                </div>

            </div>

            <div class="form-group">

                <textarea class="form-control" name="content" id="content" placeholder="Blog Post Content"></textarea>

            </div>

            <div class="form-group">
                <div class="form-line">
                    <textarea class="form-control" name="description" placeholder="Blog Post Description"></textarea>
                </div>
            </div>

            <div class="form-group">

                <div class="form-line">

                    <label for="slika">Blog Post Picture</label>

                    <input id="slika" name="picture" type="file"  class="form-control">

                </div>

            </div>

            <div class="form-group">

                <input type="submit" class="btn btn-primary waves-amber" value="Add">

                <a href="{{ route("posts.index") }}" class="btn btn-warning waves-effect">Cancel</a>

            </div>

        </form>

    </div>

</div>