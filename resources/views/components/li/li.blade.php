<div>
    <li class="nav-item">
        <a href="{{ $link }}" class="nav-link {{ $onclick }}">
            <i class="nav-icon {{ $icon }}"></i>
            <p>
                {{ $label }}
            </p>
        </a>
        {{ $slot }}
    </li>
</div>
