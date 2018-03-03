<!-- User Info -->
<div class="user-info">
    <div class="image">
        <img src="{{ asset("admin/images/user.png") }}" width="48" height="48" alt="User" />
    </div>
    <div class="info-container">
        <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ session()->get('user')->first_name . " " . session()->get('user')->last_name  }}</div>
        <div class="email">{{ session()->get('user')->email }}</div>
    </div>
</div>
<!-- #User Info -->