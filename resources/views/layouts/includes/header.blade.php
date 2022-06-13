<style>
#adminp{
    font-size: 16px;
}
.alert-message{

    background-color: aquamarine;
    text-align: center;
}
#success{
    display: none;
    background-color: aquamarine;
}
#nameError{
    display: none;
    background-color: rgb(201, 19, 19);
}
.display-6{
    background-color: #aeaeae;
    color: aliceblue;
    padding: 20px;
    font-size: 16px;
    font-weight: 700;
}
<meta name="csrf-token" content="{{ csrf_token() }}" />
</style>

<div id="right-panel" class="right-panel">
<header id="header" class="header">
            <div class="top-left">
                <div class="navbar-header">
                    <a class="navbar-brand"  href="{{ url('/admin') }}" >
        <img style="height: 50px;" src="{{ asset('images/logo/logo1.png') }}" alt="E-shop">
</a>
                    <a class="navbar-brand hidden" href="./"><img src="images/logo3.png" alt="Logo"></a>
                    <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
                </div>
            </div>
            <div class="top-right">
                <div class="header-menu">
                    <div class="header-left">

                        <div class="form-inline">

                        </div>


                    </div>

                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="user-avatar rounded-circle" src="{{ asset('images/images.png') }}" alt="User Avatar">



                        </a>

                        <div class="user-menu dropdown-menu">
                            @if (Auth::guard('adminauth')->check())
                            <a class="nav-link" href=""><i class="fa fa- user"></i> {{auth()->guard('adminauth')->user()->first_name}}</a>
                            <div class="dropdown-divider"></div>
                            <a class="nav-link" href="admin-profile.php" data-toggle="modal" data-target="#profileModal" data-whatever="@getbootstrap"><i class="fa fa- user" ></i>My Profile</a>
                            <div class="dropdown-divider"></div>
                            <a class="nav-link" href="change-password.php" data-toggle="modal" data-target="#changeModal" data-whatever="@getbootstrap"><i class="fa fa -cog"></i>Change Password</a>
                            <div class="dropdown-divider"></div>
                            <a class="nav-link"  href="/user_signOut"><i class="fa fa-power -off"></i>Logout</a>
                            <div class="dropdown-divider"></div>
                            @else

                            <a class="nav-link"  href="/user_signOut"><i class="fa fa-power -off"></i>Login</a>
                            @endif
                        </div>
                    </div>

                </div>
            </div>
        </header>
        <div class="modal fade" id="profileModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Admin profile details</h5>

                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
          <div class="container">

              <div class="row" id="adminp">
                  <div class="col-sm-6">
                      <p>First Name</p>
                    <a>{{auth()->guard('adminauth')->user()->name}}</a><br>

                </div>
                <div class="col-sm-6">
                  
                  <p>Email</p>
                  {{auth()->guard('adminauth')->user()->email}} <br>
              </div>
              </div>
          </div>




                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                </div>
              </div>
            </div>
          </div>






          <div class="modal fade" id="changeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

                <div class="modal-dialog modal-lg" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Admin change Password</h5>

                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">

                        <div class="alert alert-message alert-dismissible fade show" id="success"></div>
                        <form id="ajaxform">
                            @csrf <!-- {{ csrf_field() }} -->
                          <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Enter old password:</label>
                            <input type="text" class="form-control" id="oldpassword" required>
                          </div>
                          <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Enter New Password:</label>
                            <input type="text" class="form-control" id="newpassword" required>
                          </div>
                          <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Repeat New Password:</label>
                            <input type="text" class="form-control" id="repeatpassword" required>
                            <div class="alert-message" id="nameError"></div>
                          </div>




                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="formSubmit">Save Category</button>
                    </form>
                    </div>
                  </div>
                </div>
              </div>
              <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

              <script>
                $(document).ready(function(){
                    $('#formSubmit').click(function(e){
                        e.preventDefault();
                        let _token   = $('meta[name="csrf-token"]').attr('content');

                        $.ajax({
                            url: "{{ url('/admin/change_password') }}",
                            method: 'post',
                            data: {
                                _token: _token,
                                oldpassword: $('#oldpassword').val(),
                                newpassword: $('#newpassword').val(),
                                newpassword_confirmation: $('#repeatpassword').val(),
                            },
                            success: function(data){
                                $('#success').show();
                                $('#success').text(data.success);
                                $("#ajaxform")[0].reset();

                                setTimeout(function() {


                                $('#success').hide();

                                }, 3000);
                            },
                            error: function(response) {
                                $('#nameError').show();
              $('#nameError').text(response.responseJSON.errors.newpassword);

           }
                        });
                    });
                });


</script>
