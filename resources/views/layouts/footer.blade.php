<footer class="footer" >
    <div class="container-fluid">
        <ul class="nav">
            <li class="nav-item">
                <a href="{{route('home')}}" target="blank" class="nav-link">
                    {{ __('Gamers Shop') }}
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('about') }}" class="nav-link">
                    {{ __('About Us') }}
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('shop') }}" target="blank" class="nav-link">
                    {{ __('Shop') }}
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('contact.show') }}" class="nav-link">
                    {{ __('Contact') }}
                </a>
            </li>
        </ul>
        <div class="copyright">
            &copy; {{ now()->year }} {{ __('made with') }} <i class="tim-icons icon-heart-2"></i> {{ __('by') }}
            <a href="https://www.linkedin.com/in/ahmed-ashraf-4b7359222/" target="_blank">{{ __('Ahmed Ashraf') }}</a> {{ __('for a better web') }}.
        </div>
    </div>
</footer>
