<ul class="blog-ic">
    <li><a href="#"><span> <i  class="glyphicon glyphicon-user"> </i>{{ $post->first_name }} {{ $post->last_name }}</span> </a> </li>
    <li><span><i class="glyphicon glyphicon-time"> </i>{{ date("F j, Y", strtotime($post->created_at)) }}</span></li>
    <li><span><i class="glyphicon glyphicon-eye-open"> </i>Hits: {{ $post->visits }}</span></li>
</ul>