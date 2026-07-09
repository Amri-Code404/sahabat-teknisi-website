<nav class="navbar-admin">


    <div>

        <h5 class="mb-0">
            Dashboard
        </h5>

    </div>


    <div class="dropdown">


        <button
            class="btn profile-btn dropdown-toggle"
            data-bs-toggle="dropdown">


            <i class="bi bi-person-circle"></i>

            {{ auth()->user()->name }}


        </button>


        <ul class="dropdown-menu">


            <li>

                <form method="POST" action="{{ route('logout') }}">

                    @csrf

                    <button class="dropdown-item">

                        Logout

                    </button>


                </form>

            </li>


        </ul>


    </div>


</nav>