<ul class="navbar-nav me-auto mb-2 mb-lg-0">
    <li class="nav-item">
      <a class="nav-link {{ Request::is('backend/dashboard') ? 'active' : '' }}" href="{{url('backend/dashboard')}}">Dashboard</a>
    </li>
    <li class="nav-item">
      <a class="nav-link {{ Request::is('backend/members') ? 'active' : '' }}" href="{{url(\App\Models\Member::BASE_URL)}}">Members</a>
    </li>

    <li class="nav-item">
      <a class="nav-link {{ Request::is('backend/notice') ? 'active' : '' }}" href="{{url('backend/notice')}}">Notice</a>
    </li>

    <li class="nav-item">
      <a class="nav-link {{ Request::is('backend/advisors') ? 'active' : '' }}" href="{{url('backend/advisors')}}">Advisors</a>
    </li>

    <li class="nav-item">
      <a class="nav-link {{ Request::is('backend/notifications') ? 'active' : '' }}" href="{{url('backend/notifications')}}">
        Notifications 
        @if (Auth::user()->unreadNotifications->count()>0)
          <sup>{{Auth::user()->unreadNotifications->count()}}</sup>
        @endif
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link {{ Request::is('backend/publications') ? 'active' : '' }}" href="{{url('backend/publications')}}">Publications</a>
    </li>

    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">Scholarship</a>
      <div class="dropdown-menu">
        <a class="nav-link {{ Request::is(\App\Models\Exam::BASE_URL) ? 'active' : '' }}" href="{{url(\App\Models\Exam::BASE_URL)}}">Exams</a>
        {{-- <a class="nav-link {{ Request::is('scholarship/applications') ? 'active' : '' }}" href="{{url('scholarship/applications')}}">Applications</a> --}}
        <a class="nav-link {{ Request::is(\App\Models\School::BASE_URL) ? 'active' : '' }}" href="{{url(\App\Models\School::BASE_URL)}}">Schools</a>
      </div>
  </li>
  </ul>