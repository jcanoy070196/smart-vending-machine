<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm ">
            <div class="container">
            
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        @guest
                        @else
                        <li class="nav-item active">
                            <a class="nav-link" href="/home">Home <span class="sr-only">(current)</span></a>
                        </li>
                        @if(Auth::user()->hasRole('admin'))
                        <li class="nav-item active">
                            <a class="nav-link" href="/students-accounts">Students Accounts</a>
                        </li>
                        @endif
                        @if(Auth::user()->hasRole('admin') || Auth::user()->hasRole('technician'))
                        <li class="nav-item active">
                            <a class="nav-link" href="/sales-and-inventory">Sales and Inventory</a>
                        </li>
                        @endif
                        @if(Auth::user()->hasRole('admin') || Auth::user()->hasRole('technician'))
                        <li class="nav-item active">
                            <a class="nav-link" href="/notifications">Notifications</a>
                        </li>
                        @endif
                        @endguest
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <!-- <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li> -->
                            <!-- @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif -->
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
<script type="text/javascript">


    async function createNotification(){
        fetch("api/create-notifications") // Call the fetch function passing the url of the API as a parameter
        .then((resp) => resp.json()) // Transform the data into json
        .then(function(data) {
            console.log("Notifications");
        })
        .catch(function() {
            // This is where you run code if the server returns any errors
        });
    }

    setInterval(() => {
       createNotification();
    }, 60000);

    async function requestStudent(id){
        fetch("api/students-account/" + id) // Call the fetch function passing the url of the API as a parameter
        .then((resp) => resp.json()) // Transform the data into json
        .then(function(data) {
            
            document.getElementById("modalId").value = data.id;
            document.getElementById("modalIdNumber").value = data.idNumber;
            document.getElementById("modalFirstName").value = data.firstName;
            document.getElementById("modalMiddleName").value = data.middleName;
            document.getElementById("modalLastName").value = data.lastName;
            document.getElementById("modalBalance").value = data.balance;
            document.getElementById("modalRfid").value = data.rfid;
            document.getElementById("vendingTotal").innerHTML = data.balance;
            document.getElementById("totalPayment").innerHTML = parseInt(data.balance) + 11732.59;
            document.getElementById("statementName").innerHTML = data.lastName + ", " + data.firstName;
            document.getElementById("statementID").innerHTML = data.idNumber;
            // Create and append the li's to the ul
        })
        .catch(function() {
            // This is where you run code if the server returns any errors
        });
    }

    async function updateStudent() {
        var id = document.getElementById("modalId").value;
        var url = document.getElementById("studentForm").action;
        var url = url + '/' + id;
        var method = "POST";
        var rfid = document.getElementById("modalRfid").value; 
        var postData = {
            rfid : rfid,
        };

        

        // You REALLY want shouldBeAsync = true.
        // Otherwise, it'll block ALL execution waiting for server response.
        var shouldBeAsync = true;

        var request = new XMLHttpRequest();

        request.onload = function () {

            var status = request.status; // HTTP response status, e.g., 200 for "200 OK"
            var data = request.responseText; // Returned data, e.g., an HTML document.

            if(data == 'true')
            {
                document.location.reload(true);
            }
        }

        request.open(method, url, shouldBeAsync);
        request.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
        request.send(JSON.stringify(postData));
    }


    function onSubmit(event) {
        var url = document.getElementById("inventoryForm").action;
        var method = "POST";
        var selector = document.getElementById("productSelect");
        var product = selector.options[selector.selectedIndex].value;
        var quantity = document.getElementById("quantity").value; 
        var userId = document.getElementById("userId").value; 
        var postData = {
            productId : product,
            quantity : quantity,
            userId : userId,
        };

        

        // You REALLY want shouldBeAsync = true.
        // Otherwise, it'll block ALL execution waiting for server response.
        var shouldBeAsync = true;

        var request = new XMLHttpRequest();

        request.onload = function () {

            var status = request.status; // HTTP response status, e.g., 200 for "200 OK"
            var data = request.responseText; // Returned data, e.g., an HTML document.

            if(data == 'true')
            {
                document.location.reload(true);
            }
        }

        request.open(method, url, shouldBeAsync);
        request.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
        request.send(JSON.stringify(postData));
    }
    
</script>
</html>
