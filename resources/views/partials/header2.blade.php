<div class="page-header d-flex justify-content-between align-items-center">
    <div class="d-flex align-items-center">
        <button id="toggleSidebar" style="cursor: pointer;" class="mr-3 border-no">☰</button>
        <input type="text" class="form-control" placeholder="Search product..." style="width:300px;">
    </div>
    <div class="dropdown">
        <a href="javascript:;">
            Hi! {{ auth()->user()->name }} &nbsp;&nbsp; <span class="text-lighter">|</span>&nbsp;&nbsp;&nbsp; <img src="{{ asset('assets/images/icon/profile.png') }}" width="30" class="fa-2x mr-1" alt="">
        </a>
        <div class="dropdown-box" style="width: 10rem;">

            <a href="javascript:;" class="logout" data-id="logout-html">
                Logout
            </a>
            <div class="d-none" id="logout-html">
                <form method="POST" class="d-flex justify-content-center" action="{{ route('logout') }}">
                    <div class="card pb-4 pl-4 pr-4 pt-4 text-center">
                        <div class="card-header">
                            <h4>Logout</h4>
                        </div>
                        <div class="card-body">
                            <p>Are you sure want to logout?</p>
                            @csrf
                            <button class="btn btn-warning popupcancel" type="button">Cancel</button>
                            <button class="btn btn-danger" onclick="(startLoadings(this),this.closest('form').submit())" type="submit">Logout</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>