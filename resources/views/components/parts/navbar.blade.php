<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">لوحة التحكم للموقع</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav m-auto me-5 mb-2 mb-lg-0">
          @auth
              
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{route('Team.index')}}">فريق العمل</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="{{route('Achievement.index')}}">الانجازات</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="{{route('Tablet.index')}}">خدمة التابلت</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="{{route('Uniform.index')}}">خدمة الزي</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="{{route('Message.index')}}">خدمة الرسائل</a>
          </li>
          @endauth
        </ul>
        @auth
        <a class="nav-link active" href="{{route('logout')}}">تسجيل خروج</a>            
        @endauth
        
      </div>
    </div>
  </nav>