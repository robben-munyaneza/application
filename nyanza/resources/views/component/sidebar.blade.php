<!DOCTYPE html>
<html>
<head>
    <title>NYANZA TSS App</title>
</head>
<body>
    <div>

        {{-- Sidebar (includes @yield) --}}
        <div>
            <h3>Sidebar</h3>
            <ul>
                <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li><a href="{{ route('jobposition.store')}}">Job Positions</a></li>
                <li><a href="{{ route('applicants.store')}}">Applicants</a></li>
                <li><a href="{{ route('applications.store')}}">Applications</a></li>
                <li><a href="{{ route('recruitmentstage.store')}}">Recruitment Stages</a></li>
                <li><a href="/logout">Logout</a></li>
            </ul>

            {{-- This is where the page content will appear --}}
            <div style="margin-top: 20px;">
                @yield('content')
            </div>
        </div>

    </div>
</body>
</html>
