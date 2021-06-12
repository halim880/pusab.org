<ul class="navbar-nav me-auto mb-2 mb-lg-0">
    <li class="nav-item">
      <a class="nav-link {{ Request::is('pages/home') ? 'active' : '' }}" href="{{url('pages/home')}}">Home</a>
    </li>
    <li class="nav-item">
      <a class="nav-link {{ Request::is('pages/contact') ? 'active' : '' }}" href="{{url('pages/contact')}}">Contact</a>
    </li>
    <li class="nav-item">
      <a class="nav-link {{ Request::is('pages/about') ? 'active' : '' }}" href="{{url('pages/about')}}">About</a>
    </li>

    <li class="nav-item">
      <a class="nav-link {{ Request::is('pages/members') ? 'active' : '' }}" href="{{url('pages/members')}}">PUSAB Family</a>
    </li>

    <li class="nav-item">
      <a class="nav-link {{ Request::is('pages/notice') ? 'active' : '' }}" href="{{url('pages/notice')}}">Notice</a>
    </li>
    <li class="nav-item">
      <a class="nav-link {{ Request::is('pages/activities') ? 'active' : '' }}" href="{{url('pages/activities')}}">Activities</a>
    </li>
    <li class="nav-item">
      <a class="nav-link {{ Request::is('pages/publications') ? 'active' : '' }}" href="{{url('pages/publications')}}">Sayor</a>
    </li>

    <li class="nav-item">
      <a class="nav-link {{ Request::is('pages/scholarship_exam') ? 'active' : '' }}" href="{{url('pages/scholarship_exam')}}">Scholarship Exam</a>
    </li>
  </ul>